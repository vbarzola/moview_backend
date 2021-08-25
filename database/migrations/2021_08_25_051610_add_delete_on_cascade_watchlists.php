<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteOnCascadeWatchlists extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('watchlists', function (Blueprint $table) {
      $table->dropForeign(['id_movie']);
      $table->foreign('id_movie')->references('id')->on('movies')->onDelete('cascade');
      $table->dropForeign(['id_user']);
      $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('watchlists', function (Blueprint $table) {
      //
    });
  }
}
