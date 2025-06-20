<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SwiftLearning - Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>
<body class="bg-gradient-to-r from-indigo-500 to-blue-500 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-3xl shadow-xl text-center">
        <h1 class="text-4xl font-bold mb-6 text-gray-800">Welcome to SwiftLearning</h1>
        <p class="text-gray-500 mb-8">Belajar jadi lebih mudah dan menyenangkan!</p>

        <div class="flex flex-col space-y-4">
            <a href="{{ route('login') }}" class="px-6 py-3 bg-indigo-500 text-white font-semibold rounded-full hover:bg-indigo-600 transition">Login</a>
            <a href="{{ route('register') }}" class="px-6 py-3 bg-purple-500 text-white font-semibold rounded-full hover:bg-purple-600 transition">Register</a>
        </div>
    </div>

</body>
</html>
