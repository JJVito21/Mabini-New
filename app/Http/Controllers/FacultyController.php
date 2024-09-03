<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Faculty;


class FacultyController extends Controller
{
    // Method to display the faculty management page
    public function faculty_management()
    {
        $facultyData = Faculty::orderBy('role', 'asc')->get();
        return view('adminPages.faculty', ['facultyData' => $facultyData]);
    }

    // Method to add a new staff member
    public function addStaff(Request $request)
    {
        // Default image path
        $defaultImagePath = '/images/profile-placeholder.png';
        $profileImage = $defaultImagePath;

        if ($request->hasFile('photo')) {
            // Generate a unique filename
            $profileImage = '/assets/img/' . time() . '.' . $request->photo->extension();
            // Move the uploaded file to the public directory
            $request->photo->move(public_path('/assets/img/'), basename($profileImage));
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

        // Create a new faculty member using the prepared data
        $newFaculty = Faculty::create($facultyData);

        // Redirect to the faculty management page with a success message
        return redirect()->route('faculty_management')->with('success', 'Staff added successfully');
    }

    public function editStaff($id)
    {
        $facultyData = Faculty::findOrFail($id);
        return view('adminPages.editFaculty', ['facultyData' => $facultyData]);
    }


    public function update(Request $request, $id)
    {
    // Validate request data
    $request->validate([
        'name' => 'required',
        'role' => 'required',
        'profileImage' => 'nullable|mimetypes:image/jpeg,image/png|max:2048',
    ]);

    $update = Faculty::findOrFail($id);
    $update->name = $request->name;
    $update->role = $request->role;

    if ($request->hasFile('profileImage')) {
        $file = $request->file('profileImage');
        $filePath = '/assets/img/';
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path($filePath), $fileName);

        // Delete old profileImage if it exists
        if (!is_null($update->profileImage)) {
            $oldImage = public_path($filePath . basename($update->profileImage));
            if (File::exists($oldImage)) {
                unlink($oldImage);
            }
        }
        $update->profileImage = $filePath . $fileName; // Store the relative path
    }

    $result = $update->save();
    return redirect(route('faculty_management'))->with('success', 'Staff updated successfully');
}

    public function delete($id)
    {
        $facultyData = Faculty::find($id);

        if ($facultyData) {
            // Extract the filename from the full URL
            $file = basename($facultyData->profileImage);

            // Delete file from storage
            $filePath = public_path('/assets/img/' . $file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Delete faculty data from the database
            $facultyData->delete();

            return redirect()->route('faculty_management')->with('success', 'Staff deleted successfully');
        }

        return redirect()->route('faculty_management')->with('error', 'Staff not found!');
    }


}
