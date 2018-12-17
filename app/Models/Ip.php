<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $table = 'ip';

    protected $fillable = [
        'ip',
        'article_id',
        'view',
        'like'
    ];

    public function article()
    {
        return $this->hasOne(Article::class);
    }
}
