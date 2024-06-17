<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function faculty_management()
    {
        return view('adminPages.faculty');
    }
}
