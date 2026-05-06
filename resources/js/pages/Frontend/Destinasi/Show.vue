<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- TopAppBar (JSON Component) -->
<header class="fixed top-0 w-full z-50 bg-white/90 dark:bg-gray-900/90 backdrop-blur-md shadow-sm border-b border-gray-100 dark:border-gray-800">
<div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
<!-- Brand -->
<a class="text-2xl font-bold text-blue-800 dark:text-blue-400 tracking-tight font-['Plus_Jakarta_Sans']" href="#">
                Solaris Travel
            </a>
<!-- Navigation Links (Hidden on Mobile) -->
<nav class="hidden md:flex gap-8 items-center font-['Plus_Jakarta_Sans'] font-medium text-sm">
<a class="text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors duration-200 cursor-pointer active:opacity-80" href="#">Beranda</a>
<!-- Active State: Destinasi -->
<a class="text-blue-800 dark:text-blue-400 border-b-2 border-orange-500 pb-1 cursor-pointer active:opacity-80" href="#">Destinasi</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors duration-200 cursor-pointer active:opacity-80" href="#">Open Trip</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors duration-200 cursor-pointer active:opacity-80" href="#">Promo</a>
<a class="text-gray-600 dark:text-gray-400 hover:text-orange-500 transition-colors duration-200 cursor-pointer active:opacity-80" href="#">Tentang Kami</a>
</nav>
<!-- Actions -->
<div class="flex items-center gap-4">
<button class="hidden md:flex items-center justify-center w-10 h-10 rounded-full text-blue-800 dark:text-blue-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
<span class="material-symbols-outlined">search</span>
</button>
<button class="font-['Plus_Jakarta_Sans'] font-medium text-sm bg-blue-800 dark:bg-blue-400 text-white dark:text-gray-900 px-6 py-2 rounded-full hover:opacity-90 transition-opacity cursor-pointer active:opacity-80">
                    Daftar
                </button>
</div>
</div>
</header>
<!-- Main Content Canvas -->
<main class="max-w-container-max mx-auto px-4 sm:px-6 lg:px-8 pt-[100px]">
<!-- Hero Section -->
<section class="mt-stack-sm mb-stack-lg">
<div class="relative w-full h-[300px] md:h-[480px] rounded-xl overflow-hidden shadow-[0_4px_20px_rgba(0,40,142,0.05)]">
<img alt="Bali Landscape" class="w-full h-full object-cover" data-alt="A breathtaking, high-quality photograph of a serene Bali landscape featuring lush green terraced rice paddies glowing under the warm, golden light of a Mediterranean-style sunset. The scene captures the essence of a premium travel adventure, highlighting a traditional Balinese temple nestled in the background. The visual style embodies energetic minimalism with vibrant natural colors contrasting against the clear, trustworthy deep blue sky. The lighting creates a high-end, optimistic mood perfect for a modern travel agency interface." src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEb4JmuO_w0FrHblWPLv84ob5x8pz5CV-I0AEmMAr7PvbywAuGaS66pL8wxGU4FLG_xOQEBUBeIQ4KZTZ8AAF1eFt51A82xTzPUXkCYJQA3jgwWLyd2ZI3fk-Z-2L9akdt-mo0SND08-_IuUMu-rZ3VgkyrB52Uw1N-a9NwuR7JY0YUUUXnzOQl5aJid1UCrBQs-gfG7cG5Fww9y7wHa4_ioR-yqAduUl_0SQVq39hBTqYXVttWSw8C15hq8ZqzlprGfr4ATD9Ka9w"/>
<div class="absolute inset-0 bg-gradient-to-t from-on-surface/80 to-transparent flex items-end p-stack-md md:p-stack-lg">
<div class="max-w-2xl text-on-primary">
<span class="inline-block px-3 py-1 mb-4 bg-surface-tint/20 backdrop-blur-md text-on-primary font-label-sm text-label-sm rounded-full border border-white/20">Cultural &amp; Nature</span>
<h1 class="font-h1 text-h1 text-on-primary mb-2">Paket Wisata Bali Cultural &amp; Nature</h1>
<p class="font-body-lg text-body-lg text-on-primary/90 flex items-center gap-2">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">location_on</span>
                            Bali, Indonesia • 3 Hari 2 Malam
                        </p>
