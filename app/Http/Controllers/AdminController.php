<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Kursus;
use App\Models\Materi;

class AdminController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $siswaList = User::where('role', 'siswa')
        ->when($search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })
        ->paginate(10);

    $jumlahSiswa = User::where('role', 'siswa')->count();
    $jumlahMentor = User::where('role', 'mentor')->count();
    $jumlahKursus = Kursus::count();
    $jumlahMateri = Materi::count();

    return view('dashboard-admin', [
        'siswaList' => $siswaList,
        'jumlahSiswa' => $jumlahSiswa,
        'jumlahMentor' => $jumlahMentor,
        'jumlahKursus' => $jumlahKursus,
        'jumlahMateri' => $jumlahMateri,
        'search' => $search,
    ]);
}

    public function deleteSiswa($id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);
        $siswa->delete();

        return redirect()->route('dashboard.admin')->with('success', 'Siswa berhasil dihapus.');
    }
}
