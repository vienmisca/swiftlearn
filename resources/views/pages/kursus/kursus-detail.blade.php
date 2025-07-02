<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Kursus</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-[#d6eeff]">

  {{-- Header --}}
  <div class="relative bg-gradient-to-r from-[#5b5ef2] to-[#184fc2] p-6 md:p-10 rounded-b-[40px] text-white shadow-md">

    {{-- Tombol Kembali --}}
    <a href="{{ route('kursus.index') }}" class="absolute top-4 left-4 bg-white/20 hover:bg-white/30 transition text-white font-bold px-3 py-1.5 rounded-full">
      ←
    </a>

    <div class="flex flex-col md:flex-row justify-between items-center gap-6 mt-6">
      {{-- Kiri: Gambar dan Info --}}
      <div class="flex items-center gap-4">
        <img
          src="{{ $kursus->sampul_kursus ? asset('storage/' . $kursus->sampul_kursus) : asset('images/default-thumbnail.jpg') }}"
          alt="thumbnail"
          class="w-40 h-28 rounded-xl object-cover border-4 border-white shadow"
        />
        <div>
          <h2 class="text-2xl md:text-3xl font-bold leading-snug">
            {{ $kursus->nama_kursus ?? 'Judul Kursus Tidak Ditemukan' }}
          </h2>
          <p class="text-sm mt-2 font-medium">Oleh: {{ $kursus->mentor->name ?? 'Mentor Tidak Diketahui' }}</p>
        </div>
      </div>
    </div>
  </div>

  {{-- Daftar Materi --}}
  <div class="px-6 py-10 max-w-5xl mx-auto">
    <h3 class="text-lg font-bold text-[#0B0B7C] mb-6">Daftar Materi</h3>

    @if ($kursus->materis->count())
      <div href="#" class="space-y-4">
        @foreach($kursus->materis as $materi)
  <a href="{{ route('materi.show', $materi->id) }}" class="block">
    <div class="bg-white px-6 py-4 rounded-2xl shadow border border-blue-100 flex items-center gap-3 hover:shadow-md transition">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
        <path d="M6 2a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8.828a2 2 0 0 0-.586-1.414l-4.828-4.828A2 2 0 0 0 13.172 2H6zm7 1.414L19.586 10H14a1 1 0 0 1-1-1V3.414z"/>
      </svg>
      <span class="font-medium text-[#1e2a4f]">{{ $materi->judul }}</span>
    </div>
  </a>
@endforeach

      </div>
    @else
      <p class="text-gray-600 italic">Belum ada materi yang tersedia.</p>
    @endif

  </div>

</body>
</html>
