<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikeTopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('like_tops', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('top_id')->unsigned();
            $table->unsignedTinyInteger('liketop')->nullable();
        });
        Schema::table('like_tops', function (Blueprint $table)
                {
          $table->foreign('top_id')->references('id')->on('tops')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        Schema::table('like_tops', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['top_id']);
        });

        Schema::dropIfExists('like_tops');
    }
}
