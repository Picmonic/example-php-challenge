<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GitHub;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function GetGitHub()
    {
        
    }
}
