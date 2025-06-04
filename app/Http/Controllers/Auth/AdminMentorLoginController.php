<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMentorLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-mentor-login'); // shared admin+mentor login view
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // Attempt to login but only allow if user role is mentor or admin
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (!$user || !in_array($user->role, ['mentor', 'admin'])) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records for admin/mentor.',
            ]);
        }

        if (Auth::guard('adminmentor')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/adminmentor/dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records for admin/mentor.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('adminmentor')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin-mentor-login');
    }
}
