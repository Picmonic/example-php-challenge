<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
	protected $table = 'repository_commits';

	protected $guarded = [];
}
