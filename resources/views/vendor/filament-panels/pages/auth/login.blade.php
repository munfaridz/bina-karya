<x-filament-panels::page.simple>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&family=DM+Mono:wght@500&display=swap" rel="stylesheet">

<style>
* { box-sizing: border-box; }
body { font-family: 'Plus Jakarta Sans', sans-serif !important; margin: 0; }

.fi-simple-layout {
    background: #080f20 !important;
    min-height: 100vh !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 24px 16px !important;
    position: relative !important;
}
.fi-simple-main-ctn, .fi-simple-main {
    width: 100% !important; max-width: 720px !important;
    margin: 0 auto !important; padding: 0 !important;
    background: transparent !important; box-shadow: none !important;
    border-radius: 0 !important;
}
.fi-simple-page {
    background: transparent !important; box-shadow: none !important;
    border: none !important; padding: 0 !important;
    width: 100% !important; border-radius: 0 !important;
}
.fi-simple-layout .fi-logo,
.fi-simple-page-heading,
.fi-simple-page-subheading { display: none !important; }

/* BG orbs */
.bk-orb { position:fixed; border-radius:50%; pointer-events:none; z-index:0; filter:blur(70px); }
.bk-orb1 { width:500px;height:500px;background:rgba(29,78,216,0.18);top:-150px;right:-150px;animation:of1 8s ease-in-out infinite; }
.bk-orb2 { width:400px;height:400px;background:rgba(99,102,241,0.12);bottom:-100px;left:-100px;animation:of2 10s ease-in-out infinite; }
.bk-orb3 { width:280px;height:280px;background:rgba(34,211,238,0.07);top:40%;left:40%;animation:of3 12s ease-in-out infinite; }
@keyframes of1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-30px,20px)} }
@keyframes of2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(40px,-30px)} }
@keyframes of3 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-40px,30px)} }

.bk-grid { position:fixed;inset:0;background-image:radial-gradient(rgba(59,130,246,0.07) 1px,transparent 1px);background-size:32px 32px;z-index:0;pointer-events:none; }

/* Card */
.bk-wrap {
    display:grid; grid-template-columns:1fr 1fr;
    border-radius:20px; overflow:hidden; position:relative; z-index:2;
    box-shadow:0 24px 80px rgba(0,0,0,0.5),0 0 0 1px rgba(59,130,246,0.15);
    animation:cin .5s cubic-bezier(.16,1,.3,1) both;
}
@keyframes cin { from{opacity:0;transform:translateY(20px) scale(.98)} to{opacity:1;transform:none} }

/* Kiri */
.bk-left {
    background:linear-gradient(155deg,#0f172a 0%,#1a3461 55%,#1e4fc2 100%);
    padding:36px 30px; display:flex; flex-direction:column;
    justify-content:space-between; position:relative; overflow:hidden; min-height:480px;
}
.bk-left-grid {
    position:absolute;inset:0;
    background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);
    background-size:28px 28px;pointer-events:none;
}
.lo1 { position:absolute;width:220px;height:220px;border-radius:50%;background:rgba(59,130,246,.14);top:-60px;right:-60px;animation:of1 8s ease-in-out infinite; }
.lo2 { position:absolute;width:150px;height:150px;border-radius:50%;background:rgba(99,102,241,.1);bottom:10px;left:-50px;animation:of2 10s ease-in-out infinite; }

.bk-particle { position:absolute;border-radius:50%;pointer-events:none;animation:pfloat linear infinite; }
@keyframes pfloat { 0%{transform:translateY(0) translateX(0);opacity:0} 10%{opacity:1} 90%{opacity:.5} 100%{transform:translateY(-100px) translateX(15px);opacity:0} }

