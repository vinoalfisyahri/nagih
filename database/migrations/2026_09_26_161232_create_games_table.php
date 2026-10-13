<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Mobile Legends
            $table->string('slug')->unique(); // Contoh: mobile-legends
            $table->string('banner')->nullable(); // Gambar banner game
            $table->boolean('is_active')->default(true); // Status aktif/tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};