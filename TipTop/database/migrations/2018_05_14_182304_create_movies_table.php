<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::defaultStringLength(191);
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('top_id')->unsigned();
            $table->string('TMDBid');
            $table->string('title');
            $table->string('poster_path');
            $table->string('release_date');
            $table->text('overview');
            $table->integer('vote_average')->unsigned();
            $table->integer('vote_count')->unsigned();
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('top_id')->references('id')->on('tops')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['top_id']);
        });
        Schema::dropIfExists('movies');
    }

}
