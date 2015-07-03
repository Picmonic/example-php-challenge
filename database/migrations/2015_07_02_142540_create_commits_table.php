<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations. Create DB
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sha');
            $table->string('author');
            $table->string('message');
            $table->string('apiUrl');
            $table->string('html_url');
            $table->string('authorImage');
            $table->timestamps('created_at');
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
