@extends('layouts.app')

@section('title', 'Detail Kursus')

@section('content')
<div class="min-h-screen bg-blue-100">
    {{-- Header --}}
    <div class="bg-gradient-to-r from-indigo-600 to-blue-500 text-white p-8 rounded-b-3xl relative">
        {{-- Background Dekorasi --}}
        <div class="absolute inset-0 z-0">
            <img src="/img/dekorasi.png" alt="" class="w-full h-full object-cover opacity-20">
        </div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between">
            {{-- Info Kiri --}}
            <div class="flex items-center space-x-6">
                <img src="/img/earth.jpg" alt="cover" class="w-48 h-32 rounded-lg object-cover border-4 border-white shadow-lg">
                <div>
                    <h2 class="text-xl md:text-2xl font-bold leading-tight">Teori Relativitas Umum Einstein: Gravitasi dan Benda Langit</h2>
                    <p class="text-sm mt-2">Oleh: <span class="font-semibold">Jhoes</span></p>
                </div>
            </div>

            {{-- Rating --}}
            <div class="mt-6 md:mt-0 flex items-center space-x-2">
                <span class="text-sm md:text-base font-medium">Beri Rating:</span>
                <div class="flex items-center space-x-1">
                    @for ($i = 0; $i < 5; $i++)
                        <svg class="w-5 h-5 text-yellow-400 fill-current" viewBox="0 0 20 20">
                            <polygon points="9.9,1.1 12.3,6.9 18.6,7.2 13.6,11.4 15.3,17.6 9.9,14.3 4.5,17.6 6.2,11.4 1.2,7.2 7.5,6.9 " />
                        </svg>
                    @endfor
                    <span class="ml-2 font-bold text-white bg-white bg-opacity-20 px-2 py-1 rounded">5.0</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Materi --}}
    <div class="p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Daftar Materi</h3>

        <div class="space-y-4">
            @foreach ([
                'Belajar tentang apa itu Gravitasi',
                'Hukum Gravitasi Newton',
                'Gravitasi dalam Skala Sehari hari',
                'Gravitasi di Luar angkasa',
                'Teori Relativitas Dan Gravitasi',
                'Teori Relativitas Dan Gravitasi'
            ] as $materi)
                <div class="bg-white rounded-xl shadow-sm p-4 flex items-center space-x-4 hover:bg-blue-50 transition">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8.414a2 2 0 00-.586-1.414l-5.414-5.414A2 2 0 0010.586 1H4zm6 0v5h5v1H9V2h1zm-2 10v2h4v-2H8z"/>
                    </svg>
                    <span class="text-base text-gray-800 font-medium">{{ $materi }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
