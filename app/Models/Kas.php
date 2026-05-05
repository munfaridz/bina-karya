<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{
    use HasFactory;

    protected $table = 'kas';

    protected $fillable = [
        'anggota_id',
        'bulan',
        'tahun',
        'nominal',
        'jenis',
        'tanggal_bayar',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'nominal' => 'decimal:2',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public static function getNamaBulan(int $bulan): string
    {
        $bulanArr = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret',
            4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September',
            10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];
        return $bulanArr[$bulan] ?? '';
    }

    public static function getStatistikBulanan(int $tahun): array
    {
        $hasil = [];
        for ($b = 1; $b <= 12; $b++) {
            $masuk = self::where('bulan', $b)
                ->where('tahun', $tahun)
                ->where('jenis', 'masuk')
                ->where('status', 'lunas')
                ->sum('nominal');

            $keluar = self::where('bulan', $b)
                ->where('tahun', $tahun)
                ->where('jenis', 'keluar')
                ->sum('nominal');

            $hasil[] = [
                'bulan' => self::getNamaBulan($b),
                'masuk' => (float) $masuk,
                'keluar' => (float) $keluar,
            ];
        }
        return $hasil;
    }
}