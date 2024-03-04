<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //homepage
    public function homepage()
    {
        return view('pages.homepage');
    }

    public function navbar()
    {
        return view('navbars.navbar');
    }
}
