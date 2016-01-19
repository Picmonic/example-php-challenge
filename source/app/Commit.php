<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
	 protected $primaryKey = 'sha';
    protected $fillable = ['user','message','sha','url'];
}