</div>
</div>
</div>
</section>
<!-- Layout Grid -->
<div class="grid grid-cols-1 md:grid-cols-12 gap-gutter pb-stack-lg">
<!-- Left Column: Details -->
<div class="md:col-span-8 space-y-stack-lg">
<!-- Inclusions & Exclusions Bento -->
<section class="grid grid-cols-1 sm:grid-cols-2 gap-stack-md">
<!-- Termasuk -->
<div class="bg-surface-container-low rounded-xl p-stack-md shadow-[0_4px_20px_rgba(0,40,142,0.05)]">
<h3 class="font-h3 text-h3 text-primary mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-secondary-container" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                            Apa yang Termasuk
                        </h3>
<ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary mt-1">hotel</span>
<div>
<strong class="text-on-surface block">Akomodasi Hotel Bintang 4</strong>
                                    2 Malam dengan sarapan.
                                </div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary mt-1">directions_car</span>
<div>
<strong class="text-on-surface block">Transportasi Privat</strong>
                                    Mobil ber-AC selama tour.
                                </div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary mt-1">local_activity</span>
<div>
<strong class="text-on-surface block">Tiket Masuk Wisata</strong>
                                    Sesuai itinerary.
                                </div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-primary mt-1">support_agent</span>
<div>
<strong class="text-on-surface block">Tour Guide Lokal</strong>
                                    Berbahasa Indonesia.
                                </div>
</li>
</ul>
</div>
<!-- Tidak Termasuk -->
<div class="bg-surface border border-outline-variant rounded-xl p-stack-md">
<h3 class="font-h3 text-h3 text-on-surface mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-outline" style="font-variation-settings: 'FILL' 1;">cancel</span>
                            Tidak Termasuk
                        </h3>
<ul class="space-y-4 font-body-md text-body-md text-on-surface-variant">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-outline mt-1">flight</span>
<div>
<strong class="text-on-surface block">Tiket Pesawat PP</strong>
                                    Dari/ke kota asal.
                                </div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-outline mt-1">account_balance_wallet</span>
<div>
<strong class="text-on-surface block">Pengeluaran Pribadi</strong>
                                    Belanja, mini bar, laundry.
                                </div>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-outline mt-1">restaurant</span>
<div>
<strong class="text-on-surface block">Makan di luar Itinerary</strong>
                                    Makan siang/malam bebas.
                                </div>
</li>
</ul>
</div>
</section>
<!-- Itinerary -->
<section>
<h2 class="font-h2 text-h2 text-primary mb-8 border-b border-outline-variant pb-4">Itinerary Perjalanan</h2>
<div class="relative pl-6 border-l-2 border-primary-fixed-dim space-y-8">
<!-- Day 1 -->
<div class="relative">
<div class="absolute -left-[35px] top-1 w-6 h-6 bg-primary rounded-full border-4 border-surface flex items-center justify-center"></div>
<div class="bg-surface-container-low p-stack-md rounded-xl shadow-[0_4px_20px_rgba(0,40,142,0.05)]">
<h3 class="font-h3 text-h3 text-on-surface mb-2">Hari 1: Kedatangan &amp; Sunset Uluwatu</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                                    Penjemputan di Bandara Ngurah Rai. Perjalanan menuju kawasan Selatan Bali. Menikmati sunset yang memukau di Pura Uluwatu dilanjutkan dengan menonton pertunjukan Tari Kecak dengan latar belakang samudra Hindia.
                                </p>
<div class="flex gap-2">
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Budaya</span>
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Sunset</span>
</div>
</div>
</div>
<!-- Day 2 -->
<div class="relative">
<div class="absolute -left-[35px] top-1 w-6 h-6 bg-primary rounded-full border-4 border-surface flex items-center justify-center"></div>
<div class="bg-surface-container-low p-stack-md rounded-xl shadow-[0_4px_20px_rgba(0,40,142,0.05)]">
<h3 class="font-h3 text-h3 text-on-surface mb-2">Hari 2: Eksplorasi Ubud &amp; Kintamani</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                                    Setelah sarapan, menuju desa seni Ubud. Mengunjungi Monkey Forest dan Terasering Tegalalang. Dilanjutkan makan siang di Kintamani dengan pemandangan Gunung dan Danau Batur yang spektakuler. Sore hari singgah di Pura Tirta Empul.
                                </p>
