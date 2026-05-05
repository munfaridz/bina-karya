<x-filament-panels::page>
{{--
    Halaman Pengaturan — Karangtaruna Bina Karya
    resources/views/filament/pages/pengaturan.blade.php
--}}

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

.pg-wrap { font-family: 'Inter', sans-serif; max-width: 720px; }
.pg-wrap *, .pg-wrap *::before, .pg-wrap *::after { box-sizing: border-box; }

.pg-section {
    background: #fff;
    border: 1px solid #eaecf4;
    border-radius: 14px;
    margin-bottom: 18px;
    overflow: hidden;
}

.pg-section-head {
    padding: 18px 22px 16px;
    border-bottom: 1px solid #f1f5f9;
    display: flex;
    align-items: center;
    gap: 10px;
}

.pg-section-icon {
    width: 34px; height: 34px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
}

.pg-icon-blue   { background: #eef0fd; }
.pg-icon-amber  { background: #fffbeb; }

.pg-section-title { font-size: 14px; font-weight: 700; color: #111827; }
.pg-section-sub   { font-size: 11px; color: #9ca3af; margin-top: 1px; }

.pg-body { padding: 22px; }

/* Avatar row */
.pg-avatar-row {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 22px;
    padding-bottom: 18px;
    border-bottom: 1px solid #f1f5f9;
}

.pg-avatar {
    width: 60px; height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, #4361ee, #818cf8);
    color: #fff;
    font-size: 22px;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    letter-spacing: -1px;
}

.pg-avatar-name { font-size: 16px; font-weight: 700; color: #111827; }
.pg-avatar-role { font-size: 12px; color: #9ca3af; margin-top: 2px; }

/* Form grid */
.pg-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
    margin-bottom: 14px;
}

.pg-form-group { margin-bottom: 14px; }
.pg-form-group:last-of-type { margin-bottom: 0; }

.pg-label {
    display: block;
    font-size: 11px;
    font-weight: 700;
    color: #374151;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 6px;
}

.pg-input {
    width: 100%;
    padding: 10px 13px;
    border: 1px solid #e2e8f0;
    border-radius: 9px;
    font-size: 14px;
    font-family: 'Inter', sans-serif;
    color: #111827;
    background: #f8fafc;
    outline: none;
    transition: border-color .15s, background .15s;
}

.pg-input:focus {
    border-color: #4361ee;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(67,97,238,.08);
}

.pg-input-hint {
    font-size: 11px;
    color: #9ca3af;
    margin-top: 5px;
}

/* Buttons */
.pg-btn-row {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
    padding-top: 16px;
    border-top: 1px solid #f1f5f9;
}

.pg-btn {
    padding: 10px 22px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    font-family: 'Inter', sans-serif;
    cursor: pointer;
    border: none;
    transition: background .15s, transform .1s;
    letter-spacing: 0.2px;
}

.pg-btn-primary {
    background: #4361ee;
    color: #fff;
}

.pg-btn-primary:hover { background: #3451d1; }
.pg-btn-primary:active { transform: scale(.98); }

.pg-btn-danger {
    background: #fef2f2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.pg-btn-danger:hover { background: #fee2e2; }

/* dark mode */
@media (prefers-color-scheme: dark) {
    .pg-section { background: #1e293b; border-color: rgba(255,255,255,0.07); }
    .pg-section-head { border-bottom-color: rgba(255,255,255,0.05); }
    .pg-section-title { color: #f1f5f9; }
    .pg-avatar-name { color: #f1f5f9; }
    .pg-avatar-role { color: #64748b; }
    .pg-label { color: #94a3b8; }
    .pg-input { background: #0f172a; border-color: rgba(255,255,255,0.1); color: #f1f5f9; }
    .pg-input:focus { background: #1e293b; border-color: #4361ee; }
    .pg-avatar-row { border-bottom-color: rgba(255,255,255,0.05); }
    .pg-btn-row { border-top-color: rgba(255,255,255,0.05); }
    .pg-icon-blue  { background: rgba(67,97,238,.15); }
    .pg-icon-amber { background: rgba(245,158,11,.12); }
}

@media (max-width: 640px) {
    .pg-form-row { grid-template-columns: 1fr; }
}
</style>

<div class="pg-wrap">

    {{-- ── Profil Admin ── --}}
    <div class="pg-section">
        <div class="pg-section-head">
            <div class="pg-section-icon pg-icon-blue">👤</div>
            <div>
                <div class="pg-section-title">Profil Admin</div>
                <div class="pg-section-sub">Ubah nama dan email akun administrator</div>
            </div>
        </div>
        <div class="pg-body">

            <div class="pg-avatar-row">
                <div class="pg-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div>
                    <div class="pg-avatar-name">{{ Auth::user()->name }}</div>
                    <div class="pg-avatar-role">Administrator — {{ Auth::user()->email }}</div>
                </div>
            </div>

            <form wire:submit.prevent="saveProfil">
                <div class="pg-form-row">
                    <div class="pg-form-group">
                        <label class="pg-label">Nama Lengkap</label>
                        <input class="pg-input" type="text" wire:model="name" placeholder="Nama lengkap" required />
                        @error('name') <div class="pg-input-hint" style="color:#dc2626;">{{ $message }}</div> @enderror
                    </div>
                    <div class="pg-form-group">
                        <label class="pg-label">Email</label>
                        <input class="pg-input" type="email" wire:model="email" placeholder="admin@email.com" required />
                        @error('email') <div class="pg-input-hint" style="color:#dc2626;">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="pg-btn-row">
                    <button type="submit" class="pg-btn pg-btn-primary">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ── Ganti Password ── --}}
    <div class="pg-section">
        <div class="pg-section-head">
            <div class="pg-section-icon pg-icon-amber">🔑</div>
            <div>
                <div class="pg-section-title">Ganti Password</div>
                <div class="pg-section-sub">Pastikan menggunakan kata sandi yang kuat</div>
            </div>
        </div>
        <div class="pg-body">

            <form wire:submit.prevent="savePassword">
                <div class="pg-form-group">
                    <label class="pg-label">Password Saat Ini</label>
                    <input class="pg-input" type="password" wire:model="current_password" placeholder="Masukkan password lama" required />
                    @error('current_password') <div class="pg-input-hint" style="color:#dc2626;">{{ $message }}</div> @enderror
                </div>

                <div class="pg-form-row">
                    <div class="pg-form-group">
                        <label class="pg-label">Password Baru</label>
                        <input class="pg-input" type="password" wire:model="new_password" placeholder="Min. 8 karakter" required />
                        <div class="pg-input-hint">Kombinasi huruf, angka & simbol.</div>
                        @error('new_password') <div class="pg-input-hint" style="color:#dc2626;">{{ $message }}</div> @enderror
                    </div>
                    <div class="pg-form-group">
                        <label class="pg-label">Konfirmasi Password Baru</label>
                        <input class="pg-input" type="password" wire:model="new_password_confirmation" placeholder="Ulangi password baru" required />
                    </div>
                </div>

                <div class="pg-btn-row">
                    <button type="submit" class="pg-btn pg-btn-primary">
                        Perbarui Password
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
</x-filament-panels::page>