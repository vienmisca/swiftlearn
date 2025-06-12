<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen w-screen overflow-hidden flex">

  <!-- Sisi Kiri (Login Form) -->
  <div class="w-[420px] h-full bg-white rounded-r-[45px] shadow-xl px-10 py-10 flex flex-col justify-center">
    <div>
      <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900">Login</h1>
        <p class="text-sm text-gray-500">Selamat datang di <span class="font-semibold text-indigo-600">SwiftLearning</span></p>
      </div>

      <form method="POST" action="{{ url('/login') }}">


        @csrf

        @if(session('error'))
          <p class="text-red-500 text-sm mb-4">{{ session('error') }}</p>
        @endif

        <label for="email" class="block text-sm mb-1 text-gray-700">Email</label>
        <input type="email" name="email" id="email" placeholder="Email"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-4 focus:outline-none" required>

        <label for="password" class="block text-sm mb-1 text-gray-700">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-6 focus:outline-none" required>

        <button type="submit"
          class="w-full py-3 rounded-full font-semibold bg-gradient-to-r from-indigo-500 to-blue-500 text-white mb-4">
          Masuk
        </button>

        <a href="{{ route('register') }}"
          class="w-full block text-center py-3 rounded-full font-semibold bg-gradient-to-r from-purple-400 to-indigo-600 text-white">
          Daftar
        </a>
      </form>

      <div class="text-center mt-6">
        <a href="{{ route('adminmentor.login') }}" class="text-sm text-gray-500 hover:text-indigo-600">Login sebagai Mentor/Admin</a>
      </div>
    </div>
  </div>

  <!-- Sisi Kanan (Gambar Background) -->
  <div class="flex-1 h-full">
    <img src="#nantibuatbackground" alt="swiftlearning" class="w-full h-full object-cover"/>
  </div>

</body>
</html>
