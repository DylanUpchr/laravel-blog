<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contains', function (Blueprint $table) {
            $table->bigInteger('idPost')->unsigned();
            $table->bigInteger('idMedia')->unsigned();
            $table->foreign('idPost')->references('idPost')->on('posts');
            $table->foreign('idMedia')->references('idMedia')->on('media');
            $table->index(['idPost', 'idMedia']);
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
        Schema::dropIfExists('contains');
    }
}
