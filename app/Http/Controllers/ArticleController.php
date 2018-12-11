<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('add');
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
    public function store(Request $request, $type = 'add', $id = null, Article $article = null) {
        $request->validate([
            'title' => 'required|max:255',
            'text'  => 'required|min:255'
        ]);

        if ($article instanceof Article) {
            $text = $request->get('text');
            $description = substr($text, 0, 30);
            $article->fill([
                'description' => $description,
                'text' => $text
            ]);
        }
        else {
            if ( isset($id, $type) && $type == 'edit') {
                $article = Article::find($id);
                $article->title = $request->get('title');
                $text = $request->get('text');
                $description = substr($text, 0, 120);
                $article->description = $description;
                $article->text = $text;
            } else {
                $text = $request->get('text');
                $description = substr($text, 0, 120);
                $article = new Article([
                    'title' => $request->get('title'),
                    'description' => $description,
                    'text' => $text,
                    'user_id' => auth()->user()->id
                ]);
            }
        }
        $article->save();

        return redirect('/home')->with('success');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id) {
        $article = Article::find($id);

        if ( $article->delete() ) {
            return redirect('/home')->with('success', 'Article Successfully deleted');
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAll()
    {
        $articles = Article::join('users', 'users.id', '=', 'articles.user_id')
            ->get(['articles.*', 'users.name as user_name']);

        return view('welcome', ['articles' => $articles]);
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

        return view('article.full', ['article'=>$article]);
    }

}
