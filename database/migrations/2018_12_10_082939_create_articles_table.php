<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('description');
            $table->longText('text');
            $table->boolean('active')->default(false);
            $table->string('picture')->nullable()->default(null);
            $table->string('tag')->nullable()->default(null);
            $table->string('video')->nullable()->default(null);
            $table->integer('count_comments')->unsigned()->default(0);
            $table->integer('total_views')->unsigned()->default(0);
            $table->integer('like')->unsigned()->default(0);
            $table->integer('dislike')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('articles');
    }
}
