<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Mentor</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-blue-100 font-sans p-6">

  <!-- Judul Dashboard -->
  <h1 class="text-3xl font-bold text-blue-900 mb-6">Dashboard</h1>

  <!-- Navbar -->
  <div class="flex justify-end px-6 py-4">
    <div class="flex items-center bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-3 rounded-full shadow-md space-x-8">
      <a href="#" class="text-white font-semibold hover:underline">Dashboard</a>
      <a href="#" class="text-white font-semibold hover:underline">Kursus</a>
      <div class="w-10 h-10 rounded-full bg-white p-1">
        <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-full h-full rounded-full object-cover">
      </div>
    </div>
  </div>

  <!-- Konten Grid -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    <!-- Sidebar -->
    <aside class="lg:col-span-2 flex flex-col gap-6">
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Siswa</p>
        <p class="text-5xl font-bold text-blue-900 mt-2">56</p>
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

    <!-- Main Kursus -->
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

    <!-- Upload dan Rating -->
    <aside class="lg:col-span-4 flex flex-col space-y-6">
      <!-- Upload -->
      <div class="bg-white rounded-2xl p-6 shadow-md">
        <h2 class="text-2xl font-bold text-blue-900 mb-4">Upload Kursus</h2>
        <form>
          <div class="flex space-x-2 mb-4">
            <input type="text" placeholder="Nama Kursus" class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300">
            
            <!-- Upload Custom -->
            <label class="relative cursor-pointer flex items-center justify-center px-4 py-2 bg-gray-100 border rounded-xl hover:bg-gray-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                <path d="M3 3a2 2 0 012-2h2a2 2 0 012 2h2a2 2 0 012 2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2h-2a2 2 0 01-2-2H5a2 2 0 01-2-2V5a2 2 0 010-2z" />
              </svg>
              <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
            </label>
          </div>

          <textarea placeholder="Deskripsi Kursus" class="w-full mb-4 px-4 py-2 rounded-xl border h-24 resize-none focus:outline-none focus:ring-2 focus:ring-blue-300"></textarea>
          
          <div class="flex space-x-2 items-center">
            <select class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300 bg-white">
              <option>Kategori Kursus</option>
              <option>Fisika</option>
              <option>Matematika</option>
              <option>IPA</option>
            </select>
            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-2 rounded-xl font-semibold shadow-md">
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
