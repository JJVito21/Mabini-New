<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Memo;

class MemoController extends Controller
{
    
    public function showForm(){
        return view('upload');
    }

    public function uploadFile(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf',
        ]);
    
        $data = new Memo();
    
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
    
            $file->storeAs('memo', $fileName);
            $data->file = $fileName;
    
  
        }
    
        $data->save();
    
        return redirect()->back()->with('success', 'File uploaded successfully');
    }
    


    public function Memo()
    {
        $data = Memo::all()->reverse();
        return view('adminPages.memo', ['data' => $data]);
    }
    

    public function download(Request $request,$file)
    {
    return response()->download(storage_path('app/memo/'.$file));
    }

    public function delete($id)
    {
    $memo = Memo::find($id);

    if ($memo) {
        $file = $memo->file;

        // Delete file from storage
        Storage::delete('memo/' . $file);

        // Delete record from the database
        $memo->delete();

        return redirect()->back()->with('success', 'File deleted successfully');
    }

    return redirect()->back()->with('error', 'File not found!');
    } 
}