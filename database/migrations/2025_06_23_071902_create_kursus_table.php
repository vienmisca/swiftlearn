<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kursus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kursus');
            $table->string('sampul_kursus')->nullable(); // ✅ allow nulls if needed
            $table->text('deskripsi');
            $table->string('kategori')->nullable(); // ✅ make optional if sometimes empty
            $table->foreignId('mentor_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
