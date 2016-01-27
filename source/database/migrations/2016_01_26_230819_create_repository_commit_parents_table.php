<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepositoryCommitParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository_commit_parents', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('child_id')->unsigned();
            $table->integer('parent_id')->unsigned();
            $table->timestamps();
            $table->unique(['child_id','parent_id']);

            $table->foreign('child_id')->references('id')->on('repository_commits')
                ->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('repository_commits')
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
        Schema::drop('repository_commit_parents');
    }
}
