<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function homepage_manangement()
    {
        return view('adminPages.homepage');
    }

    public function programs_management()
    {
        return view('adminPages.programs');
    }

}
