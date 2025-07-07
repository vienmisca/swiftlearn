<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body 
  class="flex h-screen bg-[url('/images/edit-background.png')] bg-cover bg-center font-sans"
  x-data="{
  showSaveModal: {{ session('interest_error') || $errors->any() ? 'true' : 'false' }},
  hasDuplicate: false,
  interestError: {{ session('interest_error') ? 'true' : 'false' }},
  passwordMismatch: {{ $errors->has('new_password') ? 'true' : 'false' }},
  oldPasswordInvalid: {{ $errors->has('old_password') ? 'true' : 'false' }},
  handleSave() {
    const selects = document.querySelectorAll('select[name=\'interests[]\']');
    const values = Array.from(selects).map(s => s.value).filter(v => v);
    this.hasDuplicate = values.length !== new Set(values).size;
    this.interestError = values.length < 3;
    this.showSaveModal = true;
  },
  confirmSave() {
    if (!this.hasDuplicate && !this.interestError) {
      document.getElementById('profileForm').submit();
    }
  }
}"
>

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
    <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="absolute bottom-10 left-10">
      @csrf
      <button 
        type="button"
        @click="showLogoutModal = true"
        class="px-4 py-2 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white transition bg-white"
      >
        Keluar
      </button>
    </form>
  </div>

  <!-- Form Content -->
  <div class="w-3/4 px-16 py-10 relative">
    <h1 class="text-4xl font-dm font-extrabold text-blue-900 tracking-tighter mb-6">Ubah Profile</h1>

    {{-- @if (session('success'))
      <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
    @endif --}}

    {{-- @if ($errors->any())
      <div class="bg-red-100 font-dm text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif --}}

    <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <!-- Upload Photo -->
      <div class="mb-6">
        <label class="block mb-2 font-dm font-medium text-blue-900">Foto Profil</label>
        <input type="file" name="photo" class="block w-1/2 p-2 bg-white rounded-md shadow border border-gray-300">
      </div>

      <div class="flex space-x-10">
        <!-- Left Column -->
        <div class="w-1/2 space-y-4">
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">Nama</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-3 rounded-md border" placeholder="Nama">
          </div>
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">About</label>
            <textarea name="about" rows="4" class="w-full p-3 rounded-md border" placeholder="Deskripsikan dirimu..."></textarea>
          </div>
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">Materi Yang di Minati</label>
            <div class="flex flex-wrap gap-4">
              @php
                $options = ['IPA', 'Matematika', 'Bahasa', 'Kimia', 'Fisika', 'Informatika'];
                $selected = old('interests', $user->interests ?? []);
              @endphp
              @for ($i = 0; $i < 3; $i++)
                <select name="interests[]" class="w-[200px] px-4 py-2 font-dm bg-white rounded-md shadow border">
                  <option value="" disabled {{ !isset($selected[$i]) ? 'selected' : '' }}>Pilih Materi</option>
                  @foreach ($options as $option)
                    <option value="{{ $option }}" {{ ($selected[$i] ?? '') === $option ? 'selected' : '' }}>{{ $option }}</option>
                  @endforeach
                </select>
              @endfor
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="w-1/2 space-y-4">
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">Password</label>
            <input type="password" name="old_password" class="w-full p-3 rounded-md border" placeholder="Current password">
          </div>
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">New Password</label>
            <input type="password" name="new_password" class="w-full p-3 rounded-md border" placeholder="New password">
          </div>
          <div>
            <label class="block font-dm text-blue-900 font-semibold mb-1">Confirm Password</label>
            <input type="password" name="new_password_confirmation" class="w-full p-3 rounded-md border" placeholder="Confirm password">
          </div>
        </div>
      </div>

      <!-- Save Button -->
      <div class="mt-10">
        <button 
  type="button"
  @click="handleSave()"
  class="bg-blue-800 hover:bg-blue-900 text-white px-6 py-3 rounded-md shadow">
  Save
</button>

      </div>
    </form>
  </div>

  <!-- Save Confirmation Modal -->
<div 
  x-show="showSaveModal" 
  x-transition 
  x-cloak 
  class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
>
  <div @click.outside="showSaveModal = false"
       class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center">
    
    <template x-if="interestError">
      <h2 class="text-xl font-bold text-red-600 mb-4">Anda harus memilih 3 materi yang berbeda.</h2>
    </template>

    <template x-if="!interestError && hasDuplicate">
      <h2 class="text-xl font-bold text-red-600 mb-4">Duplikat terdeteksi! Anda tidak boleh memilih materi yang sama.</h2>
    </template>

    <template x-if="!interestError && !hasDuplicate && passwordMismatch">
      <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi password tidak cocok.</h2>
    </template>

    <template x-if="!interestError && !hasDuplicate && !passwordMismatch && oldPasswordInvalid">
      <h2 class="text-xl font-bold text-red-600 mb-4">Password lama salah.</h2>
    </template>

    <template x-if="!interestError && !hasDuplicate && !passwordMismatch && !oldPasswordInvalid">
      <h2 class="text-xl font-bold text-blue-800 mb-4">Perbarui profil?</h2>
    </template>


    <div class="flex justify-center gap-4 mt-4">
      <button @click="showSaveModal = false"
              class="px-4 py-2 bg-gray-400 text-white rounded-xl text-sm font-semibold shadow">
        Batal
      </button>

      <button 
        x-show="!hasDuplicate && !interestError && !passwordMismatch && !oldPasswordInvalid"
        @click="confirmSave()" 
        class="px-6 py-2 bg-blue-800 hover:bg-blue-900 text-white rounded-xl text-sm font-semibold shadow">
        OK
      </button>
    </div>
  </div>
</div>



  <!-- Logout Confirmation Modal -->
  <div x-data="{ openLogoutModal: false }" class="absolute bottom-10 left-10">
  <button @click="openLogoutModal = true"
          type="button"
          class="px-4 py-2 text-red-600 border-2 border-red-600 rounded-md hover:bg-red-600 hover:text-white transition bg-white">
    Keluar
  </button>

  <!-- Logout Modal -->
  <div x-show="openLogoutModal"
       x-transition
       class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div @click.outside="openLogoutModal = false"
         class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center">
      <h2 class="text-xl font-bold text-red-600 mb-4">Konfirmasi Keluar</h2>
      <p class="mb-6 text-gray-700">
        Apakah Anda yakin ingin keluar?
      </p>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <div class="flex justify-center gap-4">
          <button type="button"
                  @click="openLogoutModal = false"
                  class="px-4 py-2 bg-gray-400 text-white rounded-xl text-sm font-semibold shadow">
            Batal
          </button>
          <button type="submit"
                  class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold shadow">
            Keluar
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- <!-- Interest Error Modal -->
<div x-show="showInterestError"
     x-transition
     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
  <div @click.outside="showInterestError = false"
       class="bg-white w-full max-w-md p-6 rounded-xl shadow-lg text-center">
    <h2 class="text-xl font-bold text-red-600 mb-4">Oops!</h2>
    <p class="mb-6 text-gray-700">Field <strong>“Materi Yang di Minati”</strong> wajib diisi.</p>
    <div class="flex justify-center">
      <button @click="showInterestError = false"
              class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-sm font-semibold shadow">
        OK
      </button>
    </div>
  </div>
</div> --}}



</body>
</html>
