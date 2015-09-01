<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commit', function (Blueprint $table) {
				$table->increments('id');
            $table->string('sha', 40);
            $table->string('author_name', 50);
            $table->string('author_email', 50);
            $table->dateTime('author_date');
            $table->string('message', 4096);
            $table->string('url', 1024);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('commit');
    }
}
