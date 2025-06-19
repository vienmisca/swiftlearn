<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-blue-100 min-h-screen py-10 px-8">
        <!-- Navbar -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
<div class="flex items-center space-x-8 text-white text-base"> <!-- tambah ukuran font -->
    <img src="/images/logo.png" alt="Logo" class="h-8">
    <a href="#" class="hover:underline font-semibold">Home</a>
    <a href="#" class="hover:underline font-semibold">Kursus</a>
    <a href="#" class="hover:underline font-semibold underline">Kursus Saya</a>
</div>

            <div class="flex items-center space-x-3">
                <span class="text-white">
                    {{ auth()->user()->name ?? 'Guest' }}
                </span>
                <img src="/images/avatar.png" alt="Avatar" class="h-10 w-10 rounded-full">
            </div>
        </div>

        <!-- Header -->
        <h2 class="text-2xl font-bold mt-10 mb-6 text-gray-800">Kursus Sebelumnya</h2>

        <!-- Grid of Kursus History -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($historyCourses as $course)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-lg transition">
                <img src="{{ $course->thumbnail_url ?? 'https://via.placeholder.com/300x200' }}" 
                    class="w-full h-40 object-cover" />
                <div class="p-4">
                    <h4 class="font-semibold mb-1 text-gray-800">{{ $course->title }}</h4>
                    <p class="text-sm text-gray-500">Materi: {{ $course->category_name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
