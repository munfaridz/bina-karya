@extends('layouts.app')

@section('title', 'Beranda — Karangtaruna Bina Karya')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="hero-inner">
        <div class="hero-logo">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo">
        </div>
        <div class="hero-eyebrow">Karangtaruna Aktif</div>
            <div class="hero-location">
                
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
        Dk. Ngringin, Karanggeneng, Boyolali, Jawa Tengah
    </div>
    {{-- Sosmed --}}
<div class="hero-socmed">
    <a href="https://instagram.com/binakarya.official" target="_blank" class="socmed-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
        </svg>
        binakarya.official
    </a>
    <a href="https://tiktok.com/@bina.karya46" target="_blank" class="socmed-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.75a4.85 4.85 0 01-1.01-.06z"/>
        </svg>
        bina.karya46
    </a>
</div>
        <h1>Bina <span>Karya</span></h1>
        <p>Bersama membangun generasi muda yang kreatif, mandiri, dan berdaya saing tinggi</p>
        <div class="hero-btns">
            <a href="#saran" class="btn-primary">Bergabung Bersama Kami</a>
            <a href="#events" class="btn-outline">Lihat Event →</a>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="section bg-darker">
    <h2 class="section-title">Statistik Organisasi</h2>
    <div class="stats-grid">
        <div class="stat-card">
            <div class="val">{{ $totalAnggota }}</div>
            <div class="lbl">Total Anggota Aktif</div>
        </div>
        <div class="stat-card">
            
<div class="val">
@if($totalKasBulanIni >= 1000000)
    Rp {{ number_format($totalKasBulanIni / 1000000, 1, ',', '.') }}jt
@elseif($totalKasBulanIni >= 1000)
    Rp {{ number_format($totalKasBulanIni / 1000, 0, ',', '.') }}rb
@else
    Rp {{ number_format($totalKasBulanIni, 0, ',', '.') }}
@endif
</div>
            <div class="lbl">Kas Bulan Ini</div>
        
        </div>
        <div class="stat-card">
            <div class="val">{{ $totalEvent }}</div>
            <div class="lbl">Event Tahun {{ date('Y') }}</div>
        </div>
    </div>
</section>

<!-- KAS STATISTIK -->
<section class="section bg-dark" id="kas">
    <h2 class="section-title">Statistik Kas Bulanan {{ date('Y') }}</h2>
    <div class="kas-chart-wrap">
        <h3>Pemasukan vs Pengeluaran (Rp)</h3>
        <canvas id="kasChart" height="100"></canvas>
        <p style="font-size:11px;color:#94a3b8;margin-top:12px;text-align:right;" id="last-update">
            Terakhir diperbarui: {{ now()->format('d/m/Y H:i') }}
        </p>
    </div>
</section>

<!-- STRUKTUR ORGANISASI -->
<section class="section bg-darker">
    <h2 class="section-title">Struktur Organisasi</h2>
    <div class="org-wrap">
        <div class="org-tree">

            {{-- LEVEL 1: KETUA --}}
            <div class="org-level-label">Ketua</div>
            <div class="org-row">
                <div class="org-card org-card--ketua">
                    <div class="org-foto">
                        @if(file_exists(public_path('images/struktur/aji.jpg')))
                            <img src="{{ asset('images/struktur/aji.jpg') }}" alt="AJI">
                        @else
                            <div class="org-foto-placeholder">A</div>
                        @endif
                    </div>
                    <div class="org-name">AJI</div>
                </div>
            </div>
            <div class="org-connector"></div>

            {{-- LEVEL 2: WAKIL KETUA --}}
            <div class="org-level-label">Wakil Ketua</div>
            <div class="org-row">
                @foreach([
                    ['nama'=>'DINO',  'label'=>'Wakil Ketua RT 01', 'foto'=>'dino.jpg'],
                    ['nama'=>'GANA',  'label'=>'Wakil Ketua RT 02', 'foto'=>'gana.jpg'],
                    ['nama'=>'FARID', 'label'=>'Wakil Ketua RT 06', 'foto'=>'farid.jpg'],
                ] as $p)
                <div class="org-card">
                    <div class="org-foto">
                        @if(file_exists(public_path('images/struktur/'.$p['foto'])))
                            <img src="{{ asset('images/struktur/'.$p['foto']) }}" alt="{{ $p['nama'] }}">
                        @else
                            <div class="org-foto-placeholder">{{ substr($p['nama'],0,1) }}</div>
                        @endif
                    </div>
                    <div class="org-sublabel">{{ $p['label'] }}</div>
                    <div class="org-name">{{ $p['nama'] }}</div>
                </div>
                @endforeach
            </div>
            <div class="org-connector"></div>

