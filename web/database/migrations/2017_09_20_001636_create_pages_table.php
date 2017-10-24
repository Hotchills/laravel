<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('body');
            $table->text('title');
            $table->integer('mainpage_id')->unsigned();
            $table->integer('views')->nullable();
            $table->integer('comment_nr')->nullable();
            $table->timestamps();           
          }); 
        Schema::table('pages', function (Blueprint $table)
                {
          $table->foreign('mainpage_id')->references('id')->on('mainpage')->onDelete('cascade');
        }); 
       
       
   } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
        $table->dropForeign(['mainpage_id']);
    });
        Schema::dropIfExists('pages');
       
    }
}
