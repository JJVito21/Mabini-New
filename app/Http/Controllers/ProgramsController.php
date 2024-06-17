<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramsController extends Controller
{

    public function programs_management()
    {
        return view('adminPages.programs');
    }

}
