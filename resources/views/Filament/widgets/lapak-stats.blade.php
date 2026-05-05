<x-filament-widgets::widget>
<<<<<<< HEAD
{{--
    Lapak Stats Widget — Karangtaruna Bina Karya
    resources/views/filament/widgets/lapak-stats.blade.php
--}}

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

.bkl { font-family: 'Inter', sans-serif; width: 100%; box-sizing: border-box; }
.bkl *, .bkl *::before, .bkl *::after { box-sizing: border-box; }

/* ── Section Header ── */
.bkl-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
}

.bkl-header-icon {
    width: 34px; height: 34px;
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
}

.bkl-header-title {
    font-size: 14px;
    font-weight: 700;
    color: #111827;
}

.bkl-header-sub {
    font-size: 11px;
    color: #9ca3af;
    margin-top: 1px;
}

/* ── Stat Grid ── */
.bkl-stats {
    display: grid;
    grid-template-columns: repeat(3, minmax(0,1fr));
    gap: 10px;
    margin-bottom: 14px;
}

.bkl-stat-box {
    background: #fff;
    border: 1px solid #eaecf4;
    border-radius: 12px;
    padding: 14px 16px;
    position: relative;
    overflow: hidden;
}

.bkl-stat-box::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 2px;
    background: #22c55e;
    border-radius: 12px 12px 0 0;
}

.bkl-stat-val {
    font-size: 24px;
    font-weight: 700;
    color: #111827;
    line-height: 1;
    margin-bottom: 4px;
    letter-spacing: -0.5px;
}

.bkl-stat-lbl {
    font-size: 10px;
    color: #9ca3af;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
}

/* ── Product List ── */
.bkl-list {
    background: #fff;
    border: 1px solid #eaecf4;
    border-radius: 14px;
    padding: 18px 18px 10px;
}

.bkl-list-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

.bkl-list-title {
    font-size: 13px;
    font-weight: 700;
    color: #111827;
}

.bkl-list-sub { font-size: 11px; color: #9ca3af; }

.bkl-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 0;
    border-bottom: 1px solid #f9fafb;
}

.bkl-item:last-child { border-bottom: none; padding-bottom: 2px; }

.bkl-item-thumb {
    width: 40px; height: 40px;
    border-radius: 10px;
    background: #f0fdf4;
    border: 1px solid #dcfce7;
    overflow: hidden;
    flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px;
}

.bkl-item-thumb img { width: 100%; height: 100%; object-fit: cover; }

.bkl-item-info { flex: 1; min-width: 0; }

.bkl-item-name {
    font-size: 13px;
    font-weight: 600;
    color: #111827;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.bkl-item-price {
    font-size: 12px;
    color: #16a34a;
    font-weight: 600;
    margin-top: 2px;
}

.bkl-item-badge {
    font-size: 10px;
    font-weight: 600;
    padding: 4px 9px;
    border-radius: 20px;
    flex-shrink: 0;
    border: 1px solid;
}

