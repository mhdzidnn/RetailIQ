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
        Schema::create('inventory', function (Blueprint $table) {
            $table->string('nama_barang');
            $table->decimal('harga_awal', 14, 2)->nullable();
            $table->decimal('harga_jual', 14, 2)->nullable();
            $table->integer('stok')->default(0);
            $table->integer('jumlah_terjual')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
