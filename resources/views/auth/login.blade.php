<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body style="background: linear-gradient(to right, #008CFF, #0073D1);" class="h-screen">

  <div class="flex h-screen w-screen">
    
    <div class="w-[420px] h-full bg-white rounded-r-[60px] shadow-xl px-10 py-10 flex flex-col ">
      
      <div>
        <div class="text-center mb-10">
          <h1 class="text-3xl text-dm font-bold text-gray-900 mb-1">Login</h1>
          <p class="text-sm font-normal text-dm text-gray-500">Selamat datang di <span class="font-semibold text-indigo-600">SwiftLearning</span></p>
        </div>

        @csrf

        @if(session('error'))
          <p class="text-red-500 text-dm mb-4">{{ session('error') }}</p>
        @endif

        <label for="email" class="block text-dm mb-1 text-gray-700">Email address</label>
        <input type="email" name="email" id="email"placeholder="Email address"
          class="w-full mb-5 p-3 rounded-full border border-gray-300 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
          required
        >

        <label for="password" class="block text-dm mb-1 text-gray-700">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" class="w-full mb-8 p-3 rounded-full border border-gray-300 shadow-sm focus:outline-none focus:ring focus:ring-indigo-200"
          required
        >

        <button
          type="submit"
          class="w-full py-3 text-white font-medium rounded-full mb-4 bg-gradient-to-r from-indigo-500 to-blue-500 hover:opacity-90 transition"
        >
          Masuk
        </button>

        <a
          href="{{ route('register') }}"
          class="block text-center py-3 text-white font-medium rounded-full bg-gradient-to-r from-purple-500 to-indigo-400 hover:opacity-90 transition"
        >
          Daftar
        </a>
      </div>

      <div class="text-center mt-10">
        <a href="#" class="text-dm text-gray-500 hover:text-indigo-600">Login sebagai Mentor/Admin</a>
      </div>
    </div>

    <div class="flex-1"></div>
  </div>

</body>
</html>
