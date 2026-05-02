@extends('layouts.app')

@section('title', 'Lapak — Karangtaruna Bina Karya')

@push('styles')
    <style>
        /* ── LAPAK PAGE ── */
        .lapak-hero {
            background: var(--navy);
            padding: 60px 5% 40px;
            text-align: center;
            border-bottom: 1px solid var(--glass-border);
        }

        .lapak-hero h1 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(28px, 5vw, 44px);
            font-weight: 800;
            color: #fff;
            margin-bottom: 8px;
        }

        .lapak-hero h1 span {
            color: var(--accent-cyan);
        }

        .lapak-hero p {
            color: #64748b;
            font-size: 14px;
        }

        /* ── FILTER BAR ── */
        .lapak-filter-bar {
            background: var(--navy-dark);
            padding: 20px 5%;
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 64px;
            z-index: 50;
        }

        .filter-search {
            display: flex;
            gap: 8px;
            flex: 1;
            min-width: 200px;
        }

        .filter-search input {
            flex: 1;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 10px;
            padding: 9px 14px;
            color: #e2e8f0;
            font-size: 13px;
            outline: none;
            transition: border .2s;
        }

        .filter-search input:focus {
            border-color: var(--blue-light);
        }

        .filter-search input::placeholder {
            color: #475569;
        }

        .filter-search button {
            background: var(--blue);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 9px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background .2s;
        }

        .filter-search button:hover {
            background: var(--blue-light);
        }

        .kategori-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .kategori-pill {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 5px 14px;
            color: rgba(147, 197, 253, 0.7);
            font-size: 12px;
            font-weight: 500;
            text-decoration: none;
            transition: all .2s;
            white-space: nowrap;
        }

        .kategori-pill:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #fff;
        }

        .kategori-pill.active {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
            color: #93c5fd;
        }

        /* ── STATS SINGKAT ── */
        .lapak-stats {
            display: flex;
            gap: 20px;
            justify-content: center;
            padding: 16px 5%;
            background: rgba(5, 10, 20, 0.8);
            border-bottom: 1px solid var(--glass-border);
            flex-wrap: wrap;
        }

        .lapak-stat {
            text-align: center;
        }

        .lapak-stat .val {
            font-size: 22px;
            font-weight: 800;
            color: var(--accent-cyan);
        }

        .lapak-stat .lbl {
            font-size: 11px;
            color: #64748b;
            margin-top: 2px;
        }

        /* ── GRID PRODUK ── */
        .lapak-page-wrap {
            padding: 32px 5%;
            min-height: 60vh;
        }

        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .produk-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s, border-color .2s;
            cursor: pointer;
            position: relative;
        }

        .produk-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 40px rgba(59, 130, 246, 0.15);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .produk-badge-diskon {
            position: absolute;
            top: 10px;
            left: 10px;
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 6px;
            z-index: 2;
        }

        .produk-img {
            width: 100%;
            aspect-ratio: 1/1;
            overflow: hidden;
            background: var(--navy-mid);
        }

        .produk-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }

        .produk-card:hover .produk-img img {
            transform: scale(1.05);
        }

        .produk-img-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            background: linear-gradient(135deg, var(--navy-mid), var(--navy));
        }

        .produk-body {
            padding: 14px;
        }

        .produk-kategori {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 4px;
        }

        .produk-nama {
            font-size: 14px;
            font-weight: 600;
            color: #e2e8f0;
            margin-bottom: 8px;
            line-height: 1.4;
        }

        .produk-harga-wrap {
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 4px;
            margin-bottom: 6px;
        }

        .produk-harga {
            font-size: 15px;
            font-weight: 700;
            color: var(--accent-cyan);
        }

        .produk-harga-coret {
            font-size: 11px;
            color: #475569;
            text-decoration: line-through;
        }

        .produk-satuan {
            font-size: 11px;
            color: #475569;
        }

        .produk-penjual {
            font-size: 11px;
            color: #64748b;
            margin-bottom: 12px;
        }

        .produk-btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #16a34a;
            color: #fff;
            border-radius: 8px;
            padding: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s;
        }

        .produk-btn-wa:hover {
            background: #15803d;
        }

        .produk-btn-detail {
            display: flex;
            align-items: center;
            justify-content: center;
            background: transparent;
            color: rgba(147, 197, 253, 0.6);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            padding: 7px;
            font-size: 12px;
            font-weight: 500;
            cursor: pointer;
            margin-top: 6px;
            width: 100%;
            transition: all .2s;
        }

        .produk-btn-detail:hover {
            color: #fff;
            border-color: rgba(59, 130, 246, 0.4);
            background: var(--glass);
        }

        /* ── EMPTY STATE ── */
        .lapak-empty {
            text-align: center;
            padding: 80px 20px;
            color: #475569;
        }

        .lapak-empty svg {
            margin-bottom: 16px;
            opacity: .4;
        }

        .lapak-empty h3 {
            color: #64748b;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .lapak-empty p {
            font-size: 13px;
        }

        /* ── PAGINATION ── */
        .lapak-pagination {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 6px;
            flex-wrap: wrap;
        }

        .lapak-pagination a,
        .lapak-pagination span {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: rgba(147, 197, 253, 0.7);
            padding: 7px 14px;
            border-radius: 8px;
            font-size: 13px;
            text-decoration: none;
            transition: all .2s;
        }

        .lapak-pagination a:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #fff;
        }

        .lapak-pagination .active-page {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.5);
            color: #93c5fd;
            font-weight: 600;
        }

        /* ── MODAL DETAIL ── */
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(6px);
            z-index: 200;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.open {
            display: flex;
        }

        .modal-box {
            background: var(--navy-mid);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            max-width: 520px;
            width: 100%;
            overflow: hidden;
            animation: modalIn .2s ease;
            position: relative;
            max-height: 90vh;
            overflow-y: auto;
        }

        @keyframes modalIn {
            from {
                opacity: 0;
                transform: scale(.95) translateY(10px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: #94a3b8;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            z-index: 5;
        }

        .modal-close:hover {
            color: #fff;
            background: rgba(239, 68, 68, 0.2);
        }

        .modal-img {
            width: 100%;
            aspect-ratio: 4/3;
            overflow: hidden;
            background: var(--navy);
        }

        .modal-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-img-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 60px;
        }

        .modal-content {
            padding: 24px;
        }

        .modal-kategori {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 6px;
        }

        .modal-nama {
            font-size: 20px;
            font-weight: 700;
            color: #f1f5f9;
            margin-bottom: 12px;
            line-height: 1.3;
        }

        .modal-harga-wrap {
            display: flex;
            align-items: baseline;
            gap: 8px;
            margin-bottom: 4px;
            flex-wrap: wrap;
        }

        .modal-harga {
            font-size: 22px;
            font-weight: 800;
            color: var(--accent-cyan);
        }

        .modal-harga-coret {
            font-size: 14px;
            color: #475569;
            text-decoration: line-through;
        }

        .modal-diskon {
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 5px;
        }

        .modal-satuan {
            font-size: 12px;
            color: #475569;
            margin-bottom: 14px;
        }

        .modal-deskripsi {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.7;
            margin-bottom: 16px;
        }

        .modal-penjual-box {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            padding: 14px;
            margin-bottom: 16px;
        }

        .modal-penjual-label {
            font-size: 11px;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 4px;
        }

        .modal-penjual-nama {
            font-size: 14px;
            color: #e2e8f0;
            font-weight: 600;
        }

        .modal-penjual-lokasi {
            font-size: 12px;
            color: #64748b;
            margin-top: 2px;
        }

        .modal-btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: #16a34a;
            color: #fff;
            border-radius: 12px;
            padding: 14px;
            font-size: 15px;
            font-weight: 700;
            text-decoration: none;
            transition: background .2s;
            width: 100%;
        }

        .modal-btn-wa:hover {
            background: #15803d;
        }
    </style>
