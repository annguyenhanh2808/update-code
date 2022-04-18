<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas_detail', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idea_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('like_or_dislike')->nullable(true);
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
        Schema::dropIfExists('_ideas__detail');
    }
};
