<?php

namespace App\Filament\Widgets;

use App\Models\Kas;
use App\Models\Anggota;
use App\Models\Saran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KasStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $tahun = date('Y');
        $bulan = date('n');

        $totalMasuk = Kas::where('tahun', $tahun)
            ->where('jenis', 'masuk')
            ->where('status', 'lunas')
            ->sum('nominal');

        $totalKeluar = Kas::where('tahun', $tahun)
            ->where('jenis', 'keluar')
            ->sum('nominal');

        $saldo = $totalMasuk - $totalKeluar;
        $totalAnggota = Anggota::where('status', 'aktif')->count();
        $saranBelumDibaca = Saran::where('status', 'belum_dibaca')->count();

        return [
            Stat::make('Total Kas Masuk', 'Rp ' . number_format($totalMasuk, 0, ',', '.'))
                ->description('Tahun ' . $tahun)
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Saldo Kas', 'Rp ' . number_format($saldo, 0, ',', '.'))
                ->description('Saldo saat ini')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('info'),

            Stat::make('Total Anggota Aktif', $totalAnggota . ' orang')
                ->description('Semua divisi')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make('Saran Belum Dibaca', $saranBelumDibaca . ' pesan')
                ->description('Perlu ditindaklanjuti')
                ->descriptionIcon('heroicon-m-chat-bubble-left')
                ->color($saranBelumDibaca > 0 ? 'warning' : 'success'),
        ];
    }
}