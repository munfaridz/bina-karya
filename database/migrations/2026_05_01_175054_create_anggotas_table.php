<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->enum('divisi', ['ketua', 'wakil', 'sekretaris', 'bendahara', 'Sosial', 'Olahraga', 'Seni', 'Pendidikan', 'Ekonomi', 'Lingkungan']);
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};