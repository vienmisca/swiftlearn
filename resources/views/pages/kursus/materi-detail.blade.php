<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Materi</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-blue-50 min-h-screen flex flex-col">

  <!-- Bagian Header dan Video -->
  <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-b-3xl text-white px-6 sm:px-12 pt-6 pb-10 relative overflow-hidden">
    <div class="absolute left-0 top-0 w-56 h-56 bg-transparent border-l border-t border-white/30 rounded-full"></div>

    <h1 class="text-xl sm:text-3xl font-bold">Belajar tentang apa itu Gravitasi</h1>
    <p class="text-sm sm:text-base mt-1 font-medium">Oleh: Jhoes</p>

    <div class="flex justify-center mt-6">
      <div class="max-w-4xl w-full aspect-video overflow-hidden rounded-2xl shadow-lg">
        <video controls class="w-full h-full object-cover">
          <source src="video/gravitasi.mp4" type="video/mp4">
          Browser Anda tidak mendukung pemutaran video.
        </video>
      </div>
    </div>
  </div>

  <!-- Bagian Artikel + Tugas + About -->
  <div class="bg-blue-100 px-6 sm:px-12 py-10 rounded-t-3xl flex flex-col lg:flex-row gap-10 items-start">
    <!-- Kiri: Tombol Artikel & Tugas -->
    <div class="flex flex-col gap-6 w-full lg:w-1/4">
      <!-- Artikel -->
      <a href="dokumen/gravitasi.pdf" target="_blank"
         class="bg-white px-6 py-4 rounded-2xl shadow hover:shadow-md transition flex gap-3 items-center">
        <span class="text-2xl">📄</span>
        <div>
          <p class="font-semibold text-gray-800 leading-tight">Penjelasan hukum</p>
          <p class="text-sm text-gray-500">Gravitasi Artikel</p>
        </div>
      </a>

      <!-- Tugas -->
      <a href="tugas-form.html"
         class="bg-white px-6 py-4 rounded-2xl shadow hover:shadow-md transition flex gap-3 items-center">
        <span class="text-2xl">📝</span>
        <div>
          <p class="font-semibold text-gray-800 leading-tight">Kerjakan Tugas</p>
        </div>
      </a>
    </div>

    <!-- Kanan: Deskripsi -->
    <div class="w-full lg:w-3/4">
      <h2 class="text-xl font-bold text-navy mb-3">About</h2>
      <p class="text-gray-700 leading-relaxed">
        Materi ini membahas sejarah dan konsep dasar dari penemuan gaya gravitasi, salah satu fenomena
        alam paling mendasar yang memengaruhi kehidupan sehari-hari. Dalam pembelajaran ini, siswa akan
        mengenal tokoh-tokoh penting seperti Isaac Newton dan Albert Einstein, yang merumuskan hukum
        gravitasi universal, serta memahami bagaimana penemuan ini mengubah cara manusia melihat alam
        semesta. Materi ini juga akan mengajak siswa mengeksplorasi contoh-contoh nyata dari gaya gravitasi
        dalam kehidupan sehari-hari serta penerapannya dalam ilmu pengetahuan dan teknologi modern.
      </p>
    </div>
  </div>

</body>
</html>
