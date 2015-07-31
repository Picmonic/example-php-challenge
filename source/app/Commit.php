<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

  public function setCreatedAtAttribute($date) {
    $this->attributes['created_at'] = new Carbon($date);
  }

  public  function setUpdatedAtAttribute($date) {
    $this->attributes['updated_at'] = new Carbon($date);
  }

  public function scopeRecent($query){
      return $query->orderBy('updated_at','DESC');
  }
}
