<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commits extends Model
{
    /**
     * Create a Model of with guarded id and mass fillable columns from GitHub API for later use.
     *
     * Create a scope query for retrieving 25 commits in descending order
     *
     * @Claude G.
     *
     */
    protected $guarded = ['id'];
    protected $fillable = ['sha', 'author', 'message', 'apiUrl', 'html_url', 'authorImage', 'created_at'];

    public function scopeDlist($query)
    {
        return $query->orderBy('created_at', 'desc')->take(25);
    }
}
