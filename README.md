# 🌟 Bina Karya

Aplikasi web manajemen organisasi **Karangtaruna Bina Karya** berbasis Laravel & Filament.

---

## 📋 Tentang Aplikasi

Bina Karya adalah sistem informasi untuk mengelola data organisasi Karangtaruna, termasuk manajemen anggota, kegiatan/event, dan informasi organisasi lainnya.

---

## 🛠️ Teknologi yang Digunakan

- **PHP** >= 8.1
- **Laravel** 11
- **Filament** (Admin Panel)
- **MySQL**
- **Tailwind CSS**

---

## ⚙️ Cara Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/munfaridz/bina-karya.git
cd bina-karya
```

### 2. Install Dependency
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` sesuaikan database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bina_karya
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Migrasi Database
```bash
php artisan migrate --seed
```

### 5. Jalankan Aplikasi
```bash
php artisan serve
```

Akses di: `http://127.0.0.1:8000`

---

## 🌐 Menjalankan sebagai Web Online (Cloudflare Tunnel)

```bash
# Terminal 1 - Jalankan Laravel
php artisan serve

# Terminal 2 - Jalankan Cloudflare Tunnel
D:\cloudflared2.exe tunnel --url http://127.0.0.1:8000
```

Link publik akan muncul di terminal, contoh:
```
https://xxxx-xxxx-xxxx.trycloudflare.com
```

---

## 📁 Struktur Folder

```
bina-karya/
├── app/
│   ├── Filament/        # Panel admin Filament
│   ├── Models/          # Model database
│   └── Http/            # Controller & Resource
├── database/
│   └── migrations/      # Migrasi database
├── resources/
│   └── views/           # Tampilan blade
├── routes/
│   └── web.php          # Routing aplikasi
└── .env                 # Konfigurasi environment
```

---

## 👤 Developer

**Munfarid** — Mahasiswa Universitas Duta Bangsa Surakarta

---

## 📄 Lisensi

Project mandiri cari portofolio.
