<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kursus - SwiftLearning</title>
  @viteReactRefresh
  @vite(['resources/css/app.css', 'resources/js/app.jsx'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
  </style>
</head>
<body style="background-image: url('{{ asset('images/page.png') }}');" class="bg-cover bg-center bg-fixed min-h-screen overflow-x-hidden">

<div class="py-10 px-8">

  <!-- Navbar -->
  <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
            <div class="flex items-center space-x-8 text-white">
                <img src="/images/swiftbird.png" alt="Logo" class="h-10">                <a href="{{ route('home') }}" class="hover:underline">Home</a>
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

  <!-- Kategori & Search -->
  {{-- <div class="flex items-center justify-between mt-10 mb-6">
    <div class="flex items-center gap-4 flex-1">
      <h2 class="text-2xl sm:text-3xl font-bold text-navy whitespace-nowrap">Kategori</h2>
      <div class="h-1 bg-navy rounded-full w-full"></div>
    </div>
    <input id="searchInput" type="text" placeholder="Search" class="ml-6 rounded-full px-6 py-2 border border-gray-300 w-72 shadow focus:outline-none focus:ring focus:border-blue-400"/>
  </div> --}}

  <!-- React Mount Point -->
  <div id="kursus-page" class="mt-10 font-poppins" data-grouped-courses='@json($groupedCourses)'></div>

</div>

</body>
</html>
