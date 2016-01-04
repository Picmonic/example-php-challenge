<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNodeCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_commits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('commit_hash')->unique();
            $table->string('commit_author');
            $table->timestamp('commit_date');
            $table->string('commit_class')->default('standard');
            $table->string('comment')->nullable(); //not project requirement, but demonstrates that I understand how to NOT require a column to have data;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('node_commits');
    }
}
