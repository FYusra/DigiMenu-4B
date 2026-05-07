<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_order_opsi', function (Blueprint $table) {
            $table->id('id_detail_order_opsi');
            $table->foreignId('id_detail_order')
                  ->constrained('detail_order', 'id_detail_order')
                  ->cascadeOnDelete();
            $table->foreignId('id_detail_opsi')
                  ->constrained('detail_opsi', 'id_detail_opsi')
                  ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_order_opsi');
    }
};