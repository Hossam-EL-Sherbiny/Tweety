<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // So if we want a relationship between user and those to which that user follows,
        Schema::create('follows', function (Blueprint $table) {
            $table->primary(['user_id', 'following_user_id']);
            $table->unsignedBigInteger('user_id');      // we need columns, EX-> The user of ID of (1).
            $table->unsignedBigInteger('following_user_id');// FOLLOWS the user of ID of (2), Or the user of ID of (1) also follows the user within the ID of (3).
            $table->timestamps();

            // We setup the necessary constraints.
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('following_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
