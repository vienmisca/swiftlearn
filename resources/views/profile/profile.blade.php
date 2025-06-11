<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profil Saya - SwiftLearning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-blue-100">

    <!-- Profil Header -->
    <div class="bg-gradient-to-r from-blue-700 to-blue-500 p-8 relative text-white rounded-b-3xl shadow-lg overflow-hidden">
        <!-- Background dekorasi bisa pakai pseudo element / gambar di CSS -->
        <div class="flex items-center space-x-6 relative z-10">
            <img src="/images/avatar.png" alt="Avatar" class="h-24 w-24 rounded-full border-4 border-white shadow-md" />
            <div>
                <h2 class="text-2xl font-bold">{{ auth()->user()->name ?? 'Guest' }}</h2>
                <p class="text-white/80">Joeskoeofc@gmail.com</p>
                <div class="flex items-center space-x-2 mt-1">
                    <span class="text-yellow-400 font-bold">Lvl 3</span>
                    <span>🌼 🌼</span>
                </div>
                <p class="mt-3 text-sm leading-relaxed max-w-xl">
                    Lorem ipsum dolor bla bla bla bla bla bla <br>
                    blablablablablablablablablablablablablablablabl blablabl blablablablablabl <br>
                    ablabalbalb ablab lab lb ablab lablb albl al (biodata)
                </p>
            </div>
            <button class="absolute top-8 right-8 bg-white text-blue-700 font-semibold px-5 py-2 rounded-full shadow hover:bg-blue-100 transition">
                Edit Profile
            </button>
        </div>
    </div>

    <!-- Konten Profil -->
    <div class="max-w-5xl mx-auto py-12 px-6">

        <!-- Materi yang diminati -->
        <div class="mb-10 text-center">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Materi Yang di minati :</h3>
            <div class="flex justify-center gap-4 flex-wrap">
                <div class="bg-white px-6 py-2 rounded-xl shadow font-semibold text-blue-700">Fisika</div>
                <div class="bg-white px-6 py-2 rounded-xl shadow font-semibold text-blue-700">IPA</div>
                <div class="bg-white px-6 py-2 rounded-xl shadow font-semibold text-blue-700">Informatika</div>
            </div>
        </div>

        <!-- Statistik -->
        <div class="text-center mb-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Total keseluruhan :</h3>
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
