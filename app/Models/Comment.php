<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text',
        'user_id',
        'article_id',
        'answered_comment_id'
    ];

    public function article()
    {
        return $this->hasOne(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Comment::class, "answered_comment_id", "id");
    }
}
