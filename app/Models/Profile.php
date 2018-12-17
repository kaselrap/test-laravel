<?php

namespace App\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
