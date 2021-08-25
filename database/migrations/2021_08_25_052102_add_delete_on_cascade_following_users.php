<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteOnCascadeFollowingUsers extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('following_users', function (Blueprint $table) {
      $table->dropForeign(['user']);
      $table->foreign('user')->references('id')->on('users')->onDelete('cascade');
      $table->dropForeign(['follows_user']);
      $table->foreign('follows_user')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('following_users', function (Blueprint $table) {
      //
    });
  }
}
