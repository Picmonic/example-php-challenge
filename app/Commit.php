<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
  protected $fillable = [
    'number',
    'userName',
    'title',
    'body',
    'created_at',
    'updated_at',
  ];
}
