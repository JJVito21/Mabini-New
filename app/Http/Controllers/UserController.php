<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //homepage
    public function homepage()
    {
        return view('userPages.homepage');
    }
    public function memo()
    {
        return view('userPages.memo');
    }
    public function programs()
    {
        return view('userPages.programs');
    }
    public function procurement()
    {
        return view('userPages.procurement');
    }
    public function about()
    {
        return view('userPages.about');
    }
    public function contact()
    {
        return view('userPages.contact');
    }

    //footer links to be added
}