@endpush

@section('content')

    {{-- HERO --}}
    <div class="lapak-hero">
        <h1>Lapak <span>Bina Karya</span></h1>
        <p>Beli produk dari anggota Karangtaruna kita — langsung hubungi penjual via WhatsApp</p>
    </div>

    {{-- STATS --}}
    <div class="lapak-stats">
        <div class="lapak-stat">
            <div class="val">{{ $produks->total() }}</div>
            <div class="lbl">Total Produk</div>
        </div>
        <div class="lapak-stat">
            <div class="val">{{ $produks->getCollection()->pluck('nama_penjual')->unique()->count() }}</div>
            <div class="lbl">Penjual di Halaman Ini</div>
        </div>
        <div class="lapak-stat">
            <div class="val">{{ $produks->currentPage() }}/{{ $produks->lastPage() }}</div>
            <div class="lbl">Halaman</div>
        </div>
    </div>

    {{-- FILTER BAR --}}
    <div class="lapak-filter-bar">
        <form method="GET" action="{{ route('lapak') }}" class="filter-search">
            <input type="hidden" name="kategori" value="{{ $kategori }}">
            <input type="text" name="cari" value="{{ $cari }}" placeholder="Cari produk atau penjual...">
            <button type="submit">Cari</button>
            @if($cari)
                <a href="{{ route('lapak', ['kategori' => $kategori]) }}"
                    style="display:flex;align-items:center;padding:9px 12px;background:var(--glass);border:1px solid var(--glass-border);border-radius:10px;color:#94a3b8;font-size:12px;text-decoration:none;">✕</a>
            @endif
        </form>
        <div class="kategori-pills">
            @foreach($kategoris as $key => $label)
                <a href="{{ route('lapak', array_filter(['kategori' => $key === 'semua' ? null : $key, 'cari' => $cari])) }}"
                    class="kategori-pill {{ $kategori === $key || ($key === 'semua' && $kategori === 'semua') ? 'active' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

    {{-- GRID PRODUK --}}
    <div class="lapak-page-wrap">

        @if($produks->isEmpty())
            <div class="lapak-empty">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1">
                    <circle cx="9" cy="21" r="1" />
                    <circle cx="20" cy="21" r="1" />
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6" />
                </svg>
                <h3>Produk tidak ditemukan</h3>
                <p>Coba kategori lain atau hapus kata kunci pencarian</p>
                <a href="{{ route('lapak') }}"
                    style="display:inline-block;margin-top:16px;padding:10px 20px;background:rgba(59,130,246,0.1);border:1px solid rgba(59,130,246,0.3);border-radius:10px;color:#93c5fd;font-size:13px;text-decoration:none;">Lihat
                    Semua</a>
            </div>

        @else
            <div class="produk-grid">
                @foreach($produks as $p)
                    <div class="produk-card" onclick="bukaDetail({{ $p->id }}, event)">

                        @if($p->diskon_persen)
                            <div class="produk-badge-diskon">-{{ $p->diskon_persen }}%</div>
                        @endif

                        <div class="produk-img">
                            @if($p->gambar)
                                <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama }}" loading="lazy">
                            @else
                                <div class="produk-img-empty">
                                    {{ mb_substr($p->kategori_label ?? '📦', 0, 2) }}
                                </div>
                            @endif
                        </div>

                        <div class="produk-body">
                            <div class="produk-kategori">{{ $p->kategori_label }}</div>
                            <div class="produk-nama">{{ $p->nama }}</div>
                            <div class="produk-harga-wrap">
                                @if($p->harga_coret)
                                    <span class="produk-harga-coret">{{ $p->harga_coret_format }}</span>
                                @endif
                                <span class="produk-harga">{{ $p->harga_format }}</span>
                                <span class="produk-satuan">/ {{ $p->satuan }}</span>
                            </div>
                            <div class="produk-penjual">
                                👤 {{ $p->nama_penjual }}
                                @if($p->lokasi_penjual) &nbsp;·&nbsp; 📍 {{ $p->lokasi_penjual }} @endif
                            </div>
                            <a href="{{ $p->link_wa }}" target="_blank" rel="noopener" class="produk-btn-wa"
                                onclick="event.stopPropagation()">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                </svg>
                                Beli via WA
                            </a>
                            <button class="produk-btn-detail" onclick="bukaDetail({{ $p->id }}, event)">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            @if($produks->hasPages())
                <div class="lapak-pagination">
                    @if($produks->onFirstPage())
                        <span>‹ Prev</span>
                    @else
                        <a href="{{ $produks->previousPageUrl() }}">‹ Prev</a>
                    @endif

                    @foreach($produks->getUrlRange(max(1, $produks->currentPage() - 2), min($produks->lastPage(), $produks->currentPage() + 2)) as $page => $url)
                        @if($page == $produks->currentPage())
                            <span class="active-page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($produks->hasMorePages())
                        <a href="{{ $produks->nextPageUrl() }}">Next ›</a>
                    @else
                        <span>Next ›</span>
                    @endif
                </div>
            @endif

        @endif
    </div>

    {{-- MODAL DETAIL PRODUK --}}
    <div class="modal-overlay" id="modalOverlay" onclick="tutupModal(event)">
        <div class="modal-box" id="modalBox">
            <button class="modal-close" onclick="tutupModal()">✕</button>
            <div class="modal-img" id="modalImg"></div>
            <div class="modal-content">
                <div class="modal-kategori" id="modalKategori"></div>
                <div class="modal-nama" id="modalNama"></div>
                <div class="modal-harga-wrap">
                    <span class="modal-harga" id="modalHarga"></span>
                    <span class="modal-harga-coret" id="modalHargaCoret" style="display:none"></span>
                    <span class="modal-diskon" id="modalDiskon" style="display:none"></span>
                </div>
                <div class="modal-satuan" id="modalSatuan"></div>
                <div class="modal-deskripsi" id="modalDeskripsi"></div>
                <div class="modal-penjual-box">
                    <div class="modal-penjual-label">Penjual</div>
                    <div class="modal-penjual-nama" id="modalPenjual"></div>
                    <div class="modal-penjual-lokasi" id="modalLokasi"></div>
                </div>
                <a href="#" target="_blank" rel="noopener" class="modal-btn-wa" id="modalBtnWa">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                    </svg>
                    Hubungi Penjual via WhatsApp
                </a>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        const detailUrl = "{{ route('lapak.detail', ':id') }}";

        async function bukaDetail(id, e) {
            if (e) e.stopPropagation();
            try {
                const res = await fetch(detailUrl.replace(':id', id));
                const data = await res.json();

                const imgEl = document.getElementById('modalImg');
                imgEl.innerHTML = data.gambar
                    ? `<img src="${data.gambar}" alt="${data.nama}">`
                    : `<div class="modal-img-empty">${(data.kategori || '📦').substring(0, 2)}</div>`;

                document.getElementById('modalKategori').textContent = data.kategori || '';
                document.getElementById('modalNama').textContent = data.nama || '';
                document.getElementById('modalHarga').textContent = data.harga_format || '';
                document.getElementById('modalSatuan').textContent = '/ ' + (data.satuan || 'pcs');
                document.getElementById('modalDeskripsi').textContent = data.deskripsi || 'Tidak ada deskripsi.';
                document.getElementById('modalPenjual').textContent = '👤 ' + (data.nama_penjual || '');
                document.getElementById('modalLokasi').textContent = data.lokasi ? '📍 ' + data.lokasi : '';
                document.getElementById('modalBtnWa').href = data.link_wa || '#';

                const coretEl = document.getElementById('modalHargaCoret');
                const diskonEl = document.getElementById('modalDiskon');

                if (data.harga_coret) {
                    coretEl.textContent = data.harga_coret;
                    coretEl.style.display = 'inline';
                } else {
                    coretEl.style.display = 'none';
                }
                if (data.diskon_persen) {
                    diskonEl.textContent = '-' + data.diskon_persen + '%';
                    diskonEl.style.display = 'inline';
                } else {
                    diskonEl.style.display = 'none';
                }

                document.getElementById('modalOverlay').classList.add('open');
                document.body.style.overflow = 'hidden';
            } catch (err) {
                console.error('Gagal load detail produk:', err);
            }
        }

        function tutupModal(e) {
            if (e && e.target !== document.getElementById('modalOverlay')) return;
            document.getElementById('modalOverlay').classList.remove('open');
            document.body.style.overflow = '';
        }

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') tutupModal();
        });
    </script>
@endpush