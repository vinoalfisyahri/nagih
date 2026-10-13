<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->unique(); // Kode unik transaksi (Misal: INV-20260309-XXX)
            $table->foreignId('product_id')->constrained('products');
            $table->string('user_game_id'); // ID Akun Game pembeli
            $table->string('zone_id')->nullable(); // Server ID (opsional, misal ML)
            $table->string('nickname')->nullable(); // Hasil cek nickname game
            $table->decimal('amount', 12, 2); // Total bayar
            $table->string('payment_method')->nullable(); // QRIS, VA BCA, dll.
            $table->enum('status', ['pending', 'processing', 'success', 'failed', 'expired'])->default('pending');
            $table->text('payment_url')->nullable(); // URL halaman pembayaran dari payment gateway
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};