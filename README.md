# WesterosGate — Portal Fandom Universe Game of Thrones

Website berita & informasi fandom GoT universe berbasis Laravel 11.
Tema: **Universe George R.R. Martin** (Game of Thrones, House of the Dragon, A Knight of the Seven Kingdoms, Lore, dll.)

---

## ✅ Fitur Lengkap

### Halaman Publik
- **Beranda** — Hero 2-kolom, mini featured, strip 4 series, grid artikel, sidebar trending
- **Sub-navigasi** — Filter cepat per series (GoT, HotD, AKotSK, Buku, Lore, Naga)
- **Breaking Ticker** — Scrolling berita fandom terbaru
- **Filter Kategori** — `?category=House+of+the+Dragon` dst.
- **Pencarian** — `?q=keyword` mencari judul, ringkasan, penulis, kategori
- **Detail Artikel** — Gambar, body HTML, info author, artikel terkait, salin tautan
- **Sidebar** — Trending, kategori, rumah-rumah besar, quotes

### Panel Admin (`/admin`)
- **Login** — Guard terpisah dari user publik
- **Dashboard** — Statistik + chart distribusi kategori + 5 artikel terbaru
- **Kelola Artikel** — Tabel dengan thumbnail, kategori, status, pagination
- **Pencarian Admin** — Real-time search di tabel artikel
- **Tambah Artikel** — Rich editor, upload gambar, toggle publish/draft
- **Edit Artikel** — Preview gambar existing + ganti gambar
- **Hapus Artikel** — Konfirmasi + hapus file gambar otomatis
- **Flash Messages** — Notifikasi sukses/error

---

## ⚙️ Instalasi

```bash
# 1. Buat project Laravel 11
composer create-project laravel/laravel westerosgate

# 2. Copy semua file dari ZIP ke dalam folder project

# 3. Setup .env
cp .env.example .env
php artisan key:generate
```

Edit `.env`:
```
APP_NAME="WesterosGate"
APP_URL=http://westerosgate.test
DB_DATABASE=westerosgate
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# 4. Buat database 'westerosgate' di phpMyAdmin

# 5. Migrate + seed
php artisan migrate --seed

# 6. Buat folder upload
mkdir public\uploads

# 7. Jalankan
php artisan serve
```

---

## 🔐 Akun Admin Demo

| Field    | Value                        |
|----------|------------------------------|
| Email    | `admin@westerosgate.id`      |
| Password | `password123`                |
| URL      | `/admin/login`               |

---

## 🗂️ Kategori Artikel

- House of the Dragon
- A Knight of the Seven Kingdoms
- Game of Thrones
- Lore & Sejarah
- Rumah & Silsilah
- Karakter
- Naga & Makhluk
- Buku & Novel
- Teori & Spekulasi

---

## 🎨 Design System

| Elemen       | Value                              |
|--------------|------------------------------------|
| Background   | `#0a0806` (hitam batu castle)      |
| Accent       | `#C9A84C` (emas Lannister)         |
| Text         | `#d4c09a` (perkamen)               |
| Font heading | Cinzel (Google Fonts) — medieval   |
| Font body    | Crimson Text italic (Google Fonts) |
| Theme        | Dark fantasy medieval GoT          |
