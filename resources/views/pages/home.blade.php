<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body class="bg-cover bg-center h-screen w-screen overflow-hidden flex" 
      style="background-image: url({{ asset('images/page.png') }});">

    <div class=" min-h-screen py-10 px-8">
        <!-- Navbar -->
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
            <div class="flex items-center space-x-8 text-white">
                <img src="https://media.discordapp.net/attachments/755299102148919317/1384821190991806534/Logo_SL.png?ex=6859c17c&is=68586ffc&hm=cd526f9f63c9da0af4f8fbc246789893e4ccf8683b9298a9f02836564d9d9f7a&=&format=webp&quality=lossless&width=930&height=930" alt="Logo" class="h-8">
                <a href="{{ route('home') }}" class="font-semibold hover:underline">Home</a>
                <a href="{{ route('kursus.index') }}" class="hover:underline">Kursus</a>
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

        <!-- Main content -->
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-10">
            <!-- Left Column -->
            <div class="lg:col-span-3 space-y-6">
                <!-- Greeting Card -->  
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-3xl font-dm font-bold text-navy tracking-tighter">
                        Halo {{ auth()->user()->name ?? 'Pelajar' }}!<br>
                        Tertarik <span class="underline decoration-purple-500">Belajar</span> apa hari ini?
                    </h2>
                    <p class=" font-dm font-semibold text-gray-500 mt-2">Telusuri lebih banyak materi yang kamu sukai!</p>
                    <button class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">Cari Materi</button>
                </div>

                <!-- Poster -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- kursus yang di ikuti -->
                    <div class="bg-white rounded-2xl shadow p-4 text-navy ">
                        <h3 class="text-xl font-dm font-bold mb-3">Kursus yang di ikuti</h3>
                        <ul class="space-y-3">
                            <li class="border rounded-xl p-2">
                                <p class="font-semibold">Gravitasi</p>
                                <p class="text-sm text-gray-500">Fisika</p>
                            </li>
                            <li class="border rounded-xl p-2">
                                <p class="font-semibold">Gravitasi</p>
                                <p class="text-sm text-gray-500">Fisika</p>
                            </li>
                            <li class="border rounded-xl p-2">
                                <p class="font-semibold">Gravitasi</p>
                                <p class="text-sm text-gray-500">Fisika</p>
                            </li>
                        </ul>
                    </div>
                    <!-- Banner -->
                    <div class="relative">
                        <img src="{{ asset('images/swiftlearn-poster.png') }}" alt="Belajar" class="rounded-2xl shadow object-cover w-full h-full">
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kursus Hari Ini -->
            <div class="bg-white rounded-2xl shadow p-6 font-dm font-semibold">
                <h3 class="text-2xl font-bold mb-4 text-navy">Kursus Hari Ini</h3>
                <ul class="space-y-4">
                    <li class="border rounded-xl p-3">
                        <p class="font-semibold">Kelas Gravitasi: Belajar Tentang Gravitasi</p>
                        <p class="text-sm text-gray-500">Kursus: Fisika</p>
                    </li>
                    <li class="border rounded-xl p-3">
                        <p class="font-semibold">Hukum Kekekalan</p>
                        <p class="text-sm text-gray-500">Kursus: Fisika</p>
                    </li>
                    <li class="border rounded-xl p-3">
                        <p class="font-semibold">Hukum Newton</p>
                        <p class="text-sm text-gray-500">Kursus: Fisika</p>
                    </li>
                    <li class="border rounded-xl p-3">
                        <p class="font-semibold">Gerak Parabola</p>
                        <p class="text-sm text-gray-500">Kursus: Fisika</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>