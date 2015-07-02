<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class CommitController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function showProfile($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

    public function getIndex()
    {
		return view('commits');
    }
}