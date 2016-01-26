<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repository_commits', (Blueprint $table) => {
            $table->increments('id');
            $table->string('hash');
            $table->integer('repository_id')->unsigned();
            $table->unique(['hash','repository_id']);
            $table->timestamps();

            // Foreign key index
            $table->foreign('repository_id')->references('id')->on('repositories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
