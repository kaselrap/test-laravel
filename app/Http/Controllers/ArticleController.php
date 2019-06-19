<?php

namespace App\Http\Controllers;

use App\Events\ArticleEvents;
use App\Listeners\ArticleListeners;
use App\Models\Article;
use App\Models\Ip;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use function Psy\bin;

class ArticleController extends Controller
{
    protected $allowed_extension = [
        'jpg',
        'jpeg',
        'png',
        'gif'
    ];

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles', ['articles' => auth()->user()->articles()->paginate(18)]);
    }

    public function search(Request $request, $query = null)
    {
        if( $request->has('query') ) {
            $query = $request->get('query');
            $articles = Article::join('users', 'users.id', '=', 'articles.user_id')
                ->where('articles.title', 'LIKE', "%$query%")
                ->orWhere('articles.text', 'LIKE', "%$query%")
                ->select(['articles.*', 'users.name as user_name'])
                ->orderBy('articles.created_at', 'DESC')->paginate(18);

            return view('home', ['articles' => $articles, 'query' => $query]);
        }
    }

    /**
     * @param Article|null $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article = null)
    {
        if ($article) {
            $model = Article::find($article->id);
        } else {
            $model = new Article();
        }
        return view('article.edit',[
            'article' => $model
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {
        $article = Article::find($id);

        return view('article.edit', ['article'=>$article]);
    }

    /**
     * @param Request $request
     * @param string $type
     * @param null $id
     * @param Article|null $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, $type = 'add', Article $article = null) {

        $request->validate([
            'title' => 'required|max:255',
            'text'  => 'required|min:255'
        ]);

        if ($article instanceof Article) {
            $text = $request->get('text');
            $description = substr($text, 0, 120);

            if($request->hasFile('video')) {
                $storagePath = storage_path() . '/app/public/videos/';

                $file = $request->file('video');
                $fileName = auth()->user()->id . '-' . time() . $file->getClientOriginalName();
                if(file_exists($storagePath . $fileName)) {
                    @unlink($storagePath, $fileName);
                }

                if($file->move($storagePath, $fileName)) {
                    $article->video = $fileName;
                }
            }

            $article->fill([
                'title' => $request->get('title'),
                'description' => $description,
                'text' => $text,
            ]);
        }
        else {
            $text = $request->get('text');
            $description = substr($text, 0, 120);
            $article = new Article([
                'title' => $request->get('title'),
                'description' => $description,
                'text' => $text,
                'video' => $request->get('video'),
                'user_id' => auth()->user()->id
            ]);

            if($request->hasFile('video')) {
                $storagePath = storage_path() . '/app/public/videos/';

                $file = $request->file('video');
                $fileName = auth()->user()->id . '-' . time() . $file->getClientOriginalName();
                if(file_exists($storagePath . $fileName)) {
                    @unlink($storagePath, $fileName);
                }

                if($file->move($storagePath, $fileName)) {
                    $article->video = $fileName;
                }
            }
        }
        $article->save();

        return redirect()->route('articles')->with('success');
    }

    /**
     * @param Article|null $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Article $article = null) {
        if($article) {
            Article::destroy($article->id);
            return redirect()->route('articles')->with('success', 'Video Successfully deleted');
        } else {
            return redirect()->route('articles');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAll()
    {
        $articles = Article::join('users', 'users.id', '=', 'articles.user_id')
            ->get(['articles.*', 'users.name as user_name'])
            ->orderBy('articles.created_at', 'DESC');

        return view('articles', ['articles' => $articles]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getArticleById($id)
    {
        $article = Article::join('users', 'users.id', '=', 'articles.user_id')
            ->select(['articles.*', 'users.name as user_name'])
        ->find($id);

        $article->increment('total_views');
        $this->viewsUp($article);

        return view('article.full', ['article'=>$article]);
    }

    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getByUserId(User $user = null)
    {
        if( $user instanceof User) {
            return view('user.articles', ['user' => $user]);
        } else {
            return route('home');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $article = Article::join('users', 'users.id', '=', 'articles.user_id')
            ->select(['articles.*', 'users.name as user_name'])
            ->orderBy('articles.created_at', 'DESC')
        ->paginate(24);

        return view('article.all', ['articles' => $article]);
    }

    /**
     * @param string $action
     * @param Article $article
     */
    public function action(Article $article, $action = 'like') {
        if( $action == 'like' ) {
            $article->increment('like');
            return response()->json([
                'like' => $article->like,
                'percentage' => intval($article->like / ($article->like + $article->dislike) * 100)
            ]);
        } else if ( $action == 'dislike' ) {
            $article->increment('dislike');
            return response()->json([
                'dislike' => $article->dislike,
                'percentage' => intval($article->like / ($article->like + $article->dislike) * 100)
            ]);
        }
    }

    private function viewsUp(Article $article = null)
    {
        if( request()->ip() ) {
            $count = Ip::where([
                ['ip', '=', request()->ip()],
                ['view', '=', true],
                ['article_id', '=', $article->id]
            ])->count();

            if( $count > 0 ) {
                return Ip::count();
            } else {

                $ip = $article->ip()->create([
                    'ip' => request()->ip(),
                    'view' => true
                ]);
                return true;
            }
        }

    }
}
