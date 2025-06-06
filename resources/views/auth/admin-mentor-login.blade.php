  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - SwiftLearning</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #d8ecff;
      background-image: url('/images/bg-pattern.svg');
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <div class="bg-white rounded-[45px] w-full max-w-sm px-8 py-10 shadow-xl">
    <div class="mb-6">
      <button onclick="history.back()" class="text-gray-500 text-xl">
  &larr;
</button>
    </div>

    <h2 class="text-2xl font-bold text-center text-gray-900">Login</h2>
    <p class="text-sm text-center text-gray-500 mb-8">Selamat datang di <span class="font-semibold text-[#5C5CFF]">SwiftLearning</span></p>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email -->
      <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
      <input id="email" type="email" name="email" required autofocus
        class="w-full mt-1 mb-4 px-4 py-3 rounded-full border border-gray-300 shadow-sm placeholder-gray-400 focus:outline-none" placeholder="Email address" />

      <!-- Password -->
      <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
      <input id="password" type="password" name="password" required
        class="w-full mt-1 mb-4 px-4 py-3 rounded-full border border-gray-300 shadow-sm placeholder-gray-400 focus:outline-none" placeholder="Password" />

      <!-- Role -->
      <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
      <select id="role" name="role" required
        class="w-full mt-1 mb-6 px-4 py-3 rounded-full border border-gray-300 shadow-sm text-gray-500">
        <option value="" disabled selected>Role</option>
        <option value="mentor">Mentor</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit"
  class="w-full py-3 rounded-full text-white font-semibold shadow-md hover:bg-[#4A4ADE] transition duration-200"
  style="background-color: #5C5CFF;">
  Masuk
</button>
    </form>
  </div>
</body>
</html>
