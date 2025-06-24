<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kursus;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    // Handle uploading of new materi
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'google_form_link' => 'nullable|url',
            'kursus_id' => 'required|exists:kursus,id',
            'sampul_materi' => 'nullable|image',
            'video' => 'nullable|mimes:mp4,mov,avi|max:51200',
            'pdf' => 'nullable|mimes:pdf|max:20480',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'google_form_link', 'kursus_id']);

        if ($request->hasFile('sampul_materi')) {
            $data['sampul_materi'] = $request->file('sampul_materi')->store('materi/sampul', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('materi/video', 'public');
        }

        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('materi/pdf', 'public');
        }

        Materi::create($data);

        return back()->with('success', 'Materi berhasil diunggah.');
    }

    // Display upload form for a specific kursus
    public function uploadForm(Kursus $kursus)
    {
        $materis = Materi::where('kursus_id', $kursus->id)->get();

        session([
            'kursus_id' => $kursus->id,
            'judul' => $kursus->judul,
            'sampul_kursus' => $kursus->sampul_kursus,
        ]);

        return view('upload-materi', compact('materis', 'kursus'));
    }

    // Fallback: show upload form from session
    public function showUploadForm()
    {
        $kursus_id = session('kursus_id');

        if (!$kursus_id) {
            return redirect()->route('mentor.kursus.history')->with('error', 'Kursus tidak ditemukan di sesi.');
        }

        $materis = Materi::where('kursus_id', $kursus_id)->get();
        $judul = session('judul');
        $sampul_kursus = session('sampul_kursus');

        return view('upload-materi', compact('materis', 'judul', 'sampul_kursus'));
    }

    // Edit a materi
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('edit-materi', compact('materi'));
    }

    // Update a materi
    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        $materi->save();

        return redirect()->route('mentor.kursus.history')->with('success', 'Materi updated!');
    }

    // Delete a materi
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        // Optional: delete associated files
        if ($materi->sampul_materi) {
            Storage::disk('public')->delete($materi->sampul_materi);
        }
        if ($materi->video) {
            Storage::disk('public')->delete($materi->video);
        }
        if ($materi->pdf) {
            Storage::disk('public')->delete($materi->pdf);
        }

        $materi->delete();

        return redirect()->back()->with('success', 'Materi berhasil dihapus.');
    }
}
