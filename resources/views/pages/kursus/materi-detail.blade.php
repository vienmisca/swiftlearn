<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Materi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col overflow-x-hidden">

  <!-- Bagian Header dan Video -->
  <div class="relative bg-gradient-to-r from-blue-600 to-indigo-700 rounded-b-3xl text-white px-6 sm:px-12 pt-6 pb-10 overflow-hidden">

    <!-- Background Decorative Images -->
    <img src="{{ asset('images/cos-flowers.png') }}" 
         alt="decorative flowers" 
         class="absolute top-[-100px] left-[-100px] w-[400px] h-auto z-0 pointer-events-none" />

    <img src="{{ asset('images/cos-stars.png') }}" 
         alt="decorative stars" 
         class="absolute top-[-150px] right-[-120px] w-[400px] h-auto z-0 pointer-events-none" />

    <!-- Border effect -->
    <div class="absolute left-0 top-0 w-56 h-56 bg-transparent border-l border-t border-white/30 rounded-full z-0"></div>

    <!-- Tombol Kembali -->
    <a href="javascript:history.back()" 
       class="absolute top-4 left-4 bg-white/20 hover:bg-white/30 transition text-white font-bold px-3 py-1.5 rounded-full z-10">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
    </a>

    <!-- Judul dan Mentor -->
    <h1 class="text-xl sm:text-3xl font-bold sm:pl-10 relative z-10">Belajar tentang {{ $materi->judul }}</h1>
    <p class="text-sm sm:text-base mt-1 sm:pl-10 font-medium relative z-10">Oleh: {{ $materi->kursus->mentor->name ?? '-' }}</p>

    <!-- Video -->
    <div class="flex justify-center mt-6 relative z-10">
      <div class="max-w-4xl w-full aspect-video overflow-hidden rounded-2xl shadow-lg">
        <video controls class="w-full h-full object-cover">
          <source src="{{ asset('storage/' . $materi->video) }}" type="video/mp4">
          Browser Anda tidak mendukung pemutaran video.
        </video>
      </div>
    </div>
  </div>

  <!-- Bagian Artikel + Tugas + About -->
  <div class="bg-blue-100 px-6 sm:px-12 py-10 rounded-t-3xl flex flex-col lg:flex-row gap-10 items-start">
    
    <!-- Kiri: Tombol Artikel & Tugas -->
    <div class="flex flex-col gap-6 w-full lg:w-1/4">
      
      <!-- Artikel -->
      <a href="{{ asset('storage/' . $materi->pdf) }}" target="_blank"
         class="bg-white px-6 py-4 rounded-2xl shadow hover:shadow-md transition flex gap-3 items-center">
        <span class="text-2xl">📄</span>
        <div>
          <p class="font-semibold text-gray-800 leading-tight">Materi PDF</p>
          <p class="text-gray-800 leading-tight">{{ $materi->judul }}</p>
        </div>
      </a>

      <!-- Tugas -->
      @if ($materi->google_form_link)
        <a href="{{ route('materi.kerjakan', $materi->id) }}" target="_blank" rel="noopener noreferrer"
   class="bg-white px-6 py-4 rounded-2xl shadow hover:shadow-md transition flex gap-3 items-center">
          <span class="text-2xl">📝</span>
          <div>
            <p class="font-semibold text-gray-800 leading-tight">Kerjakan Tugas</p>
            <p class="text-gray-800 leading-tight">{{ $materi->judul }}</p>
          </div>
        </a>
      @else
        <div class="bg-gray-300 px-6 py-4 rounded-2xl text-gray-500 flex gap-3 items-center cursor-not-allowed">
          <span class="text-2xl">📝</span>
          <div>
            <p class="font-semibold leading-tight">Tugas belum tersedia</p>
          </div>
        </div>
      @endif

    </div>

    <!-- Kanan: Deskripsi -->
    <div class="w-full lg:w-3/4">
      <h2 class="text-xl font-bold text-navy mb-3">Deskripsi</h2>
      <p class="text-gray-700 leading-relaxed">
        {{ $materi->deskripsi }}
      </p>
    </div>
  </div>

</body>
</html>
