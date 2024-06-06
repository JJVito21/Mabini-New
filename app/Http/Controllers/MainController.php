<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //homepage
    public function homepage_manangement()
    {
        return view('adminPages.homepage');
    }

    public function navbar()
    {
        return view('navbars.navbar');
    }
    public function programs_management()
    {
        return view('adminPages.programs');
    }
    public function memo_management()
    {
        return view('adminPages.memo');
    }
}
