# Sistem Informasi Perpustakaan Sederhana (Library System)

Aplikasi web berbasis Laravel untuk mengelola operasional perpustakaan meliputi manajemen kategori, koleksi buku, data anggota, pengguna sistem, serta transaksi peminjaman dan pengembalian buku.

## Anggota Kelompok
1. **Daffa Nadua Raishad** (2410631250088)
2. **Rafi Geraldy Krisnugraha** (2410631250070)
3. **Raza Matahari Miftah** (2410631250073)

## Fitur Utama
- **Authentication & Authorization:** Login, logout, proteksi halaman dengan middleware `auth`, serta pembatasan hak akses berbasis role (`admin` dan `petugas`) menggunakan Laravel Gate.
- **Dashboard:** Menampilkan ringkasan statistik jumlah kategori, judul buku, total stok tersedia, jumlah anggota, total riwayat peminjaman, dan buku yang sedang dipinjam.
- **User Management (Khusus Admin):** CRUD akun pengguna beserta pengaturan role.
- **Category Management:** CRUD kategori buku oleh Admin, serta akses lihat daftar kategori untuk Petugas.
- **Book Management:** CRUD data buku lengkap dengan relasi kategori dan halaman detail buku.
- **Member Management:** CRUD data anggota perpustakaan beserta halaman detail anggota.
- **Borrowing Management:** Pencatatan transaksi peminjaman multi-buku dengan validasi stok, tenggat pengembalian otomatis 7 hari, pengurangan stok otomatis saat dipinjam, dan penambahan stok otomatis saat buku dikembalikan.

## Cara Menjalankan Project
1. Clone repository ini:
   ```bash
   git clone <url-repository-github-kalian>
   cd library-system