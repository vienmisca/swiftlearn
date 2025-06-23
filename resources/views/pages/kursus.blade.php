<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    
</head>
<body>

<div class="bg-blue-100 min-h-screen py-10 px-8">

    {{-- Navbar --}}
     <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
            <div class="flex items-center space-x-8 text-white">
                <img src="https://media.discordapp.net/attachments/755299102148919317/1384821190991806534/Logo_SL.png?ex=6859c17c&is=68586ffc&hm=cd526f9f63c9da0af4f8fbc246789893e4ccf8683b9298a9f02836564d9d9f7a&=&format=webp&quality=lossless&width=930&height=930" alt="Logo" class="h-8">
                <a href="{{ route('home') }}" class=" hover:underline">Home</a>
                <a href="{{ route('kursus.index') }}" class="font-semibold hover:underline">Kursus</a>
                <a href="{{ route('kursus-saya') }}" class="hover:underline">Kursus Saya</a>
            </div>
            <div class="flex items-center space-x-3">
                <span class="text-white">
                    {{ auth()->user()->name ?? 'Pelajar' }}
                </span>
                <a href="{{ route('profile') }}">
                <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '/images/avatar.png' }}" class="h-10 w-10 rounded-full hover:scale-105 transition-transform">
                </a>
            </div>
        </div>


   <div class="flex items-center justify-between mt-10 mb-6">
  <!-- Kiri: Kategori + Garis -->
  <div class="flex items-center gap-4 flex-1">
    <h2 class="text-2xl sm:text-3xl font-poppins font-bold text-navy whitespace-nowrap">
      Kategori
    </h2>
    <div class="h-1 bg-navy rounded-full w-full"></div>
  </div>

  <!-- Kanan: Search -->
  <input
    type="text"
    placeholder="Search"
    class="ml-6 rounded-full px-6 py-2 border border-gray-300 w-72 shadow focus:outline-none focus:ring focus:border-blue-400"
  />
</div>


    <div class="flex flex-wrap gap-4 mb-10">
        @foreach($categories as $cat)
        <div class="rounded-xl px-5 py-3 text-white shadow-md {{ $cat->color }}">
            <div class="flex items-center justify-between">
                <!-- Kalau ada emoji/icon -->
                <span class="font-semibold flex items-center gap-2">
                    {{ $cat->emoji ?? '' }} {{ $cat->name }}
                </span>
                <span class="text-sm">{{ $cat->courses_count }}</span>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Kursus per kategori --}}
    @foreach($groupedCourses as $kategori => $courses)
    <div class="mb-12">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-800">{{ $kategori }}</h3>
            <div class="flex gap-2">
                <button
                    class="bg-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-indigo-700 transition">&lt;</button>
                <button
                    class="bg-indigo-600 text-white w-8 h-8 rounded-full flex items-center justify-center hover:bg-indigo-700 transition">&gt;</button>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($courses as $course)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ $course->thumbnail_url ?? 'https://via.placeholder.com/300x200' }}"
                    class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h4 class="font-semibold mb-1 text-gray-800">{{ $course->title }}</h4>
                    <p class="text-sm text-gray-500">Kursus: {{ $kategori }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach

</div>

</body>
</html>
