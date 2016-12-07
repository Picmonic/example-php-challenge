<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    //
    protected $fillable = [
        'commit_hash',
        'url',
        'author',
        'message'
    ];

    /**
     * If the register exists in the table, it updates it. 
     * Otherwise it creates it
     * @param array $data Data to Insert/Update
     * @param array $keys Keys to check for in the table
     * @return Object
     */
    static function createOrUpdate($data, $keys) {
        $record = self::where($keys)->first();
        if (is_null($record)) {
            return self::create($data);
        } else {
            return self::where($keys)->update($data);
        }
    }

}
