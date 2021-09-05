<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $fillable = ["username", "name", "password", "image"];

    public function following()
    {
        return $this->belongsToMany(User::class, 'following_users', 'user', 'follows_user');
    }
}
