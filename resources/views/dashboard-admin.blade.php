<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-100 font-sans p-6">

  <!-- Header -->
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-blue-900">Dashboard</h1>
    <div class="flex items-center space-x-4 bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-3 rounded-full text-white shadow-md">
      <span class="text-sm font-semibold">ADMIN ▾</span>
      <div class="w-10 h-10 rounded-full bg-white p-1">
        <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="w-full h-full rounded-full object-cover">
      </div>
    </div>
  </div>

  <!-- Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Sidebar -->
    <aside class="lg:col-span-2 flex flex-col gap-6">
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Siswa</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">32</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Mentor</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">5</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Kursus</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">16</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold text-blue-900">Jumlah Materi</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">75</p>
      </div>
    </aside>

    <!-- Konten Utama -->
    <main class="lg:col-span-10 flex flex-col gap-10">

      <!-- List User -->
      <section class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-bold text-blue-900">List User</h2>
          <input type="text" placeholder="Search" class="border px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-gray-100 text-blue-900">
              <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Role</th>
                <th class="px-4 py-2 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Dummy Data -->
              <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">Joe Slice</td>
                <td class="px-4 py-2">joeslice05@gmail.com</td>
                <td class="px-4 py-2">Siswa</td>
                <td class="px-4 py-2 text-right space-x-2">
                  <button class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded-xl text-sm">Edit</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl text-sm">🗑️</button>
                </td>
              </tr>
              <!-- Ulangi sesuai data -->
            </tbody>
          </table>
        </div>
        <div class="flex justify-center mt-4 space-x-2 text-blue-900">
          <button>‹</button>
          <button class="font-bold">1</button>
          <button>2</button>
          <button>3</button>
          <button>›</button>
        </div>
      </section>

      <!-- List Kursus -->
      <section class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-bold text-blue-900">List Kursus</h2>
          <input type="text" placeholder="Search" class="border px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300">
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-gray-100 text-blue-900">
              <tr>
                <th class="px-4 py-2">Nama Kursus</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Mentor</th>
                <th class="px-4 py-2 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">Bagaimana Hukum Gravitasi Tercipta</td>
                <td class="px-4 py-2">Fisika</td>
                <td class="px-4 py-2">Jhoes</td>
                <td class="px-4 py-2 text-right space-x-2">
                  <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-xl text-sm">✓ Setujui</button>
                  <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl text-sm">🗑️</button>
                </td>
              </tr>
              <!-- Tambahkan baris sesuai data -->
            </tbody>
          </table>
        </div>
        <div class="flex justify-center mt-4 space-x-2 text-blue-900">
          <button>‹</button>
          <button class="font-bold">1</button>
          <button>2</button>
          <button>3</button>
          <button>›</button>
        </div>
      </section>

    </main>
  </div>
</body>
</html>
