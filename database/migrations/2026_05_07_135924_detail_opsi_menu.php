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
        Schema::create('detail_opsi', function (Blueprint $table) {
            $table->id('id_detail_opsi');
            $table->foreignId('id_opsi')
                  ->constrained('opsi_menu', 'id_opsi')
                  ->cascadeOnDelete();
            $table->string('nama_pilihan');
            $table->decimal('tambahan_harga', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_opsi');

    }
};