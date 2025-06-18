<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class MentorController extends Controller
{
    public function dashboard()
    {
        $jumlahSiswa = User::where('role', 'siswa')->count();

        return view('dashboard-mentor', compact( 'jumlahSiswa'));
    }
}

