<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
  use HasFactory;
  protected $fillable = ["id_user", "id_movie", "comment", "score", "date"];

  public function movie()
  {
    return $this->belongsTo(Movie::class);
  }
}
