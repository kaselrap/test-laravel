<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('ip')) {
            Schema::create('ip', function (Blueprint $table) {
                $table->increments('id');
                $table->string('ip')->nullable();
                $table->integer('article_id')->unsigned()->nullable();
                $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
                $table->boolean('view')->default(false);
                $table->boolean('like')->default(false);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip');
    }
}
