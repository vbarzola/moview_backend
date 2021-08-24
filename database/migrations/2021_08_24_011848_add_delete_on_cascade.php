<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteOnCascade extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('movie_categories', function (Blueprint $table) {
      $table->dropForeign(['id_movie']);
      $table->foreign('id_movie')->references('id')->on('movies')->onDelete('cascade');
      $table->dropForeign(['id_category']);
      $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('movie_categories', function (Blueprint $table) {
      //
    });
  }
}