<div class="flex gap-2">
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Alam</span>
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Pegunungan</span>
</div>
</div>
</div>
<!-- Day 3 -->
<div class="relative">
<div class="absolute -left-[35px] top-1 w-6 h-6 bg-primary rounded-full border-4 border-surface flex items-center justify-center"></div>
<div class="bg-surface-container-low p-stack-md rounded-xl shadow-[0_4px_20px_rgba(0,40,142,0.05)]">
<h3 class="font-h3 text-h3 text-on-surface mb-2">Hari 3: Pantai Kuta &amp; Kepulangan</h3>
<p class="font-body-md text-body-md text-on-surface-variant mb-4">
                                    Waktu bebas di sekitar hotel atau berjalan-jalan di Pantai Kuta. Singgah di pusat oleh-oleh khas Bali sebelum pengantaran kembali ke Bandara Ngurah Rai untuk penerbangan pulang.
                                </p>
<div class="flex gap-2">
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Relaksasi</span>
<span class="px-3 py-1 bg-primary/10 text-primary font-label-sm text-label-sm rounded-full">Belanja</span>
</div>
</div>
</div>
</div>
</section>
<!-- FAQ Section -->
<section>
<h2 class="font-h2 text-h2 text-primary mb-8">Syarat &amp; Ketentuan (FAQ)</h2>
<div class="space-y-4">
<details class="group bg-surface-container rounded-lg p-4 cursor-pointer">
<summary class="font-label-sm text-label-sm text-on-surface flex justify-between items-center outline-none">
                                Apakah jadwal bisa diubah?
                                <span class="material-symbols-outlined group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<p class="font-body-md text-body-md text-on-surface-variant mt-4">
                                Jadwal bersifat fleksibel dan dapat disesuaikan dengan kondisi di lapangan, namun destinasi utama akan tetap dikunjungi sesuai kesepakatan.
                            </p>
</details>
<details class="group bg-surface-container rounded-lg p-4 cursor-pointer">
<summary class="font-label-sm text-label-sm text-on-surface flex justify-between items-center outline-none">
                                Bagaimana kebijakan pembatalan?
                                <span class="material-symbols-outlined group-open:rotate-180 transition-transform">expand_more</span>
</summary>
<p class="font-body-md text-body-md text-on-surface-variant mt-4">
                                Pembatalan H-7 sebelum keberangkatan akan dikenakan biaya 50%. Pembatalan H-3 hangus sepenuhnya.
                            </p>
</details>
</div>
</section>
<!-- Reviews -->
<section>
<h2 class="font-h2 text-h2 text-primary mb-8">Ulasan Pelanggan</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-stack-md">
<div class="bg-surface border border-outline-variant rounded-xl p-stack-md">
<div class="flex items-center gap-1 text-secondary-container mb-3">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-4">"Pengalaman yang luar biasa! Guide sangat ramah dan sabar. Hotelnya juga sangat nyaman."</p>
<p class="font-label-sm text-label-sm text-on-surface">- Budi Santoso</p>
</div>
<div class="bg-surface border border-outline-variant rounded-xl p-stack-md">
<div class="flex items-center gap-1 text-secondary-container mb-3">
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">star</span>
<span class="material-symbols-outlined">star_half</span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant italic mb-4">"Susunan acara sangat rapi, tidak terlalu lelah tapi semua spot bagus di Bali bisa terkunjungi."</p>
<p class="font-label-sm text-label-sm text-on-surface">- Siti Aminah</p>
</div>
</div>
</section>
</div>
<!-- Right Column: Sticky Booking Card -->
<div class="md:col-span-4 relative">
<div class="sticky top-[120px] bg-surface rounded-xl p-stack-md shadow-[0_10px_30px_rgba(0,0,0,0.1)] border border-outline-variant/30">
<div class="mb-6 border-b border-outline-variant pb-6">
<p class="font-body-md text-body-md text-on-surface-variant mb-1">Mulai dari</p>
<h2 class="font-h2 text-h2 text-on-surface">IDR 3.500.000<span class="font-body-md text-body-md text-on-surface-variant font-normal"> /pax</span></h2>
</div>
<div class="space-y-4 mb-6">
<div class="flex items-center justify-between font-body-md text-body-md text-on-surface-variant">
<span>Durasi</span>
<span class="font-label-sm text-label-sm text-on-surface">3 Hari 2 Malam</span>
</div>
<div class="flex items-center justify-between font-body-md text-body-md text-on-surface-variant">
<span>Tipe Tour</span>
<span class="font-label-sm text-label-sm text-on-surface">Privat</span>
</div>
<div class="flex items-center justify-between font-body-md text-body-md text-on-surface-variant">
<span>Keberangkatan</span>
<span class="font-label-sm text-label-sm text-on-surface">Setiap Hari</span>
</div>
</div>
<button class="w-full bg-secondary-container hover:bg-[#e06b00] text-on-secondary-container font-label-sm text-label-sm py-4 rounded-full transition-colors flex items-center justify-center gap-2">
                        Pesan Sekarang
                        <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
