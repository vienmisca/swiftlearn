<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kursus Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="bg-blue-100 min-h-screen p-6">

    <!-- Header Menu -->
    <div class="flex justify-end mb-6">
        <div class="bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full flex items-center space-x-6 shadow-lg">
            <a href="{{ route('dashboard.mentor') }}" class="text-white font-medium hover:underline">Dashboard</a>
            <a href="#" class="text-white font-medium hover:underline">Kursus</a>
            <div x-data="{ open: false }" class="relative">
    <button @click="open = !open">
        <img src="https://api.dicebear.com/7.x/bottts/svg?seed=vien" alt="Profile"
             class="w-12 h-12 rounded-full border-4 border-white cursor-pointer">
    </button>

    <!-- Dropdown -->
    <div x-show="open" @click.outside="open = false"
         class="absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg p-4 z-50">
        <h2 class="font-bold text-gray-800 mb-3">
    {{ Auth::user()->name }}
</h2>


        <form method="POST" action="{{ route('adminmentor.logout') }}">
            @csrf
            <button type="submit"
                class="text-red-600 flex items-center space-x-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5m0 0a2 2 0 011.85 1.23" />
                </svg>
                <span>Keluar</span>
            </button>
        </form>
    </div>
</div>

        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-3xl shadow-md p-8 max-w-6xl mx-auto">
        <h1 class="text-3xl font-dm font-extrabold text-navy mb-8">Kursus Saya</h1>

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
