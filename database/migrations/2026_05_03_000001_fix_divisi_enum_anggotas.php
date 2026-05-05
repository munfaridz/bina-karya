<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Ubah ENUM divisi sesuai seksi yang benar di struktur organisasi
        DB::statement("ALTER TABLE anggotas MODIFY divisi ENUM(
            'ketua',
            'wakil',
            'sekretaris',
            'bendahara',
            'Sinoman',
            'Agama',
            'Humas',
            'Kesenian',
            'Olahraga',
            'Dokumentasi',
            'Dekorasi',
            'Keamanan'
        ) NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE anggotas MODIFY divisi ENUM(
            'ketua',
            'wakil',
            'sekretaris',
            'bendahara',
            'Sosial',
            'Olahraga',
            'Seni',
            'Pendidikan',
            'Ekonomi',
            'Lingkungan'
        ) NOT NULL");
    }
};