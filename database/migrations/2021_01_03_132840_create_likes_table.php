<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');   // First, we need to know the ID of the USER who like it ?
            $table->foreignId('tweet_id')->constrained()->onDelete('cascade');  // Next we need to know the tweet in question which tweet they like.
            $table->boolean('liked');   // so if it (0) we'll consider that a Dislike, if it's a (1) it's a Like.
            $table->timestamps();

            $table->unique(['user_id', 'tweet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
