<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Carousel;

class CarouselController extends Controller
{
    public function uploadImage(Request $request)
    {

        $imageName = '';

        if ($request->hasFile('image')) {

            $imageName = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->image->extension();

            $request->image->move(public_path('/assets/img/'), $imageName);
        }

        // $request->validate([
        //     'image' => 'required'
        // ]);
        
        $imageData = [
            'image' => $imageName
        ];

        $newCarousel = Carousel::create($imageData);
    
        return redirect()->back()->with('success', 'Image uploaded successfully');
    }
    
    public function homepage_management()
    {
        $imageData = Carousel::all()->reverse();
        return view('adminPages.homepage', ['imageData' => $imageData]);
    }
    



    public function delete($id)
    {
    $imageData = Carousel::find($id);

    if ($imageData) {
        $item = $imageData->item;
        

        // Delete file from storage
        Storage::delete('assets/img/' . $item);

        // Delete record from the database
        $imageData->delete();

        return redirect()->back()->with('success', 'File deleted successfully');
    }

    return redirect()->back()->with('error', 'File not found!');
    } 

    // public function delete($id)
    // {
    // $memo = Memo::find($id);

    // if ($memo) {
    //     $file = $memo->file;

    //     // Delete file from storage
    //     Storage::delete('memo/' . $file);

    //     // Delete record from the database
    //     $memo->delete();

    //     return redirect()->back()->with('success', 'File deleted successfully');
    // }

    // return redirect()->back()->with('error', 'File not found!');
    // } 
}

