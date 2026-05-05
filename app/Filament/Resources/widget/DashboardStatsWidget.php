<?php

namespace App\Filament\Widgets;

<<<<<<< HEAD
use App\Models\Anggota;
use App\Models\Produk;
use App\Models\Event;
use App\Models\Saran;
=======
use App\Models\Kas;
use App\Models\Anggota;
use App\Models\Produk;
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
use Filament\Widgets\Widget;

class DashboardStatsWidget extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-stats';
    protected int | string | array $columnSpan = 'full';
    protected static ?int $sort = 1;

    public function getViewData(): array
    {
        $tahun = date('Y');
<<<<<<< HEAD

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
=======
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
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
        ];
    }
}