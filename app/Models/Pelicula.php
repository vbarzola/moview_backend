<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
  use HasFactory;
  protected $fillable = ["name", "producer", "type", "duration", "avg_score", "year", "sinopsis", "image_cover", "image_banner", "rating_numbers"];
}
