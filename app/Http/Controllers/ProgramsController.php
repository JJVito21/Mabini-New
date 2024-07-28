<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class ProgramsController extends Controller
{
    public function programs_management()
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
        return view('adminPages.programs', ['eventList' => $eventList]);
    }



    public function create_event(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);

        $eventCreate = Event::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,

        ]);
        return response()->json($eventCreate);
        // return redirect()->back()->with('success', 'File uploaded successfully');
    }
    public function update(Request $request, $id){
       $event = Event::find($id);
       if(! $event){
        return response()->json([
            'error' => 'Unable to locate the event'
        ], 404);
       }
       $event->update([
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
       ]);
       return response()->json('Event updated');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        if(! $event){
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
           }
           $event->delete();
           return $id;
    }

}
