<?php

namespace App\Http\Controllers;
use App\Models\Memo;
use App\Models\ContactMessages;
use App\Models\Procurement;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //homepage
    public function homepage()
    {
        return view('userPages.homepage');
    }

    // method to show uploaded memorandums
    public function memo()
    {
        $data = Memo::all()->reverse();
        return view('UserPages.memo', ['data' => $data]);
    }

    public function programs()
    {
        return view('userPages.programs');
    }

    public function about()
    {
        return view('userPages.about');
    }
    public function contact()
    {
        return view('userPages.contact');
    }

    //method to send contact us message
    public function send(Request $request){
        $request->validate([            
            'name' => 'required',          
            'email' =>  'required|email', 
            'message' =>  'required'
        ]);
        
        $data = [   
            'name' => $request -> name,          
            'email' =>  $request -> email, 
            'message' =>  $request -> message, 
            'userIP'=> $request->ip()      

        ];
        
        $newContactMessages = ContactMessages::create($data);

        return redirect()->route('contact')->with('success', 'Message Sent!');
    }
    //method to display procurement
    public function procurement()
    {
        $procurementItem = Procurement::all()->reverse();
        return view('UserPages.procurement', ['procurementItem' => $procurementItem]);
    }

    //footer links to be added
}
