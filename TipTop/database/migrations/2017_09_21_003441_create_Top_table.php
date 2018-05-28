<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('tops', function (Blueprint $table) {
            $table->increments('id');
            $table->text('body');            
            $table->text('title');
            $table->integer('page_id')->unsigned();
            $table->integer('up_votes')->nullable();
            $table->integer('down_votes')->nullable();
            $table->integer('comment_nr')->nullable();
            $table->timestamps();
        });
        Schema::table('tops', function (Blueprint $table)
                {
          $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::table('tops', function (Blueprint $table) {
        $table->dropForeign(['page_id']);
    });
        Schema::dropIfExists('tops');
    }
}
