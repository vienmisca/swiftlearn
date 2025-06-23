<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        // Ambil semua kategori dengan jumlah kursus
        $categories = Category::withCount('courses')->get();

        // Ambil semua kursus, dikelompokkan berdasarkan kategori
        $groupedCourses = Category::with('courses')->get()->mapWithKeys(function ($category) {
            return [$category->name => $category->courses];
        });

        // Kirim data ke view 'pages.kursus'
       return view('pages.kursus', compact('categories', 'groupedCourses'));

    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'nama_kursus' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'sampul' => 'nullable|image',
    ]);

    if ($request->hasFile('sampul')) {
        $validated['sampul'] = $request->file('sampul')->store('kursus', 'public');
    }

    $validated['mentor_id'] = auth()->id();

    $kursus = Kursus::create($validated);

    // ✅ Set session flash for display on the Buat Materi page
    session([
        'nama_kursus' => $kursus->nama_kursus,
        'sampul_kursus' => $kursus->sampul,
    ]);

    return redirect()->route('mentor.upload.materi', ['kursus_id' => $kursus->id])
    ->with('success', 'Kursus berhasil dibuat. Silakan upload materi.');

}
// public function showUploadForm()
// {
//     $materis = \App\Models\Materi::where('kursus_id', session('kursus_id'))->get();
//     return view('mentor.upload-materi', compact('materis'));
// }

}
