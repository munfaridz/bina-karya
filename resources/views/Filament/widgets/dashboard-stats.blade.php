<x-filament-widgets::widget>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;800&display=swap');

        .dsh {
            font-family: 'Outfit', sans-serif;
            width: 100%;
        }

        /* ── 4 STAT CARDS ── */
        .dsh-row4 {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .sc {
            border-radius: 14px;
            padding: 20px 18px;
            position: relative;
            overflow: hidden;
        }

        .sc-blue {
            background: linear-gradient(135deg, #1e3a5f, #1d4ed8);
        }

        .sc-red {
            background: linear-gradient(135deg, #5f1e1e, #dc2626);
        }

        .sc-green {
            background: linear-gradient(135deg, #1a4731, #16a34a);
        }

        .sc-purple {
            background: linear-gradient(135deg, #3b1f6e, #7c3aed);
        }

        .sc-icon {
            font-size: 28px;
            margin-bottom: 12px;
            display: block;
            opacity: .9;
        }

        .sc-val {
            font-size: 20px;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .sc-lbl {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.65);
            margin-bottom: 2px;
        }

        .sc-sub {
            font-size: 10px;
            color: rgba(255, 255, 255, 0.4);
        }

        .sc-glow {
            position: absolute;
            right: -20px;
            bottom: -20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
        }

        /* ── BOTTOM 2-COL ── */
        .dsh-row2 {
            display: grid;
            grid-template-columns: 3fr 2fr;
            gap: 16px;
        }

        /* ── CHART CARD ── */
        .cc {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        .cc-head {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 4px;
        }

        .cc-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
        }

        .cc-sub {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 18px;
        }

        .cc-legend {
            display: flex;
            gap: 14px;
        }

        .cc-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 4px;
        }

        .cc-leg-item {
            font-size: 11px;
            color: #6b7280;
            display: flex;
            align-items: center;
        }

        /* ── ANGGOTA CARD ── */
        .ac {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        .ac-title {
            font-size: 15px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 4px;
        }

        .ac-sub {
            font-size: 12px;
            color: #9ca3af;
            margin-bottom: 20px;
        }

        .ac-num {
            font-size: 64px;
            font-weight: 800;
            line-height: 1;
            background: linear-gradient(135deg, #1d4ed8, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ac-lbl {
            font-size: 12px;
            color: #6b7280;
            margin-top: 4px;
            margin-bottom: 10px;
        }

        .ac-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #dcfce7;
            color: #16a34a;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 100px;
            margin-bottom: 20px;
        }

        .ac-dot {
            width: 5px;
            height: 5px;
            background: #22c55e;
            border-radius: 50%;
            animation: blink 2s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .3
            }
        }

        .sec-title {
            font-size: 10px;
            font-weight: 700;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 10px;
            border-top: 1px solid #f3f4f6;
            padding-top: 14px;
        }

        .pb-row {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 7px;
        }

        .pb-lbl {
            font-size: 11px;
            color: #374151;
            width: 82px;
            flex-shrink: 0;
            font-weight: 500;
        }

        .pb-track {
            flex: 1;
            height: 5px;
            background: #f3f4f6;
            border-radius: 3px;
        }

        .pb-fill {
            height: 5px;
            border-radius: 3px;
            background: linear-gradient(90deg, #3b82f6, #22d3ee);
        }

        .pb-num {
            font-size: 11px;
            color: #6b7280;
            font-weight: 600;
            width: 16px;
            text-align: right;
        }

        @media(max-width:900px) {
            .dsh-row4 {
                grid-template-columns: repeat(2, 1fr);
            }

            .dsh-row2 {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="dsh">

        {{-- STAT CARDS --}}
        <div class="dsh-row4">
            <div class="sc sc-blue">
                <div class="sc-glow"></div>
                <span class="sc-icon">💰</span>
                <div class="sc-val">Rp {{ number_format($kasMasukBulanIni / 1000, 0, ',', '.') }}rb</div>
                <div class="sc-lbl">Kas Masuk {{ $namaBulan }}</div>
                <div class="sc-sub">Pemasukan bulan ini</div>
            </div>
            <div class="sc sc-red">
                <div class="sc-glow"></div>
                <span class="sc-icon">📤</span>
                <div class="sc-val">Rp {{ number_format($kasKeluarBulanIni / 1000, 0, ',', '.') }}rb</div>
                <div class="sc-lbl">Kas Keluar {{ $namaBulan }}</div>
                <div class="sc-sub">Pengeluaran bulan ini</div>
            </div>
            <div class="sc sc-green">
                <div class="sc-glow"></div>
                <span class="sc-icon">🏦</span>
                <div class="sc-val">Rp {{ number_format($saldoKas / 1000, 0, ',', '.') }}rb</div>
                <div class="sc-lbl">Saldo Kas Total</div>
                <div class="sc-sub">Akumulasi semua waktu</div>
            </div>
            <div class="sc sc-purple">
                <div class="sc-glow"></div>
                <span class="sc-icon">👥</span>
                <div class="sc-val">{{ $totalAnggota }}</div>
                <div class="sc-lbl">Anggota Aktif</div>
                <div class="sc-sub">Terdaftar & aktif</div>
            </div>
        </div>

        {{-- CHART + ANGGOTA --}}
        <div class="dsh-row2">
            <div class="cc">
                <div class="cc-head">
                    <div>
                        <div class="cc-title">Statistik Kas Bulanan {{ $tahun }}</div>
                        <div class="cc-sub">Pemasukan vs Pengeluaran per bulan</div>
                    </div>
                    <div class="cc-legend">
                        <span class="cc-leg-item"><span class="cc-dot" style="background:#3b82f6"></span>Masuk</span>
                        <span class="cc-leg-item"><span class="cc-dot" style="background:#ef4444"></span>Keluar</span>
                    </div>
                </div>
                <canvas id="kasChartAdmin" height="170"></canvas>
            </div>

            <div class="ac">
                <div class="ac-title">Data Anggota</div>
                <div class="ac-sub">Rekap keanggotaan aktif</div>
                <div class="ac-num">{{ $totalAnggota }}</div>
                <div class="ac-lbl">Total Anggota Aktif</div>
                <div class="ac-badge">
                    <div class="ac-dot"></div> Aktif Berorganisasi
                </div>
                <div class="sec-title">Distribusi Seksi</div>
                @foreach([
                        ['nama' => 'Sinoman', 'n' => 5],
                        ['nama' => 'Agama', 'n' => 4],
                        ['nama' => 'Humas', 'n' => 9],
                        ['nama' => 'Kesenian', 'n' => 4],
                        ['nama' => 'Olahraga', 'n' => 3],
                        ['nama' => 'Dokumentasi', 'n' => 2],
                        ['nama' => 'Dekorasi', 'n' => 2],
                        ['nama' => 'Keamanan', 'n' => 3],
                    ] as $s)
                    <div class="pb-row">
                        <div class="pb-lbl">{{ $s['nama'] }}</div>
                        <div class="pb-track"><div class="pb-fill" style="width:{{ ($s['n'] / 9) * 100 }}%"></div></div>
                    <div class="pb-num">{{ $s['n'] }}</div>
                    </div>
                @endforeach
            </div>
            </div >
        
        </div>
        
        <script>
        (function() {
            function drawChart() {
                const el = document.getElementById('kasChartAdmin');
                if (!el) return;
                const ex = Chart.getChart(el); if (ex) ex.destroy();
                new Chart(el.getCont ext('2d'), {
                         type: 'bar',
                          data: {
                        labels: @json($bulanLabels),
                        datasets: [
                            { label:'Kas Masuk', data: @json($dataMasuk), backgroundColor:'rgba(59,130,246,0.8)', borderColor:'#3b82f6', borderWidth:1.5, borderRadius:6, borderSkipped:false },
                            { label:'Kas Keluar', data: @json($dataKeluar), backgroundColor:'rgba(239,68,68,0.7)', borderColor:'#ef4444', borderWidth:1.5, borderRadius:6, borderSkipped:false }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                                  legend: { display : false },
                                          tooltip: { callbacks: { label: c => ' Rp ' + c.raw.toLocaleString('id-ID') } }
                        },
                        scales: {
                            x: { ticks: { color:'#9ca3af', font:{size:10} }, grid: { display:false } },
                    y: { beginAtZero:true, ticks: { color:'#9ca3af', font:{size:10}, callback: v=>'Rp '+(v/1000).toFixed(0)+'rb' }, grid: { color:'#f3f4f6' } }
                        }
                    }
                });
            }
        
            // Load Chart.js dulu, baru render
            if (typeof Chart !== 'undefined') {
                drawChart();
            } else {
                const script = document.createElement('script');
            script.src = 'https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js';
        script.onload = drawChart;
        document.head.appendChild(script);
    }
})();
</script>
</x-filament-widgets::widget>