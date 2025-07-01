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
  <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body style="background-image: url('{{ asset('images/bg-mentor.png') }}');" class="bg-cover bg-center min-h-screen p-8 relative overflow-auto">


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

  <div class="mt-10 flex flex-col lg:flex-row gap-8">
    <!-- Form Upload Materi -->
    <div class="bg-white rounded-2xl shadow p-6 w-full lg:w-1/3">
      <h3 class="text-xl font-semibold text-[#0B0B7C] mb-4">Upload Materi</h3>
      <form action="{{ route('mentor.materi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <input type="hidden" name="kursus_id" value="{{ $kursus->id }}">

         <div class="flex gap-4 mb-4">
          <input type="text" name="judul" placeholder="Judul Materi"
                 class="flex-1 p-3 rounded-lg bg-gray-100 placeholder-gray-400" />

        </div>
        

        <textarea name="deskripsi" rows="4" placeholder="Deskripsi Materi"
                  class="w-full p-3 rounded-lg bg-gray-100 placeholder-gray-400 mb-4"></textarea>

        <input type="text" name="google_form_link" placeholder="Link Google Form"
               class="w-full p-3 rounded-lg bg-gray-100 placeholder-gray-400 mb-4"/>

 <div x-data="{ video: '', pdf: '' }" class="flex gap-4 mb-4">

  <!-- Upload Video -->
 <div class="flex-1">
  <label class="block w-full p-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
    <span class="text-gray-600 font-medium">Upload Video</span>
    <input type="file" name="video" accept="video/*" class="hidden"
           @change="video = $event.target.files[0]?.name" />
  </label>

  <div x-show="video" class="mt-1 overflow-hidden">
    <p class="text-sm text-green-600 truncate max-w-[120px]" :title="video">
      <template x-if="video">
        <span x-text="video.split('.')[0].split(/[\s_-]/)[0] + '...'"></span>
      </template>
    </p>
  </div>
</div>


  <!-- Upload PDF -->
  <div>
    <label class="block px-4 py-3 bg-gray-100 rounded-lg border border-gray-200 text-center cursor-pointer">
      <span class="text-gray-600 font-medium">Upload PDF</span>
      <input type="file" name="pdf" accept="application/pdf" class="hidden"
             @change="pdf = $event.target.files[0]?.name" />
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


        <button type="submit"
                class="flex items-center justify-center gap-2 w-full bg-blue-600 hover:bg-blue-700 text-white rounded-lg py-2 font-semibold">
          Upload
          <svg xmlns="http://www.w3.org/2000/svg"
               class="h-5 w-5" fill="none" viewBox="0 0 24 24"
               stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1M12 12v9m0 0l-3-3m3 3l3-3"/>
          </svg>
        </button>
      </form>
    </div>

    <!-- Daftar Materi -->
    <div class="flex-1 space-y-3">
      @forelse ($materis as $materi)
        <div class="bg-white rounded-2xl shadow flex items-center justify-between p-4">
          <div class="flex items-center space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 16h8M8 12h8m-6-4h6"/>
            </svg>
            <span class="text-gray-800">{{ $materi->judul }}</span>
          </div>
          <div class="flex gap-2">
            <a href="{{ route('mentor.edit.materi', $materi->id) }}"
               class="px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-full text-sm font-semibold">Edit</a>
            <form method="POST" action="{{ route('mentor.delete.materi', $materi->id) }}">
              @csrf @method('DELETE')
              <button type="submit"
                      class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-full text-sm font-semibold">Hapus</button>
            </form>
          </div>
        </div>
      @empty
        <p class="text-gray-500">Belum ada materi.</p>
      @endforelse

      <div class="flex justify-end mt-4">
        <a href="{{ route('mentor.kursus.history') }}"
           class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
          Selesai
        </a>
      </div>
    </div>
  </div>

</body>
</html>