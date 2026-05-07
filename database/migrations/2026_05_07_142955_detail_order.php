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
        Schema::create('detail_order', function (Blueprint $table) {
            $table->id('id_detail_order');
            $table->foreignId('id_order')
                  ->constrained('order', 'id_order')
                  ->cascadeOnDelete();
            $table->foreignId('id_menu')
                  ->constrained('menu', 'id_menu')
                  ->restrictOnDelete();
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 10, 2); 
            $table->decimal('subtotal_harga', 10, 2);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};