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
        Schema::create('github_users', function (Blueprint $table) {
            $table->increments('id');

            //Special Cols
            $table->string('github_id')->unique();

            //Normal cols
            $table->string('login');
            $table->string('avatar_url');
            $table->string('gravatar_id');
            $table->string('url');
            $table->string('html_url');
            $table->string('followers_url');
            $table->string('following_url');
            $table->string('gists_url');
            $table->string('starred_url');
            $table->string('subscriptions_url');
            $table->string('organizations_url');
            $table->string('repos_url');
            $table->string('events_url');
            $table->string('received_events_url');
            $table->string('type');
            $table->boolean('site_admin');   

            $table->timestamps();         
        });

        Schema::create('commits', function (Blueprint $table) {
            $table->increments('id');

            //Special cols
            $table->string('sha')->unique();
            $table->string('user_id')->references('github_id')->on('github_users');;

            //Normal cols
            $table->string('html_url');
            $table->string('comments_url');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('github_commits');
        Schema::drop('github_users');
    }
}
