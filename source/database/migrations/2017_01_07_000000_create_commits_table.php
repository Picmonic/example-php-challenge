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
        Schema::create('commits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('author_id');
            $table->dateTime('authored_at');
            $table->unsignedBigInteger('committer_id');
            $table->dateTime('committed_at');
            $table->unsignedSmallInteger('comment_count');
            $table->text('message')->nullable();
            $table->string('sha', 40)->unique();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('commits');
    }
}
