<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\MateriView;
use App\Models\KursusSelesai;
class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.profile-edit', compact('user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'interests' => 'required|array|size:3',
            'interests.*' => 'required|distinct|string',
        ]);

        $user = auth()->user();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos', 'public');
            $user->photo = $photo;
        }

        $user->name = $request->name;
        $user->about = $request->filled('about') ? $request->about : $user->about;
        $user->interests = $request->interests;

        // ✅ Password handling
        if ($request->filled('old_password') && Hash::check($request->old_password, $user->password)) {
            $request->validate([
                'new_password' => 'required|confirmed|min:8',
            ]);
            $user->password = bcrypt($request->new_password);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    
public function show()
{
    $user = auth()->user();

    $joinMateriCount = MateriView::where('user_id', $user->id)->count();
    $kursusSelesaiCount = KursusSelesai::where('user_id', $user->id)->count();

    return view('profile.profile', compact('user', 'joinMateriCount', 'kursusSelesaiCount'));
}
}