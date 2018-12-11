<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'text',
        'user_id',
        'image_id',
        'video_id'
    ];

    /**

     * Get the articles that onws the user

     */

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
