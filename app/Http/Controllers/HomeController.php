<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil kursus yang dilihat oleh user (history)
        $kursusDiikuti = $user
            ? $user->viewedKursus()->take(3)->get()
            : collect();

        // Ambil kursus yang dibuat hari ini
        $latestKursus = Kursus::whereDate('created_at', today())
            ->latest()
            ->take(5)
            ->get();

        return view('pages.home', compact('user', 'latestKursus', 'kursusDiikuti'));
    }
}
