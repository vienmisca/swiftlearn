<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kursus Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js" rel="stylesheet">
</head>
<body class="bg-blue-100 min-h-screen p-6">

    <!-- Header Menu -->
    <div class="flex justify-end mb-6">
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
            <a href="{{ route('mentor.dashboard') }}" class="text-white font-medium hover:underline">Dashboard</a>
            <a href="#" class="text-white font-medium hover:underline">Kursus</a>
            <img src="https://api.dicebear.com/7.x/bottts/svg?seed=vien" alt="Profile" class="w-12 h-12 rounded-full border-4 border-white">
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-3xl shadow-md p-8 max-w-6xl mx-auto">
        <h1 class="text-3xl font-extrabold text-blue-900 mb-8">Kursus Saya</h1>

        @php
        $courses = [
            ['title' => 'Kelas Gravitasi : belajar Tentang Gravitasi', 'category' => 'Fisika', 'date' => '07/05/2025'],
            ['title' => 'Hukum kekekalan', 'category' => 'Fisika', 'date' => '07/05/2025'],
            ['title' => 'Hukum newton', 'category' => 'Fisika', 'date' => '07/05/2025'],
            ['title' => 'Getaran dan Gelombang', 'category' => 'Fisika', 'date' => '07/05/2025'],
            ['title' => 'Fluida', 'category' => 'Fisika', 'date' => '07/05/2025'],
            ['title' => 'Fluida', 'category' => 'Fisika', 'date' => '07/05/2025'],
        ];
        @endphp

        <div class="space-y-4">
            @foreach($courses as $course)
            <div class="flex justify-between items-center bg-gray-100 rounded-2xl px-6 py-5 shadow-sm">
                <div>
                    <h2 class="font-bold text-blue-900">{{ $course['title'] }}</h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Materi : <span class="text-blue-900 font-semibold">{{ $course['category'] }}</span>
                    </p>
                </div>
                <div class="flex items-center space-x-4">
                    <p class="text-sm text-gray-600">
                        Date Uploaded : <span class="font-semibold">{{ $course['date'] }}</span>
                    </p>
                    <i data-lucide="more-vertical" class="w-5 h-5 text-gray-500 cursor-pointer"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
