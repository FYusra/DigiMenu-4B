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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id_order');
            $table->enum('jenis_pesanan', ['dine_in', 'take_away']);
            $table->foreignId('id_kasir')
                  ->nullable()
                  ->constrained('users', 'id_user')
                  ->restrictOnDelete();
            $table->foreignId('id_meja')
                  ->nullable()
                  ->constrained('meja', 'id_meja')
                  ->nullOnDelete();
            $table->string('nama_pelanggan');
            $table->enum('status_order', ['pending', 'diproses', 'selesai', 'dibatalkan'])
                  ->default('pending');
            $table->enum('metode_pembayaran', ['cash', 'qris']);
            $table->boolean('status_pembayaran')->default(false);
            $table->decimal('total_harga', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropDatabaseIfExists('order');
    }
};