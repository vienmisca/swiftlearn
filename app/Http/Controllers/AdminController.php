<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = User::where('role', 'siswa');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $siswaList = $query->latest()->paginate(5);
        $jumlahSiswa = User::where('role', 'siswa')->count();
        $jumlahMentor = User::where('role', 'mentor')->count();

        return view('dashboard-admin', compact('siswaList', 'jumlahSiswa', 'jumlahMentor', 'search'));
    }

    public function deleteSiswa($id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);
        $siswa->delete();

        return redirect()->route('dashboard.admin')->with('success', 'Siswa berhasil dihapus.');
    }
}
