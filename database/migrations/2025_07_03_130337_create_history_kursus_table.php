<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('history_kursus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kursus_id'); // ✅ this must exist before foreign key constraint
            $table->timestamps();

            // Foreign keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kursus_id')->references('id')->on('kursus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_kursus');
    }
};

