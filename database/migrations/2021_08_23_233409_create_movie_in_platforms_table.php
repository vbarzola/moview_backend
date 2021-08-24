<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieInPlatformsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('movie_in_platforms', function (Blueprint $table) {
      $table->unsignedBigInteger('id_platform')->index();
      $table->unsignedBigInteger('id_movie')->index();
      $table->string('link');

      $table->foreign('id_platform')->references('id')->on('platforms')->onDelete('cascade');
      $table->foreign('id_movie')->references('id')->on('movies')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('movie_in_platforms');
  }
}
