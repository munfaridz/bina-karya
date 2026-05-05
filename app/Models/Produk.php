<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'harga_coret',
        'satuan',
        'kategori',
        'gambar',
        'nama_penjual',
        'no_wa_penjual',
        'lokasi_penjual',
        'tersedia',
        'unggulan',
    ];

    protected $casts = [
        'harga'       => 'integer',
        'harga_coret' => 'integer',
        'tersedia'    => 'boolean',
        'unggulan'    => 'boolean',
    ];

    // ── SCOPES ──────────────────────────────────────────────────────────────

    public function scopeAktif(Builder $query): Builder
    {
        return $query->where('tersedia', true);
    }

    public function scopeUnggulan(Builder $query): Builder
    {
        return $query->where('unggulan', true);
    }

    // ── ACCESSORS ───────────────────────────────────────────────────────────

    public function getHargaFormatAttribute(): string
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function getHargaCoretFormatAttribute(): ?string
    {
        return $this->harga_coret
            ? 'Rp ' . number_format($this->harga_coret, 0, ',', '.')
            : null;
    }

    public function getDiskonPersenAttribute(): ?int
    {
        if (!$this->harga_coret || $this->harga_coret <= $this->harga) {
            return null;
        }
        return (int) round((1 - $this->harga / $this->harga_coret) * 100);
    }

    public function getKategoriLabelAttribute(): string
    {
        $map = [
            'makanan'   => '🍱 Makanan',
            'minuman'   => '🥤 Minuman',
            'pakaian'   => '👕 Pakaian',
            'kerajinan' => '🎨 Kerajinan',
            'jasa'      => '🔧 Jasa',
            'lainnya'   => '📦 Lainnya',
        ];
        return $map[$this->kategori] ?? $this->kategori;
    }

    public function getLinkWaAttribute(): string
    {
        $wa   = preg_replace('/[^0-9]/', '', $this->no_wa_penjual ?? '');
        // Normalisasi: 08xxx → 628xxx
        if (str_starts_with($wa, '08')) {
            $wa = '62' . substr($wa, 1);
        }
        $pesan = urlencode(
            "Halo kak *{$this->nama_penjual}* 👋\n" .
            "Saya tertarik dengan produk *{$this->nama}* " .
            "seharga {$this->harga_format} dari Lapak Bina Karya.\n" .
            "Apakah masih tersedia?"
        );
        return "https://wa.me/{$wa}?text={$pesan}";
    }
}