<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $fillable = ['id', 'author_email', 'author_name', 'author_avatar_url', 'message'];
}
