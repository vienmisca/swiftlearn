<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Kursus</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
</head>
<body class="min-h-screen bg-[#d6eeff]">

  <!-- Header -->
  <div class="relative bg-gradient-to-r from-[#5b5ef2] to-[#184fc2] p-8 text-white rounded-b-3xl shadow">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6">
      <!-- Kiri: Gambar + Judul -->
      <div class="flex items-center gap-4">
        <img
          src="{{ asset('images/earth-thumbnail.jpg') }}"
          alt="thumbnail"
          class="w-40 h-28 rounded-xl object-cover border-2 border-white"
        />
        <div>
          <h2 class="text-xl md:text-2xl font-bold leading-snug">
            Teori Relativitas Umum Einstein:<br />
            Gravitasi dan Benda Langit
          </h2>
          <p class="text-sm mt-2 font-medium">Oleh: {{ $kursus->pengajar ?? 'Jhoes' }}</p>
        </div>
      </div>

      <!-- Kanan: Rating -->
      <div class="bg-white text-yellow-500 px-4 py-2 rounded-full shadow flex items-center space-x-2">
        <span class="text-[#184fc2] font-semibold">Beri Rating:</span>
        <div class="flex items-center gap-1">
          @for ($i = 0; $i < 5; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.568L24 9.748l-6 5.84 1.416 8.31L12 18.896l-7.416 5.002L6 15.588 0 9.748l8.332-1.593z"/>
            </svg>
          @endfor
          <span class="text-black font-semibold ml-1">5.0</span>
        </div>
      </div>
    </div>

    <!-- Optional background pattern -->
    <div class="absolute inset-0 z-[-1]">
      <!-- Tambahkan SVG hiasan jika ingin -->
    </div>
  </div>

  <!-- Daftar Materi -->
  <div class="px-6 py-10">
    <h3 class="text-lg font-bold text-[#0B0B7C] mb-6">Daftar Materi</h3>
    <div class="space-y-4">
      @foreach($materis as $materi)
        <div class="bg-white px-6 py-4 rounded-xl shadow hover:shadow-md transition border border-blue-100 flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M12 4h9M4 4h.01M4 20h.01M4 12h16M4 8h16M4 16h16"/>
          </svg>
          <span class="font-medium text-[#1e2a4f]">{{ $materi->judul }}</span>
        </div>
      @endforeach
    </div>
  </div>

</body>
</html>
