<x-filament-widgets::widget>
{{--
    Dashboard Stats Widget — Karangtaruna Bina Karya
    resources/views/filament/widgets/dashboard-stats.blade.php
--}}

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap');

.bkd { font-family: 'Inter', sans-serif; width: 100%; box-sizing: border-box; }
.bkd *, .bkd *::before, .bkd *::after { box-sizing: border-box; }

/* ── Stat Cards ── */
.bkd-stats {
    display: grid;
    grid-template-columns: repeat(4, minmax(0,1fr));
    gap: 12px;
    margin-bottom: 18px;
}

.bkd-sc {
    background: #fff;
    border: 1px solid #eaecf4;
    border-radius: 14px;
    padding: 18px 18px 16px;
    position: relative;
}

.bkd-sc-accent {
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    border-radius: 14px 14px 0 0;
}

.bkd-sc-blue   .bkd-sc-accent { background: #4361ee; }
.bkd-sc-green  .bkd-sc-accent { background: #22c55e; }
.bkd-sc-purple .bkd-sc-accent { background: #8b5cf6; }
.bkd-sc-amber  .bkd-sc-accent { background: #f59e0b; }

.bkd-sc-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
}

.bkd-sc-icon {
    width: 36px; height: 36px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 17px;
}

.bkd-sc-blue   .bkd-sc-icon { background: #eef0fd; }
.bkd-sc-green  .bkd-sc-icon { background: #f0fdf4; }
.bkd-sc-purple .bkd-sc-icon { background: #f5f3ff; }
.bkd-sc-amber  .bkd-sc-icon { background: #fffbeb; }

.bkd-sc-chip {
    font-size: 10px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 20px;
}

.bkd-sc-blue   .bkd-sc-chip { background: #eef0fd; color: #4361ee; }
.bkd-sc-green  .bkd-sc-chip { background: #f0fdf4; color: #16a34a; }
.bkd-sc-purple .bkd-sc-chip { background: #f5f3ff; color: #7c3aed; }
.bkd-sc-amber  .bkd-sc-chip { background: #fffbeb; color: #d97706; }

.bkd-sc-val {
    font-size: 28px;
    font-weight: 700;
    color: #111827;
    line-height: 1;
    margin-bottom: 5px;
    letter-spacing: -0.5px;
}

.bkd-sc-lbl { font-size: 12px; font-weight: 600; color: #374151; margin-bottom: 2px; }
.bkd-sc-sub { font-size: 11px; color: #9ca3af; }

/* dark mode */
@media (prefers-color-scheme: dark) {
    .bkd-sc { background: #1e293b; border-color: rgba(255,255,255,0.07); }
    .bkd-sc-val { color: #f1f5f9; }
    .bkd-sc-lbl { color: #cbd5e1; }
    .bkd-sc-sub { color: #64748b; }
    .bkd-sc-blue   .bkd-sc-icon { background: rgba(67,97,238,.15); }
    .bkd-sc-green  .bkd-sc-icon { background: rgba(34,197,94,.12); }
    .bkd-sc-purple .bkd-sc-icon { background: rgba(139,92,246,.12); }
    .bkd-sc-amber  .bkd-sc-icon { background: rgba(245,158,11,.12); }
    .bkd-sc-blue   .bkd-sc-chip { background: rgba(67,97,238,.15); color: #818cf8; }
    .bkd-sc-green  .bkd-sc-chip { background: rgba(34,197,94,.12); color: #86efac; }
    .bkd-sc-purple .bkd-sc-chip { background: rgba(139,92,246,.12); color: #c4b5fd; }
    .bkd-sc-amber  .bkd-sc-chip { background: rgba(245,158,11,.12); color: #fcd34d; }
}

/* ── Mid Row ── */
.bkd-row2 {
    display: grid;
    grid-template-columns: repeat(2, minmax(0,1fr));
    gap: 14px;
    margin-bottom: 0;
}

.bkd-card {
    background: #fff;
    border: 1px solid #eaecf4;
    border-radius: 14px;
    padding: 20px 22px;
}

@media (prefers-color-scheme: dark) {
    .bkd-card { background: #1e293b; border-color: rgba(255,255,255,0.07); }
    .bkd-card-title { color: #f1f5f9 !important; }
    .bkd-card-sub { color: #64748b !important; }
    .bkd-anggota-lbl { color: #94a3b8 !important; }
    .bkd-dist-sep { border-color: rgba(255,255,255,0.06) !important; }
    .bkd-dist-title { color: #475569 !important; }
    .bkd-seksi-lbl { color: #94a3b8 !important; }
    .bkd-seksi-num { color: #64748b !important; }
    .bkd-bar-track { background: rgba(255,255,255,0.06) !important; }
    .qlink-blue   { background: rgba(67,97,238,.08) !important;  border-color: rgba(67,97,238,.2) !important; }
    .qlink-green  { background: rgba(34,197,94,.07) !important;  border-color: rgba(34,197,94,.2) !important; }
    .qlink-purple { background: rgba(139,92,246,.08) !important; border-color: rgba(139,92,246,.2) !important; }
    .qlink-amber  { background: rgba(245,158,11,.08) !important; border-color: rgba(245,158,11,.2) !important; }
}

.bkd-card-top {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 16px;
}

.bkd-card-title { font-size: 14px; font-weight: 700; color: #111827; margin-bottom: 3px; }
.bkd-card-sub   { font-size: 11px; color: #9ca3af; }

.bkd-big-num {
    font-size: 52px;
    font-weight: 700;
    color: #4361ee;
    line-height: 1;
    letter-spacing: -2px;
    margin-bottom: 4px;
}

.bkd-anggota-lbl { font-size: 12px; color: #6b7280; margin-bottom: 12px; }

.bkd-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #f0fdf4;
    color: #15803d;
    font-size: 11px;
    font-weight: 600;
    padding: 5px 12px;
    border-radius: 100px;
    border: 1px solid #bbf7d0;
    margin-bottom: 20px;
}

.bkd-badge-dot {
    width: 6px; height: 6px;
    background: #22c55e;
    border-radius: 50%;
    animation: bkd-blink 2.2s ease infinite;
}

@keyframes bkd-blink { 0%,100%{opacity:1} 50%{opacity:.15} }

.bkd-dist-sep { border: none; border-top: 1px solid #f1f5f9; margin: 0 0 14px; }
.bkd-dist-title { font-size: 10px; font-weight: 700; color: #d1d5db; text-transform: uppercase; letter-spacing: 1.2px; margin-bottom: 12px; }

.bkd-seksi-row { display: flex; align-items: center; gap: 10px; margin-bottom: 9px; }
.bkd-seksi-lbl { font-size: 11px; color: #374151; width: 92px; flex-shrink: 0; font-weight: 500; }
.bkd-bar-track { flex: 1; height: 5px; background: #f1f5f9; border-radius: 4px; overflow: hidden; }
.bkd-bar-fill  { height: 5px; border-radius: 4px; background: #4361ee; transition: width .4s ease; }
.bkd-seksi-num { font-size: 11px; color: #9ca3af; font-weight: 600; width: 18px; text-align: right; }

/* Quick Links */
.qlink {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 14px;
    border-radius: 10px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 8px;
    transition: opacity .15s, transform .1s;
    border: 1px solid;
}

.qlink:hover { opacity: .75; transform: translateX(2px); }
.qlink:last-child { margin-bottom: 0; }

.qlink-blue   { background: #eef0fd; border-color: #c7cdf7; color: #4361ee; }
.qlink-green  { background: #f0fdf4; border-color: #bbf7d0; color: #15803d; }
.qlink-purple { background: #f5f3ff; border-color: #ddd6fe; color: #7c3aed; }
.qlink-amber  { background: #fffbeb; border-color: #fde68a; color: #92400e; }
.qlink-gray   { background: #f8fafc; border-color: #e2e8f0; color: #475569; }

.qlink-icon { font-size: 14px; width: 20px; text-align: center; flex-shrink: 0; }
.qlink-arrow { margin-left: auto; opacity: .35; font-size: 11px; }
.qlink-badge { margin-left: 4px; background: #fef3c7; color: #92400e; font-size: 9px; font-weight: 700; padding: 2px 7px; border-radius: 100px; border: 1px solid #fde68a; }

/* ── Responsive ── */
@media (max-width: 960px) {
    .bkd-stats { grid-template-columns: repeat(2,minmax(0,1fr)); }
}
@media (max-width: 640px) {
    .bkd-stats { grid-template-columns: repeat(2,minmax(0,1fr)); gap: 10px; }
    .bkd-row2  { grid-template-columns: minmax(0,1fr); }
    .bkd-big-num { font-size: 40px; }
}
@media (max-width: 400px) {
    .bkd-stats { grid-template-columns: minmax(0,1fr); }
}
</style>

<div class="bkd">

    {{-- ── 4 Stat Cards ── --}}
    <div class="bkd-stats">
        <div class="bkd-sc bkd-sc-blue">
            <div class="bkd-sc-accent"></div>
            <div class="bkd-sc-head">
                <div class="bkd-sc-icon">👥</div>
                <span class="bkd-sc-chip">Aktif</span>
            </div>
            <div class="bkd-sc-val">{{ $totalAnggota }}</div>
            <div class="bkd-sc-lbl">Anggota Aktif</div>
            <div class="bkd-sc-sub">Semua seksi</div>
        </div>

        <div class="bkd-sc bkd-sc-green">
            <div class="bkd-sc-accent"></div>
            <div class="bkd-sc-head">
                <div class="bkd-sc-icon">🛍️</div>
                <span class="bkd-sc-chip">Lapak</span>
            </div>
            <div class="bkd-sc-val">{{ $totalProduk }}</div>
            <div class="bkd-sc-lbl">Produk Lapak</div>
            <div class="bkd-sc-sub">Produk aktif tersedia</div>
        </div>

        <div class="bkd-sc bkd-sc-purple">
            <div class="bkd-sc-accent"></div>
            <div class="bkd-sc-head">
                <div class="bkd-sc-icon">📅</div>
                <span class="bkd-sc-chip">{{ date('Y') }}</span>
            </div>
            <div class="bkd-sc-val">{{ $totalEvent }}</div>
            <div class="bkd-sc-lbl">Event Tahun Ini</div>
            <div class="bkd-sc-sub">Kegiatan tahun ini</div>
        </div>

        <div class="bkd-sc bkd-sc-amber">
            <div class="bkd-sc-accent"></div>
            <div class="bkd-sc-head">
                <div class="bkd-sc-icon">💬</div>
                <span class="bkd-sc-chip">Pesan</span>
            </div>
            <div class="bkd-sc-val">{{ $saranBelumDibaca }}</div>
            <div class="bkd-sc-lbl">Saran Belum Dibaca</div>
            <div class="bkd-sc-sub">Perlu ditindaklanjuti</div>
        </div>
    </div>

    {{-- ── Mid Row ── --}}
    <div class="bkd-row2">

        {{-- Anggota Card --}}
        <div class="bkd-card">
            <div class="bkd-card-top">
                <div>
                    <div class="bkd-card-title">Data Anggota</div>
                    <div class="bkd-card-sub">Rekap keanggotaan aktif</div>
                </div>
            </div>

            <div class="bkd-big-num">{{ $totalAnggota }}</div>
            <div class="bkd-anggota-lbl">Total Anggota Aktif</div>

            <div class="bkd-badge">
                <div class="bkd-badge-dot"></div>
                Aktif Berorganisasi
            </div>

            <hr class="bkd-dist-sep">
            <div class="bkd-dist-title">Distribusi Per Seksi</div>

            @forelse($distribusiSeksi as $s)
                @php
                    $maxVal = collect($distribusiSeksi)->max('n') ?: 1;
                    $pct    = $maxVal > 0 ? round(($s['n'] / $maxVal) * 100) : 0;
                @endphp
                <div class="bkd-seksi-row">
                    <div class="bkd-seksi-lbl">{{ $s['nama'] }}</div>
                    <div class="bkd-bar-track">
                        <div class="bkd-bar-fill" style="width: {{ $pct }}%"></div>
                    </div>
                    <div class="bkd-seksi-num">{{ $s['n'] }}</div>
                </div>
            @empty
                <div style="font-size:12px;color:#9ca3af;padding:6px 0;">Belum ada data seksi</div>
            @endforelse
        </div>

        {{-- Aksi Cepat Card --}}
        <div class="bkd-card">
            <div class="bkd-card-top">
                <div>
                    <div class="bkd-card-title">Aksi Cepat</div>
                    <div class="bkd-card-sub">Navigasi menu utama admin</div>
                </div>
            </div>

            <a href="{{ route('filament.admin.resources.produks.index') }}" class="qlink qlink-green">
                <span class="qlink-icon">🛍️</span>
                Kelola Produk Lapak
                <span class="qlink-arrow">→</span>
            </a>

            <a href="{{ route('filament.admin.resources.anggotas.index') }}" class="qlink qlink-blue">
                <span class="qlink-icon">👥</span>
                Kelola Anggota
                <span class="qlink-arrow">→</span>
            </a>

            <a href="{{ route('filament.admin.resources.events.index') }}" class="qlink qlink-purple">
                <span class="qlink-icon">📅</span>
                Kelola Event
                <span class="qlink-arrow">→</span>
            </a>

            <a href="{{ route('filament.admin.resources.sarans.index') }}" class="qlink qlink-amber">
                <span class="qlink-icon">💬</span>
                Saran & Kritik
                @if($saranBelumDibaca > 0)
                    <span class="qlink-badge">{{ $saranBelumDibaca }} baru</span>
                @endif
                <span class="qlink-arrow">→</span>
            </a>

            <a href="{{ route('filament.admin.pages.pengaturan') }}" class="qlink qlink-gray">
                <span class="qlink-icon">⚙️</span>
                Pengaturan Akun
                <span class="qlink-arrow">→</span>
            </a>
        </div>
    </div>

</div>
</x-filament-widgets::widget>