<?php

namespace App\Models;

use App\User;
use function foo\func;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'text',
        'user_id',
        'picture',
        'video',
        'active'
    ];

    /**
     * Get the articles that onws the user
     */
    public function user()
    {
    
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments that has article
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }

    public function ip()
    {
        return $this->hasMany(Ip::class);
    }

}
