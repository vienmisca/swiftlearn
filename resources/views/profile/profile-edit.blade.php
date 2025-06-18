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
    <div class="absolute top-4 left-4">
      <a href="#" class="text-3xl text-white">&larr;</a>
    </div>

    <!-- Avatar -->
    <img src="/images/avatar.png" alt="Avatar" class="w-24 h-24 rounded-full border-4 border-green-400 mb-4">
    
    <div class="text-center">
      <h2 class="text-xl font-semibold">Joe Skoe</h2>
      <p class="text-sm opacity-80">Joeskoeofc@gmail.com</p>
    </div>

    <!-- Logout -->
    <a href="#" class="absolute bottom-10 left-10 px-4 py-2 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white transition bg-white">
      Keluar
    </a>
  </div>

  <!-- Form Content -->
  <div class="w-3/4 px-16 py-10 relative">
    <!-- Stars Background -->
    <div class="absolute top-0 right-0">
      <img src="/images/stars.svg" alt="Star Decoration" class="w-52 opacity-30">
    </div>

    <h1 class="text-3xl font-bold text-blue-900 mb-6">Ubah Profile</h1>

    <form action="#" method="POST" enctype="multipart/form-data">
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
            <input type="text" name="name" class="w-full p-3 rounded-md border" placeholder="Nama">
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
              <select name="interests[]" class="px-4 py-2 bg-white rounded-md shadow border">
                <option>Fisika</option>
              </select>
              <select name="interests[]" class="px-4 py-2 bg-white rounded-md shadow border">
                <option>IPA</option>
              </select>
              <select name="interests[]" class="px-4 py-2 bg-white rounded-md shadow border">
                <option>Informatika</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Kanan -->
        <div class="w-1/2 space-y-4">
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Password</label>
            <input type="password" name="old_password" class="w-full p-3 rounded-md border" placeholder="Password Lama">
          </div>
          <div>
            <label class="block text-blue-900 font-semibold mb-1">New Password</label>
            <input type="password" name="new_password" class="w-full p-3 rounded-md border" placeholder="Password Baru">
          </div>
          <div>
            <label class="block text-blue-900 font-semibold mb-1">Confirm Password</label>
            <input type="password" name="confirm_password" class="w-full p-3 rounded-md border" placeholder="Konfirmasi Password">
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
