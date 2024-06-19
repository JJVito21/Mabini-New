<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    // Method to display the faculty management page
    public function faculty_management()
    {
        $facultyData = Faculty::all();
        return view('adminPages.faculty', ['facultyData' => $facultyData]);
    }

    // Method to add a new staff member
    public function addStaff(Request $request)
    {

        $profileImage = '';

        if ($request->hasFile('photo')) {

            $profileImage = $request->getSchemeAndHttpHost() . '/assets/img/' . time() . '.' . $request->photo->extension();

            $request->photo->move(public_path('/assets/img/'), $profileImage);
        }
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'role' => 'required',
           
        ]);

        // Prepare the data for creating a new faculty member
        $facultyData = [
            'profileImage' => $profileImage,         
            'name' => $request->name,
            'role' => $request->role,
        ];
        $newFaculty = Faculty::create($facultyData);
        
        return redirect()->route('faculty_management')->with('success', 'Staff added successfully');
    }


    // public function delete($id)
    // {
    //     $facultyData = Faculty::find($id);
    
    //     if ($facultyData) {
    //         // Extract the filename from the full URL
    //         $file = basename($facultyData->image);
    
    //         // Delete file from storage
    //         $filePath = public_path('/assets/img/' . $file);
    //         if (file_exists($filePath)) {
    //             unlink($filePath);
    //         }
    
    //         // Delete record from the database
    //         $facultyData->delete();
    
    //         return redirect()->back()->with('success', 'Staff removed successfully');
    //     }
    
    //     return redirect()->back()->with('error', 'File not found!');
    // }

    public function delete(Faculty $facultyData) {
        $facultyData->delete();
        return redirect()->route('faculty_management')->with('success', 'Staff deleted successfully');
    }
}
