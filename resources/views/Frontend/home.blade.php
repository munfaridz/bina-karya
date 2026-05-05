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
            <div class="val">{{ $totalEvent }}</div>
            <div class="lbl">Event Tahun {{ date('Y') }}</div>
        </div>
    </div>
</section>


<!-- STRUKTUR ORGANISASI — ringkas, link ke halaman penuh -->
<section class="section bg-darker" id="struktur">
    <h2 class="section-title">Struktur Organisasi</h2>

    {{-- Tombol ke halaman lengkap --}}
    <div style="text-align:center; margin-top:28px;">
        <a href="{{ route('struktur') }}"
           style="display:inline-flex; align-items:center; gap:10px;
                  background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
                  color:#fff; font-weight:700; font-size:14px;
                  padding:13px 28px; border-radius:12px; text-decoration:none;
                  box-shadow: 0 8px 24px rgba(29,78,216,0.3);
                  transition: transform .2s, box-shadow .2s;">
            <span>👥</span>
            Lihat Struktur Organisasi Lengkap
            <span style="opacity:.7">→</span>
        </a>
        <div style="margin-top:10px; font-size:12px; color:rgba(147,197,253,0.4);">
            Termasuk 8 seksi dengan seluruh anggota
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