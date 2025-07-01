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
    $searchSiswa = $request->input('search_siswa');
    $searchKursus = $request->input('search_kursus');

    $siswaList = User::where('role', 'siswa')
        ->when($searchSiswa, fn($query) => $query->where('name', 'like', '%' . $searchSiswa . '%'))
        ->paginate(5, ['*'], 'siswa');

    $kursusList = Kursus::with('mentor')
        ->when($searchKursus, fn($query) => $query->where('nama_kursus', 'like', '%' . $searchKursus . '%'))
        ->paginate(5, ['*'], 'kursus');

    return view('dashboard-admin', [
        'jumlahSiswa' => User::where('role', 'siswa')->count(),
        'jumlahMentor' => User::where('role', 'mentor')->count(),
        'jumlahKursus' => Kursus::count(),
        'jumlahMateri' => Materi::count(),
        'siswaList' => $siswaList,
        'kursusList' => $kursusList,
        'searchSiswa' => $searchSiswa, // ✅ Now passed to Blade
        'searchKursus' => $searchKursus, // ✅ Also passed
    ]);
}


    public function deleteSiswa($id)
    {
        $siswa = User::where('role', 'siswa')->findOrFail($id);
        $siswa->delete();

        return redirect()->route('dashboard.admin')->with('success', 'Siswa berhasil dihapus.');
    }
    public function destroyKursus($id)
{
    $kursus = Kursus::findOrFail($id);
    $kursus->delete();

    return redirect()->back()->with('success', 'Kursus berhasil dihapus.');
}

}
