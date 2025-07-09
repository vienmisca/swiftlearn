<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buat Materi – SwiftLearning</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('images/swiftbird.png') }}">
</head>
<body 
  x-data="{openEditModal: false, openDeleteModal: false, materiToEdit: {}, materiToDelete: {}}" 
  style="background-image: url('{{ asset('images/bg-mentor.png') }}');" 
  class="bg-cover bg-center min-h-screen p-8 relative overflow-auto"
>

<!-- Header -->
<div class="flex justify-between items-center mb-6">
  <h1 class="text-4xl font-poppins font-extrabold text-navy">Buat Materi</h1>
  <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
    <a href="{{ route('dashboard.mentor') }}" class="text-white font-medium hover:underline">Dashboard</a>
    <a href="{{ route('mentor.kursus.history') }}" class="text-white font-medium hover:underline">Kursus</a>
    <div x-data="{ open: false }" class="relative">
      <button @click="open = !open">
        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : asset('images/mentor.png') }}"
             alt="Admin" class="w-12 h-12 rounded-full border-4 border-white cursor-pointer">
      </button>
      <div x-show="open" @click.outside="open = false"
           class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg p-4 z-50">
        <h2 class="font-bold text-gray-800 mb-3">{{ Auth::user()->name }}</h2>
        <form method="POST" action="{{ route('adminmentor.logout') }}">
          @csrf
          <button type="submit" class="text-red-600 flex items-center space-x-2 hover:underline">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
            </svg>
            <span>Keluar</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Kursus Info -->
<div class="mt-10 bg-blue-600 rounded-2xl flex items-center p-4 space-x-4 text-white">
  <img src="{{ session('sampul_kursus') ? asset('storage/' . session('sampul_kursus')) : 'https://via.placeholder.com/200x140' }}"
       alt="Thumbnail" class="h-40 w-62 object-cover rounded-lg"/>
  <h2 class="text-2xl font-bold">{{ $kursus->nama_kursus }}</h2>
</div>

<!-- Konten Utama -->
<div class="mt-10 flex flex-col lg:flex-row gap-8">
  <!-- Form Upload Materi -->
  <div class="bg-white rounded-2xl shadow p-6 w-full lg:w-1/3">
    <h3 class="text-xl font-semibold text-[#0B0B7C] mb-4">Upload Materi</h3>
    <form action="{{ route('mentor.materi.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">
      <input type="text" name="judul" placeholder="Judul Materi" class="w-full p-3 mb-4 rounded-lg bg-gray-100 placeholder-gray-400" />
      <textarea name="deskripsi" rows="4" placeholder="Deskripsi Materi" class="w-full p-3 mb-4 rounded-lg bg-gray-100 placeholder-gray-400"></textarea>
      <input type="text" name="google_form_link" placeholder="Link Google Form" class="w-full p-3 mb-4 rounded-lg bg-gray-100 placeholder-gray-400" />
      
      <div x-data="{ video: '', pdf: '' }" class="flex gap-4 mb-4">
        <div class="flex-1">
          <label class="block w-full p-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
            <span class="text-gray-600 font-medium">Upload Video</span>
            <input type="file" name="video" accept="video/*" class="hidden" @change="video = $event.target.files[0]?.name" />
          </label>
          <div x-show="video" class="mt-1 overflow-hidden">
            <p class="text-sm text-green-600 truncate max-w-[120px]" :title="video">
              <template x-if="video">
                <span x-text="video.split('.')[0].split(/[\s_-]/)[0] + '...'"></span>
              </template>
            </p>
          </div>
        </div>
        <div>
          <label class="block px-4 py-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
            <span class="text-gray-600 font-medium">Upload PDF</span>
            <input type="file" name="pdf" accept="application/pdf" class="hidden" @change="pdf = $event.target.files[0]?.name" />
          </label>
          <div x-show="pdf" class="mt-1 overflow-hidden">
            <p class="text-sm text-green-600 truncate w-[160px]" :title="pdf">
              <template x-if="pdf.length > 45">
                <span x-text="pdf.slice(0, 42) + '...'"></span>
              </template>
              <template x-if="pdf.length <= 45">
                <span x-text="pdf"></span>
              </template>
            </p>
          </div>
        </div>
      </div>
      <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-2 font-semibold flex items-center justify-center gap-2">
        Upload
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3"/>
        </svg>
      </button>
    </form>
  </div>

  <!-- Daftar Materi -->
  <div class="flex-1 space-y-3">
    @forelse ($materis as $materi)
    <div class="bg-white rounded-2xl shadow flex items-center justify-between p-4">
      <div class="flex items-center space-x-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6-4h6"/>
        </svg>
        <span class="text-gray-800">{{ $materi->judul }}</span>
      </div>
      <div class="flex gap-2">
        <button @click.prevent="openEditModal = true; materiToEdit = {{ $materi->toJson() }}" class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-full text-sm font-semibold">
          Edit
        </button>
        <button @click="openDeleteModal = true; materiToDelete = {{ $materi->toJson() }}" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full text-sm font-semibold">
          Hapus
        </button>
      </div>
    </div>
    @empty
    <p class="text-gray-500">Belum ada materi.</p>
    @endforelse

    <div class="flex justify-end mt-4">
      <a href="{{ route('dashboard.mentor') }}" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">Selesai</a>
    </div>
  </div>
