<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\ContactMessages;

class MessageController extends Controller
{
    public function message_management()
    {
        $messageItem = contactMessages::all()->reverse();
        return view('adminPages.messages', ['messageItem' => $messageItem]);
    }

    public function view(ContactMessages $messageItem) {
        return view('adminPages.viewmessage',  ['messageItem' => $messageItem]);
    }

    public function delete(ContactMessages $messageItem) {
        $messageItem->delete();
        return redirect()->route('message_management')->with('success', 'Message deleted successfully');
    }
    
}