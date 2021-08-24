<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowingUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('following_users', function (Blueprint $table) {
            $table->timestamps();
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('follows_user');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('follows_user')->references('id')->on('users');
            $table->primary(['user', 'follows_user']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('following_users');
    }
}
