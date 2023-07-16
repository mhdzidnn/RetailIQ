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
        Schema::create('input_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->nullable();
            $table->string('harga_beli')->nullable();
            $table->string('harga_jual')->nullable();
            $table->string('kategori')->nullable();
            $table->interger('jumlah_stok')->nullable();
            $table->interger('jumlah_terjual')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_barang');
    }
};
