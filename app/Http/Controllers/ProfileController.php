<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', ['user' => $request->user(),]);
        $user = Auth::user();
        return view('profile.edit', compact('user')); // Pass the user to the view

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    // Get the authenticated user
    $user = $request->user();

    // Fill the user with validated data, but only for the fields you want to update
    $user->username = $request->validated('username');
    $user->firstname = $request->validated('firstname');
    $user->lastname = $request->validated('lastname');
    $user->phone_number = $request->validated('phone_number');
    $user->location = $request->validated('location');

    // Check if the email field has changed
    if ($request->user()->isDirty('email')) {
        $user->email_verified_at = null; // Reset the email verification timestamp if the email was changed
    }

    // Save the updated user
    $user->save();

    // Redirect back to the profile edit page with a status message
    return back()->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
