<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kursus - SwiftLearning</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body style="background-image: url('{{ asset('images/page.png') }}');" class="bg-cover bg-center min-h-screen">

<div class="py-10 px-8">

  {{-- Navbar --}}
  <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
    <div class="flex items-center space-x-8 text-white">
      <img src="/images/logo.png" alt="Logo" class="h-8">
      <a href="{{ route('home') }}" class="hover:underline">Home</a>
      <a href="{{ route('kursus.index') }}" class="font-semibold hover:underline">Kursus</a>
      <a href="{{ route('kursus-saya') }}" class="hover:underline">Kursus Saya</a>
    </div>
    <div class="flex items-center space-x-3">
      <span class="text-white">{{ auth()->user()->name ?? 'Pelajar' }}</span>
      <a href="{{ route('profile') }}">
        <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '/images/avatar.png' }}" class="h-10 w-10 rounded-full hover:scale-105 transition-transform">
      </a>
    </div>
  </div>

  {{-- Kategori & Search --}}
  <div class="flex items-center justify-between mt-10 mb-6">
    <div class="flex items-center gap-4 flex-1">
      <h2 class="text-2xl sm:text-3xl font-bold text-navy whitespace-nowrap">Kategori</h2>
      <div class="h-1 bg-navy rounded-full w-full"></div>
    </div>
    <input type="text" placeholder="Search" class="ml-6 rounded-full px-6 py-2 border border-gray-300 w-72 shadow focus:outline-none focus:ring focus:border-blue-400"/>
  </div>

  {{-- Kategori Card --}}
  <div class="flex flex-wrap gap-4 mb-10">
    @foreach($categories as $cat)
      <div class="rounded-xl px-5 py-3 text-white shadow-md {{ $cat->color ?? 'bg-blue-400' }}">
        <div class="flex items-center justify-between">
          <span class="font-semibold flex items-center gap-2">{{ $cat->emoji ?? '' }} {{ $cat->name }}</span>
          <span class="text-sm">{{ $cat->courses_count }}</span>
        </div>
      </div>
    @endforeach
  </div>

  {{-- Kursus per Kategori --}}
  @foreach($groupedCourses as $kategori => $courses)
    <div class="mb-12">
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-xl font-bold text-gray-800">{{ $kategori }}</h3>
        <div class="flex gap-2">
          <button class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-700 transition">&lt;</button>
          <button class="bg-blue-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-blue-700 transition">&gt;</button>
        </div>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($courses as $course)
          <a href="{{ route('kursus.show', $course->id) }}"
             class="block bg-white rounded-2xl shadow-md hover:shadow-xl hover:scale-[1.02] hover:-translate-y-1 transition duration-300 overflow-hidden">
            <img src="{{ asset('storage/' . $course->sampul_kursus) }}"
                 class="w-full h-40 object-cover"
                 alt="Sampul Kursus">
            <div class="p-4">
              <h4 class="font-semibold text-navy text-base mb-2 leading-snug">{{ $course->nama_kursus }}</h4>
              <p class="text-sm text-gray-600">
                <span class="font-semibold text-gray-400">Kursus :</span>
                <span class="font-bold text-gray-800">{{ $course->kategori }}</span>
              </p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  @endforeach

</div>
</body>
</html>
