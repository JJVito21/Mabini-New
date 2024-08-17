<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Event;

class ProgramsController extends Controller
{
    public function programs_management()
    {
        $eventData = Event::orderBy('eventDate', 'desc')->get();
        return view('adminPages.programs' , ['eventData' => $eventData]);
    }



    public function create_event(Request $request)
    {
        $eventImage = '';
                if ($request->hasFile('photo')) {
                    // Generate a unique filename
                    $eventImage = '/assets/img/' . time() . '.' . $request->photo->extension();
                    // Move the uploaded file to the public directory
                    $request->photo->move(public_path('/assets/img/'), basename($eventImage));
                }
                // Validate the request data
                $request->validate([
                    'eventName' => 'required',
                    'eventDate' => 'required',
                ]);
            
                $eventData = [
                    'eventImage' => $eventImage,
                    'eventName' => $request->eventName,
                    'eventDate' => $request->eventDate,
                ];
            
                $newEvent = Event::create($eventData);
            
                return redirect()->route('programs_management')->with('success', 'Event added successfully');
    }

    public function delete_event($id)
    {
        $eventData = Event::find($id);
    
        if ($eventData) {
            // Extract the filename from the full URL
            $file = basename($eventData->eventImage);
    
            // Delete file from storage
            $filePath = public_path('/assets/img/' . $file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
    
            // Delete faculty data from the database
            $eventData->delete();
    
            return redirect()->route('programs_management')->with('success', 'Event deleted successfully');
        }
    
        return redirect()->route('programs_management')->with('error', 'Event not found!');
    }
}
