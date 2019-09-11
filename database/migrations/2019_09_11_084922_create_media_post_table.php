<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_post', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned();
            $table->bigInteger('media_id')->unsigned();
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('media_id')->references('media_id')->on('media');
            $table->primary(['post_id', 'media_id']);
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
        Schema::dropIfExists('media_post');
    }
}