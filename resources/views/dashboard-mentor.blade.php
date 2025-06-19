<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Mentor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-blue-100 font-sans p-6">

<!-- Judul dan Navbar -->
<div class="flex justify-between items-center mb-6">
  <!-- Judul -->
  <h1 class="text-3xl font-bold text-blue-900">Dashboard</h1>

  <!-- Navbar -->

  <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
    <a href="#" class="text-white font-medium hover:underline">Dashboard</a>
    <a href="{{ route('mentor.kursus.history') }}" class="text-white font-medium hover:underline">Kursus</a>
    <div x-data="{ open: false }" class="relative">
    <button @click="open = !open">
        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=vien" alt="Profile"
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


  <!-- Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Sidebar -->
    <aside class="lg:col-span-2 flex flex-col gap-6">
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Siswa</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahSiswa }}</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Kursus</p>
        <p class="text-5xl font-bold text-blue-900 mt-2">5</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Materi</p>
        <p class="text-5xl font-bold text-blue-900 mt-2">55</p>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:col-span-6 bg-white rounded-2xl shadow-md p-6">
      <h2 class="text-2xl font-bold text-blue-900 mb-4">Kursus Anda</h2>
      <div class="space-y-4">
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <p class="font-bold text-blue-900">Kelas Gravitasi : belajar Tentang Gravitasi</p>
          <p class="text-sm text-gray-600">Materi : <span class="text-blue-900">Fisika</span></p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <p class="font-bold text-blue-900">Hukum kekekalan</p>
          <p class="text-sm text-gray-600">Materi : <span class="text-blue-900">Fisika</span></p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <p class="font-bold text-blue-900">Hukum newton</p>
          <p class="text-sm text-gray-600">Materi : <span class="text-blue-900">Fisika</span></p>
        </div>
        <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
          <p class="font-bold text-blue-900">Hukum newton</p>
          <p class="text-sm text-gray-600">Materi : <span class="text-blue-900">Fisika</span></p>
        </div>
      </div>
      <div class="text-right mt-6">
        <button class="bg-indigo-500 hover:bg-indigo-600 transition text-white px-6 py-2 rounded-xl text-sm font-semibold shadow-md">
          Tampilkan semua
        </button>
      </div>
    </main>

    <!-- Upload + Rating -->
    <aside class="lg:col-span-4 flex flex-col space-y-6">

      <!-- Upload Kursus -->
<div class="bg-white rounded-2xl p-6 shadow-md">
  <h2 class="text-2xl font-bold text-blue-900 mb-4">Upload Kursus</h2>
  <form>
    <!-- Row: Nama Kursus + Sampul Upload -->
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
      <input
        type="text"
        placeholder="Nama Kursus"
        class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300"
      />

      <!-- Sampul Kursus Upload -->
      <label class="flex items-center px-4 py-2 bg-gray-100 border rounded-xl cursor-pointer hover:bg-gray-200 text-gray-700 font-medium">
        <input type="file" class="hidden" name="sampul_kursus">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
          <path d="M4 3a2 2 0 00-2 2v2a2 2 0 002 2v6a2 2 0 002 2h8a2 2 0 002-2v-6a2 2 0 002-2V5a2 2 0 00-2-2H4zm8 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Sampul Kursus
      </label>
    </div>

    <!-- Deskripsi -->
    <textarea
      placeholder="Deskripsi Kursus"
      class="w-full mb-4 px-4 py-2 rounded-xl border h-24 resize-none focus:outline-none focus:ring-2 focus:ring-blue-300"
    ></textarea>

    <!-- Kategori + Submit -->
    <div class="flex flex-col md:flex-row gap-4 items-center">
      <select class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300 bg-white">
        <option>Kategori Kursus</option>
        <option>Fisika</option>
        <option>Matematika</option>
        <option>IPA</option>
      </select>
      <button
        type="submit"
        class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-2 rounded-xl font-semibold shadow-md"
      >
        Buat Materi
      </button>
    </div>
  </form>
</div>


      <!-- Rating -->
      <div class="bg-white rounded-2xl p-6 shadow-md">
        <h2 class="text-xl font-bold text-blue-900 mb-2">Rating Anda</h2>
        <div class="flex items-center space-x-1 text-yellow-400 text-2xl">
          <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
          <span class="text-blue-900 text-xl font-bold ml-2">5.0</span>
        </div>
      </div>
    </aside>

  </div>
</body>
</html>
