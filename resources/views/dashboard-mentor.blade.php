<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard Mentor</title>
  @vite(['resources/css/app.css', 'resources/js/app.jsx'])
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/swiftbird.png') }}">
  <style>
  [x-cloak] { display: none; }
  </style>
  

</head>
<body x-data="{ openEditModal: false, kursusToEdit: null, openDeleteModal: false, kursusToDelete: null, openLogoutModal: false }">
<div class="min-h-screen py-10 px-8 bg-cover bg-center"
     style="background-image: url('{{ asset('images/bg-mentor.png') }}');">


<!-- Judul dan Navbar -->
<div class="flex justify-between items-center mb-6">
  <!-- Judul -->
  <h1 class="text-3xl font-poppins font-bold tracking-tighter text-navy">Dashboard</h1>

  <!-- Navbar -->

  <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
    <a href="#" class="text-white font-medium hover:underline">Dashboard</a>
    <a href="{{ route('mentor.kursus.history') }}" class="text-white font-medium hover:underline">Kursus</a>
    <div x-data="{ open: false }" class="relative">
    <button @click="open = !open">
      @auth
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
@endauth


        {{-- <form method="POST" action="{{ route('adminmentor.logout') }}"> --}}
            @csrf
            <button @click="openLogoutModal = true"
        class="text-red-600 flex items-center space-x-2 hover:underline">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
         viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round"
              stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 0a2 2 0 011.85 1.23" />
    </svg>
    <span>Keluar</span>
</button>

        {{-- </form> --}}
    </div>
</div>

  </div>
</div>


  <!-- Grid Layout -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    
    <!-- Sidebar -->
    <aside class="lg:col-span-2 flex flex-col gap-6">
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold font-dm text-blue-900">Jumlah Siswa</p>
        <p class="text-4xl font-bold text-blue-900 mt-2">{{ $jumlahSiswa }}</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold font-dm text-blue-900">Jumlah Kursus</p>
        <p class="text-5xl font-bold text-blue-900 mt-2">{{ $jumlahKursus }}</p>
      </div>
      <div class="bg-white text-center rounded-2xl shadow-md py-6">
        <p class="text-lg font-bold font-dm text-blue-900">Jumlah Materi</p>
        <p class="text-5xl font-bold text-blue-900 mt-2">{{ $jumlahMateri }}</p>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="lg:col-span-6 bg-white rounded-2xl shadow-md p-6">
      <h2 class="text-2xl font-poppins font-bold text-blue-900 mb-4">Kursus Anda</h2>
      <div class="font-dm space-y-4">
 @forelse ($kursusList as $kursus)
  <div class="bg-gray-100 p-4 rounded-xl shadow-sm flex justify-between items-center">
    <div>
      <p class="font-bold text-blue-900">{{ $kursus->nama_kursus }}</p>
      <p class="text-sm text-gray-600">Kategori: <span class="text-blue-900">{{ $kursus->kategori }}</span></p>
    </div>
    <div class="flex items-center gap-2">
      <a href="{{ route('mentor.kursus.upload.materi', ['kursus' => $kursus->id]) }}"
         class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">
         Buat Materi
      </a>

      <!-- Edit & Delete Buttons -->
<div class="flex items-center gap-2">
  <!-- Edit Button -->
  <button @click='openEditModal = true; kursusToEdit = @json($kursus)'
          class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">
    Edit
  </button>

  <!-- Hapus Button -->
  <button @click='openDeleteModal = true; kursusToDelete = @json($kursus)'
        class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">
  Hapus
</button>

</div>


      </form>
    </div>
  </div>
@empty
  <p class="text-gray-600">Belum ada kursus.</p>
@endforelse
@if ($errors->any())
    <div class="text-red-500">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>
      {{-- <div class="text-right mt-6">
        <button class="bg-indigo-500 hover:bg-indigo-600 transition text-white px-6 py-2 rounded-xl text-sm font-semibold shadow-md">
          Tampilkan semua
        </button>
      </div> --}}
    </main>

    <!-- Upload + Rating -->
    <aside class="lg:col-span-4 flex flex-col space-y-6">

      <!-- Upload Kursus -->
<div class="bg-white rounded-2xl p-6 shadow-md">
  <h2 class="text-2xl font-poppins font-bold text-blue-900 mb-4">Upload Kursus</h2>
  <form method="POST" action="{{ route('mentor.kursus.store') }}" enctype="multipart/form-data">
  @csrf
      <input type="hidden" name="kursus_id" value="{{ session('kursus_id') }}">

    <!-- Row: Nama Kursus + Sampul Upload -->
    <div class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
      <input name="nama_kursus" value="{{ old('nama_kursus') }}" type="text" placeholder="Nama Kursus" class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300" required>

      <!-- Sampul Kursus Upload -->
      <label class="flex items-center px-4 py-2 bg-gray-100 border rounded-xl cursor-pointer hover:bg-gray-200 text-gray-700 font-medium">
        <input type="file" name="sampul_kursus" class="hidden" required>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
          <path d="M4 3a2 2 0 00-2 2v2a2 2 0 002 2v6a2 2 0 002 2h8a2 2 0 002-2v-6a2 2 0 002-2V5a2 2 0 00-2-2H4zm8 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Sampul Kursus
      </label>
    </div>

    <!-- Deskripsi -->
    <textarea name="deskripsi" placeholder="Deskripsi Kursus"
      class="w-full mb-4 px-4 py-2 rounded-xl border h-24 resize-none focus:outline-none focus:ring-2 focus:ring-blue-300"
    required></textarea>

    <!-- Kategori + Submit -->
    
    <div class="flex flex-col md:flex-row gap-4 items-center">
      <select name="kategori" class="flex-1 px-4 py-2 rounded-xl border focus:outline-none focus:ring-2 focus:ring-blue-300 bg-white" required>
          <option value="">Pilih Kategori</option>
          <option value="Fisika">Fisika</option>
          <option value="Matematika">Matematika</option>
          <option value="IPA">IPA</option>
          <option value="Bahasa">Bahasa</option>
          <option value="Kimia">Kimia</option>
          <option value="Informatika">Informatika</option>
        </select>
        <!-- Submit Button -->
