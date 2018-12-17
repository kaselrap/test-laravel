<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use \Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param Article|null $article
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Article $article = null)
    {
        $text = request()->get('text');
        if ( request()->has('comment_id') ) {
            $comment = $article->comments()->create([
                'text' => $text,
                'user_id' => auth()->user()->id,
                'answered_comment_id' => (int)request()->get('comment_id')
            ]);
        } else {
            $comment = $article->comments()->create([
                'text' => $text,
                'user_id' => auth()->user()->id,
            ]);
        }

        $userAvatar = env('APP_URL') . '/storage/avatars/' . $comment->user()->select('avatar')->get()->first()->avatar;
        $name = $comment->user()->select('name')->get()->first()->name;

        return response()->json([
            'message' => 'Comment was add',
            'type' => 'success',
            'comment' => $comment,
            'avatar' => $userAvatar,
            'name' => $name
        ]);
    }
}
