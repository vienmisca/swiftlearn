<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;

class KursusHistoryController extends Controller
{
    public function index()
{
    $mentorId = Auth::id();
    $courses = Kursus::where('mentor_id', $mentorId)->latest()->get();

    return view('kursus-history', compact('courses'));
}
}


