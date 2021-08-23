<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
  use HasFactory;
  protected $fillable = ["name", "producer", "avg_score", "year", "sinopsis", "image_cover", "image_banner"];

  public function categories()
  {
    return $this->belongsToMany(Category::class, 'movie_categories', 'id_movie', 'id_category');
  }
}
