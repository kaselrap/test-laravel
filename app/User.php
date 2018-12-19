<?php

namespace App;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Subscriber;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'data' => 'array'
    ];


    /**

     * Get the article for user

     */

    public function articles()

    {
        return $this->hasMany(Article::class)->orderBy('created_at', 'DESC');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function getData($name, $default = null)
    {
        return array_get($this->data, $name, $default);
    }

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class, 'id', 'subscriber_id');
    }

    public function subscription()
    {
        return $this->belongsTo(Subscriber::class, 'id', 'user_id');
    }

    public function subscribers()
    {
        return $this->belongsTo(Subscriber::class, 'id', 'subscriber_id');
    }

    public function subscriptions()
    {
        return $this->belongsTo(Subscriber::class, 'id', 'user_id');
    }
}
