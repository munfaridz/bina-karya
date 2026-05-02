<x-filament-widgets::widget>
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
                    @else
                        🛍️
                    @endif
                </div>
                <div>
                    <div class="lapak-item-name">{{ $produk->nama }}</div>
                    <div class="lapak-item-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</div>
                </div>
                <span class="lapak-item-badge {{ $produk->tersedia ? 'badge-on' : 'badge-off' }}">
                    {{ $produk->tersedia ? 'Tersedia' : 'Habis' }}
                </span>
            </div>
        @empty
            <div style="font-size:13px;color:#64748b;text-align:center;padding:20px;">Belum ada produk</div>
        @endforelse
    </div>
</x-filament-widgets::widget>