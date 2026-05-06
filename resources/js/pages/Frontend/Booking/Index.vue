<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="layout-container flex h-full grow flex-col">
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 dark:bg-blue-400 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">W</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">WisataID</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- CTA -->
<div>
<button class="bg-blue-800 dark:bg-blue-600 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:brightness-110 active:scale-95 duration-200 transition-all">
      Daftar
    </button>
</div>
</nav>
<main class="max-w-4xl mx-auto w-full px-4 py-8 pt-24">
<div class="mb-8">
<div class="flex items-center gap-2 text-primary mb-2">
<span class="material-symbols-outlined text-sm">arrow_back</span>
<a class="text-sm font-medium hover:underline" href="#">Kembali ke Detail Paket</a>
</div>
<h1 class="text-3xl font-bold text-slate-900 dark:text-white">Formulir Pemesanan</h1>
<p class="text-slate-500 dark:text-slate-400 mt-1">Lengkapi data Anda untuk melanjutkan pemesanan paket tour.</p>
</div>
<section class="mb-8 bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="p-1 bg-primary"></div>
<div class="p-6">
<h2 class="text-lg font-bold mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">assignment</span>
                        Ringkasan Paket Tur
                    </h2>
<div class="flex flex-col md:flex-row gap-6">
<div class="w-full md:w-1/3 aspect-[4/3] rounded-lg overflow-hidden relative">
<img alt="Paket Wisata Bali" class="w-full h-full object-cover" data-alt="Beautiful landscape of Bali cultural heritage site" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCDd5UY6AXw9EohXkh2cyHpHy9eqzauqIBC_T41Lx1ksqYqjVOcILljm732ZZM2BoSSRBwWe8xLFoJ7jFXqFxdA91uLSXOW_hYho3xOBL-dbLfL6yZklagOz9L_a0zsTbgPxS4qUyFZP6MRDU5_HXdPaYp8ff2HtgH6Dmi0q_DuBd4SXQ2SlmY-gYSQ2sbbbLNtQ3INSzXFuXK94p2xRMtLJKXjSLLKUNVaGkNLK3l73aI_v-AebEhazJAoeGkM7dq9MipGS-zSbQun"/>
</div>
<div class="flex-1 space-y-3">
<div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white leading-tight">Paket Wisata Bali Cultural &amp; Nature</h3>
<div class="flex flex-wrap gap-4 mt-2">
<div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 text-sm">
<span class="material-symbols-outlined text-sm text-primary">schedule</span>
                                        3 Hari 2 Malam
                                    </div>
<div class="flex items-center gap-1.5 text-slate-600 dark:text-slate-400 text-sm">
<span class="material-symbols-outlined text-sm text-primary">location_on</span>
                                        Ubud &amp; Bedugul, Bali
                                    </div>
</div>
</div>
<div class="pt-4 border-t border-slate-100 dark:border-slate-800">
<p class="text-xs text-slate-500 uppercase tracking-wider font-semibold">Fasilitas Termasuk:</p>
<div class="flex flex-wrap gap-2 mt-2">
<span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 rounded text-[11px] font-medium">Hotel Bintang 4</span>
<span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 rounded text-[11px] font-medium">Transportasi AC</span>
<span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 rounded text-[11px] font-medium">Tiket Masuk Wisata</span>
<span class="px-2 py-1 bg-slate-100 dark:bg-slate-800 rounded text-[11px] font-medium">Guide Profesional</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
<div class="p-6 border-b border-slate-100 dark:border-slate-800">
<h2 class="text-lg font-bold flex items-center gap-2">
<span class="material-symbols-outlined text-primary">person_edit</span>
                        Data Pemesan &amp; Detail Peserta
                    </h2>
</div>
<form class="p-6 space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Nama Lengkap</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">person</span>
<input class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl focus:ring-primary focus:border-primary text-sm" placeholder="Masukkan nama sesuai KTP" type="text"/>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Alamat Email</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">mail</span>
<input class="w-full pl-10 pr-4 py-3 bg-slate-100 dark:bg-slate-800/50 border-slate-200 dark:border-slate-700 rounded-xl text-slate-500 dark:text-slate-400 cursor-not-allowed text-sm" readonly="" type="email" value="budi.santoso@email.com"/>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Nomor Telepon / WhatsApp</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">call</span>
<input class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl focus:ring-primary focus:border-primary text-sm" placeholder="Contoh: 08123456789" type="tel"/>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Jumlah Peserta</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">group</span>
<input class="w-full pl-10 pr-4 py-3 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl focus:ring-primary focus:border-primary text-sm" min="1" placeholder="0" type="number"/>
</div>
</div>
</div>
<div class="space-y-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Permintaan Khusus (Opsional)</label>
<textarea class="w-full p-4 bg-slate-50 dark:bg-slate-800 border-slate-200 dark:border-slate-700 rounded-xl focus:ring-primary focus:border-primary text-sm" placeholder="Contoh: Alergi makanan, butuh kursi roda, atau perayaan ulang tahun" rows="4"></textarea>
</div>
<div class="flex items-start gap-3 p-4 bg-primary/5 border border-primary/20 rounded-xl">
<span class="material-symbols-outlined text-primary">info</span>
<p class="text-sm text-slate-700 dark:text-slate-300">
<span class="font-bold">Informasi:</span> Konfirmasi booking akan dikirimkan melalui email Anda setelah pembayaran berhasil diverifikasi.
                        </p>
</div>
<div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-100 dark:border-slate-800">
<div class="text-center sm:text-left">
<p class="text-xs text-slate-500 uppercase font-semibold">Total Pembayaran</p>
<p class="text-2xl font-bold text-primary">IDR 3.500.000<span class="text-sm font-normal text-slate-400">/pax</span></p>
</div>
<button class="w-full sm:w-auto px-10 py-4 bg-primary hover:bg-primary/90 text-white font-bold rounded-xl transition-all shadow-lg shadow-primary/30 flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined">check_circle</span>
                            Konfirmasi Booking
                        </button>
</div>
</form>
</section>
<footer class="mt-12 py-8 border-t border-slate-200 dark:border-slate-800">
<div class="flex flex-col md:flex-row justify-between items-center gap-4">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary">explore</span>
<span class="font-bold">WisataID</span>
</div>
<p class="text-sm text-slate-500">© 2024 WisataID. All rights reserved.</p>
<div class="flex gap-6">
<a class="text-xs text-slate-400 hover:text-primary transition-colors" href="#">Syarat &amp; Ketentuan</a>
<a class="text-xs text-slate-400 hover:text-primary transition-colors" href="#">Kebijakan Privasi</a>
</div>
</div>
</footer>
</main>
</div>

    </FrontendLayout>
</template>
