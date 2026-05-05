<?php

namespace App\Filament\Widgets;

use App\Models\Anggota;
use App\Models\Produk;
use App\Models\Event;
use App\Models\Saran;
use Filament\Widgets\Widget;

class DashboardStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-stats';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;

    public function getViewData(): array
    {
        $tahun = date('Y');

        $totalAnggota = Anggota::where('status', 'aktif')->count();

        $totalProduk = Produk::count();

        $totalEvent = Event::whereYear('created_at', $tahun)->count();

        $saranBelumDibaca = Saran::where('status', 'baru')->count();

        // Kolom yang benar adalah 'divisi' (bukan 'seksi')
        // Hanya tampilkan seksi (bukan jabatan struktural)
        $jabatanStruktur = ['ketua', 'wakil', 'sekretaris', 'bendahara'];

        $distribusiSeksi = Anggota::where('status', 'aktif')
            ->whereNotIn('divisi', $jabatanStruktur)
            ->selectRaw('divisi as nama, COUNT(*) as n')
            ->groupBy('divisi')
            ->orderByDesc('n')
            ->get()
            ->toArray();

        return [
            'totalAnggota'      => $totalAnggota,
            'totalProduk'       => $totalProduk,
            'totalEvent'        => $totalEvent,
            'saranBelumDibaca'  => $saranBelumDibaca,
            'distribusiSeksi'   => $distribusiSeksi,
        ];
    }
}