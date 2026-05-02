<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Karangtaruna Bina Karya')</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;800&family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Chart.js -->
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

        /* ── BASE ── */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--navy-dark);
            color: #cbd5e1;
            margin: 0;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--navy-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: #1d4ed8;
            border-radius: 4px;
        }

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

        .navbar .logo-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar .logo-img {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            border: 1.5px solid rgba(96, 165, 250, 0.4);
            object-fit: cover;
        }

        .navbar .brand-name {
            color: #fff;
            font-family: 'Syne', sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .navbar .brand-name span {
            color: var(--blue-pale);
        }

        .navbar-menu {
            display: flex;
            gap: 4px;
            align-items: center;
        }

        .navbar-menu a {
            color: rgba(147, 197, 253, 0.7);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 8px;
            transition: all .2s;
            letter-spacing: .3px;
        }

        .navbar-menu a:hover {
            color: #fff;
            background: var(--glass);
        }

        .navbar-menu a.active {
            color: #fff;
            background: rgba(59, 130, 246, 0.15);
            border: 1px solid rgba(59, 130, 246, 0.3);
        }

        .navbar-admin-btn {
            color: rgba(251, 191, 36, 0.8) !important;
            border: 1px solid rgba(251, 191, 36, 0.2) !important;
            background: rgba(251, 191, 36, 0.05) !important;
        }

        .navbar-admin-btn:hover {
            color: #fbbf24 !important;
            border-color: rgba(251, 191, 36, 0.5) !important;
            background: rgba(251, 191, 36, 0.1) !important;
        }

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
                radial-gradient(ellipse 100% 70% at 50% -10%, rgba(34, 211, 238, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse 80% 60% at 10% 80%, rgba(29, 78, 216, 0.3) 0%, transparent 55%),
                radial-gradient(ellipse 60% 50% at 90% 90%, rgba(59, 130, 246, 0.15) 0%, transparent 55%);
            pointer-events: none;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 220px;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 220'%3E%3Cpath fill='rgba(29,78,216,0.12)' d='M0,128L60,117.3C120,107,240,85,360,96C480,107,600,149,720,154.7C840,160,960,128,1080,112C1200,96,1320,96,1380,96L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z'/%3E%3Cpath fill='rgba(34,211,238,0.06)' d='M0,192L60,176C120,160,240,128,360,122.7C480,117,600,139,720,144C840,149,960,133,1080,122.7C1200,112,1320,112,1380,117.3L1440,122L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z'/%3E%3C/svg%3E") no-repeat bottom center / cover;
            pointer-events: none;
            z-index: 0;
        }

        .hero-inner {
            position: relative;
            z-index: 1;
            max-width: 680px;
            margin: 0 auto;
        }

        .hero-logo {
            width: 96px;
            height: 96px;
            border-radius: 24px;
            background: rgba(34, 211, 238, 0.08);
            border: 1.5px solid rgba(34, 211, 238, 0.25);
            margin: 0 auto 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: floatLogo 4s ease-in-out infinite;
            box-shadow: 0 0 40px rgba(34, 211, 238, 0.1);
        }

        .hero-logo img {
            width: 64px;
            height: 64px;
            border-radius: 16px;
            object-fit: cover;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(34, 211, 238, 0.08);
            border: 1px solid rgba(34, 211, 238, 0.2);
            color: var(--accent-cyan);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 100px;
            margin-bottom: 20px;
        }

        .hero-eyebrow::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--accent-cyan);
            border-radius: 50%;
            animation: pulse 2s ease-in-out infinite;
        }

        .hero h1 {
            color: #f0f9ff;
            font-family: 'Outfit', sans-serif;
            font-size: clamp(36px, 5.5vw, 58px);
            font-weight: 800;
            line-height: 1.05;
            letter-spacing: -1.5px;
            margin-bottom: 18px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, var(--accent-cyan) 0%, #7dd3fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            color: rgba(148, 163, 184, 0.85);
            font-size: 16px;
            line-height: 1.75;
            max-width: 460px;
            margin: 0 auto 36px;
            font-weight: 300;
        }

        .hero-socmed {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .socmed-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(148, 163, 184, 0.8);
            font-size: 12px;
            font-weight: 500;
            padding: 7px 14px;
            border-radius: 100px;
            text-decoration: none;
            transition: all .2s;
        }

        .socmed-btn:hover {
            background: rgba(34, 211, 238, 0.08);
            border-color: rgba(34, 211, 238, 0.3);
            color: var(--accent-cyan);
            transform: translateY(-2px);
        }

        .hero-btns {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent-cyan), #0ea5e9);
            color: #0a0e1a;
            border: none;
            padding: 14px 32px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: all .25s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'DM Sans', sans-serif;
            box-shadow: 0 8px 24px rgba(34, 211, 238, 0.25);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 16px 36px rgba(34, 211, 238, 0.35);
        }

        .btn-outline {
            background: transparent;
            color: #7dd3fc;
            border: 1.5px solid rgba(125, 211, 252, 0.3);
            padding: 14px 32px;
            border-radius: 100px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all .25s;
            font-family: 'DM Sans', sans-serif;
        }

        .btn-outline:hover {
            border-color: var(--accent-cyan);
            color: var(--accent-cyan);
            background: rgba(34, 211, 238, 0.05);
        }

        /* ── SECTIONS ── */
        .section {
            padding: 72px 5%;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #fff;
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 22px;
            background: linear-gradient(180deg, #60a5fa, #1d4ed8);
            border-radius: 2px;
            flex-shrink: 0;
        }

        /* ── STATS ── */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .stat-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 28px 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            transition: transform .2s, border-color .2s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.35);
        }

        .stat-card .val {
            font-family: 'Outfit', sans-serif;
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #fff, var(--accent-cyan));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.1;
        }

        .stat-card .lbl {
            font-size: 12px;
            color: rgba(147, 197, 253, 0.6);
            margin-top: 8px;
            font-weight: 500;
            letter-spacing: .5px;
            text-transform: uppercase;
        }

        /* ── KAS CHART ── */
        .kas-chart-wrap {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 28px;
            backdrop-filter: blur(10px);
        }

        /* ── ORG CHART ── */
        .org-wrap {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 32px 20px;
            backdrop-filter: blur(10px);
            overflow-x: auto;
        }

        .org-tree {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0;
            width: 100%;
        }

        .org-row {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .org-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: rgba(17, 32, 64, 0.8);
            border-radius: 14px;
            padding: 12px 14px 10px;
            min-width: 110px;
            border: 1px solid rgba(59, 130, 246, 0.2);
            text-align: center;
            transition: border-color .2s, transform .2s;
        }

        .org-card:hover {
            border-color: rgba(96, 165, 250, 0.5);
            transform: translateY(-2px);
        }

        .org-foto {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid rgba(96, 165, 250, 0.3);
            margin-bottom: 7px;
            background: rgba(17, 32, 64, 0.8);
        }

        .org-foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .org-foto-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Syne', sans-serif;
            font-size: 18px;
            font-weight: 800;
            color: #93c5fd;
            background: rgba(29, 78, 216, 0.2);
        }

        /* ── ORG CHART TAMBAHAN ── */
        .org-level-label {
            font-size: 11px;
            font-weight: 600;
            color: rgba(147, 197, 253, 0.5);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin: 16px 0 8px;
            text-align: center;
        }

        .org-seksi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            width: 100%;
            margin-top: 8px;
        }

        .org-seksi-wrap {
            background: rgba(17, 32, 64, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.15);
            border-radius: 16px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .org-seksi-header {
            font-size: 11px;
            font-weight: 700;
            color: var(--accent-cyan);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
            text-align: center;
        }

        .org-seksi-ketua-wrap {
            display: flex;
            justify-content: center;
        }

        .org-card--ketua-seksi {
            border-color: rgba(34, 211, 238, 0.3);
            background: rgba(34, 211, 238, 0.05);
        }

        .org-badge-ketua {
            font-size: 9px;
            font-weight: 700;
            color: var(--accent-cyan);
            background: rgba(34, 211, 238, 0.1);
            border: 1px solid rgba(34, 211, 238, 0.2);
            border-radius: 100px;
            padding: 2px 8px;
            margin: 4px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .org-branch-line-v {
            width: 1px;
            height: 16px;
            background: rgba(59, 130, 246, 0.25);
            margin: 0 auto;
        }

        .org-branch-line-v-sm {
            width: 1px;
            height: 10px;
            background: rgba(59, 130, 246, 0.2);
            margin: 0 auto;
        }

        .org-branch-h-wrap {
            display: flex;
            justify-content: center;
            width: 100%;
            overflow: hidden;
        }

        .org-branch-h-line {
            height: 1px;
            background: rgba(59, 130, 246, 0.2);
            margin: 0 auto;
        }

        .org-anggota-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px;
            margin-top: 0;
        }

        .org-anggota-wrap {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .org-card--anggota {
            min-width: 60px;
            padding: 8px 6px 6px;
        }

        .org-foto--md {
            width: 52px;
            height: 52px;
        }

        .org-foto--sm {
            width: 40px;
            height: 40px;
            margin-bottom: 0;
        }

        .org-sublabel {
            font-size: 9px;
            color: rgba(147, 197, 253, 0.5);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        /* ── EVENTS GRID ── */
        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 18px;
        }

        .event-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            overflow: hidden;
            transition: transform .2s, border-color .2s;
        }

        .event-card:hover {
            transform: translateY(-3px);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .event-img {
            width: 100%;
            height: 160px;
            overflow: hidden;
        }

        .event-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }

        .event-card:hover .event-img img {
            transform: scale(1.04);
        }

        .event-img-empty {
            width: 100%;
            height: 160px;
            background: var(--navy-mid);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .event-bottom {
            display: flex;
            gap: 12px;
            padding: 14px;
            align-items: flex-start;
        }

        .event-date-col {
            text-align: center;
            min-width: 36px;
            flex-shrink: 0;
        }

        .event-date-col .day {
            font-family: 'Outfit', sans-serif;
            font-size: 22px;
            font-weight: 800;
            color: var(--accent-cyan);
            line-height: 1;
        }

        .event-date-col .mon {
            font-size: 10px;
            font-weight: 600;
            color: rgba(147, 197, 253, 0.6);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .event-info .title {
            font-size: 13px;
            font-weight: 600;
            color: #e2e8f0;
            margin-bottom: 4px;
            line-height: 1.4;
        }

        .event-info .desc {
            font-size: 11px;
            color: #64748b;
            line-height: 1.5;
            margin-bottom: 6px;
        }

        .event-info .lokasi {
            font-size: 10px;
            color: rgba(147, 197, 253, 0.5);
            margin-bottom: 6px;
        }

        .event-info .badge {
            display: inline-block;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .badge.akan_datang {
            background: rgba(34, 211, 238, 0.1);
            color: var(--accent-cyan);
            border: 1px solid rgba(34, 211, 238, 0.2);
        }

        .badge.berlangsung {
            background: rgba(34, 197, 94, 0.1);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .badge.selesai {
            background: rgba(100, 116, 139, 0.1);
            color: #94a3b8;
            border: 1px solid rgba(100, 116, 139, 0.2);
        }

        .org-name {
            font-size: 11px;
            font-weight: 600;
            color: #e2e8f0;
        }

        .org-connector {
            width: 1px;
            height: 20px;
            background: rgba(59, 130, 246, 0.25);
            margin: 0 auto;
        }

        /* ── SARAN ── */
        .saran-wrap {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 36px;
            backdrop-filter: blur(10px);
            max-width: 600px;
        }

        .saran-wrap .form-group {
            margin-bottom: 18px;
        }

        .saran-wrap label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: rgba(147, 197, 253, 0.7);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .saran-wrap input,
        .saran-wrap textarea,
        .saran-wrap select {
            width: 100%;
            background: rgba(8, 15, 32, 0.6);
            border: 1px solid rgba(59, 130, 246, 0.2);
            border-radius: 10px;
            padding: 11px 14px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            color: #e2e8f0;
            transition: border-color .2s;
        }

        .saran-wrap select option {
            background: #0d1b35;
        }

        .saran-wrap input:focus,
        .saran-wrap textarea:focus,
        .saran-wrap select:focus {
            outline: none;
            border-color: rgba(96, 165, 250, 0.5);
        }

        .saran-wrap input::placeholder,
        .saran-wrap textarea::placeholder {
            color: rgba(147, 197, 253, 0.3);
        }

        /* ── LAPAK HOMEPAGE SECTION ── */
        .lapak-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 18px;
        }

        .lapak-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 14px;
            overflow: hidden;
            transition: transform .2s, box-shadow .2s, border-color .2s;
            position: relative;
        }

        .lapak-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 32px rgba(59, 130, 246, 0.12);
            border-color: rgba(59, 130, 246, 0.3);
        }

        .lapak-badge-diskon {
            position: absolute;
            top: 8px;
            left: 8px;
            background: #ef4444;
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 5px;
            z-index: 2;
        }

        .lapak-img {
            width: 100%;
            aspect-ratio: 1/1;
            overflow: hidden;
            background: var(--navy-mid);
        }

        .lapak-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .3s;
        }

        .lapak-card:hover .lapak-img img {
            transform: scale(1.05);
        }

        .lapak-img-empty {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
        }

        .lapak-body {
            padding: 12px;
        }

        .lapak-kategori {
            font-size: 10px;
            color: #64748b;
            margin-bottom: 3px;
        }

        .lapak-nama {
            font-size: 13px;
            font-weight: 600;
            color: #e2e8f0;
            margin-bottom: 6px;
            line-height: 1.4;
        }

        .lapak-harga-wrap {
            display: flex;
            align-items: baseline;
            flex-wrap: wrap;
            gap: 4px;
            margin-bottom: 4px;
        }

        .lapak-harga {
            font-size: 14px;
            font-weight: 700;
            color: var(--accent-cyan);
        }

        .lapak-harga-coret {
            font-size: 10px;
            color: #475569;
            text-decoration: line-through;
        }

        .lapak-satuan {
            font-size: 10px;
            color: #475569;
        }

        .lapak-penjual {
            font-size: 10px;
            color: #64748b;
            margin-bottom: 10px;
        }

        .lapak-btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
            background: #16a34a;
            color: #fff;
            border-radius: 7px;
            padding: 7px;
            font-size: 11px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s;
        }

        .lapak-btn-wa:hover {
            background: #15803d;
        }

        /* ── UTILS ── */
        .alert-sukses {
            background: rgba(34, 197, 94, 0.1);
            color: #86efac;
            border: 1px solid rgba(34, 197, 94, 0.2);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 13px;
            font-weight: 600;
        }

        .bg-dark {
            background: var(--navy-dark);
        }

        .bg-darker {
            background: rgba(5, 10, 20, 1);
        }

        /* ── SARAN LAYOUT 2-KOLOM ── */
        .saran-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 28px;
            max-width: 1000px;
        }

        .saran-info {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .saran-info-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 20px;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: border-color .2s;
        }

        .saran-info-card:hover {
            border-color: rgba(59, 130, 246, 0.3);
        }

        .saran-info-card--contact {
            gap: 10px;
        }

        .saran-info-icon {
            font-size: 24px;
            line-height: 1;
        }

        .saran-info-title {
            font-size: 14px;
            font-weight: 700;
            color: #e2e8f0;
        }

        .saran-info-desc {
            font-size: 12px;
            color: #64748b;
            line-height: 1.6;
        }

        .saran-contact-link {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(147, 197, 253, 0.7);
            font-size: 13px;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid rgba(59, 130, 246, 0.15);
            background: rgba(8, 15, 32, 0.4);
            transition: all .2s;
        }

        .saran-contact-link:hover {
            color: var(--accent-cyan);
            border-color: rgba(34, 211, 238, 0.3);
            background: rgba(34, 211, 238, 0.05);
        }

        /* ── EVENTS EMPTY STATE ── */
        .events-empty {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            text-align: center;
        }

        .events-empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            line-height: 1;
        }

        .events-empty-title {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: #e2e8f0;
            margin-bottom: 8px;
        }

        .events-empty-desc {
            font-size: 14px;
            color: #64748b;
            max-width: 320px;
            line-height: 1.6;
        }

        /* ── HERO LOCATION ── */
        .hero-location {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: rgba(147, 197, 253, 0.5);
            font-size: 12px;
            margin-bottom: 20px;
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .saran-layout {
                grid-template-columns: 1fr;
            }

            .org-seksi-grid {
                grid-template-columns: 1fr;
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            .navbar nav a {
                padding: 6px 8px;
                font-size: 12px;
            }
        }

        /* ── FOOTER ── */
        .footer {
            background: var(--navy-dark);
            border-top: 1px solid var(--glass-border);
            color: rgba(147, 197, 253, 0.5);
            text-align: center;
            padding: 28px;
            font-size: 13px;
            margin-top: 40px;
        }

        .footer strong {
            color: rgba(147, 197, 253, 0.9);
        }

        @keyframes floatLogo {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.7);
            }
        }
    </style>

    {{-- ← styles dari halaman individu (Lapak.blade.php, dll) masuk di sini --}}
    @stack('styles')
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo-area">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo-img">
            <span class="brand-name">BINA <span>KARYA</span></span>
        </div>
        <div class="navbar-menu">
            <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="#struktur">Struktur</a>
            <a href="#kas">Kas</a>
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
</body>

</html>