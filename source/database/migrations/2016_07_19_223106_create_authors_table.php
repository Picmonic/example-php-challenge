<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login');
            $table->string('name');
            $table->string('email');
            $table->timestamps();
        });
        
        Schema::table('commits', function (Blueprint $table) {
            $table->foreign('author_id')->references('id')->on('authors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commits', function ($table) {
            $table->dropForeign('commits_author_id_foreign');
        });
        Schema::drop('authors');
    }
}
