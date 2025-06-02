<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<div class="bg-blue-100 min-h-screen py-10 px-8">
    <!-- Navbar -->
    <div class="flex justify-between items-center bg-gradient-to-r from-blue-700 to-blue-500 px-6 py-4 rounded-full shadow-md">
        <div class="flex items-center space-x-8 text-white">
            <img src="/images/logo.png" alt="Logo" class="h-8">
            <a href="#" class="font-semibold hover:underline">Home</a>
            <a href="#" class="hover:underline">Kursus</a>
            <a href="#" class="hover:underline">Kursus Saya</a>
        </div>
        <div class="flex items-center space-x-3">
            <span class="text-white">Joe Skoe</span>
            <img src="/images/avatar.png" alt="Avatar" class="h-10 w-10 rounded-full">
        </div>
    </div>

    <!-- Main content -->
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 mt-10">
        <!-- Left Column -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Greeting Card -->
            <div class="bg-white rounded-2xl shadow p-6">
                <h2 class="text-3xl font-bold text-gray-800">Halo Joe!<br>Tertarik <span class="underline decoration-purple-500">Belajar</span> apa hari ini?</h2>
                <p class="text-gray-500 mt-2">telusuri lebih banyak Materi yang kau sukai!</p>
                <button class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition">Cari Materi</button>
            </div>

            <!-- Pengumuman & Banner -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pengumuman -->
                <div class="bg-white rounded-2xl shadow p-4">
                    <h3 class="text-xl font-bold mb-3">Pengumuman</h3>
                    <ul class="space-y-3">
                        <li class="border rounded-xl p-2">
                            <p class="font-semibold">Hari libur nasional</p>
                            <p class="text-sm text-gray-500">Memperingati hari pahlawan</p>
                        </li>
                        <li class="border rounded-xl p-2">
                            <p class="font-semibold">Tahun baru</p>
                            <p class="text-sm text-gray-500">Liburan Tahun baru</p>
                        </li>
                        <li class="border rounded-xl p-2">
                            <p class="font-semibold">Libur Natal</p>
                            <p class="text-sm text-gray-500">Liburan natal</p>
                        </li>
                    </ul>
                </div>
                <!-- Banner -->
                <div class="relative">
                    <img src="/images/banner.jpg" alt="Belajar" class="rounded-2xl shadow object-cover w-full h-full">
                    <div class="absolute bottom-4 left-4 bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold">
                        Belajar kapan aja Dimana aja di SwiftLearning
                    </div>
                </div>
            </div>
        </div>

        <!-- Kursus Hari Ini -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="text-xl font-bold mb-4">Kursus Hari Ini</h3>
            <ul class="space-y-4">
                <li class="border rounded-xl p-3">
                    <p class="font-semibold">Kelas Gravitasi : belajar Tentang Gravitasi</p>
                    <p class="text-sm text-gray-500">Kursus : Fisika</p>
                </li>
                <li class="border rounded-xl p-3">
                    <p class="font-semibold">Hukum kekekalan</p>
                    <p class="text-sm text-gray-500">Kursus : Fisika</p>
                </li>
                <li class="border rounded-xl p-3">
                    <p class="font-semibold">Hukum Newton</p>
                    <p class="text-sm text-gray-500">Kursus : Fisika</p>
                </li>
                <li class="border rounded-xl p-3">
                    <p class="font-semibold">Hukum Newton</p>
                    <p class="text-sm text-gray-500">Kursus : Fisika</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
