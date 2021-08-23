<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieCategoriesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('movie_categories', function (Blueprint $table) {
      $table->timestamps();
      $table->unsignedBigInteger('id_movie');
      $table->unsignedBigInteger('id_category');
      $table->foreign('id_movie')->references('id')->on('movies');
      $table->foreign('id_category')->references('id')->on('categories');
      $table->primary(['id_movie', 'id_category']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('movie_categories');
  }
}
