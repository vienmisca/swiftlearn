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
        Schema::create('materis', function (Blueprint $table) {
    $table->id();
    $table->string('judul');
    $table->text('deskripsi')->nullable();
    $table->string('video')->nullable();
    $table->string('pdf')->nullable();
    $table->string('google_form_link')->nullable();
   $table->foreignId('kursus_id')->constrained('kursus')->onDelete('cascade'); // ✅ correct
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materis');
    }
};
