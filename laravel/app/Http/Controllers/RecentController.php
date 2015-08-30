<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RecentController extends Controller {

    /**
     *
     *
     * @param
     * @return
     */
    public function index()
    {
        return view('recent');
    }

}