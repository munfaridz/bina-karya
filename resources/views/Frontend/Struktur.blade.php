@extends('layouts.app')

@section('title', 'Struktur Organisasi — Karangtaruna Bina Karya')

@section('content')

<section class="section bg-darker" style="min-height:100vh; padding-top: 48px;">

    {{-- Back button --}}
    <div style="max-width:1100px; margin:0 auto 24px; padding:0 16px;">
        <a href="{{ route('home') }}#struktur"
           style="display:inline-flex; align-items:center; gap:8px; color:rgba(147,197,253,0.7);
                  font-size:13px; font-weight:600; text-decoration:none;
                  background:rgba(255,255,255,0.04); border:1px solid rgba(59,130,246,0.15);
                  border-radius:8px; padding:8px 14px; transition:all .2s;">
            ← Kembali ke Beranda
        </a>
    </div>

    <h2 class="section-title">Struktur Organisasi</h2>
    <p style="text-align:center; color:rgba(147,197,253,0.5); font-size:13px; margin:-8px 0 28px;">
        Karangtaruna Bina Karya — Kepengurusan Aktif
    </p>

    <div class="org-wrap">
        <div class="org-tree">

            {{-- KETUA --}}
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

            {{-- WAKIL KETUA --}}
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

            {{-- SEKRETARIS & BENDAHARA --}}
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

            {{-- SEKSI --}}
            @php
            $semuaSeksi = [
                ['seksi'=>'Seksi Sinoman','ketua'=>['nama'=>'PUTRA','foto'=>'putra.jpg'],'anggota'=>[
                    ['nama'=>'GANI','foto'=>'gani.jpg'],['nama'=>'ANDIKA','foto'=>'andika.jpg'],
                    ['nama'=>'ANAS','foto'=>'anas.jpg'],['nama'=>'BAGAS','foto'=>'bagas.jpg'],['nama'=>'HESTI','foto'=>'hesti.jpg'],
                ]],
                ['seksi'=>'Seksi Agama','ketua'=>['nama'=>'ADIT','foto'=>'adit.jpg'],'anggota'=>[
                    ['nama'=>'REFLIN','foto'=>'reflin.jpg'],['nama'=>'KHARIS','foto'=>'kharis.jpg'],
                    ['nama'=>'VINA','foto'=>'vina.jpg'],['nama'=>'ZAHWA','foto'=>'zahwa.jpg'],
                ]],
                ['seksi'=>'Seksi Humas','ketua'=>['nama'=>'RIZAL','foto'=>'rizal.jpg'],'anggota'=>[
                    ['nama'=>'RIAN','foto'=>'rian.jpg'],['nama'=>'ALIF','foto'=>'alif.jpg'],
                    ['nama'=>'YAYAH','foto'=>'yayah.jpg'],['nama'=>'BAYU','foto'=>'bayu.jpg'],
                    ['nama'=>'GALIH','foto'=>'galih.jpg'],['nama'=>'FITRI','foto'=>'fitri.jpg'],
                    ['nama'=>'ALDI','foto'=>'aldi.jpg'],['nama'=>'RIDHO','foto'=>'ridho.jpg'],
                    ['nama'=>'NATASYA AP','foto'=>'natasya_ap.jpg'],
                ]],
                ['seksi'=>'Seksi Kesenian','ketua'=>['nama'=>'ABDUL','foto'=>'abdul.jpg'],'anggota'=>[
                    ['nama'=>'TEGAR','foto'=>'tegar.jpg'],['nama'=>'IQBAL','foto'=>'iqbal.jpg'],
                    ['nama'=>'NIA','foto'=>'nia.jpg'],['nama'=>'NATASYA AZ','foto'=>'natasya_az.jpg'],
                ]],
                ['seksi'=>'Seksi Olahraga','ketua'=>['nama'=>'RAYHAN','foto'=>'rayhan.jpg'],'anggota'=>[
                    ['nama'=>'GUNTUR','foto'=>'guntur.jpg'],['nama'=>'WULAN','foto'=>'wulan.jpg'],['nama'=>'SISKA','foto'=>'siska.jpg'],
                ]],
                ['seksi'=>'Seksi Dokumentasi','ketua'=>['nama'=>'RISKI','foto'=>'riski.jpg'],'anggota'=>[
                    ['nama'=>'FIKA','foto'=>'fika.jpg'],['nama'=>'TIA','foto'=>'tia.jpg'],
                ]],
                ['seksi'=>'Seksi Dekorasi','ketua'=>['nama'=>'REVAL','foto'=>'reval.jpg'],'anggota'=>[
                    ['nama'=>'REVANO','foto'=>'revano.jpg'],['nama'=>'ZAKI','foto'=>'zaki.jpg'],
                ]],
                ['seksi'=>'Seksi Keamanan','ketua'=>['nama'=>'TEGUH','foto'=>'teguh.jpg'],'anggota'=>[
                    ['nama'=>'DEDI','foto'=>'dedi.jpg'],['nama'=>'SURYA','foto'=>'surya.jpg'],['nama'=>'CAHYO','foto'=>'cahyo.jpg'],
                ]],
            ];
            @endphp

            <div class="org-level-label">Seksi</div>
            <div class="org-seksi-grid">
                @foreach($semuaSeksi as $seksi)
                <div class="org-seksi-wrap">
                    <div class="org-seksi-header">{{ $seksi['seksi'] }}</div>
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
                    <div class="org-branch-line-v"></div>
                    <div class="org-branch-h-wrap">
                        <div class="org-branch-h-line" style="width:calc({{ count($seksi['anggota']) }} * 72px - 12px);max-width:100%"></div>
                    </div>
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

@endsection
