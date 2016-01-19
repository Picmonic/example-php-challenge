<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $fillable = ['user','message','sha','url'];
    protected $appends = ['hashcheck'];
    
    public function getHashcheckAttribute()
    {
        $last = substr($this->sha, -1);
        if (is_numeric($last)) {
	        return "number";
        } else {
	        return "letter";
        }
    }
    
    
}
