<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowingUser extends Model
{
    use HasFactory;
    protected $fillable = ["user", "follows_user"];
}
