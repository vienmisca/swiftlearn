<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>

<div class="bg-blue-100 min-h-screen py-10 px-8">

    {{-- Navbar --}}
    <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
        <div class="flex items-center space-x-8 text-white">
            <img src="/images/logo.png" alt="Logo" class="h-8">
            <a href="#" class="hover:underline">Home</a>
            <a href="#" class="hover:underline underline">Kursus</a>
            <a href="#" class="hover:underline">Kursus Saya</a>
        </div>
        <div class="flex items-center space-x-3">
            <span class="text-white">
                {{ auth()->user()->name ?? 'Guest' }}
            </span>
            <img src="/images/avatar.png" alt="Avatar" class="h-10 w-10 rounded-full">
        </div>
    </div>

    {{-- Search --}}
    <div class="flex justify-end mt-10 mb-6">
        <input type="text" placeholder="Search"
            class="rounded-full px-6 py-2 border border-gray-300 w-72 shadow focus:outline-none focus:ring focus:border-blue-400" />
    </div>

    {{-- Kategori --}}
    <div class="flex items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 mr-4">Kategori</h2>
        <div class="flex-1 h-1 bg-blue-900"></div>
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
