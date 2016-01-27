<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoryCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository_commits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sha');
            $table->string('url');
            $table->string('committer');
            $table->string('author');
            $table->integer('repository_id')->unsigned();
            $table->unique(['sha','repository_id']);
            $table->timestamps();

            // Foreign key index
            $table->foreign('repository_id')->references('id')->on('repositories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repository_commits');
    }
}