.bk-brand { display:flex;align-items:center;gap:10px;position:relative;z-index:1; }
.bk-brand-logo { width:38px;height:38px;border-radius:10px;overflow:hidden;border:1px solid rgba(255,255,255,.18);flex-shrink:0; }
.bk-brand-logo img { width:100%;height:100%;object-fit:cover; }
.bk-brand-name { font-size:13px;font-weight:800;color:#fff;line-height:1.2; }
.bk-brand-sub  { font-size:10px;color:rgba(255,255,255,.35); }

.bk-hero { position:relative;z-index:1; }
.bk-hero-title { font-size:26px;font-weight:800;color:#fff;line-height:1.2;margin-bottom:10px;letter-spacing:-.4px;animation:fup .6s .1s cubic-bezier(.16,1,.3,1) both; }
.bk-hero-title em { font-style:normal;background:linear-gradient(135deg,#60a5fa,#22d3ee);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text; }
.bk-hero-desc { font-size:12px;color:rgba(255,255,255,.4);line-height:1.75;max-width:240px;animation:fup .6s .2s cubic-bezier(.16,1,.3,1) both; }
@keyframes fup { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:none} }

.bk-stats { display:flex;gap:18px;position:relative;z-index:1;animation:fup .6s .3s cubic-bezier(.16,1,.3,1) both; }
.bk-sv { font-size:22px;font-weight:800;color:#60a5fa;font-family:'DM Mono',monospace;line-height:1;animation:npop .4s .8s cubic-bezier(.34,1.56,.64,1) both; }
@keyframes npop { from{transform:scale(.6);opacity:0} to{transform:none;opacity:1} }
.bk-sl { font-size:9px;color:rgba(255,255,255,.3);text-transform:uppercase;letter-spacing:1.3px;margin-top:4px;font-weight:600; }

/* Kanan */
.bk-right {
    background:#0d1729;
    border-left:1px solid rgba(59,130,246,.12);
    padding:40px 36px; display:flex; flex-direction:column; justify-content:center;
}
.bk-right-title { font-size:22px;font-weight:800;color:#f1f5f9;margin-bottom:4px;letter-spacing:-.3px;animation:fup .5s .15s cubic-bezier(.16,1,.3,1) both; }
.bk-right-sub { font-size:12px;color:#475569;margin-bottom:28px;animation:fup .5s .2s cubic-bezier(.16,1,.3,1) both; }

/* ══ FIX UTAMA: LABEL & INPUT WARNA ══ */
.bk-right .fi-fo-field-wrp { margin-bottom:16px !important; animation:fup .5s .25s cubic-bezier(.16,1,.3,1) both; }

/* Label — force warna terlihat */
.bk-right label,
.bk-right .fi-fo-field-wrp label,
.bk-right [class*="fi-fo"] label {
    display: block !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    color: #ffffff !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    margin-bottom: 7px !important;
    font-family: 'Plus Jakarta Sans', sans-serif !important;
}

/* Input wrapper */
.bk-right .fi-input-wrp {
    background: #0a1628 !important;
    border: 1.5px solid rgba(59,130,246,0.25) !important;
    border-radius: 10px !important;
    overflow: hidden !important;
    transition: border-color .2s, box-shadow .2s !important;
}
.bk-right .fi-input-wrp:focus-within {
    border-color: #3b82f6 !important;
    box-shadow: 0 0 0 3px rgba(59,130,246,0.15) !important;
    background: #060e1e !important;
}

/* Input field sendiri */
.bk-right input[type="email"],
.bk-right input[type="password"],
.bk-right input[type="text"],
.bk-right .fi-input {
    background: transparent !important;
    border: none !important;
    color: #e2e8f0 !important;
    font-size: 14px !important;
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    padding: 11px 13px !important;
    width: 100% !important;
    outline: none !important;
    -webkit-text-fill-color: #e2e8f0 !important;
    caret-color: #60a5fa !important;
}
.bk-right input::placeholder,
.bk-right .fi-input::placeholder {
    color: #334155 !important;
    -webkit-text-fill-color: #334155 !important;
}

/* Eye toggle password */
.bk-right .fi-input-suffix-item button,
.bk-right .fi-input-suffix-item svg { color: #475569 !important; }
.bk-right .fi-input-suffix-item button:hover { color: #e2e8f0 !important; }

/* Remember me checkbox */
.bk-right .fi-fo-checkbox-option-label,
.bk-right .fi-fo-checkbox label {
    color: #475569 !important;
    font-size: 12px !important;
    font-weight: 500 !important;
    text-transform: none !important;
    letter-spacing: 0 !important;
}

/* Tombol submit */
.bk-right .fi-btn-primary,
.bk-right button[type="submit"] {
    width: 100% !important;
    padding: 13px 20px !important;
    background: linear-gradient(135deg, #1d4ed8 0%, #0ea5e9 100%) !important;
    color: #fff !important;
    -webkit-text-fill-color: #fff !important;
    border: none !important;
    border-radius: 10px !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    font-family: 'Plus Jakarta Sans', sans-serif !important;
    cursor: pointer !important;
    box-shadow: 0 8px 24px rgba(29,78,216,0.35) !important;
    transition: transform .15s, box-shadow .2s !important;
    justify-content: center !important;
    margin-top: 8px !important;
    display: flex !important;
    align-items: center !important;
    animation: fup .5s .35s cubic-bezier(.16,1,.3,1) both;
}
.bk-right button[type="submit"]:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 14px 32px rgba(29,78,216,0.45) !important;
}
.bk-right button[type="submit"]:active { transform: translateY(0) !important; }

.bk-footer { margin-top:22px;font-size:11px;color:#1e293b;text-align:center;line-height:1.7;animation:fup .5s .4s cubic-bezier(.16,1,.3,1) both; }

/* Error message */
.fi-fo-field-wrp-error-message { color:#f87171 !important; font-size:11px !important; margin-top:5px !important; }
/* Tambahan fix label Filament */
.bk-right span,
.bk-right .fi-fo-field-wrp-label span,
.bk-right p[class*="label"],
.bk-right div[class*="label"] {
    color: #ffffff !important;
    -webkit-text-fill-color: #ffffff !important;
}
.bk-right .fi-input-wrp.fi-input-wrp-error {
    border-color: rgba(239,68,68,0.5) !important;
}
/* Fix bintang required */
.bk-right .fi-fo-field-wrp-label sup,
.bk-right sup,
.bk-right [class*="required"],
.bk-right abbr[title="required"] {
    color: #fa6060 !important;
    -webkit-text-fill-color: #fa6060 !important;
}

/* ══ MOBILE ══ */
@media (max-width: 640px) {
    .fi-simple-layout { padding:0 !important; align-items:stretch !important; }
    .fi-simple-main-ctn,.fi-simple-main { max-width:100% !important; }
    .bk-wrap { grid-template-columns:1fr; border-radius:0; min-height:100dvh; box-shadow:none; }
    .bk-left { min-height:auto; padding:24px 20px 28px; }
    .bk-hero-title { font-size:22px; }
    .bk-stats { gap:14px; }
    .bk-sv { font-size:18px; }
    .bk-right { padding:28px 20px 36px; }
    .bk-right-title { font-size:19px; }
}
</style>

<div class="bk-grid"></div>
<div class="bk-orb bk-orb1"></div>
<div class="bk-orb bk-orb2"></div>
<div class="bk-orb bk-orb3"></div>

<div class="bk-wrap">

    {{-- KIRI --}}
    <div class="bk-left">
        <div class="bk-left-grid"></div>
        <div class="lo1"></div><div class="lo2"></div>
        <div class="bk-particle" style="width:4px;height:4px;background:rgba(96,165,250,.7);left:22%;bottom:18%;animation-duration:6s;"></div>
        <div class="bk-particle" style="width:3px;height:3px;background:rgba(34,211,238,.6);left:62%;bottom:28%;animation-duration:8s;animation-delay:2s;"></div>
        <div class="bk-particle" style="width:5px;height:5px;background:rgba(99,102,241,.5);left:42%;bottom:12%;animation-duration:7s;animation-delay:4s;"></div>

        <div class="bk-brand">
            <div class="bk-brand-logo"><img src="{{ asset('images/logo.jpg') }}" alt="Logo"></div>
            <div>
                <div class="bk-brand-name">Karangtaruna</div>
                <div class="bk-brand-sub">Bina Karya</div>
            </div>
        </div>

        <div class="bk-hero">
            <div class="bk-hero-title">Portal <em>Admin</em><br>Bina Karya</div>
            <div class="bk-hero-desc">Kelola data anggota, lapak online, event, dan aspirasi organisasi dalam satu panel terpadu.</div>
        </div>

        <div class="bk-stats">
            <div>
                <div class="bk-sv">{{ \App\Models\Anggota::where('status','aktif')->count() }}</div>
                <div class="bk-sl">Anggota</div>
            </div>
            <div>
                <div class="bk-sv">{{ \App\Models\Produk::where('tersedia',true)->count() }}</div>
                <div class="bk-sl">Produk</div>
            </div>
            <div>
                <div class="bk-sv">{{ \App\Models\Event::whereYear('created_at',date('Y'))->count() }}</div>
                <div class="bk-sl">Event {{ date('Y') }}</div>
            </div>
        </div>
    </div>

    {{-- KANAN --}}
    <div class="bk-right">
        <div class="bk-right-title">Masuk ke Panel</div>
        <div class="bk-right-sub">Masukkan kredensial akun administrator</div>

        <x-filament-panels::form id="form" wire:submit="authenticate">
            {{ $this->form }}
            <x-filament::button type="submit" form="form" size="xl">
                Masuk ke Dashboard →
            </x-filament::button>
        </x-filament-panels::form>

        <div class="bk-footer">
            Hanya akun admin yang memiliki akses<br>
            &copy; {{ date('Y') }} Karangtaruna Bina Karya
        </div>
    </div>

</div>

</x-filament-panels::page.simple>