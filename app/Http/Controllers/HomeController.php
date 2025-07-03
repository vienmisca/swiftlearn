<?php

namespace App\Http\Controllers;
use App\Models\Kursus;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $latestKursus = Kursus::whereDate('created_at', today())
        ->latest()
        ->take(4)
        ->get();

    $user = auth()->user();

    // Kirim $latestKursus ke view juga
    return view('pages.home', compact('user', 'latestKursus'));
}

}