</button>
<p class="font-body-md text-[13px] text-on-surface-variant text-center mt-4 flex items-center justify-center gap-1">
<span class="material-symbols-outlined text-[16px]">lock</span>
                        Pembayaran Aman &amp; Terjamin
                    </p>
</div>
</div>
</div>
</main>
<!-- Footer (JSON Component) -->
<footer class="bg-gray-50 dark:bg-gray-950 border-t border-gray-200 dark:border-gray-800 w-full mt-auto">
<div class="grid grid-cols-1 md:grid-cols-4 gap-8 px-8 py-12 max-w-7xl mx-auto font-['Plus_Jakarta_Sans'] text-sm leading-relaxed">
<!-- Brand Column -->
<div class="md:col-span-2">
<span class="text-xl font-bold text-blue-800 dark:text-blue-400 mb-4 block">Solaris Travel</span>
<p class="text-gray-500 dark:text-gray-400 max-w-sm mb-6">
                    Menghadirkan pengalaman perjalanan premium yang tak terlupakan dengan pelayanan terbaik untuk Anda.
                </p>
<p class="text-gray-500 dark:text-gray-400">© 2024 Solaris Travel. Semua Hak Dilindungi.</p>
</div>
<!-- Links Column -->
<div>
<h4 class="font-bold text-blue-800 dark:text-blue-400 mb-4">Tautan</h4>
<ul class="space-y-3">
<li><a class="text-gray-500 dark:text-gray-400 hover:text-blue-800 dark:hover:text-blue-400 transition-all duration-200" href="#">Tentang Kami</a></li>
<li><a class="text-gray-500 dark:text-gray-400 hover:text-blue-800 dark:hover:text-blue-400 transition-all duration-200" href="#">Tautan Cepat</a></li>
<li><a class="text-gray-500 dark:text-gray-400 hover:text-blue-800 dark:hover:text-blue-400 transition-all duration-200" href="#">Kontak</a></li>
</ul>
</div>
<!-- Newsletter Column -->
<div>
<h4 class="font-bold text-blue-800 dark:text-blue-400 mb-4">Newsletter</h4>
<p class="text-gray-500 dark:text-gray-400 mb-4">Dapatkan penawaran eksklusif.</p>
<div class="flex">
<input class="w-full px-4 py-2 rounded-l-lg border border-gray-300 focus:outline-none focus:border-blue-800" placeholder="Email Anda" type="email"/>
<button class="bg-blue-800 text-white px-4 py-2 rounded-r-lg hover:bg-blue-700 transition-colors">Kirim</button>
</div>
</div>
</div>
</footer>
<!-- BottomNavBar (JSON Component - Mobile Only) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full flex justify-around items-center px-4 pb-4 pt-2 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800 shadow-[0_-4px_20px_0_rgba(30,64,175,0.05)] rounded-t-2xl z-50 font-['Plus_Jakarta_Sans'] text-[10px] font-semibold">
<a class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-500 tap-highlight-transparent transition-transform duration-150 active:scale-95 active:bg-gray-50 dark:active:bg-gray-800 w-16 h-12" href="#">
<span class="material-symbols-outlined mb-1 text-[24px]">home</span>
<span>Beranda</span>
</a>
<!-- Active State: Destinasi -->
<a class="flex flex-col items-center justify-center bg-blue-50 dark:bg-blue-900/30 text-blue-800 dark:text-blue-300 rounded-xl px-3 py-1 tap-highlight-transparent transition-transform duration-150 active:scale-95 active:bg-gray-50 dark:active:bg-gray-800 w-16 h-14" href="#">
<span class="material-symbols-outlined mb-1 text-[24px]" style="font-variation-settings: 'FILL' 1;">explore</span>
<span>Destinasi</span>
</a>
<a class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-500 tap-highlight-transparent transition-transform duration-150 active:scale-95 active:bg-gray-50 dark:active:bg-gray-800 w-16 h-12" href="#">
<span class="material-symbols-outlined mb-1 text-[24px]">groups</span>
<span>Trip</span>
</a>
<a class="flex flex-col items-center justify-center text-gray-400 dark:text-gray-500 tap-highlight-transparent transition-transform duration-150 active:scale-95 active:bg-gray-50 dark:active:bg-gray-800 w-16 h-12" href="#">
<span class="material-symbols-outlined mb-1 text-[24px]">local_offer</span>
<span>Promo</span>
</a>
</nav>

    </FrontendLayout>
</template>
