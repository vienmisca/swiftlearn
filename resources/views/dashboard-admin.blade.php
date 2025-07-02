<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard Admin</title>
  @vite(['resources/css/app.css', 'resources/js/app.jsx'])
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
  [x-cloak] { display: none; }
  </style>

</head>
<body 
  class="bg-blue-100 font-sans p-6"  
  x-data="{ openDeleteModal: false, kursusToDelete: null }"
  style="background-image: url('{{ asset('images/background-admin.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;"
>



  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-poppins font-bold text-navy tracking-tighter">Admin Dashboard</h1>
    <div x-data="{ open: false }" class="relative">
  <button @click="open = !open">
    <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/admin.png') }}"
     alt="Admin"
     class="w-12 h-12 rounded-full border-4 border-white cursor-pointer">

  </button>

  <!-- Dropdown -->
  <div x-show="open" @click.outside="open = false"
       class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg p-4 z-50">
    <form method="POST" action="{{ route('adminmentor.logout') }}">
      @csrf
      <button type="submit"
              class="w-full text-red-600 flex items-center space-x-2 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 16l4-4m0 0l-4-4m4 4H7" />
        </svg>
        <span>Keluar</span>
      </button>
    </form>
  </div>
</div>

  </div>

  <!-- Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Sidebar -->
    <aside class="lg:col-span-2 flex flex-col font-dm gap-6">
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-dm font-bold text-blue-900">Jumlah Siswa</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahSiswa }}</p>

      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-dm font-bold text-blue-900">Jumlah Mentor</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahMentor }}</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-dm font-bold text-blue-900">Jumlah Kursus</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahKursus }}</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-dm font-bold text-blue-900">Jumlah Materi</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahMateri }}</p>
      </div>
    </aside>

    <!-- Konten Utama -->
    <main class="lg:col-span-10 flex flex-col gap-10">

      <!-- List User -->
      <section class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-bold text-blue-900">List User</h2>
          <form method="GET" action="{{ route('dashboard.admin') }}" class="flex gap-2">
  <input
    type="text"
    name="search_siswa"
    value="{{ $searchSiswa ?? '' }}"
    placeholder="Search Siswa"
    class="border px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300"
  >
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">
    Search
  </button>
</form>


        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-gray-100 text-blue-900">
              <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2 text-right">Aksi</th>
              </tr>
            </thead>
            <tbody>
  @forelse ($siswaList as $siswa)
    <tr class="border-t hover:bg-gray-50 font-poppins text-1xl">
      <td class="px-4 py-2">{{ $siswa->name }}</td>
      <td class="px-4 py-2">{{ $siswa->email }}</td>
      <td class="px-4 py-2 text-right space-x-2">
  <button
  type="button"
  @click="openDeleteModal = true; kursusToDelete = { id: {{ $siswa->id }}, nama_kursus: '{{ addslashes($siswa->name) }}', route: '{{ route('siswa.delete', $siswa->id) }}' }"
  class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl text-sm"
>
  🗑️
</button>
</td>

    </tr>
  @empty
    <tr>
      <td colspan="3" class="px-4 py-2 text-center text-gray-500">Tidak ada siswa ditemukan.</td>
    </tr>
  @endforelse
</tbody>

          </table>
        </div>
        <div class="mt-4">
  {{ $siswaList->appends(['search_siswa' => $searchSiswa])->links() }}

</div>

      </section>

      <!-- List Kursus -->
      <section class="bg-white rounded-2xl shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-bold text-blue-900">List Kursus</h2>
          <form method="GET" action="{{ route('dashboard.admin') }}" class="flex gap-2">
  <input
    type="text"
    name="search_kursus"
    value="{{ $searchKursus ?? '' }}"
    placeholder="Search Kursus"
    class="border px-4 py-2 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300"
  >
  <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600">
    Search
  </button>
</form>
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
  @forelse ($kursusList as $kursus)
    <tr class="border-t hover:bg-gray-50">
      <td class="px-4 py-2">{{ $kursus->nama_kursus }}</td>
      <td class="px-4 py-2">{{ $kursus->kategori }}</td>
      <td class="px-4 py-2">{{ $kursus->mentor->name ?? '-' }}</td>
      <td class="px-4 py-2 text-right">
        <button
  type="button"
  @click="openDeleteModal = true; kursusToDelete = { id: {{ $kursus->id }}, nama_kursus: '{{ addslashes($kursus->nama_kursus) }}' }"
  class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl text-sm"
>
  🗑️
</button>

      </td>
    </tr>
  @empty
    <tr>
      <td colspan="4" class="px-4 py-2 text-center text-gray-500">Tidak ada kursus ditemukan.</td>
    </tr>
  @endforelse
</tbody>

          </table>
        </div>
        <div class="mt-4">
  {{ $kursusList->appends(['search_kursus' => $searchKursus])->links() }}
</div>

      </section>

    </main>
  </div>

  <!-- Modal Konfirmasi Hapus -->
<div x-show="openDeleteModal"
     x-transition
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div @click.outside="openDeleteModal = false"
       class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center">
    <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Hapus</h2>
    <p class="mb-6 text-gray-700">
      Yakin ingin menghapus kursus <span class="font-semibold" x-text="kursusToDelete?.nama_kursus"></span>?
    </p>

    <form method="POST" :action="'/admin/kursus/' + kursusToDelete.id">
      @csrf
      @method('DELETE')
      <div class="flex justify-center gap-4">
        <button type="button"
                @click="openDeleteModal = false"
                class="px-4 py-2 bg-gray-400 text-white rounded-xl text-sm font-semibold shadow">
          Batal
        </button>
        <button type="submit"
                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold shadow">
          Hapus
        </button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
