<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Karangtaruna Bina Karya')</title>

    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        /* ── VARIABLES ── */
        :root {
            --navy-dark: #0a0e1a;
            --navy: #0f1729;
            --navy-mid: #162040;
            --blue: #1d4ed8;
            --blue-light: #3b82f6;
            --blue-pale: #7dd3fc;
            --accent-cyan: #22d3ee;
            --glass: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--navy-dark);
            color: #cbd5e1;
            margin: 0;
        }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: var(--navy-dark); }
        ::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 4px; }

        /* ── NAVBAR ── */
        .navbar {
            background: rgba(8, 15, 32, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 0 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--glass-border);
        }
        .navbar .logo-area { display: flex; align-items: center; gap: 12px; }
        .navbar .logo-img { width: 38px; height: 38px; border-radius: 10px; border: 1.5px solid rgba(96,165,250,0.4); object-fit: cover; }
        .navbar .brand-name { color: #fff; font-family: 'Syne', sans-serif; font-size: 15px; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; }
        .navbar .brand-name span { color: var(--blue-pale); }
        .navbar-menu { display: flex; gap: 4px; align-items: center; }
        .navbar-menu a { color: rgba(147,197,253,0.7); font-size: 13px; font-weight: 500; text-decoration: none; padding: 6px 14px; border-radius: 8px; transition: all .2s; letter-spacing: .3px; }
        .navbar-menu a:hover { color: #fff; background: var(--glass); }
        .navbar-menu a.active { color: #fff; background: rgba(59,130,246,0.15); border: 1px solid rgba(59,130,246,0.3); }
        .navbar-admin-btn { color: rgba(251,191,36,0.8) !important; border: 1px solid rgba(251,191,36,0.2) !important; background: rgba(251,191,36,0.05) !important; }
        .navbar-admin-btn:hover { color: #fbbf24 !important; border-color: rgba(251,191,36,0.5) !important; background: rgba(251,191,36,0.1) !important; }

        /* ── HERO ── */
        .hero {
            background: var(--navy);
            padding: 100px 5% 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 92vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(ellipse 100% 70% at 50% -10%, rgba(34,211,238,0.12) 0%, transparent 60%),
                radial-gradient(ellipse 80% 60% at 10% 80%, rgba(29,78,216,0.3) 0%, transparent 55%),
                radial-gradient(ellipse 60% 50% at 90% 90%, rgba(59,130,246,0.15) 0%, transparent 55%);
            pointer-events: none;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 220px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 220'%3E%3Cpath fill='rgba(29,78,216,0.12)' d='M0,128L60,117.3C120,107,240,85,360,96C480,107,600,149,720,154.7C840,160,960,128,1080,112C1200,96,1320,96,1380,96L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z'/%3E%3Cpath fill='rgba(34,211,238,0.06)' d='M0,192L60,176C120,160,240,128,360,122.7C480,117,600,139,720,144C840,149,960,133,1080,122.7C1200,112,1320,112,1380,117.3L1440,122L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z'/%3E%3C/svg%3E") no-repeat bottom center / cover;
            pointer-events: none;
            z-index: 0;
        }
        .hero-inner {
            position: relative;
            z-index: 2;
            max-width: 680px;
            margin: 0 auto;
        }
        .hero-logo {
            width: 96px; height: 96px;
            border-radius: 24px;
            background: rgba(34,211,238,0.08);
            border: 1.5px solid rgba(34,211,238,0.25);
            margin: 0 auto 28px;
            display: flex; align-items: center; justify-content: center;
            animation: floatLogo 4s ease-in-out infinite;
            box-shadow: 0 0 40px rgba(34,211,238,0.1);
        }
        .hero-logo img { width: 64px; height: 64px; border-radius: 16px; object-fit: cover; }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: 6px;
            background: rgba(34,211,238,0.08);
            border: 1px solid rgba(34,211,238,0.2);
            color: var(--accent-cyan);
            font-size: 11px; font-weight: 600; letter-spacing: 2.5px; text-transform: uppercase;
            padding: 5px 16px; border-radius: 100px; margin-bottom: 20px;
        }
        .hero-eyebrow::before {
            content: ''; width: 5px; height: 5px;
            background: var(--accent-cyan); border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }
        .hero h1 {
            color: #f0f9ff; font-family: 'Outfit', sans-serif;
            font-size: clamp(36px, 5.5vw, 58px); font-weight: 800;
            line-height: 1.05; letter-spacing: -1.5px; margin-bottom: 18px;
        }
        .hero h1 span {
            background: linear-gradient(135deg, var(--accent-cyan) 0%, #7dd3fc 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
        }
        .hero p { color: rgba(148,163,184,0.85); font-size: 16px; line-height: 1.75; max-width: 460px; margin: 0 auto 36px; font-weight: 300; }
        .hero-socmed { display: flex; align-items: center; justify-content: center; gap: 10px; margin-bottom: 24px; flex-wrap: wrap; }
        .socmed-btn { display: inline-flex; align-items: center; gap: 7px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: rgba(148,163,184,0.8); font-size: 12px; font-weight: 500; padding: 7px 14px; border-radius: 100px; text-decoration: none; transition: all .2s; }
        .socmed-btn:hover { background: rgba(34,211,238,0.08); border-color: rgba(34,211,238,0.3); color: var(--accent-cyan); transform: translateY(-2px); }
        .hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
        .btn-primary { background: linear-gradient(135deg, var(--accent-cyan), #0ea5e9); color: #0a0e1a; border: none; padding: 14px 32px; border-radius: 100px; font-size: 14px; font-weight: 700; cursor: pointer; transition: all .25s; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; font-family: 'DM Sans', sans-serif; box-shadow: 0 8px 24px rgba(34,211,238,0.25); }
        .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 16px 36px rgba(34,211,238,0.35); }
        .btn-outline { background: transparent; color: #7dd3fc; border: 1.5px solid rgba(125,211,252,0.3); padding: 14px 32px; border-radius: 100px; font-size: 14px; font-weight: 500; cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all .25s; font-family: 'DM Sans', sans-serif; }
        .btn-outline:hover { border-color: var(--accent-cyan); color: var(--accent-cyan); background: rgba(34,211,238,0.05); }

        /* ── SECTIONS ── */
        .section { padding: 72px 5%; }
        .section-title { font-family: 'Syne', sans-serif; font-size: 22px; font-weight: 700; color: #fff; margin-bottom: 32px; display: flex; align-items: center; gap: 12px; }
        .section-title::before { content: ''; width: 4px; height: 22px; background: linear-gradient(180deg, #60a5fa, #1d4ed8); border-radius: 2px; flex-shrink: 0; }

        /* ── STATS ── */
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; }
        .stat-card { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 20px; padding: 28px 24px; text-align: center; position: relative; overflow: hidden; backdrop-filter: blur(10px); transition: transform .2s, border-color .2s; }
        .stat-card:hover { transform: translateY(-4px); border-color: rgba(59,130,246,0.35); }
        .stat-card .val { font-family: 'Outfit', sans-serif; font-size: 36px; font-weight: 800; background: linear-gradient(135deg, #fff, var(--accent-cyan)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1.1; }
        .stat-card .lbl { font-size: 12px; color: rgba(147,197,253,0.6); margin-top: 8px; font-weight: 500; letter-spacing: .5px; text-transform: uppercase; }

        /* ── ORG CHART ── */
        .org-wrap { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 20px; padding: 32px 20px; backdrop-filter: blur(10px); overflow-x: auto; }
        .org-tree { display: flex; flex-direction: column; align-items: center; gap: 0; width: 100%; }
        .org-row { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
        .org-card { display: flex; flex-direction: column; align-items: center; background: rgba(17,32,64,0.8); border-radius: 14px; padding: 12px 14px 10px; min-width: 110px; border: 1px solid rgba(59,130,246,0.2); text-align: center; transition: border-color .2s, transform .2s; }
        .org-card:hover { border-color: rgba(96,165,250,0.5); transform: translateY(-2px); }
        .org-foto { width: 60px; height: 60px; border-radius: 50%; overflow: hidden; border: 2px solid rgba(96,165,250,0.3); margin-bottom: 7px; background: rgba(17,32,64,0.8); }
        .org-foto img { width: 100%; height: 100%; object-fit: cover; }
        .org-foto-placeholder { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-family: 'Syne', sans-serif; font-size: 18px; font-weight: 800; color: #93c5fd; background: rgba(29,78,216,0.2); }
        .org-level-label { font-size: 11px; font-weight: 600; color: rgba(147,197,253,0.5); text-transform: uppercase; letter-spacing: 1.5px; margin: 16px 0 8px; text-align: center; }
        .org-seksi-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px; width: 100%; margin-top: 8px; }
        .org-seksi-wrap { background: rgba(17,32,64,0.6); border: 1px solid rgba(59,130,246,0.15); border-radius: 16px; padding: 16px; display: flex; flex-direction: column; align-items: center; }
        .org-seksi-header { font-size: 11px; font-weight: 700; color: var(--accent-cyan); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 12px; text-align: center; }
        .org-seksi-ketua-wrap { display: flex; justify-content: center; }
        .org-card--ketua-seksi { border-color: rgba(34,211,238,0.3); background: rgba(34,211,238,0.05); }
        .org-badge-ketua { font-size: 9px; font-weight: 700; color: var(--accent-cyan); background: rgba(34,211,238,0.1); border: 1px solid rgba(34,211,238,0.2); border-radius: 100px; padding: 2px 8px; margin: 4px 0; text-transform: uppercase; letter-spacing: 1px; }
        .org-branch-line-v { width: 1px; height: 16px; background: rgba(59,130,246,0.25); margin: 0 auto; }
        .org-branch-line-v-sm { width: 1px; height: 10px; background: rgba(59,130,246,0.2); margin: 0 auto; }
        .org-branch-h-wrap { display: flex; justify-content: center; width: 100%; overflow: hidden; }
        .org-branch-h-line { height: 1px; background: rgba(59,130,246,0.2); margin: 0 auto; }
        .org-anggota-row { display: flex; flex-wrap: wrap; justify-content: center; gap: 6px; margin-top: 0; }
        .org-anggota-wrap { display: flex; flex-direction: column; align-items: center; }
        .org-card--anggota { min-width: 60px; padding: 8px 6px 6px; }
        .org-foto--md { width: 52px; height: 52px; }
        .org-foto--sm { width: 40px; height: 40px; margin-bottom: 0; }
        .org-sublabel { font-size: 9px; color: rgba(147,197,253,0.5); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
        .org-name { font-size: 11px; font-weight: 600; color: #e2e8f0; }
        .org-connector { width: 1px; height: 20px; background: rgba(59,130,246,0.25); margin: 0 auto; }

        /* ── EVENTS ── */
        .events-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 18px; }
        .event-card { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 16px; overflow: hidden; transition: transform .2s, border-color .2s; }
        .event-card:hover { transform: translateY(-3px); border-color: rgba(59,130,246,0.3); }
        .event-img { width: 100%; height: 160px; overflow: hidden; }
        .event-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; }
        .event-card:hover .event-img img { transform: scale(1.04); }
        .event-img-empty { width: 100%; height: 160px; background: var(--navy-mid); display: flex; align-items: center; justify-content: center; }
        .event-bottom { display: flex; gap: 12px; padding: 14px; align-items: flex-start; }
        .event-date-col { text-align: center; min-width: 36px; flex-shrink: 0; }
        .event-date-col .day { font-family: 'Outfit', sans-serif; font-size: 22px; font-weight: 800; color: var(--accent-cyan); line-height: 1; }
        .event-date-col .mon { font-size: 10px; font-weight: 600; color: rgba(147,197,253,0.6); text-transform: uppercase; letter-spacing: 1px; }
        .event-info .title { font-size: 13px; font-weight: 600; color: #e2e8f0; margin-bottom: 4px; line-height: 1.4; }
        .event-info .desc { font-size: 11px; color: #64748b; line-height: 1.5; margin-bottom: 6px; }
        .event-info .lokasi { font-size: 10px; color: rgba(147,197,253,0.5); margin-bottom: 6px; }
        .event-info .badge { display: inline-block; font-size: 9px; font-weight: 700; padding: 2px 8px; border-radius: 100px; text-transform: uppercase; letter-spacing: 1px; }
        .badge.akan_datang { background: rgba(34,211,238,0.1); color: var(--accent-cyan); border: 1px solid rgba(34,211,238,0.2); }
        .badge.berlangsung { background: rgba(34,197,94,0.1); color: #86efac; border: 1px solid rgba(34,197,94,0.2); }
        .badge.selesai { background: rgba(100,116,139,0.1); color: #94a3b8; border: 1px solid rgba(100,116,139,0.2); }
        .events-empty { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 60px 20px; background: var(--glass); border: 1px solid var(--glass-border); border-radius: 20px; text-align: center; }
        .events-empty-icon { font-size: 48px; margin-bottom: 16px; line-height: 1; }
        .events-empty-title { font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 700; color: #e2e8f0; margin-bottom: 8px; }
        .events-empty-desc { font-size: 14px; color: #64748b; max-width: 320px; line-height: 1.6; }

        /* ── SARAN ── */
        .saran-layout { display: grid; grid-template-columns: 1fr 1fr; gap: 28px; max-width: 1000px; }
        .saran-wrap { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 20px; padding: 36px; backdrop-filter: blur(10px); max-width: 600px; }
        .saran-wrap .form-group { margin-bottom: 18px; }
        .saran-wrap label { display: block; font-size: 12px; font-weight: 600; color: rgba(147,197,253,0.7); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 1px; }
        .saran-wrap input, .saran-wrap textarea, .saran-wrap select { width: 100%; background: rgba(8,15,32,0.6); border: 1px solid rgba(59,130,246,0.2); border-radius: 10px; padding: 11px 14px; font-size: 14px; font-family: 'DM Sans', sans-serif; color: #e2e8f0; transition: border-color .2s; }
        .saran-wrap select option { background: #0d1b35; }
        .saran-wrap input:focus, .saran-wrap textarea:focus, .saran-wrap select:focus { outline: none; border-color: rgba(96,165,250,0.5); }
        .saran-wrap input::placeholder, .saran-wrap textarea::placeholder { color: rgba(147,197,253,0.3); }
        .saran-info { display: flex; flex-direction: column; gap: 14px; }
        .saran-info-card { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 16px; padding: 20px; backdrop-filter: blur(10px); display: flex; flex-direction: column; gap: 6px; transition: border-color .2s; }
        .saran-info-card:hover { border-color: rgba(59,130,246,0.3); }
        .saran-info-card--contact { gap: 10px; }
        .saran-info-icon { font-size: 24px; line-height: 1; }
        .saran-info-title { font-size: 14px; font-weight: 700; color: #e2e8f0; }
        .saran-info-desc { font-size: 12px; color: #64748b; line-height: 1.6; }
        .saran-contact-link { display: flex; align-items: center; gap: 8px; color: rgba(147,197,253,0.7); font-size: 13px; text-decoration: none; padding: 8px 12px; border-radius: 8px; border: 1px solid rgba(59,130,246,0.15); background: rgba(8,15,32,0.4); transition: all .2s; }
        .saran-contact-link:hover { color: var(--accent-cyan); border-color: rgba(34,211,238,0.3); background: rgba(34,211,238,0.05); }

        /* ── LAPAK ── */
        .lapak-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 18px; }
        .lapak-card { background: var(--glass); border: 1px solid var(--glass-border); border-radius: 14px; overflow: hidden; transition: transform .2s, box-shadow .2s, border-color .2s; position: relative; }
        .lapak-card:hover { transform: translateY(-3px); box-shadow: 0 10px 32px rgba(59,130,246,0.12); border-color: rgba(59,130,246,0.3); }
        .lapak-badge-diskon { position: absolute; top: 8px; left: 8px; background: #ef4444; color: #fff; font-size: 10px; font-weight: 700; padding: 2px 7px; border-radius: 5px; z-index: 2; }
        .lapak-img { width: 100%; aspect-ratio: 1/1; overflow: hidden; background: var(--navy-mid); }
        .lapak-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .3s; }
        .lapak-card:hover .lapak-img img { transform: scale(1.05); }
        .lapak-img-empty { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 36px; }
        .lapak-body { padding: 12px; }
        .lapak-kategori { font-size: 10px; color: #64748b; margin-bottom: 3px; }
        .lapak-nama { font-size: 13px; font-weight: 600; color: #e2e8f0; margin-bottom: 6px; line-height: 1.4; }
        .lapak-harga-wrap { display: flex; align-items: baseline; flex-wrap: wrap; gap: 4px; margin-bottom: 4px; }
        .lapak-harga { font-size: 14px; font-weight: 700; color: var(--accent-cyan); }
        .lapak-harga-coret { font-size: 10px; color: #475569; text-decoration: line-through; }
        .lapak-satuan { font-size: 10px; color: #475569; }
        .lapak-penjual { font-size: 10px; color: #64748b; margin-bottom: 10px; }
        .lapak-btn-wa { display: flex; align-items: center; justify-content: center; gap: 5px; background: #16a34a; color: #fff; border-radius: 7px; padding: 7px; font-size: 11px; font-weight: 600; text-decoration: none; transition: background .2s; }
        .lapak-btn-wa:hover { background: #15803d; }

        /* ── UTILS ── */
        .alert-sukses { background: rgba(34,197,94,0.1); color: #86efac; border: 1px solid rgba(34,197,94,0.2); padding: 12px 16px; border-radius: 10px; margin-bottom: 16px; font-size: 13px; font-weight: 600; }
        .bg-dark { background: var(--navy-dark); }
        .bg-darker { background: rgba(5,10,20,1); }
        .hero-location { display: inline-flex; align-items: center; gap: 5px; color: rgba(147,197,253,0.5); font-size: 12px; margin-bottom: 20px; }

        /* ── FOOTER ── */
        .footer { background: var(--navy-dark); border-top: 1px solid var(--glass-border); color: rgba(147,197,253,0.5); text-align: center; padding: 28px; font-size: 13px; margin-top: 40px; }
        .footer strong { color: rgba(147,197,253,0.9); }

        /* ── RESPONSIVE ── */

        /* Hamburger button */
        .navbar-hamburger {
            display: none;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            cursor: pointer;
            padding: 8px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 8px;
            background: var(--glass);
            min-width: 40px;
            min-height: 40px;
        }
        .navbar-hamburger span {
            display: block;
            width: 20px;
            height: 2px;
            background: #93c5fd;
            border-radius: 2px;
            transition: transform 0.3s, opacity 0.3s;
        }
        .navbar-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
        .navbar-hamburger.open span:nth-child(2) { opacity: 0; }
        .navbar-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

        @media (max-width: 820px) {
            /* ─── NAVBAR MOBILE ─── */
            .navbar {
                padding: 0 4%;
                position: relative;
                flex-wrap: wrap;
                height: auto;
                min-height: 56px;
            }
            .navbar-hamburger { display: flex; }
            .navbar-menu {
                display: none;
                flex-direction: column;
                width: 100%;
                background: rgba(8,15,32,0.97);
                border-top: 1px solid var(--glass-border);
                padding: 10px 0 14px;
                gap: 2px;
            }
            .navbar-menu.open { display: flex; }
            .navbar-menu a {
                padding: 11px 16px;
                font-size: 14px;
                border-radius: 0;
                width: 100%;
                display: block;
            }
            .brand-name { font-size: 13px; letter-spacing: 1px; }

            /* ─── HERO MOBILE ─── */
            .hero { padding: 60px 5% 50px; min-height: 80vh; }
            .hero h1 { font-size: clamp(28px, 8vw, 44px); letter-spacing: -0.5px; }
            .hero p { font-size: 14px; }
            .hero-logo { width: 76px; height: 76px; border-radius: 20px; margin-bottom: 20px; }
            .hero-logo img { width: 52px; height: 52px; }
            .hero-btns { flex-direction: column; align-items: center; gap: 10px; }
            .btn-primary, .btn-outline { width: 100%; max-width: 300px; justify-content: center; }
            .hero-socmed { gap: 8px; }
            .socmed-btn { font-size: 11px; padding: 6px 10px; }
            .hero-mandala { width: 180px; height: 180px; left: -70px; opacity: 0.7; }
            .hero-corner { width: 80px; height: 80px; }

            /* ─── SECTIONS MOBILE ─── */
            .section { padding: 44px 4%; }
            .section-title { font-size: 18px; }

            /* ─── STATS MOBILE ─── */
            .stats-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .stat-card { padding: 20px 16px; border-radius: 14px; }
            .stat-card .val { font-size: 28px; }
            .stat-card .lbl { font-size: 11px; }

            /* ─── ORG CHART MOBILE ─── */
            .org-wrap { padding: 20px 12px; overflow-x: auto; -webkit-overflow-scrolling: touch; }
            .org-seksi-grid { grid-template-columns: 1fr; gap: 16px; }
            .org-row { gap: 8px; }
            .org-card { min-width: 85px; padding: 10px 8px 8px; }
            .org-foto { width: 52px; height: 52px; }
            .org-foto--md { width: 48px; height: 48px; }
            .org-foto--sm { width: 36px; height: 36px; }
            .org-name { font-size: 10px; }
            .org-level-label { font-size: 10px; }
            .org-badge-ketua { font-size: 8px; padding: 1px 6px; }
            .org-anggota-row { gap: 4px; }
            .org-card--anggota { min-width: 50px; padding: 6px 4px 4px; }

            /* ─── EVENTS MOBILE ─── */
            .events-grid { grid-template-columns: 1fr; gap: 14px; }
            .event-img { height: 140px; }
            .event-bottom { padding: 12px; gap: 10px; }

            /* ─── SARAN MOBILE ─── */
            .saran-layout { grid-template-columns: 1fr; gap: 20px; }
            .saran-wrap { padding: 24px 18px; }
            .saran-info { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
            .saran-info-card--contact { grid-column: 1 / -1; }

            /* ─── LAPAK FILTER MOBILE ─── */
            .lapak-filter-bar {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
                padding: 14px 4%;
                top: 56px;
            }
            .filter-search { min-width: unset; width: 100%; }
            .kategori-pills { overflow-x: auto; flex-wrap: nowrap; padding-bottom: 4px; -webkit-overflow-scrolling: touch; }
            .kategori-pill { white-space: nowrap; flex-shrink: 0; }

            /* ─── LAPAK GRID MOBILE ─── */
            .produk-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .lapak-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .lapak-page-wrap { padding: 20px 4%; }
            .lapak-stats { gap: 14px; padding: 12px 4%; }
            .lapak-stat .val { font-size: 18px; }
            .lapak-stat .lbl { font-size: 10px; }

            /* ─── MODAL MOBILE ─── */
            .modal-overlay { padding: 0; align-items: flex-end; }
            .modal-box {
                border-radius: 20px 20px 0 0;
                max-width: 100%;
                max-height: 92vh;
                animation: modalInMobile .25s ease;
            }
            @keyframes modalInMobile {
                from { opacity:0; transform: translateY(30px); }
                to   { opacity:1; transform: translateY(0); }
            }
            .modal-img { aspect-ratio: 16/9; }
            .modal-content { padding: 18px; }
            .modal-nama { font-size: 17px; }
            .modal-harga { font-size: 19px; }
        }

        @media (max-width: 480px) {
            /* ─── VERY SMALL PHONES ─── */
            .hero { padding: 50px 4% 40px; min-height: 70vh; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .org-row { flex-wrap: wrap; justify-content: center; }
            .saran-info { grid-template-columns: 1fr; }
            .produk-grid { grid-template-columns: repeat(2, 1fr); gap: 8px; }
            .produk-body { padding: 10px; }
            .produk-nama { font-size: 12px; }
            .produk-harga { font-size: 13px; }
            .produk-btn-wa { font-size: 11px; padding: 7px 6px; }
            .produk-btn-detail { font-size: 11px; }
            .lapak-hero { padding: 40px 4% 28px; }
            .section { padding: 36px 4%; }
        }

        /* ════════════════════════════════════════════
           ORNAMEN ISLAM ANIMASI — HERO SECTION
        ════════════════════════════════════════════ */

        @keyframes floatLogo {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-8px); }
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50%       { opacity: 0.5; transform: scale(0.7); }
        }
        @keyframes rotateClockwise {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes rotateCounter {
            from { transform: rotate(0deg); }
            to   { transform: rotate(-360deg); }
        }
        @keyframes rotateSlowCW {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }
        @keyframes ornamentFloat {
            0%, 100% { transform: translateY(-50%); }
            50%       { transform: translateY(calc(-50% - 12px)); }
        }
        @keyframes cornerShimmer {
            0%, 100% { opacity: .5; }
            50%       { opacity: .95; }
        }
        @keyframes goldParticle {
            0%, 100% { transform: scale(0); opacity: 0; }
            40%, 60%  { transform: scale(1); opacity: 1; }
        }
        @keyframes frameDraw {
            from { stroke-dashoffset: 1400; }
            to   { stroke-dashoffset: 0; }
        }

        /* Wrapper ornamen — duduk absolute di dalam .hero */
        .hero-ornament-wrap {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 1;
            overflow: hidden;
        }

        /* Mandala kiri */
        .hero-mandala {
            position: absolute;
            left: -55px;
            top: 50%;
            width: 340px;
            height: 340px;
            transform: translateY(-50%);
            animation: ornamentFloat 6s ease-in-out infinite;
        }
        .hero-mandala .m-ring1 {
            transform-origin: 170px 170px;
            animation: rotateClockwise 22s linear infinite;
        }
        .hero-mandala .m-ring2 {
            transform-origin: 170px 170px;
            animation: rotateCounter 14s linear infinite;
        }
        .hero-mandala .m-ring3 {
            transform-origin: 170px 170px;
            animation: rotateSlowCW 8s linear infinite;
        }

        /* Frame emas full hero */
        .hero-frame-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }
        .hero-frame-svg .frame-line {
            stroke-dasharray: 1400;
            animation: frameDraw 2.8s ease-out forwards;
        }
        .hero-frame-svg .frame-line-2 {
            stroke-dasharray: 1200;
            animation: frameDraw 2.8s ease-out .35s forwards;
        }

        /* 4 sudut corner ornamen */
        .hero-corner {
            position: absolute;
            width: 130px;
            height: 130px;
            animation: cornerShimmer 3.5s ease-in-out infinite;
        }
        .hero-corner--tl { top: 0; left: 0; }
        .hero-corner--tr { top: 0; right: 0; transform: scaleX(-1); }
        .hero-corner--bl { bottom: 0; left: 0; transform: scaleY(-1); }
        .hero-corner--br { bottom: 0; right: 0; transform: scale(-1,-1); }

        /* Partikel emas */
        .hero-particle {
            position: absolute;
            width: 3px; height: 3px;
            border-radius: 50%;
            background: #d4aa50;
            animation: goldParticle 3s ease-in-out infinite;
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo-area">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo-img">
            <span class="brand-name">BINA <span>KARYA</span></span>
        </div>
        <button class="navbar-hamburger" id="navHamburger" aria-label="Buka menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <div class="navbar-menu" id="navMenu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="#struktur">Struktur</a>
            <a href="#events">Event</a>
            <a href="#saran">Saran</a>
            <a href="{{ route('lapak') }}" class="{{ request()->routeIs('lapak') ? 'active' : '' }}">🛒 Lapak</a>
            @auth
                <a href="{{ url('/admin') }}" class="navbar-admin-btn">⚙ Admin</a>
            @else
                <a href="{{ url('/admin/login') }}" class="navbar-admin-btn">🔐 Login Admin</a>
            @endauth
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <p>&copy; {{ date('Y') }} <strong>Karangtaruna Bina Karya</strong> — Bersama membangun generasi muda</p>
    </footer>

    @stack('scripts')

    {{-- ═══════════════════════════════════════════
         ORNAMEN HERO — diinjeksikan via JS
         Otomatis ditempel ke dalam section.hero
    ════════════════════════════════════════════ --}}
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const hero = document.querySelector('.hero');
        if (!hero) return;

        const ornament = document.createElement('div');
        ornament.className = 'hero-ornament-wrap';
        ornament.setAttribute('aria-hidden', 'true');
        ornament.innerHTML = `

        <!-- MANDALA KIRI -->
        <svg class="hero-mandala" viewBox="0 0 340 340" xmlns="http://www.w3.org/2000/svg">
            <!-- Ring luar CW -->
            <g class="m-ring1">
                <circle cx="170" cy="170" r="158" fill="none" stroke="#d4aa50" stroke-width=".8" stroke-opacity=".35" stroke-dasharray="10 7"/>
                <ellipse cx="170" cy="13"  rx="4" ry="8" fill="#d4aa50" fill-opacity=".55"/>
                <ellipse cx="170" cy="327" rx="4" ry="8" fill="#d4aa50" fill-opacity=".55"/>
                <ellipse cx="13"  cy="170" rx="8" ry="4" fill="#d4aa50" fill-opacity=".55"/>
                <ellipse cx="327" cy="170" rx="8" ry="4" fill="#d4aa50" fill-opacity=".55"/>
                <ellipse cx="58"  cy="58"  rx="4" ry="8" fill="#d4aa50" fill-opacity=".4" transform="rotate(45 58 58)"/>
                <ellipse cx="282" cy="58"  rx="4" ry="8" fill="#d4aa50" fill-opacity=".4" transform="rotate(-45 282 58)"/>
                <ellipse cx="58"  cy="282" rx="4" ry="8" fill="#d4aa50" fill-opacity=".4" transform="rotate(-45 58 282)"/>
                <ellipse cx="282" cy="282" rx="4" ry="8" fill="#d4aa50" fill-opacity=".4" transform="rotate(45 282 282)"/>
            </g>
            <!-- Ring tengah CCW + kelopak -->
            <g class="m-ring2">
                <circle cx="170" cy="170" r="126" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".5"/>
                <path d="M170 46 Q188 105 170 127 Q152 105 170 46Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".65"/>
                <path d="M170 294 Q188 235 170 213 Q152 235 170 294Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".65"/>
                <path d="M46 170 Q105 188 127 170 Q105 152 46 170Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".65"/>
                <path d="M294 170 Q235 188 213 170 Q235 152 294 170Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".65"/>
                <path d="M72 72  Q116 120 108 138 Q90 120  72 72Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".55"/>
                <path d="M268 72  Q224 120 232 138 Q250 120 268 72Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".55"/>
                <path d="M72 268  Q116 220 108 202 Q90 220  72 268Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".55"/>
                <path d="M268 268 Q224 220 232 202 Q250 220 268 268Z" fill="none" stroke="#d4aa50" stroke-width="1.1" stroke-opacity=".55"/>
            </g>
            <!-- Ring dalam CW cepat + bintang -->
            <g class="m-ring3">
                <circle cx="170" cy="170" r="86" fill="rgba(10,42,75,.75)" stroke="#d4aa50" stroke-width="1.5" stroke-opacity=".7"/>
                <polygon points="170,94  180,160 170,174 160,160" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".85"/>
                <polygon points="170,246 180,180 170,166 160,180" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".85"/>
                <polygon points="94,170  160,180 174,170 160,160" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".85"/>
                <polygon points="246,170 180,180 166,170 180,160" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".85"/>
                <polygon points="118,118 158,154 160,170 148,162" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".75"/>
                <polygon points="222,118 182,154 180,170 192,162" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".75"/>
                <polygon points="118,222 158,186 160,170 148,178" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".75"/>
                <polygon points="222,222 182,186 180,170 192,178" fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".75"/>
            </g>
            <!-- Bunga tengah -->
            <circle cx="170" cy="170" r="44" fill="none" stroke="#d4aa50" stroke-width="1.6" stroke-opacity=".8"/>
            <circle cx="170" cy="170" r="28" fill="none" stroke="#d4aa50" stroke-width="1.6" stroke-opacity=".9"/>
            <ellipse cx="170" cy="134" rx="9" ry="15" fill="rgba(212,170,80,.22)" stroke="#d4aa50" stroke-width="1.2" stroke-opacity=".9"/>
            <ellipse cx="170" cy="206" rx="9" ry="15" fill="rgba(212,170,80,.22)" stroke="#d4aa50" stroke-width="1.2" stroke-opacity=".9"/>
            <ellipse cx="134" cy="170" rx="15" ry="9" fill="rgba(212,170,80,.22)" stroke="#d4aa50" stroke-width="1.2" stroke-opacity=".9"/>
            <ellipse cx="206" cy="170" rx="15" ry="9" fill="rgba(212,170,80,.22)" stroke="#d4aa50" stroke-width="1.2" stroke-opacity=".9"/>
            <ellipse cx="144" cy="144" rx="9" ry="15" fill="rgba(212,170,80,.18)" stroke="#d4aa50" stroke-width="1" stroke-opacity=".8" transform="rotate(45 144 144)"/>
            <ellipse cx="196" cy="144" rx="9" ry="15" fill="rgba(212,170,80,.18)" stroke="#d4aa50" stroke-width="1" stroke-opacity=".8" transform="rotate(-45 196 144)"/>
            <ellipse cx="144" cy="196" rx="9" ry="15" fill="rgba(212,170,80,.18)" stroke="#d4aa50" stroke-width="1" stroke-opacity=".8" transform="rotate(-45 144 196)"/>
            <ellipse cx="196" cy="196" rx="9" ry="15" fill="rgba(212,170,80,.18)" stroke="#d4aa50" stroke-width="1" stroke-opacity=".8" transform="rotate(45 196 196)"/>
            <circle cx="170" cy="170" r="11" fill="#d4aa50" fill-opacity=".9"/>
            <circle cx="170" cy="170" r="5"  fill="#fff"    fill-opacity=".85"/>
        </svg>

        <!-- FRAME EMAS -->
        <svg class="hero-frame-svg" viewBox="0 0 1440 830" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <rect x="12" y="12" width="1416" height="806" rx="6"
                fill="none" stroke="#d4aa50" stroke-width="1.6" stroke-opacity=".5" class="frame-line"/>
            <rect x="24" y="24" width="1392" height="782" rx="3"
                fill="none" stroke="#d4aa50" stroke-width=".8" stroke-opacity=".3" class="frame-line-2"/>
            <!-- Scrollwork atas tengah -->
            <g fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".55" transform="translate(570,0)">
                <path d="M0 12 Q150 2 300 12"/>
                <path d="M30 12 Q90 28 150 22 Q210 16 270 24"/>
                <path d="M80 12 Q85 35 100 42 Q115 49 118 38 Q121 27 106 20 Q91 13 80 12Z" fill="rgba(212,170,80,.1)"/>
                <path d="M182 12 Q187 35 202 42 Q217 49 220 38 Q223 27 208 20 Q193 13 182 12Z" fill="rgba(212,170,80,.1)"/>
                <circle cx="150" cy="15" r="4" fill="#d4aa50" fill-opacity=".7"/>
                <circle cx="100" cy="20" r="3" fill="#d4aa50" fill-opacity=".55"/>
                <circle cx="200" cy="20" r="3" fill="#d4aa50" fill-opacity=".55"/>
            </g>
            <!-- Scrollwork bawah tengah -->
            <g fill="none" stroke="#d4aa50" stroke-width="1" stroke-opacity=".55" transform="translate(570,830) scale(1,-1)">
                <path d="M0 12 Q150 2 300 12"/>
                <circle cx="150" cy="15" r="4" fill="#d4aa50" fill-opacity=".7"/>
            </g>
            <!-- Arch kanan atas -->
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".65" transform="translate(1240,0)">
                <path d="M0 100 L0 24 Q0 12 12 12 L200 12"/>
                <path d="M10 100 L10 28 Q10 22 16 22 L200 22"/>
                <path d="M60 12 Q100 55 140 12" fill="rgba(212,170,80,.1)"/>
                <circle cx="60"  cy="12" r="4.5" fill="#d4aa50" fill-opacity=".8"/>
                <circle cx="140" cy="12" r="4.5" fill="#d4aa50" fill-opacity=".8"/>
                <circle cx="100" cy="48" r="6"   fill="#d4aa50" fill-opacity=".6"/>
            </g>
            <!-- Arch kanan bawah -->
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".65" transform="translate(1240,830) scale(1,-1)">
                <path d="M0 100 L0 24 Q0 12 12 12 L200 12"/>
                <path d="M10 100 L10 28 Q10 22 16 22 L200 22"/>
                <path d="M60 12 Q100 55 140 12" fill="rgba(212,170,80,.1)"/>
                <circle cx="100" cy="48" r="6" fill="#d4aa50" fill-opacity=".6"/>
            </g>
        </svg>

        <!-- CORNER ORNAMEN -->
        <svg class="hero-corner hero-corner--tl" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".7">
                <path d="M0 0 L0 90 Q0 110 20 110 L130 110"/>
                <path d="M9 0 L9 86 Q9 100 23 100 L130 100"/>
                <path d="M0 45 Q22 35 32 48 Q42 61 30 72 Q18 83 28 96" stroke-opacity=".5"/>
                <circle cx="0"  cy="0"  r="5" fill="#d4aa50" fill-opacity=".85"/>
                <circle cx="32" cy="48" r="3" fill="#d4aa50" fill-opacity=".55"/>
            </g>
        </svg>
        <svg class="hero-corner hero-corner--tr" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".7">
                <path d="M0 0 L0 90 Q0 110 20 110 L130 110"/>
                <path d="M9 0 L9 86 Q9 100 23 100 L130 100"/>
                <circle cx="0" cy="0" r="5" fill="#d4aa50" fill-opacity=".85"/>
            </g>
        </svg>
        <svg class="hero-corner hero-corner--bl" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".7">
                <path d="M0 0 L0 90 Q0 110 20 110 L130 110"/>
                <path d="M9 0 L9 86 Q9 100 23 100 L130 100"/>
                <circle cx="0" cy="0" r="5" fill="#d4aa50" fill-opacity=".85"/>
            </g>
        </svg>
        <svg class="hero-corner hero-corner--br" viewBox="0 0 130 130" xmlns="http://www.w3.org/2000/svg">
            <g fill="none" stroke="#d4aa50" stroke-width="1.3" stroke-opacity=".7">
                <path d="M0 0 L0 90 Q0 110 20 110 L130 110"/>
                <path d="M9 0 L9 86 Q9 100 23 100 L130 100"/>
                <circle cx="0" cy="0" r="5" fill="#d4aa50" fill-opacity=".85"/>
            </g>
        </svg>

        <!-- PARTIKEL EMAS -->
        <div class="hero-particle" style="top:18%;left:58%;animation-delay:.4s;width:4px;height:4px;"></div>
        <div class="hero-particle" style="top:30%;left:72%;animation-delay:1.1s;"></div>
        <div class="hero-particle" style="top:55%;left:68%;animation-delay:.7s;width:5px;height:5px;"></div>
        <div class="hero-particle" style="top:70%;left:82%;animation-delay:1.8s;"></div>
        <div class="hero-particle" style="top:14%;left:85%;animation-delay:1.4s;width:2px;height:2px;"></div>
        <div class="hero-particle" style="top:42%;left:92%;animation-delay:.2s;"></div>
        <div class="hero-particle" style="top:78%;left:74%;animation-delay:2.2s;width:2px;height:2px;"></div>
        <div class="hero-particle" style="top:22%;left:62%;animation-delay:2.8s;width:3px;height:3px;"></div>
        `;

        // Sisipkan SEBELUM hero-inner
        const heroInner = hero.querySelector('.hero-inner');
        if (heroInner) {
            hero.insertBefore(ornament, heroInner);
        } else {
            hero.prepend(ornament);
        }
    });
    </script>

    {{-- ── HAMBURGER MENU SCRIPT ── --}}
    <script>
    (function() {
        var btn = document.getElementById('navHamburger');
        var menu = document.getElementById('navMenu');
        if (!btn || !menu) return;
        btn.addEventListener('click', function () {
            var isOpen = menu.classList.toggle('open');
            btn.classList.toggle('open', isOpen);
            btn.setAttribute('aria-expanded', isOpen);
        });
        menu.querySelectorAll('a').forEach(function(link) {
            link.addEventListener('click', function() {
                menu.classList.remove('open');
                btn.classList.remove('open');
                btn.setAttribute('aria-expanded', false);
            });
        });
        document.addEventListener('click', function(e) {
            if (!btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.remove('open');
                btn.classList.remove('open');
            }
        });
    })();
    </script>

</body>
</html>