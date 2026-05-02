<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 0);
            $table->decimal('harga_coret', 12, 0)->nullable(); // harga sebelum diskon
            $table->string('satuan')->default('pcs');          // pcs, kg, porsi, dll
            $table->string('gambar')->nullable();
            $table->enum('kategori', ['makanan', 'minuman', 'pakaian', 'kerajinan', 'jasa', 'lainnya'])->default('lainnya');
            $table->boolean('tersedia')->default(true);
            $table->boolean('unggulan')->default(false);

            // Penjual (anggota karangtaruna)
            $table->string('nama_penjual');
            $table->string('no_wa_penjual');     // format: 628xxxxxxx
            $table->string('lokasi_penjual')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};