.bkl-badge-on  { background: #f0fdf4; color: #15803d; border-color: #bbf7d0; }
.bkl-badge-off { background: #f8fafc; color: #9ca3af; border-color: #e2e8f0; }

.bkl-empty {
    font-size: 12px;
    color: #9ca3af;
    text-align: center;
    padding: 20px 0 12px;
}

/* ── dark mode ── */
@media (prefers-color-scheme: dark) {
    .bkl-header-icon { background: rgba(34,197,94,.1); border-color: rgba(34,197,94,.2); }
    .bkl-header-title { color: #f1f5f9; }
    .bkl-header-sub { color: #64748b; }
    .bkl-stat-box { background: #1e293b; border-color: rgba(255,255,255,0.07); }
    .bkl-stat-val { color: #f1f5f9; }
    .bkl-stat-lbl { color: #475569; }
    .bkl-list { background: #1e293b; border-color: rgba(255,255,255,0.07); }
    .bkl-list-title { color: #f1f5f9; }
    .bkl-item { border-bottom-color: rgba(255,255,255,0.04); }
    .bkl-item-name { color: #e2e8f0; }
    .bkl-item-thumb { background: rgba(34,197,94,.1); border-color: rgba(34,197,94,.15); }
    .bkl-badge-off { background: rgba(100,116,139,.1); border-color: rgba(100,116,139,.2); }
}

@media (max-width: 640px) {
    .bkl-stats { grid-template-columns: repeat(3, minmax(0,1fr)); }
}
</style>

<div class="bkl">

    <div class="bkl-header">
        <div class="bkl-header-icon">🛒</div>
        <div>
            <div class="bkl-header-title">Lapak Produk</div>
            <div class="bkl-header-sub">Ringkasan produk yang tersedia</div>
        </div>
    </div>

    <div class="bkl-stats">
        <div class="bkl-stat-box">
            <div class="bkl-stat-val">{{ $totalProduk }}</div>
            <div class="bkl-stat-lbl">Total Produk</div>
        </div>
        <div class="bkl-stat-box">
            <div class="bkl-stat-val">{{ $produkTersedia }}</div>
            <div class="bkl-stat-lbl">Tersedia</div>
        </div>
        <div class="bkl-stat-box">
            <div class="bkl-stat-val">{{ $produkUnggulan }}</div>
            <div class="bkl-stat-lbl">Unggulan</div>
        </div>
    </div>

    <div class="bkl-list">
        <div class="bkl-list-head">
            <div class="bkl-list-title">Produk Terbaru</div>
            <div class="bkl-list-sub">{{ count($produkTerbaru) }} produk</div>
        </div>

        @forelse($produkTerbaru as $produk)
            <div class="bkl-item">
                <div class="bkl-item-thumb">
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}">
=======
    <style>
        .lapak-dash-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            margin-bottom: 20px;
        }

        .lapak-stat-box {
            background: linear-gradient(135deg, #0f1729, #162040);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 14px;
            padding: 18px 20px;
        }

        .lapak-stat-val {
            font-size: 28px;
            font-weight: 800;
            color: #22d3ee;
            font-family: 'Outfit', sans-serif;
        }

        .lapak-stat-lbl {
            font-size: 11px;
            color: rgba(147, 197, 253, 0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        .lapak-list {
            background: linear-gradient(135deg, #0f1729, #162040);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 14px;
            padding: 20px;
        }

        .lapak-list-title {
            font-size: 13px;
            font-weight: 700;
            color: #e2e8f0;
            margin-bottom: 14px;
        }

        .lapak-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
            border-bottom: 1px solid rgba(59, 130, 246, 0.08);
        }

        .lapak-item:last-child {
            border-bottom: none;
        }

        .lapak-item-img {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(29, 78, 216, 0.2);
            overflow: hidden;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .lapak-item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .lapak-item-name {
            font-size: 13px;
            font-weight: 600;
            color: #e2e8f0;
        }

        .lapak-item-price {
            font-size: 12px;
            color: #22d3ee;
            font-weight: 600;
        }

        .lapak-item-badge {
            margin-left: auto;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 100px;
        }

        .badge-on {
            background: rgba(34, 197, 94, 0.1);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .badge-off {
            background: rgba(100, 116, 139, 0.1);
            color: #94a3b8;
            border: 1px solid rgba(100, 116, 139, 0.2);
        }
    </style>

    <div
        style="font-size:16px;font-weight:700;color:#e2e8f0;margin-bottom:16px;display:flex;align-items:center;gap:8px;">
        🛒 <span>Lapak Produk</span>
    </div>

    <div class="lapak-dash-grid">
        <div class="lapak-stat-box">
            <div class="lapak-stat-val">{{ $totalProduk }}</div>
            <div class="lapak-stat-lbl">Total Produk</div>
        </div>
        <div class="lapak-stat-box">
            <div class="lapak-stat-val">{{ $produkTersedia }}</div>
            <div class="lapak-stat-lbl">Produk Tersedia</div>
        </div>
        <div class="lapak-stat-box">
            <div class="lapak-stat-val">{{ $produkUnggulan }}</div>
            <div class="lapak-stat-lbl">Produk Unggulan</div>
        </div>
    </div>

    <div class="lapak-list">
        <div class="lapak-list-title">📦 Produk Terbaru</div>
        @forelse($produkTerbaru as $produk)
            <div class="lapak-item">
                <div class="lapak-item-img">
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="">
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
                    @else
                        🛍️
                    @endif
                </div>
<<<<<<< HEAD
                <div class="bkl-item-info">
                    <div class="bkl-item-name">{{ $produk->nama }}</div>
                    <div class="bkl-item-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                </div>
                <span class="bkl-item-badge {{ $produk->tersedia ? 'bkl-badge-on' : 'bkl-badge-off' }}">
=======
                <div>
                    <div class="lapak-item-name">{{ $produk->nama }}</div>
                    <div class="lapak-item-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                </div>
                <span class="lapak-item-badge {{ $produk->tersedia ? 'badge-on' : 'badge-off' }}">
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
                    {{ $produk->tersedia ? 'Tersedia' : 'Habis' }}
                </span>
            </div>
        @empty
<<<<<<< HEAD
            <div class="bkl-empty">Belum ada produk terbaru</div>
        @endforelse
    </div>

</div>
=======
            <div style="font-size:13px;color:#64748b;text-align:center;padding:20px;">Belum ada produk</div>
        @endforelse
    </div>
>>>>>>> e326b0ef4e7abd0261adf1ce23e56900fcc42545
</x-filament-widgets::widget>