{{-- LEVEL 3: SEKRETARIS & BENDAHARA --}}
<div class="org-level-label">Sekretaris &amp; Bendahara</div>
<div class="org-row">
    @foreach([
        ['nama'=>'LINTANG', 'label'=>'Sekretaris', 'foto'=>'lintang.jpg'],
        ['nama'=>'CELSI',   'label'=>'Sekretaris', 'foto'=>'celsi.jpg'],
        ['nama'=>'DIAN',    'label'=>'Bendahara',  'foto'=>'dian.jpg'],
        ['nama'=>'DEVI',    'label'=>'Bendahara',  'foto'=>'devi.jpg'],
    ] as $p)
    <div class="org-card">
        <div class="org-foto">
            @if(file_exists(public_path('images/struktur/'.$p['foto'])))
                <img src="{{ asset('images/struktur/'.$p['foto']) }}" alt="{{ $p['nama'] }}">
            @else
                <div class="org-foto-placeholder">{{ substr($p['nama'],0,1) }}</div>
            @endif
        </div>
        <div class="org-sublabel">{{ $p['label'] }}</div>
        <div class="org-name">{{ $p['nama'] }}</div>
    </div>
    @endforeach
</div>
            <div class="org-connector"></div>

            {{-- LEVEL 4 & 5: SEKSI dengan cabang anggota --}}
            @php
            $semuaSeksi = [
                [
                    'seksi'   => 'Seksi Sinoman',
                    'ketua'   => ['nama'=>'PUTRA',  'foto'=>'putra.jpg'],
                    'anggota' => [
                        ['nama'=>'GANI',   'foto'=>'gani.jpg'],
                        ['nama'=>'ANDIKA', 'foto'=>'andika.jpg'],
                        ['nama'=>'ANAS',   'foto'=>'anas.jpg'],
                        ['nama'=>'BAGAS',  'foto'=>'bagas.jpg'],
                        ['nama'=>'HESTI',  'foto'=>'hesti.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Agama',
                    'ketua'   => ['nama'=>'ADIT',   'foto'=>'adit.jpg'],
                    'anggota' => [
                        ['nama'=>'REFLIN', 'foto'=>'reflin.jpg'],
                        ['nama'=>'KHARIS', 'foto'=>'kharis.jpg'],
                        ['nama'=>'VINA',   'foto'=>'vina.jpg'],
                        ['nama'=>'ZAHWA',  'foto'=>'zahwa.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Humas',
                    'ketua'   => ['nama'=>'RIZAL',  'foto'=>'rizal.jpg'],
                    'anggota' => [
                        ['nama'=>'RIAN',         'foto'=>'rian.jpg'],
                        ['nama'=>'ALIF',         'foto'=>'alif.jpg'],
                        ['nama'=>'YAYAH',        'foto'=>'yayah.jpg'],
                        ['nama'=>'BAYU',         'foto'=>'bayu.jpg'],
                        ['nama'=>'GALIH',        'foto'=>'galih.jpg'],
                        ['nama'=>'FITRI',        'foto'=>'fitri.jpg'],
                        ['nama'=>'ALDI',         'foto'=>'aldi.jpg'],
                        ['nama'=>'RIDHO',        'foto'=>'ridho.jpg'],
                        ['nama'=>'NATASYA AP',   'foto'=>'natasya_ap.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Kesenian',
                    'ketua'   => ['nama'=>'ABDUL',  'foto'=>'abdul.jpg'],
                    'anggota' => [
                        ['nama'=>'TEGAR',     'foto'=>'tegar.jpg'],
                        ['nama'=>'IQBAL',     'foto'=>'iqbal.jpg'],
                        ['nama'=>'NIA',       'foto'=>'nia.jpg'],
                        ['nama'=>'NATASYA AZ','foto'=>'natasya_az.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Olahraga',
                    'ketua'   => ['nama'=>'RAYHAN', 'foto'=>'rayhan.jpg'],
                    'anggota' => [
                        ['nama'=>'GUNTUR', 'foto'=>'guntur.jpg'],
                        ['nama'=>'WULAN',  'foto'=>'wulan.jpg'],
                        ['nama'=>'SISKA',  'foto'=>'siska.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Dokumentasi',
                    'ketua'   => ['nama'=>'RISKI',  'foto'=>'riski.jpg'],
                    'anggota' => [
                        ['nama'=>'FIKA', 'foto'=>'fika.jpg'],
                        ['nama'=>'TIA',  'foto'=>'tia.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Dekorasi',
                    'ketua'   => ['nama'=>'REVAL',  'foto'=>'reval.jpg'],
                    'anggota' => [
                        ['nama'=>'REVANO', 'foto'=>'revano.jpg'],
                        ['nama'=>'ZAKI',   'foto'=>'zaki.jpg'],
                    ],
                ],
                [
                    'seksi'   => 'Seksi Keamanan',
                    'ketua'   => ['nama'=>'TEGUH',  'foto'=>'teguh.jpg'],
                    'anggota' => [
                        ['nama'=>'DEDI',  'foto'=>'dedi.jpg'],
                        ['nama'=>'SURYA', 'foto'=>'surya.jpg'],
                        ['nama'=>'CAHYO', 'foto'=>'cahyo.jpg'],
                    ],
                ],
            ];
            @endphp

            <div class="org-level-label">Seksi</div>
            <div class="org-seksi-grid">
                @foreach($semuaSeksi as $seksi)
                <div class="org-seksi-wrap">

                    {{-- Header Seksi --}}
                    <div class="org-seksi-header">{{ $seksi['seksi'] }}</div>

                    {{-- Kartu Ketua --}}
                    <div class="org-seksi-ketua-wrap">
                        <div class="org-card org-card--ketua-seksi">
                            <div class="org-foto org-foto--md">
                                @if(file_exists(public_path('images/struktur/'.$seksi['ketua']['foto'])))
                                    <img src="{{ asset('images/struktur/'.$seksi['ketua']['foto']) }}" alt="{{ $seksi['ketua']['nama'] }}">
                                @else
                                    <div class="org-foto-placeholder" style="font-size:16px">{{ substr($seksi['ketua']['nama'],0,1) }}</div>
                                @endif
                            </div>
                            <div class="org-badge-ketua">★ Ketua</div>
                            <div class="org-name" style="font-size:11px">{{ $seksi['ketua']['nama'] }}</div>
                        </div>
                    </div>

                    {{-- Garis ke bawah dari ketua --}}
                    <div class="org-branch-line-v"></div>

                    {{-- Garis horizontal penghubung semua anggota --}}
                    <div class="org-branch-h-wrap">
                        <div class="org-branch-h-line" style="width: calc({{ count($seksi['anggota']) }} * 72px - 12px); max-width:100%"></div>
                    </div>

                    {{-- Kartu Anggota --}}
                    <div class="org-anggota-row">
                        @foreach($seksi['anggota'] as $anggota)
                        <div class="org-anggota-wrap">
                            <div class="org-branch-line-v-sm"></div>
                            <div class="org-card org-card--anggota">
                                <div class="org-foto org-foto--sm">
                                    @if(file_exists(public_path('images/struktur/'.$anggota['foto'])))
                                        <img src="{{ asset('images/struktur/'.$anggota['foto']) }}" alt="{{ $anggota['nama'] }}">
                                    @else
                                        <div class="org-foto-placeholder" style="font-size:12px">{{ substr($anggota['nama'],0,1) }}</div>
                                    @endif
                                </div>
                                <div class="org-name" style="font-size:10px;margin-top:4px">{{ $anggota['nama'] }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

<!-- EVENTS -->
<section class="section bg-dark" id="events">
    <h2 class="section-title">Event Unggulan</h2>
    @if($events->isEmpty())
        <div class="events-empty">
            <div class="events-empty-icon">📅</div>
            <div class="events-empty-title">Belum Ada Event</div>
            <div class="events-empty-desc">Event akan segera diumumkan. Pantau terus media sosial kami!</div>
            <a href="https://instagram.com/binakarya.official" target="_blank" class="btn-outline" style="margin-top:16px;">
                Ikuti Instagram Kami →
            </a>
        </div>
    @else
        <div class="events-grid">
            @foreach($events as $event)
            <div class="event-card">
                @if($event->gambar)
                <div class="event-img">
                    <img src="{{ asset('storage/' . $event->gambar) }}" alt="{{ $event->nama }}">
                </div>
                @else
                <div class="event-img-empty">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="1.5">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/>
                    </svg>
                </div>
                @endif
                <div class="event-bottom">
                    <div class="event-date-col">
                        <div class="day">{{ $event->tanggal_mulai->format('d') }}</div>
                        <div class="mon">{{ strtoupper($event->tanggal_mulai->format('M')) }}</div>
                    </div>
                    <div class="event-info">
                        <div class="title">{{ $event->nama }}</div>
                        <div class="desc">{{ Str::limit($event->deskripsi, 80) }}</div>
                        @if($event->lokasi)
                            <div class="lokasi">📍 {{ $event->lokasi }}</div>
                        @endif
                        <span class="badge {{ $event->status }}">{{ $event->status_label }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</section>

<!-- SARAN & KRITIK -->
<section class="section bg-darker" id="saran">
    <h2 class="section-title">Saran &amp; Kritik</h2>
    <div class="saran-layout">

        {{-- KOLOM KIRI: FORM --}}
        <div class="saran-wrap">
            <p style="font-size:14px;color:#64748b;margin-bottom:20px;">
                Sampaikan aspirasi, saran, atau kritik kamu untuk kemajuan Karangtaruna Bina Karya.
            </p>

            @if(session('sukses'))
                <div class="alert-sukses">✅ {{ session('sukses') }}</div>
            @endif

            <form action="{{ route('saran.kirim') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama (opsional)</label>
                    <input type="text" name="nama" placeholder="Nama kamu atau kosongkan untuk anonim">
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori">
                        <option value="saran">💡 Saran</option>
                        <option value="kritik">🔥 Kritik</option>
                        <option value="pertanyaan">❓ Pertanyaan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Pesan <span style="color:#ef4444">*</span></label>
                    <textarea name="pesan" rows="4" placeholder="Tulis saran atau kritik kamu di sini..." required></textarea>
                    @error('pesan')
                        <span style="color:#ef4444;font-size:12px">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn-primary" style="width:100%;justify-content:center;">
                    Kirim Saran →
                </button>
            </form>
        </div>

        {{-- KOLOM KANAN: INFO --}}
        <div class="saran-info">
            <div class="saran-info-card">
                <div class="saran-info-icon">💬</div>
                <div class="saran-info-title">Suaramu Penting</div>
                <div class="saran-info-desc">Setiap masukan membantu kami tumbuh dan berkembang bersama.</div>
            </div>
            <div class="saran-info-card">
                <div class="saran-info-icon">🔒</div>
                <div class="saran-info-title">Anonim & Aman</div>
                <div class="saran-info-desc">Kamu bisa kirim tanpa nama. Identitasmu terjaga sepenuhnya.</div>
            </div>
            <div class="saran-info-card">
                <div class="saran-info-icon">⚡</div>
                <div class="saran-info-title">Respon Cepat</div>
                <div class="saran-info-desc">Pengurus aktif memantau dan menindaklanjuti setiap masukan.</div>
            </div>
            <div class="saran-info-card saran-info-card--contact">
                <div style="font-size:12px;font-weight:700;color:rgba(147,197,253,0.6);text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;">Kontak Langsung</div>
                <a href="https://instagram.com/binakarya.official" target="_blank" class="saran-contact-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    @binakarya.official
                </a>
                <a href="https://tiktok.com/@bina.karya46" target="_blank" class="saran-contact-link">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.27 6.27 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.75a4.85 4.85 0 01-1.01-.06z"/></svg>
                    @bina.karya46
                </a>
            </div>
        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
// ========================================
// CHART KAS — Data dari PHP (server-side)
// ========================================
const statistikData = @json($statistikKas);

const labels = statistikData.map(d => d.bulan);
const dataMasuk = statistikData.map(d => d.masuk);
const dataKeluar = statistikData.map(d => d.keluar);

const ctx = document.getElementById('kasChart').getContext('2d');
const kasChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'Kas Masuk',
                data: dataMasuk,
                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                borderColor: '#1d4ed8',
                borderWidth: 1.5,
                borderRadius: 6,
            },
            {
                label: 'Kas Keluar',
                data: dataKeluar,
                backgroundColor: 'rgba(239, 68, 68, 0.7)',
                borderColor: '#b91c1c',
                borderWidth: 1.5,
                borderRadius: 6,
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'top' },
            tooltip: {
                callbacks: {
                    label: function(ctx) {
                        return ' Rp ' + ctx.raw.toLocaleString('id-ID');
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(v) {
                        return 'Rp ' + (v / 1000).toFixed(0) + 'rb';
                    }
                }
            }
        }
    }
});

// ========================================
// AUTO-REFRESH KAS setiap 30 detik
// ========================================
setInterval(function() {
    fetch('/api/kas-statistik')
        .then(res => res.json())
        .then(data => {
            kasChart.data.datasets[0].data = data.statistik.map(d => d.masuk);
            kasChart.data.datasets[1].data = data.statistik.map(d => d.keluar);
            kasChart.update();

            const d = new Date(data.updated_at);
            document.getElementById('last-update').textContent =
                'Terakhir diperbarui: ' + d.toLocaleDateString('id-ID') + ' ' + d.toLocaleTimeString('id-ID');
        })
        .catch(err => console.log('Gagal refresh kas:', err));
}, 30000);
</script>
@endpush