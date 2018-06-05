<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::defaultStringLength(191);
         
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('body');
            $table->integer('top_id')->unsigned();
            $table->integer('replay_id')->unsigned()->nullable();// id to the reply comment
            $table->unsignedTinyInteger('approuved')->nullable()->default('0');
            $table->integer('up_vote')->unsigned()->nullable()->default('0');
            $table->integer('down_vote')->unsigned()->nullable()->default('0');
            $table->timestamps();
        });
        Schema::table('comments', function (Blueprint $table)
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
    {
        Schema::table('comments', function (Blueprint $table) {
        $table->dropForeign(['top_id']);
        $table->dropForeign(['user_id']);
    });
        Schema::dropIfExists('comments');
    }
}
