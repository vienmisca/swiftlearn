<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kursus;
use App\Models\Materi;

class MentorController extends Controller
{
    public function dashboard()
{
    $mentorId = auth()->id();

    $kursusList = Kursus::where('mentor_id', $mentorId)->get();
    $jumlahSiswa = \App\Models\User::where('role', 'siswa')->count(); // assuming 'role' is used

    // Count courses and materials by mentor
    $jumlahKursus = $kursusList->count();
    $jumlahMateri = Materi::whereIn('kursus_id', $kursusList->pluck('id'))->count();

    return view('dashboard-mentor', compact('kursusList', 'jumlahSiswa', 'jumlahKursus', 'jumlahMateri'));
}


    public function store(Request $request)
{
    $request->validate([
        'nama_kursus' => 'required|string|max:255',
        'sampul_kursus' => 'required|image|mimes:jpg,jpeg,png',
        'deskripsi' => 'required|string',
        'kategori' => 'required|string',
    ]);

    // Upload file
    $sampulPath = $request->file('sampul_kursus')->store('kursus_sampul', 'public');

    // Save to database
    $kursus = \App\Models\Kursus::create([
        'nama_kursus' => $request->nama_kursus,
        'sampul_kursus' => $sampulPath,
        'deskripsi' => $request->deskripsi,
        'kategori' => $request->kategori,
        'mentor_id' => auth()->id(),
    ]);

    // ✅ Redirect to the upload materi page
    return redirect()->route('mentor.kursus.upload.materi', $kursus->id)
                     ->with('success', 'Kursus berhasil dibuat! Silakan upload materi.');
}
public function destroy($id)
{
    $kursus = \App\Models\Kursus::where('mentor_id', auth()->id())->findOrFail($id);
    
    // Optional: Delete related materi if needed
    // \App\Models\Materi::where('kursus_id', $kursus->id)->delete();

    $kursus->delete();

    return redirect()->route('dashboard.mentor')->with('success', 'Kursus berhasil dihapus.');
}

public function showUploadForm()
{
    $materis = Materi::where('kursus_id', session('kursus_id'))->get();
    return view('upload-materi', compact('materis'));
}

public function update(Request $request, $id)
{
    $kursus = Kursus::findOrFail($id);

    $request->validate([
        'nama_kursus' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'kategori' => 'required|string',
        'sampul_kursus' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $kursus->nama_kursus = $request->nama_kursus;
    $kursus->deskripsi = $request->deskripsi;
    $kursus->kategori = $request->kategori;

    if ($request->hasFile('sampul_kursus')) {
        $file = $request->file('sampul_kursus');
        $path = $file->store('sampul', 'public');
        $kursus->sampul_kursus = $path;
    }

    $kursus->save();

    return redirect()->back()->with('success', 'Kursus berhasil diperbarui.');
}

}

