<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function commit()
    {
        return $this->hasMany('App\Commit');
    }
}
