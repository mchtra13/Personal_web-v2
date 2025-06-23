# 🌐 Personal Web - Tugas Studi Kasus II

Website ini merupakan tugas Studi Kasus II dari materi pembuatan **Personal Web** dengan fitur admin panel, artikel, galeri, dan tampilan publik modern yang responsif.

---

## 📌 Deskripsi Singkat

Personal Web ini dibangun dengan **PHP** dan **MySQL** tanpa framework. Terdapat dua bagian utama:

- **Admin Panel**: mengelola konten (artikel, galeri, about)
- **Halaman Publik**: menampilkan konten secara dinamis kepada pengunjung

---

## 🎯 Fitur-Fitur

### 🔐 Login & Logout
- Login admin dengan validasi dan session
- Logout mengakhiri sesi admin dengan aman

### 📝 Manajemen Artikel
- Tambah, Edit, dan Hapus artikel
- Artikel ditampilkan otomatis di halaman utama
- Sidebar berisi daftar artikel terbaru

### 🖼️ Manajemen Galeri
- Upload gambar beserta judul
- Ganti gambar dan judul
- Hapus gambar dari galeri
- Galeri ditampilkan dalam grid yang responsif

### 👤 Manajemen About
- Tambah atau edit deskripsi "Tentang Saya"
- Ditampilkan di halaman publik `about.php`

### 📊 Dashboard Admin
- Statistik jumlah artikel dan gambar
- Tabel artikel dengan aksi Edit dan Hapus
- Tombol cepat ke halaman galeri dan about

### 🌍 Halaman Publik
- Artikel terbaru otomatis tampil di `index.php`
- Galeri responsif di `gallery.php`
- Tentang Saya ditampilkan informatif di `about.php`
- Halaman kontak dengan form sederhana
- Musik latar otomatis diputar di semua halaman

---

## 💡 Teknologi yang Digunakan

- **PHP 8.x**
- **MySQL/MariaDB**
- **Bootstrap 5.3** untuk tampilan modern & responsif
- HTML5, CSS3, Audio Embed
- Tanpa framework (pure PHP)

---

## 📸 Screenshots

### ✅ Halaman Publik
| Beranda (Artikel) | Galeri | Tentang |
|-------------------|--------|---------|
| ![index](screenshots/index.png) | ![gallery](screenshots/gallery.png) | ![about](screenshots/about.png) |

### 🔐 Admin Panel
| Login | Dashboard | Tambah Artikel |
|-------|-----------|----------------|
| ![login](screenshots/login.png) | ![dashboard](screenshots/dashboard.png) | ![add-article](screenshots/artikel_add.png) |

---

## ⚙️ Cara Menjalankan

1. Clone repo:
   ```bash
   git clone https://github.com/username/personal_web.git
