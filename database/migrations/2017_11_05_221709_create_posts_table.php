<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->mediumText('body');
            $table->string('photo')->default('postNoImage.jpg');
            $table->timestamps();

            $table->integer('user_id')->unsigned();            
            $table->foreign('user_id')->references('id')->on('users');
            
            $table->integer('forum_id')->unsigned();            
            $table->foreign('forum_id')->references('id')->on('forums');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
