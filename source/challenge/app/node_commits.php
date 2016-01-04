<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class node_commits extends Model
{
    //
    protected $table    = 'node_commits';
    protected $fillable =
        [
            'commit_hash',
            'commit_author',
            'commit_date',
            'commit_class',
            'comment'
        ];

}