<button type="submit"
        class=" bg-indigo-500 hover:bg-indigo-600 text-white px-6 py-2 rounded-xl font-semibold shadow">
  Upload Kursus
</button>

    </div>
  </form>
</div>


      <!-- Rating -->
      {{-- <div class="bg-white rounded-2xl p-6 shadow-md">
        <h2 class="text-xl font-bold text-blue-900 mb-2">Rating Anda</h2>
        <div class="flex items-center space-x-1 text-yellow-400 text-2xl">
          <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
          <span class="text-blue-900 text-xl font-bold ml-2">5.0</span>
        </div>
      </div>
    </aside>
  </div> --}}

 
</div>
<div x-show="openEditModal" x-cloak

       class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div @click.outside="openEditModal = false"
         class="bg-white w-full max-w-xl p-6 rounded-xl shadow-lg">
      <h2 class="text-xl font-bold text-blue-900 mb-4">Edit Kursus</h2>

      <form x-show="kursusToEdit" :action="`/mentor/kursus/${kursusToEdit.id}`" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <!-- Nama Kursus -->
        <input type="text" name="nama_kursus" x-model="kursusToEdit.nama_kursus"
               class="w-full mb-4 px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300"
               placeholder="Nama Kursus" required>

        <!-- Deskripsi -->
        <textarea name="deskripsi" x-model="kursusToEdit.deskripsi"
                  class="w-full mb-4 px-4 py-2 border rounded-xl h-24 resize-none focus:outline-none focus:ring-2 focus:ring-blue-300"
                  placeholder="Deskripsi Kursus" required></textarea>

        <!-- Kategori -->
        <select name="kategori" x-model="kursusToEdit.kategori"
                class="w-full mb-4 px-4 py-2 border rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-300 bg-white" required>
          <option value="">Pilih Kategori</option>
          <option value="Fisika">Fisika</option>
          <option value="Matematika">Matematika</option>
          <option value="IPA">IPA</option>
          <option value="Bahasa">Bahasa</option>
          <option value="Kimia">Kimia</option>
          <option value="Informatika">Informatika</option>
        </select>

        <!-- Sampul Kursus -->
        <label class="block mb-4 text-sm text-gray-600">Ganti Sampul (Opsional)</label>
        <input type="file" name="sampul_kursus"
               class="w-full mb-4 px-4 py-2 border rounded-xl bg-white">

        <!-- Buttons -->
        <div class="flex justify-end gap-2">
          <button type="button"
                  @click="openEditModal = false"
                  class="bg-gray-400 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">
            Batal
          </button>
          <button type="submit"
                  class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl text-sm font-semibold shadow">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>

<!-- Modal Konfirmasi Hapus -->
<div x-show="openDeleteModal" x-cloak
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
     x-transition:enter="transition-opacity ease-out duration-200"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-in duration-150"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">

  <!-- Kontainer Modal -->
  <div @click.outside="openDeleteModal = false"
       class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center transform transition-all duration-300 ease-out"
       x-transition:enter="transition ease-out duration-300"
       x-transition:enter-start="opacity-0 scale-75"
       x-transition:enter-end="opacity-100 scale-100"
       x-transition:leave="transition ease-in duration-200"
       x-transition:leave-start="opacity-100 scale-100"
       x-transition:leave-end="opacity-0 scale-75">

    <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Hapus</h2>
    <p class="mb-6 text-gray-700">
      Yakin ingin menghapus kursus <span class="font-semibold" x-text="kursusToDelete?.nama_kursus"></span>?
    </p>

    <form method="POST" x-bind:action="'/mentor/kursus/' + kursusToDelete.id">
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
<!-- Logout Confirmation Modal -->
<div x-show="openLogoutModal"
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
     x-transition:enter="transition-opacity ease-out duration-200"
     x-transition:leave="transition-opacity ease-in duration-150"
     x-cloak>
  <div @click.outside="openLogoutModal = false"
       class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center"
       x-transition:enter="transition ease-out duration-300"
       x-transition:leave="transition ease-in duration-200">
    <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Keluar</h2>
    <p class="mb-6 text-gray-700">
      Apakah Anda yakin ingin keluar?
    </p>
    <form method="POST" action="{{ route('adminmentor.logout') }}">
      @csrf
      <div class="flex justify-center gap-4">
        <button type="button"
                @click="openLogoutModal = false"
                class="px-4 py-2 bg-gray-400 text-white rounded-xl text-sm font-semibold shadow">
          Batal
        </button>
        <button type="submit"
                class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold shadow">
          Keluar
        </button>
      </div>
    </form>
  </div>
</div>


</body>
</html>
