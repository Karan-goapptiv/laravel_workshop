<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // post table
        Schema::create('POSTS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description');
            $table->bigInteger('no_of_comments')->nullable();

            // user relation
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('USERS');

            $table->timestamps();
        });

        // comments table
        Schema::create('COMMENTS', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('comment');

            // user relation
            $table->bigInteger('post_id')->unsigned()->nullable();
            $table->foreign('post_id')->references('id')->on('POSTS');

            // user relation
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('USERS');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('POSTS');
        Schema::dropIfExists('COMMENTS');
    }
}
