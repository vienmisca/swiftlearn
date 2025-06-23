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
            $table->string('sampul_kursus');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->unsignedBigInteger('mentor_id');
            $table->timestamps();

            // Optional: Foreign key constraint if you want
            // $table->foreign('mentor_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kursus');
    }
};
