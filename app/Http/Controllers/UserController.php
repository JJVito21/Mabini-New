<?php

namespace App\Http\Controllers;
use App\Models\Memo;
use App\Models\Event;
use App\Models\Carousel;
use App\Models\ContactMessages;
use App\Models\Faculty;
use App\Models\Procurement;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //homepage
    public function homepage()
    {
        $imageData = Carousel::all();
        return view('userPages.homepage' , ['imageData' => $imageData]);
    }

    // method to show uploaded memorandums
    public function memo()
    {
        $data = Memo::all()->reverse();
        return view('UserPages.memo', ['data' => $data]);
    }

    public function programs()
    {
                // Fetch all events from the database
                $eventList = array();
                $events = Event::all();
                foreach($events as $event){
                    $eventList[] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'start' => $event->start_date,
                    'end' => $event->end_date,
                ];
                }
                return view('userPages.programs', ['eventList' => $eventList]);
    }

    public function about()
    {
        return view('userPages.about');
    }
    public function faculty()
    {
        $facultyData = Faculty::orderBy('role', 'asc')->get();
        return view('userPages.faculty', ['facultyData' => $facultyData]);
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
