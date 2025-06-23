<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buat Materi – SwiftLearning</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
  <style>
    body { font-family: 'Poppins', sans-serif; }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>
<body class="bg-blue-100 min-h-screen p-8 relative overflow-x-hidden">
  <!-- Navbar (statis) -->
  <!-- Judul dan Navbar -->
<div class="flex justify-between items-center mb-6">
  <!-- Judul -->
  <h1 class="text-3xl font-poppins font-bold tracking-tighter text-navy">Buat Materi</h1>

  <!-- Navbar -->

  <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
    <a href="#" class="text-white font-medium hover:underline">Dashboard</a>
    <a href="{{ route('mentor.kursus.history') }}" class="text-white font-medium hover:underline">Kursus</a>
    <div x-data="{ open: false }" class="relative">
    <button @click="open = !open">
        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/mentor.png') }}"
     alt="Admin"
     class="w-12 h-12 rounded-full border-4 border-white cursor-pointer">

    </button>

    <!-- Dropdown -->
    <div x-show="open" @click.outside="open = false"
         class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg p-4 z-50">
        <h2 class="font-bold text-gray-800 mb-3">
    {{ Auth::user()->name }}
</h2>


        <form method="POST" action="{{ route('adminmentor.logout') }}">
            @csrf
            <button type="submit"
                class="text-red-600 flex items-center space-x-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 0a2 2 0 011.85 1.23" />
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</div>

  </div>
</div>

  <!-- Header -->
  <div class="mt-10 bg-blue-600 rounded-2xl flex items-center p-4 space-x-4 text-white">
    <img src="https://media.discordapp.net/attachments/755299102148919317/1386584390246596669/mv_08.jpg?ex=685a3cd8&is=6858eb58&hm=bd17acfb9976f594af1483fd3fe67b1bee2f92e02440a2ed83d1156e2e05f094&=&format=webp&width=656&height=438 
" alt="Thumbnail" class="h-40 w-62 object-cover rounded-lg"/>
    <h2 class="text-2xl font-bold">
      Teori Relativitas Umum Einstein:<br/>Gravitasi dan Benda Langit
    </h2>
  </div>

  <div class="mt-10 flex flex-col lg:flex-row gap-8">
    <!-- Form Upload Materi -->
    <div class="bg-white rounded-2xl shadow p-6 w-full lg:w-1/3">
  <h3 class="text-xl font-semibold text-[#0B0B7C] mb-4">Upload Materi</h3>
  <form>
    <!-- Baris: Nama Materi + Sampul Materi -->
    <div class="flex gap-4 mb-4">
      <input type="text"
             placeholder="Nama Materi"
             class="flex-1 p-3 rounded-lg bg-gray-100 placeholder-gray-400"
      />
      <label class="flex items-center gap-2 p-3 bg-gray-100 rounded-lg border border-gray-200 cursor-pointer">
        <span class="text-gray-400">Sampul Materi</span>
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-6 w-6 text-gray-500"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3m-3-15a4 4 0 00-4 4v4h8v-4a4 4 0 00-4-4z"/>
        </svg>
        <input type="file" accept="image/*" class="hidden"/>
      </label>
    </div>

    <!-- Deskripsi Materi -->
    <textarea rows="4"
              placeholder="Deskripsi Materi"
              class="w-full p-3 rounded-lg bg-gray-100 placeholder-gray-400 mb-4"></textarea>

    <!-- Link Google Form -->
    <input type="text"
           placeholder="Link Google Form"
           class="w-full p-3 rounded-lg bg-gray-100 placeholder-gray-400 mb-4"/>

    <!-- Upload Video & PDF -->
    <div class="flex gap-4 mb-4">
      <label class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
        <span class="text-gray-400">Upload Video</span>
        <svg xmlns="http://www.w3.org/2000/svg"
             class="inline h-5 w-5 ml-1 text-gray-500"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3m-3-15a4 4 0 00-4 4v4h8v-4a4 4 0 00-4-4z"/>
        </svg>
        <input type="file" accept="video/*" class="hidden"/>
      </label>
      <label class="flex-1 p-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
        <span class="text-gray-400">Upload PDF</span>
        <svg xmlns="http://www.w3.org/2000/svg"
             class="inline h-5 w-5 ml-1 text-gray-500"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3m-3-15a4 4 0 00-4 4v4h8v-4a4 4 0 00-4-4z"/>
        </svg>
        <input type="file" accept="application/pdf" class="hidden"/>
      </label>
    </div>

    <!-- Tombol Upload -->
    <button type="submit"
            class="flex items-center justify-center gap-2 w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-2 font-semibold">
      Upload
      <svg xmlns="http://www.w3.org/2000/svg"
           class="h-5 w-5"
           fill="none" viewBox="0 0 24 24"
           stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3m-3-15a4 4 0 00-4 4v4h8v-4a4 4 0 00-4-4z"/>
      </svg>
    </button>
  </form>
</div>


    <!-- Daftar Materi -->
    <div class="flex-1 space-y-3">
      <!-- Replikasi untuk beberapa materi -->
      <div class="bg-white rounded-2xl shadow flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6-4h6"/>
          </svg>
          <span class="text-gray-800">Belajar tentang apa itu Gravitasi</span>
        </div>
        <div class="flex gap-2">
          <button class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-full text-sm font-semibold">Edit</button>
          <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full text-sm font-semibold">Hapus</button>
        </div>
      </div>

      <!-- duplikasi materi -->
      <div class="bg-white rounded-2xl shadow flex items-center justify-between p-4">
        <div class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6-4h6"/>
          </svg>
          <span class="text-gray-800">Belajar tentang apa itu Gravitasi</span>
        </div>
        <div class="flex gap-2">
          <button class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-full text-sm font-semibold">Edit</button>
          <button class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full text-sm font-semibold">Hapus</button>
        </div>
      </div>

      <!-- Tombol Selesai -->
      <div class="flex justify-end mt-4">
        <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
          Selesai
        </button>
      </div>
    </div>
  </div>
</body>
</html>
