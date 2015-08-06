<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Commit extends Model
{
  protected $fillable = [
    'userName',
    'body',
    'created_at',
  ];

  public function setCreatedAtAttribute($date) {
    $this->attributes['created_at'] = new Carbon($date);
  }

  public function scopeRecent($query){
      return $query->orderBy('updated_at','DESC');
  }

}
