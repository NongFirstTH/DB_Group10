<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->file('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $fileName = time().'_'.$request->file('profile_photo')->getClientOriginalName();
            $filePath = $request->file('profile_photo')->storeAs('uploads/profile_photos', $fileName, 'public');

            $user->profile_photo = $filePath;
            $user->save();
        }

        return back()->with('status', 'Profile photo updated successfully!');
    }

    // public function updateProfile(Request $request)
    // {
    //     $user = Auth::user();

    //     // Validate the request
    //     $request->validate([
    //         'firstname' => 'required|string|max:255',
    //         'lastname' => 'required|string|max:255',
    //         'phone_number' => 'required|string|max:15', // Adjust max length as needed
    //         'location' => 'required|string|max:255',
    //     ]);

    //     // Update the user's profile information
    //     $user->firstname = $request->input('firstname');
    //     $user->lastname = $request->input('lastname');
    //     $user->phone_number = $request->input('phone_number');
    //     $user->location = $request->input('location');

    //     $user->save();

    //     return redirect()->route('profile.edit')->with('status', 'Profile updated successfully!');
    // }

}
