<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminMentorLoginController extends Controller
{
   public function showLoginForm()
{
    if (Auth::check()) {
        $role = Auth::user()->role;

        if ($role === 'mentor') {
            return redirect()->route('dashboard.mentor');
        } elseif ($role === 'admin') {
            return redirect()->route('dashboard.admin');
        }
    }

    return view('auth.admin-mentor-login');
}


    public function login(Request $request)
    {
        // Validate form input
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // Find user by email
        $user = User::where('email', $credentials['email'])->first();

        // Check user existence and role
        if (!$user || !in_array($user->role, ['mentor', 'admin'])) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records for admin/mentor.',
            ]);
        }

        // Verify password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ]);
        }

        // Login the user using default web guard
        Auth::login($user);
        $request->session()->regenerate();

        // Redirect based on role
        if ($user->role === 'mentor') {
            return redirect()->route('dashboard.mentor');
        } elseif ($user->role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        // Fallback (should not happen)
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('adminmentor.login');
    }
}
