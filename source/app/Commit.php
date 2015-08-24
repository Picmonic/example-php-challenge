<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\GitHub\Facades\GitHub;
use PhpParser\Node\Expr\Cast\Array_;


class Commit extends Model
{
    protected $fillable = [
        'userName',
        'body',
        'created_at',
    ];

    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = new Carbon($date);
    }

    public function scopeRecent($query)
    {
        $results = $query->orderBy('updated_at', 'DESC');
        if(empty($results)){
            return $this->populateDB();
            $results = $query->orderBy('updated_at','DESC');
        }
        return $results;
    }

    private function populateDB()
    {

        $commitsCollection = GitHub::repo()->commits()->all('joyent', 'node', array('sha' => 'master'));

        foreach ($commitsCollection as $commitEntry) {
            $this->attributes['userName'] = $commitEntry["author"]["login"];
            $this->attributes['body'] = $commitEntry["commit"]['message'];
            $this->attributes['url'] = $commitEntry['url'];
            $this->attributes['sha'] = $commitEntry['sha'];
            $this->setCreatedAtAttribute($commitEntry["commit"]["author"]['date']);

            $this->save();

        }
        unset($commitEntry);

    }


}
