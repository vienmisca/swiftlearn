<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
        public function index()
    {
        $categories = ['IPA', 'Matematika', 'Bahasa', 'Kimia', 'Fisika', 'Informatika'];

        $groupedCourses = [];
        foreach ($categories as $kategori) {
            $groupedCourses[$kategori] = Kursus::where('kategori', $kategori)->get();
        }

        return view('pages.kursus', compact('groupedCourses'));
    }
    public function api(Request $request)
    {
        $perPage = 4;
        $kategori = $request->input('kategori');
        $search = $request->input('search');

        $query = Kursus::query()->where('kategori', $kategori);

        if ($search) {
            $query->where('nama_kursus', 'ILIKE', '%' . $search . '%');
        }

        $kursus = $query->paginate($perPage);

        return response()->json($kursus);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kursus' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'required|string|max:100',
            'sampul_kursus' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('sampul_kursus')) {
            $validated['sampul_kursus'] = $request->file('sampul_kursus')->store('kursus', 'public');
        }

        $validated['mentor_id'] = auth('mentor')->id();

        $kursus = Kursus::create($validated);

        session([
            'nama_kursus' => $kursus->nama_kursus,
            'sampul_kursus' => $kursus->sampul_kursus,
        ]);

        return redirect()->route('mentor.kursus.upload.materi', ['kursus' => $kursus->id])
            ->with('success', 'Kursus berhasil dibuat. Silakan upload materi.');
    }

    public function show($id)
    {
        // Ambil kursus beserta relasi mentor dan materis
        $kursus = Kursus::with(['materis', 'mentor'])->findOrFail($id);

        // Ambil materi secara terpisah untuk digunakan di Blade
        $materis = $kursus->materis;

        return view('pages.kursus.kursus-detail', compact('kursus', 'materis'));
    }
}
