<style>
/* ════════════════════════════════════════
   BINA KARYA — DASHBOARD & SIDEBAR STYLES
   (Login styles ada di login.blade.php)
   ════════════════════════════════════════ */

/* ── DARK BASE ── */
.fi-body, .fi-main, .fi-page { background-color: #0a0e1a !important; }

/* ── SIDEBAR ── */
.fi-sidebar {
    background-color: #080f20 !important;
    border-right: 1px solid rgba(59,130,246,0.1) !important;
}
.fi-sidebar-nav { background-color: #080f20 !important; }

/* ── TOPBAR ── */
.fi-topbar {
    background-color: rgba(8,15,32,0.97) !important;
    backdrop-filter: blur(16px) !important;
    border-bottom: 1px solid rgba(59,130,246,0.1) !important;
}

/* ── SIDEBAR ITEMS ── */
.fi-sidebar-item-button {
    color: rgba(148,163,184,0.8) !important;
    border-radius: 8px !important;
    transition: all 0.15s !important;
}
.fi-sidebar-item-button:hover {
    background: rgba(59,130,246,0.08) !important;
    color: #93c5fd !important;
}
.fi-sidebar-item-button[aria-current="page"] {
    background: rgba(34,211,238,0.12) !important;
    color: #22d3ee !important;
    border-left: 2px solid #22d3ee !important;
}

/* ── TABLE ── */
.fi-ta-row:hover td { background: rgba(59,130,246,0.04) !important; }

/* ── SCROLLBAR ── */
::-webkit-scrollbar { width: 4px; height: 4px; }
::-webkit-scrollbar-track { background: #0a0e1a; }
::-webkit-scrollbar-thumb { background: #1d4ed8; border-radius: 4px; }

/* ════════════ MOBILE ════════════ */
@media (max-width: 1024px) {
    .fi-ta-table-wrapper { overflow-x: auto !important; }
    .fi-ta-cell { font-size: 12px !important; padding: 8px 6px !important; }
    .fi-fo-grid { grid-template-columns: 1fr !important; }
    .fi-wi-stats-overview { grid-template-columns: 1fr 1fr !important; gap: 8px !important; }
}
@media (max-width: 640px) {
    .fi-wi-stats-overview { grid-template-columns: 1fr !important; }
    .fi-topbar { padding: 0 12px !important; }
}
</style>
