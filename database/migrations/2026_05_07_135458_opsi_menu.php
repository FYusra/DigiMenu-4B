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
         Schema::create('opsi_menu', function (Blueprint $table) {
            $table->id('id_opsi');
            $table->foreignId('id_menu')
                  ->constrained('menu', 'id_menu')
                  ->cascadeOnDelete();
            $table->string('nama_opsi'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opsi_menu');
    }
};