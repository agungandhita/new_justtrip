<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        # Rincian Fitur & Elemen UI Justtrip

Dokumen ini merincikan fungsi tombol navigasi dan elemen antarmuka (UI) yang ada di seluruh platform Justtrip.

---

## 1. Navigasi Utama (Navbar)
Navbar menggunakan gaya **Floating Glassmorphism** yang tetap berada di atas saat di-scroll.

- **Logo Justtrip:** Klik untuk kembali ke Halaman Beranda (Landing Page).
- **Destinasi:** Mengarahkan pengguna ke katalog lengkap destinasi wisata.
- **Paket Tour:** Menampilkan berbagai pilihan paket perjalanan (Standard, Family, Corporate).
- **Open Trip:** Akses cepat ke jadwal perjalanan berkelompok dengan sistem ketersediaan kursi.
- **Promo:** Menampilkan penawaran khusus dan diskon terbatas.
- **Tentang Kami:** Informasi mengenai profil perusahaan untuk membangun kepercayaan.
- **Masuk (Login):** Tombol sekunder untuk akses akun pengguna.
- **Daftar (Register):** Tombol aksi utama (Primary CTA) berwarna Biru untuk menarik pengguna baru.

---

## 2. Fitur & Tampilan Halaman Pengguna

### A. Landing Page (Beranda)
- **Hero Section:** Visual megah dengan widget pencarian (Destinasi, Tanggal, Peserta).
- **Kenapa Pilih Kami:** Layout dua kolom (Sticky Image & Scrolling Text) menjelaskan keunggulan layanan.
- **Destinasi Populer:** Grid kartu dengan harga dan tombol detail.
- **Testimoni:** Carousel ulasan pelanggan dengan rating bintang.

### B. Halaman Destinasi & Detail Paket
- **Filter Kategori:** Tombol pill-shape untuk memfilter jenis trip.
- **Detail Paket:**
    - **Itinerary:** Jadwal harian yang bisa di-expand.
    - **Fasilitas:** Ikon yang membedakan apa yang termasuk (included) dan tidak (excluded).
    - **Sticky Booking Card:** Kartu harga yang tetap terlihat untuk memudahkan klik 'Pesan Sekarang'.

### C. Alur Open Trip (Sistem Kursi)
- **Indikator Sisa Kursi:** Menampilkan jumlah kursi tersedia secara real-time (misal: "Sisa 4 Kursi").
- **Status Full Booked:** Jika penuh, tombol berubah menjadi abu-abu dan teks menjadi "Pendaftaran Ditutup".
- **Form Tanpa Login:** Memungkinkan pendaftaran cepat hanya dengan Nama, WhatsApp, dan Email.

### D. Galeri & Sosial
- **Grid Visual:** Foto-foto resolusi tinggi dari destinasi asli.
- **Share to Social:** Tombol cepat untuk berbagi foto ke platform media sosial.
- **Detail Galeri:** Informasi fotografer, jenis kamera (opsional), dan konteks lokasi perjalanan.

### E. Pembayaran Offline (Manual)
- **Upload Bukti:** Form khusus untuk mengunggah foto struk/transfer bank.
- **Status Verifikasi:** Label status (Menunggu, Disetujui, Ditolak) di halaman histori booking.

---

## 3. Fitur & Tampilan Panel Admin

- **Dashboard:** Statistik pendapatan, jumlah user, dan grafik pertumbuhan.
- **Manajemen Pesanan:**
    - **Review Bukti:** Admin dapat melihat foto bukti transfer dari user.
    - **Approve/Reject:** Tombol aksi untuk menentukan validitas pembayaran.
- **Manajemen Konten:** Form untuk menambah/mengedit paket tour, artikel blog, dan foto galeri.

---

## 4. Fitur Akun & Notifikasi
- **Histori Booking:** Daftar semua perjalanan yang pernah dipesan beserta statusnya.
- **Notifikasi Email:** Sistem otomatis mengirimkan konfirmasi pendaftaran, detail booking, dan update status pembayaran ke email pengguna.

    </FrontendLayout>
</template>
