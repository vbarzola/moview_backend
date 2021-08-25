<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = ["username", "name", "password", "image"];

    public function following()
    {
        return $this->belongsToMany(User::class, 'following_users', 'user', 'follows_user');
    }
}
