<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kursus;
use Illuminate\Support\Facades\Storage;
use App\Models\KursusSelesai;
use Illuminate\Support\Facades\Auth;
use App\Models\MateriView;
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
        'video' => 'nullable|mimes:mp4,mov,avi|max:102400', // 100MB
        'pdf' => 'nullable|mimes:pdf|max:204800', // 200MB
    ]);

    $data = $request->only(['judul', 'deskripsi', 'google_form_link', 'kursus_id']);

    if ($request->hasFile('video')) {
        $data['video'] = $request->file('video')->store('materi/video', 'public');
    }

    if ($request->hasFile('pdf')) {
        $data['pdf'] = $request->file('pdf')->store('materi/pdf', 'public');
    }

    Materi::create($data);

    // ✅ Fix: retrieve the kursus
    $kursus = Kursus::findOrFail($data['kursus_id']);

    return redirect()
        ->route('mentor.kursus.upload.materi', ['kursus' => $kursus->id])
        ->with('success', 'Materi berhasil diunggah.');
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
    $kursus = Kursus::findOrFail($kursus_id); // ✅ add this

    
    return view('upload-materi', compact('materis', 'kursus')); // ✅ pass $kursus too
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

        return redirect()->route('mentor.kursus.upload.materi', ['kursus' => $materi->kursus_id])
    ->with('success', 'Materi berhasil diperbarui.');

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
    public function show($id)
{
    $materi = Materi::with(['kursus', 'kursus.mentor'])->findOrFail($id);

    if (auth()->check() && auth()->user()->role === 'siswa') {
        MateriView::firstOrCreate([
            'user_id' => auth()->id(),
            'materi_id' => $materi->id,
        ]);
    }

    return view('pages.kursus.materi-detail', compact('materi'));
}
public function kerjakanTugas($id)
{
    $materi = Materi::findOrFail($id);
    $user = Auth::user();
    $kursusId = $materi->kursus_id;

    // Cek apakah user sudah menyelesaikan kursus ini
    $sudahSelesai = KursusSelesai::where('user_id', $user->id)
        ->where('kursus_id', $kursusId)
        ->exists();

    if (!$sudahSelesai) {
        KursusSelesai::create([
            'user_id' => $user->id,
            'kursus_id' => $kursusId,
        ]);
    }

    // Redirect ke link Google Form (tugas)
    return redirect()->away($materi->google_form_link);
}
}
