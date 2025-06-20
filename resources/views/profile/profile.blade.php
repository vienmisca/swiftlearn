<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Saya - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-100">

    <!-- Profil Header -->
    <div class="relative h-[280px] bg-gradient-to-r from-blue-700 to-blue-500 text-white p-10 overflow-hidden">


    <!-- Decorative SVG (optional) -->
    <div class="absolute right-0 top-0 opacity-40 z-0">
        <!-- Add decorative SVG shapes if needed -->
    </div>

    <!-- Back Button -->
    <a href="{{ route('home') }}" class="absolute top-6 left-6 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white hover:text-yellow-300 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <!-- Profile Content -->
    <div class="flex mt-10 pl-4 items-start gap-6 relative z-10">

        <!-- Avatar -->
        <img src="{{ $user->photo ? asset('storage/' . $user->photo) : '/images/avatar.png' }}" class="h-24 w-24 rounded-full border-4 border-white shadow-lg" />


        <!-- Info -->
        <div>
            <h2 class="text-3xl font-dm font-bold">{{ auth()->user()->name ?? 'Guest' }}</h2>
            <p class="text-white/80 text-sm">{{ auth()->user()->email ?? 'email@example.com' }}</p>
            <div class="flex items-center space-x-2 mt-1">
                <span class="text-yellow-400 font-bold text-lg">Lvl 3</span>
                <span class="text-xl">🌼 🌼</span>
            </div>
            <p class="mt-4 text-dm leading-relaxed max-w-xl">{{ auth()->user()->about ?? 'Belum ada deskripsi' }}</p>
        </div>

        <!-- Edit Profile Button -->
<div class="ml-auto">
    <a href="{{ route('profile.edit') }}" class="bg-white text-blue-700 font-semibold px-6 py-2 rounded-full shadow hover:bg-blue-100 transition">
        Edit Profile
    </a>
</div>

    </div>
</div>


<!-- Konten Profil -->
    <div class="max-w-5xl mx-auto py-12 px-6">

        <!-- Materi yang diminati -->
        <div class="mb-10 text-center"">
    <h3 class="text-lg font-dm font-semibold mb-4 text-navy">Materi yang diminati:</h3>
    <div class="flex justify-center gap-4 flex-wrap">
        @forelse ((array) $user->interests as $materi)
    <span class="bg-white px-6 py-2 rounded-xl shadow font-semibold text-blue-700">{{ $materi }}</span>
@empty
    <span class="text-gray-500 italic">Tidak ada materi yang dipilih</span>
@endforelse
    </div>
</div>  


        <!-- Statistik -->
        <div class="text-center mb-6">
            <h3 class="text-lg font-dm font-semibold mb-4 text-navy">Total keseluruhan :</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow text-blue-900 flex flex-col items-center justify-center">
                    <p class="font-semibold mb-2">Join Materi</p>
                    <p class="text-4xl font-bold">13</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow text-blue-900 flex flex-col items-center justify-center">
                    <p class="font-semibold mb-2">Materi Selesai</p>
                    <p class="text-4xl font-bold">5</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow text-blue-900 flex flex-col items-center justify-center">
                    <p class="font-semibold mb-2">Sertifikat</p>
                    <p class="text-4xl font-bold">5</p>
                </div>
            </div>
        </div>

    </div>

</body>
</html>
