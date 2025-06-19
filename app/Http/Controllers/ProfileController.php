<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit()
{
    $user = Auth::user();
    return view('profile.profile-edit', compact('user'));
}



    /**
     * Update the user's profile information.
     */
   public function update(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        'interests' => 'required|array|size:3', // Must choose 3
        'interests.*' => 'required|distinct|string',
        // Password fields...
    ]);

    $user = auth()->user();

    // Handle profile photo upload
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo')->store('photos', 'public');
        $user->photo = $photo;
    }

    $user->name = $request->name;
    $user->about = $request->filled('about') ? $request->about : $user->about;
    $user->interests = $request->interests;

    // Handle password change if requested
    if ($request->filled('old_password') && Hash::check($request->old_password, $user->password)) {
        $request->validate([
            'new_password' => 'required|confirmed|min:8',
        ]);
        $user->password = bcrypt($request->new_password);
    }

    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
}
}