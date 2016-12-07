<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'commit';

    /**
     * Model rules
     *
     * @var array
     * @todo	Not sure how to enforce uniqueness automatically
     */
    private $rules = [
        //['sha' => 'unique:column'],
        //'sha' => 'unique:column',
        //'sha' => 'unique',
        'sha' => 'unique:sha',
    ];

    /**
     * Allow mass assignment
     *
     * @var array
     */
    protected $fillable = ['sha', 'author_name', 'author_email', 'author_date', 'message', 'url'];

    /**
     * Don't store timestamps
     *
     * @var boolean
     */
    public $timestamps = false;
}
