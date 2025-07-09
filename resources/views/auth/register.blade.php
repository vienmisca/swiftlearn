<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/swiftbird.png') }}">
</head>
<body   style="background-image: url('{{ asset('images/logres-background.png') }}');" 
        class="bg-cover bg-center h-screen w-screen overflow-hidden flex">

  <div class="w-[420px] h-full bg-white rounded-r-[45px] shadow-xl px-10 py-10 flex flex-col justify-center">
    <div>
      <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900">Daftar</h1>
        <p class="text-sm text-gray-500">Selamat datang di <span class="font-semibold text-indigo-600">SwiftLearning</span></p>
      </div>
@if ($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

      <form method="POST" action="/register">
    @csrf
        <label for="name" class="block text-sm mb-1 text-gray-700">Name</label>
        <input type="text" name="name" id="name" placeholder="Name"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-4 focus:outline-none" required>

        <label for="email" class="block text-sm mb-1 text-gray-700">Email</label>
        <input type="email" name="email" id="email" placeholder="Email"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-4 focus:outline-none" required>

        <label for="dob" class="block text-sm mb-1 text-gray-700">Date of birth</label>
        <input type="date" name="dob" id="dob" placeholder="DD/MM/YY"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-4 focus:outline-none" required>

        <label for="password" class="block text-sm mb-1 text-gray-700">Password</label>
        <input type="password" name="password" id="password" placeholder="Password"
          class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-6 focus:outline-none" required>

        <label for="password_confirmation" class="block text-sm mb-1 text-gray-700">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
        class="w-full px-4 py-3 rounded-full border border-gray-200 shadow mb-6 focus:outline-none" required>

        <button type="submit"
          class="w-full py-3 rounded-full font-semibold bg-gradient-to-r from-indigo-500 to-blue-500 text-white mb-4">
          Daftar
        </button>

        <a href="{{ route('login') }}"
          class="w-full block text-center py-3 rounded-full font-semibold bg-gradient-to-r from-purple-400 to-indigo-600 text-white">
          Login
        </a>
      </form>
    </div>
  </div>

  
  
</body>
</html>
