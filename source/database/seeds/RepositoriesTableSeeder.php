<?php

use Illuminate\Database\Seeder;

use App\Repository;

class RepositoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('repositories')->truncate();
    	
    	// Create the NodeJS repository
    	DB::table('repositories')->create([
			'path' => 'nodejs/node'
		]);
    }
}
