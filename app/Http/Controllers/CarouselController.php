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
        $imageName = $request->getSchemeAndHttpHost(). '/assets/img/'. time(). '.'. $request->image->extension();

        if ($request->image->move(public_path('/assets/img/'), $imageName)) {
            $imageData = [
                'image' => $imageName
            ];

            $newCarousel = Carousel::create($imageData);

            return redirect()->back()->with('success', 'Image uploaded successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to upload image');
        }
    } else {
        return redirect()->back()->with('error', 'No image found');
    }
}

    
    public function homepage_management()
    {
        $imageData = Carousel::all();
        return view('adminPages.homepage', ['imageData' => $imageData]);
    }


    // update iamge method is not working

    // public function updateImage(Request $request, $id)
    // {
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
    //     ]);
    
    //     $carouselImage = Carousel::find($id);
    
    //     if ($request->hasFile('image')) {
    //         // Delete the old image
    //         if ($carouselImage->image && Storage::exists($carouselImage->image)) {
    //             Storage::delete($carouselImage->image);
    //         }
    
    //         // Store the new image
    //         $imageName = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->file('image')->extension();
    //         $request->file('image')->move(public_path('/assets/img/'), $imageName);
    //         $imagePath = $imageName;
    //     } else {
    //         $imagePath = $carouselImage->image;
    //     }
    
    //     // Update the database
    //     $carouselImage->image = $imagePath;
    //     $carouselImage->save();
    
    //     return redirect()->route('homepage_management')->with('success', 'Image updated successfully');
    // }

    public function delete($id)
    {
        $carousel = Carousel::find($id);

        if ($carousel) {
            // Extract the filename from the full URL
            $file = basename($carousel->image);

            // Delete file from storage
            $filePath = public_path('/assets/img/' . $file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Delete record from the database
            $carousel->delete();

            return redirect()->back()->with('success', 'Image deleted successfully');
        }

        return redirect()->back()->with('error', 'Image not found!');
    }

}
