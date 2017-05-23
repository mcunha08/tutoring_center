<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersratings', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->integer('rating');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('tutor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersratings');
    }
}
