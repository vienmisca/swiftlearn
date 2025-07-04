<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kursus_selesai', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('kursus_id')->constrained('kursus')->onDelete('cascade'); // ✅ ini yang diperbaiki
    $table->timestamps();

    $table->unique(['user_id', 'kursus_id']); // agar satu user tidak mencatat kursus sama 2x
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursus_selesai');
    }
};
