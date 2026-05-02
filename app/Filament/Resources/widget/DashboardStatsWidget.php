<?php

namespace App\Filament\Widgets;

use App\Models\Kas;
use App\Models\Anggota;
use App\Models\Produk;
use Filament\Widgets\Widget;

class DashboardStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-stats';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;

    public function getViewData(): array
    {
        $tahun = date('Y');
        $bulan = date('n');

        // Kas bulan ini
        $kasMasukBulanIni = Kas::where('bulan', $bulan)->where('tahun', $tahun)
            ->where('jenis', 'masuk')->where('status', 'lunas')->sum('nominal');
        $kasKeluarBulanIni = Kas::where('bulan', $bulan)->where('tahun', $tahun)
            ->where('jenis', 'keluar')->sum('nominal');
        $saldoKas = Kas::where('jenis', 'masuk')->where('status', 'lunas')->sum('nominal')
            - Kas::where('jenis', 'keluar')->sum('nominal');

        // Anggota
        $totalAnggota = Anggota::where('status', 'aktif')->count();

        // Statistik kas per bulan
        $bulanLabels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];
        $dataMasuk = [];
        $dataKeluar = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataMasuk[] = Kas::where('bulan', $i)->where('tahun', $tahun)
                ->where('jenis', 'masuk')->where('status', 'lunas')->sum('nominal') ?? 0;
            $dataKeluar[] = Kas::where('bulan', $i)->where('tahun', $tahun)
                ->where('jenis', 'keluar')->sum('nominal') ?? 0;
        }

        return [
            'kasMasukBulanIni' => $kasMasukBulanIni,
            'kasKeluarBulanIni' => $kasKeluarBulanIni,
            'saldoKas' => $saldoKas,
            'totalAnggota' => $totalAnggota,
            'bulanLabels' => $bulanLabels,
            'dataMasuk' => $dataMasuk,
            'dataKeluar' => $dataKeluar,
            'tahun' => $tahun,
            'namaBulan' => $bulanLabels[$bulan - 1],
        ];
    }
}