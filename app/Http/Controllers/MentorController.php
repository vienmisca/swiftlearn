<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kursus;


class MentorController extends Controller
{
    public function dashboard()
{
    $jumlahSiswa = User::where('role', 'siswa')->count();
    $mentorId = auth()->id();

    $kursusList = Kursus::where('mentor_id', $mentorId)->get();

    return view('dashboard-mentor', compact('jumlahSiswa', 'kursusList'));
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


}

