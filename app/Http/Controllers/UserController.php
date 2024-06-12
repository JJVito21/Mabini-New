<?php

namespace App\Http\Controllers;
use App\Models\Memo;
use App\Models\ContactMessages;

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
        $data = Memo::all()->reverse();
        //route is correct and can be visited when clicking thanks to extension
        return view('UserPages.memo', ['data' => $data]);
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
    public function send(Request $request){
        $request->validate([            
            'name' => 'required',          
            'email' =>  'required', 
            'message' =>  'required'
        ]);
        
        $data = [   
            'name' => $request -> name,          
            'email' =>  $request -> email, 
            'message' =>  $request -> message        

        ];
        
        $newContactMessages = ContactMessages::create($data);

        return redirect()->route('contact')->with('success', 'Message Sent!');
    }



    //footer links to be added
}
