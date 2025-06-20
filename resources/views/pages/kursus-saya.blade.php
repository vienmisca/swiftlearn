<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursus Saya - SwiftLearning</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="bg-blue-100 min-h-screen py-10 px-8">
        <!-- Navbar -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
            <div class="flex items-center space-x-8 text-white">
                <img src="https://media.discordapp.net/attachments/755299102148919317/1384821190991806534/Logo_SL.png?ex=6853d2bc&is=6852813c&hm=af2cb050048dd07b8cd18a50ce813fff121ea9163d8ce607270588a5f7f0f5ad&=&format=webp&quality=lossless&width=930&height=930" alt="Logo" class="h-8">
                <a href="#" class=" hover:underline">Home</a>
                <a href="#" class=" hover:underline">Kursus</a>
                <a href="#" class=" font-semibold hover:underline">Kursus Saya</a>
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


        <!-- Header -->
        <div class="flex items-center gap-4 mt-10 mb-6">
        <h2 class="text-2xl sm:text-3xl font-poppins font-bold text-navy whitespace-nowrap">
             Kursus Sebelumnya
        </h2>
        <div class="flex-1 h-1 bg-navy  rounded-full"></div>
        </div>

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
