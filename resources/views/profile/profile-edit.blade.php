<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen bg-blue-100 font-sans">

  <!-- Sidebar -->
  <div class="w-1/4 bg-gradient-to-b from-blue-800 to-blue-500 text-white flex flex-col items-center py-10 relative">
    <!-- Back Icon -->
    <a href="{{ route('profile') }}" class="absolute top-6 left-6 z-10">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white hover:text-yellow-300 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </a>

    <!-- Avatar -->
    <img src="{{ $user->photo ? asset('storage/' . $user->photo) : '/images/avatar.png' }}" class="h-24 w-24 rounded-full border-4 border-white shadow-lg"/>
    
    <div class="text-center">
      <h2 class="text-xl font-semibold">{{ auth()->user()->name ?? 'Guest' }}</h2>
      <p class="text-white/80 text-sm">{{ auth()->user()->email ?? 'email@example.com' }}</p>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" class="absolute bottom-10 left-10">
    @csrf
    <button type="submit" class="px-4 py-2 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white transition bg-white">
        Keluar
    </button>
</form>

  </div>

  <!-- Form Content -->
  <div class="w-3/4 px-16 py-10 relative">
    <!-- Stars Background -->
    <div class="absolute top-0 right-0">
      <img src="/images/stars.svg" alt="Star Decoration" class="w-52 opacity-30">
    </div>

    <h1 class="text-3xl font-bold text-blue-900 mb-6">Ubah Profile</h1>
@if (session('success'))
  <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
@endif

@if ($errors->any())
  <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">

      @csrf

      <!-- Upload Photo -->
      <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-blue-900">Foto Profil</label>
        <input type="file" name="photo" class="block w-1/2 p-2 bg-white rounded-md shadow border border-gray-300">
      </div>

      <div class="flex space-x-10">
        <!-- Kiri -->
        <div class="w-1/2 space-y-4">
          <!-- Nama -->
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-3 rounded-md border" placeholder="Nama">
          </div>

          <!-- About -->
          <div>
            <label class="block text-blue-900 font-semibold mb-1">About</label>
            <textarea name="about" rows="4" class="w-full p-3 rounded-md border" placeholder="Deskripsikan dirimu..."></textarea>
          </div>

          <!-- Materi -->
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Materi Yang di Minati</label>
            <div class="flex flex-wrap gap-4">
              @php
        $options = ['IPA', 'Matematika', 'Bahasa', 'Kimia', 'Fisika', 'Informatika'];
        $selected = old('interests', $user->interests ?? []);
    @endphp

    @for ($i = 0; $i < 3; $i++)
      <select name="interests[]" class="px-4 py-2 bg-white rounded-md shadow border w-full">
        <option value="" disabled {{ !isset($selected[$i]) ? 'selected' : '' }}>Pilih Materi</option>
        @foreach ($options as $option)
          <option value="{{ $option }}" {{ ($selected[$i] ?? '') === $option ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
      </select>
    @endfor
  </div>
</div>
        </div>

        <!-- Kanan -->
        <div class="w-1/2 space-y-4">
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Password</label>
            <input type="password" name="old_password" class="w-full p-3 rounded-md border" placeholder="Current password">
          </div>
          <div>
            <label class="block text-blue-900 font-semibold mb-1">New Password</label>
            <input type="password" name="new_password" class="w-full p-3 rounded-md border" placeholder="New password">
          </div>
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Confirm Password</label>
            <input type="password" name="new_password_confirmation" class="w-full p-3 rounded-md border" placeholder="Confirm password">
          </div>
        </div>
      </div>

      <!-- Save Button -->
      <div class="mt-10">
        <button type="submit" class="bg-blue-800 hover:bg-blue-900 text-white px-6 py-3 rounded-md shadow">Save</button>
      </div>
    </form>
  </div>
</body>
</html>
