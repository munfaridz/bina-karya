<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
<<<<<<< HEAD
=======
use App\Models\Kas;
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
use App\Models\Event;
use App\Models\Saran;
use App\Models\Produk;        // ← TAMBAHAN
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Halaman Beranda
    public function index()
    {
        $tahun = date('Y');

<<<<<<< HEAD
=======
        $statistikKas = Kas::getStatistikBulanan($tahun);

>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
        $events = Event::where('unggulan', true)
            ->orderBy('tanggal_mulai', 'asc')
            ->limit(4)
            ->get();

        $totalAnggota = Anggota::where('status', 'aktif')->count();

<<<<<<< HEAD
=======
        $totalKasBulanIni = Kas::where('bulan', date('n'))
            ->where('tahun', $tahun)
            ->where('jenis', 'masuk')
            ->where('status', 'lunas')
            ->sum('nominal');
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545

        $totalEvent = Event::whereYear('tanggal_mulai', $tahun)->count();

        // ← TAMBAHAN: produk unggulan untuk section lapak di homepage
        $produkUnggulan = Produk::aktif()->unggulan()->latest()->limit(4)->get();

        // Struktur organisasi (hardcoded atau dari DB sesuai kebutuhan)
        $struktur = [
            'ketua' => ['nama' => 'Ahmad Fauzi', 'jabatan' => 'Ketua'],
            'wakil' => ['nama' => 'Dewi Sartika', 'jabatan' => 'Wakil Ketua'],
            'sekretaris' => ['nama' => 'Siti Rahma', 'jabatan' => 'Sekretaris'],
            'bendahara' => ['nama' => 'Rudi Hartono', 'jabatan' => 'Bendahara'],
        ];

        return view('frontend.home', compact(
<<<<<<< HEAD
            'events',
            'totalAnggota',
=======
            'statistikKas',
            'events',
            'totalAnggota',
            'totalKasBulanIni',
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
            'totalEvent',
            'struktur',
            'produkUnggulan'  // ← TAMBAHAN
        ));
    }

<<<<<<< HEAD
    // Halaman Struktur Organisasi
    public function struktur()
    {
        return view('frontend.struktur');
    }

    // ── Halaman Lapak ─────────────────────────────────────────────────────────
=======
    // Endpoint API untuk statistik kas (dipakai AJAX di frontend)
    public function apiKasStatistik()
    {
        $tahun = date('Y');
        $data = Kas::getStatistikBulanan($tahun);

        $totalMasuk = Kas::where('tahun', $tahun)
            ->where('jenis', 'masuk')
            ->where('status', 'lunas')
            ->sum('nominal');

        $totalKeluar = Kas::where('tahun', $tahun)
            ->where('jenis', 'keluar')
            ->sum('nominal');

        return response()->json([
            'statistik' => $data,
            'total_masuk' => (float) $totalMasuk,
            'total_keluar' => (float) $totalKeluar,
            'saldo' => (float) ($totalMasuk - $totalKeluar),
            'updated_at' => now()->toIso8601String(),
        ]);
    }

    // ── TAMBAHAN: Halaman Lapak ────────────────────────────────────────────────
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
    public function lapak(Request $request)
    {
        $kategori = $request->get('kategori', 'semua');
        $cari     = $request->get('cari');

        $query = Produk::aktif()->latest();

        if ($kategori && $kategori !== 'semua') {
            $query->where('kategori', $kategori);
        }

        if ($cari) {
            $query->where(function ($q) use ($cari) {
                $q->where('nama', 'like', "%{$cari}%")
                  ->orWhere('deskripsi', 'like', "%{$cari}%")
                  ->orWhere('nama_penjual', 'like', "%{$cari}%");
            });
        }

        $produks = $query->paginate(12)->withQueryString();

        $kategoris = [
            'semua'     => 'Semua',
            'makanan'   => '🍱 Makanan',
            'minuman'   => '🥤 Minuman',
            'pakaian'   => '👕 Pakaian',
            'kerajinan' => '🎨 Kerajinan',
            'jasa'      => '🔧 Jasa',
            'lainnya'   => '📦 Lainnya',
        ];

        return view('frontend.lapak', compact('produks', 'kategoris', 'kategori', 'cari'));
    }

    // ── TAMBAHAN: Detail produk via AJAX (untuk modal) ─────────────────────────
    public function detailProduk(Produk $produk)
    {
        abort_if(!$produk->tersedia, 404);

        return response()->json([
            'id'            => $produk->id,
            'nama'          => $produk->nama,
            'deskripsi'     => $produk->deskripsi,
            'harga_format'  => $produk->harga_format,
            'harga_coret'   => $produk->harga_coret_format,
            'diskon_persen' => $produk->diskon_persen,
            'satuan'        => $produk->satuan,
            'kategori'      => $produk->kategori_label,
            'gambar'        => $produk->gambar ? asset('storage/' . $produk->gambar) : null,
            'nama_penjual'  => $produk->nama_penjual,
            'lokasi'        => $produk->lokasi_penjual,
            'link_wa'       => $produk->link_wa,
        ]);
    }

    // Kirim saran dari frontend
    public function kirimSaran(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'nullable|string|max:100',
            'pesan' => 'required|string|min:10|max:1000',
            'kategori' => 'nullable|in:saran,kritik,pertanyaan',
        ]);

        Saran::create([
            'nama' => $validated['nama'] ?? 'Anonim',
            'pesan' => $validated['pesan'],
            'kategori' => $validated['kategori'] ?? 'saran',
            'ip_address' => $request->ip(),
        ]);

        return redirect()->back()->with('sukses', 'Terima kasih! Saran kamu sudah kami terima.');
    }
}