</div>

<!-- MODAL: Edit Materi -->
<div x-show="openEditModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[999]">
  <div @click.outside="openEditModal = false" class="bg-white w-full max-w-xl p-6 rounded-xl shadow-lg">
    <h2 class="text-xl font-bold text-blue-900 mb-4">Edit Materi</h2>
    <form :action="`/mentor/materi/${materiToEdit.id}`" method="POST" enctype="multipart/form-data">
      @csrf @method('PUT')
      <input type="text" name="judul" x-model="materiToEdit.judul" class="w-full mb-4 px-4 py-2 border rounded-xl" placeholder="Judul Materi" required>
      <textarea name="deskripsi" x-model="materiToEdit.deskripsi" class="w-full mb-4 px-4 py-2 border rounded-xl h-24 resize-none" placeholder="Deskripsi Materi"></textarea>
      <input type="url" name="google_form_link" x-model="materiToEdit.google_form_link" class="w-full mb-4 px-4 py-2 border rounded-xl" placeholder="Link Google Form">
      <label class="block text-sm mb-2 text-gray-700">Ganti Video (opsional)</label>
      <input type="file" name="video" accept="video/*" class="mb-4">
      <label class="block text-sm mb-2 text-gray-700">Ganti PDF (opsional)</label>
      <input type="file" name="pdf" accept="application/pdf" class="mb-4">
      <div class="flex justify-end gap-2">
        <button type="button" @click="openEditModal = false" class="bg-gray-400 text-white px-4 py-2 rounded-xl text-sm font-semibold shadow">Batal</button>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-xl text-sm font-semibold shadow">Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL: Konfirmasi Hapus -->
<div x-show="openDeleteModal" x-cloak class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-[999]">
  <div @click.outside="openDeleteModal = false" class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center">
    <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Hapus</h2>
    <p class="mb-6 text-gray-700">Yakin ingin menghapus materi <span class="font-semibold" x-text="materiToDelete?.judul"></span>?</p>
    <form method="POST" :action="`/mentor/materi/${materiToDelete.id}`">
      @csrf @method('DELETE')
      <div class="flex justify-center gap-4">
        <button type="button" @click="openDeleteModal = false" class="px-4 py-2 bg-gray-400 text-white rounded-xl text-sm font-semibold shadow">Batal</button>
        <button type="submit" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold shadow">Hapus</button>
      </div>
    </form>
  </div>
</div>

@if (session('success'))
  <div class="fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow z-50" x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
    {{ session('success') }}
  </div>
@endif
@if ($errors->any())
  <div class="fixed top-5 right-5 bg-red-500 text-white px-4 py-2 rounded shadow z-50" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show">
    {{ $errors->first() }}
  </div>
@endif


</body>
</html>
