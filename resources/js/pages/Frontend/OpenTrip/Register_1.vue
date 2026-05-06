<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- TopAppBar -->
<header class="bg-white/90 dark:bg-slate-900/90 backdrop-blur-md font-['Plus_Jakarta_Sans'] text-sm font-medium docked full-width top-0 sticky z-50 border-b border-gray-100 dark:border-slate-800 shadow-sm">
<div class="flex justify-between items-center px-6 py-4 max-w-7xl mx-auto">
<div class="text-2xl font-bold tracking-tight text-blue-800 dark:text-blue-400">
                Justtrip
            </div>
<nav class="hidden md:flex gap-6">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors px-3 py-2 rounded-md" href="#">Destinasi</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors px-3 py-2 rounded-md" href="#">Paket Tour</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors px-3 py-2 rounded-md" href="#">Tentang Kami</a>
</nav>
<div class="flex items-center gap-4">
<button class="text-blue-800 dark:text-blue-400 font-semibold px-4 py-2 hover:bg-blue-50 dark:hover:bg-blue-900/30 transition-colors rounded-full">Bantuan</button>
</div>
</div>
</header>
<!-- Main Content -->
<main class="flex-grow max-w-container-max mx-auto px-margin-mobile md:px-gutter py-stack-lg w-full">
<div class="mb-stack-md text-center">
<h1 class="text-h2 font-h2 text-primary">Daftar Open Trip: Bali Coastal Adventure</h1>
<p class="text-body-lg font-body-lg text-on-surface-variant mt-unit">Lengkapi formulir di bawah ini untuk mengamankan tempat Anda dalam petualangan tak terlupakan.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Form Section -->
<div class="lg:col-span-8 bg-surface rounded-[16px] p-stack-md shadow-[0_4px_20px_rgba(0,40,142,0.05)] border border-surface-variant/50 relative overflow-hidden">
<!-- Subtle decorative blob -->
<div class="absolute top-0 right-0 w-64 h-64 bg-primary-fixed rounded-full blur-3xl opacity-20 -mr-20 -mt-20 pointer-events-none"></div>
<form action="#" class="space-y-stack-sm relative z-10" method="POST">
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-sm">
<div class="flex flex-col gap-unit">
<label class="text-label-sm font-label-sm text-on-surface" for="fullName">Nama Lengkap</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-4 py-3 text-body-md font-body-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,40,142,0.2)] transition-all" id="fullName" name="fullName" placeholder="Masukkan nama lengkap Anda" type="text"/>
</div>
<div class="flex flex-col gap-unit">
<label class="text-label-sm font-label-sm text-on-surface" for="email">Alamat Email</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-4 py-3 text-body-md font-body-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,40,142,0.2)] transition-all" id="email" name="email" placeholder="nama@email.com" type="email"/>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-stack-sm mt-stack-sm">
<div class="flex flex-col gap-unit">
<label class="text-label-sm font-label-sm text-on-surface" for="whatsapp">Nomor WhatsApp</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-4 py-3 text-body-md font-body-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,40,142,0.2)] transition-all" id="whatsapp" name="whatsapp" placeholder="Contoh: 08123456789" type="tel"/>
</div>
<div class="flex flex-col gap-unit">
<label class="text-label-sm font-label-sm text-on-surface" for="participants">Jumlah Peserta</label>
<input class="w-full bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-4 py-3 text-body-md font-body-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,40,142,0.2)] transition-all" id="participants" min="1" name="participants" type="number" value="1"/>
</div>
</div>
<div class="flex flex-col gap-unit mt-stack-sm">
<label class="text-label-sm font-label-sm text-on-surface" for="message">Pesan / Permintaan Khusus</label>
<textarea class="w-full bg-surface-container-lowest border border-outline-variant rounded-DEFAULT px-4 py-3 text-body-md font-body-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary focus:shadow-[0_0_0_4px_rgba(0,40,142,0.2)] transition-all resize-none" id="message" name="message" placeholder="Adakah alergi makanan atau permintaan khusus lainnya?" rows="4"></textarea>
</div>
<div class="pt-stack-sm flex flex-col items-center">
<button class="w-full md:w-auto bg-secondary-container text-on-secondary font-label-sm text-label-sm py-4 px-12 rounded-full hover:bg-secondary transition-colors shadow-[0_4px_20px_rgba(251,120,0,0.2)] opacity-50 cursor-not-allowed grayscale" disabled="true" type="submit">Pendaftaran Ditutup (Penuh)</button>
<p class="text-xs text-on-surface-variant mt-unit text-center">Konfirmasi pendaftaran akan dikirim ke email Anda.</p>
</div>
</form>
</div>
<!-- Summary Section -->
<div class="lg:col-span-4 flex flex-col gap-gutter">
<div class="bg-surface rounded-[16px] overflow-hidden shadow-[0_4px_20px_rgba(0,40,142,0.05)] border border-surface-variant/50">
<div class="h-48 w-full relative">
<div class="absolute inset-0 bg-cover bg-center" data-alt="A stunning, vibrant image of a picturesque Bali coastline at sunset. The scene captures the warm, energetic Mediterranean sunset vibe blended with the clear, deep trusting ocean blues. Lush green cliffs meet the pristine white sand beach, while the sun casts golden hour light across the gentle waves. The aesthetic is high-end, premium travel photography, clean and inspiring." style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuARbbw0Do2Gh76iAoPnltkhs07H6xqravQhFRg_K-CnW0xYnxaD4dIc28Hcb-c86qi8cdAio6dlHKq023csr4BRngsLURkeAPy1R-94GzBs6WHLwOcMc8mlgYN9W_-D8vKskykGiyqJvLtGKOULEWape_CycQF7dnX106rjId32NQaocQuEP4yJ6Wcqc2LQVQJRQXZHRkHeRe6CSDUZfGZ-2MDUZGKUA38Vxm8KS8ub1ixgJhqSg9JvkpT7RdTchP39Bf71DN71EpOQ');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 right-4">
<span class="inline-block bg-primary/10 text-primary-container text-xs font-semibold px-2 py-1 rounded-full mb-2 backdrop-blur-sm bg-white/80">Adventure</span>
<h3 class="text-h3 font-h3 text-white">Bali Coastal</h3>
</div>
</div>
<div class="p-stack-md flex flex-col gap-stack-sm">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary">payments</span>
<div>
<p class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Harga Per Orang</p>
<p class="text-body-lg font-body-lg text-on-surface font-semibold">Rp 1.500.000</p>
</div>
</div>
<div class="h-px w-full bg-outline-variant/30"></div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary">calendar_month</span>
<div>
<p class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Tanggal Trip</p>
<p class="text-body-md font-body-md text-on-surface">15 - 18 Agustus 2024</p>
</div>
</div>
<div class="h-px w-full bg-outline-variant/30"></div>
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-primary">location_on</span>
<div>
<p class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Lokasi Penjemputan</p>
<p class="text-body-md font-body-md text-on-surface">Bandara Ngurah Rai, Bali</p>
</div>
</div><div class="h-px w-full bg-outline-variant/30 mt-stack-sm"></div><div class="flex items-start gap-4 mt-stack-sm"><span class="material-symbols-outlined text-error">event_seat</span><div><p class="text-xs text-on-surface-variant uppercase tracking-wider font-semibold">Sisa Kursi</p><p class="text-body-md font-body-md text-error font-bold">Penuh / Full Booked</p></div></div>
</div>
</div>
<!-- Support Box -->
<div class="bg-surface-container-low rounded-[16px] p-stack-md flex items-center gap-4 border border-outline-variant/20">
<div class="w-12 h-12 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
<span class="material-symbols-outlined">support_agent</span>
</div>
<div>
<p class="text-label-sm font-label-sm text-on-surface">Butuh bantuan?</p>
<a class="text-primary hover:underline text-body-md font-body-md" href="#">Hubungi Tim Support Kami</a>
</div>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only - Suppressed per Semantic Shell Mandate as this is a transactional form page, but instructions ask for Footer. Standard bottom nav usually hidden on checkout/forms. Keeping it hidden to prioritize canvas.) -->
<!-- However, Footer is explicitly requested. -->
<!-- Footer -->
<footer class="bg-slate-50 dark:bg-slate-950 font-['Plus_Jakarta_Sans'] text-xs text-slate-500 w-full py-12 mt-auto border-t border-gray-200 dark:border-slate-800">
<div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4">
<div class="text-lg font-bold text-blue-800">
                Justtrip
            </div>
<div class="flex flex-wrap justify-center gap-6">
<a class="text-slate-500 hover:text-blue-600 hover:underline transition-all" href="#">Syarat &amp; Ketentuan</a>
<a class="text-slate-500 hover:text-blue-600 hover:underline transition-all" href="#">Kebijakan Privasi</a>
<a class="text-slate-500 hover:text-blue-600 hover:underline transition-all" href="#">Hubungi Kami</a>
</div>
<div class="text-center md:text-right">© 2024 Justtrip. Hak cipta dilindungi undang-undang. Solaris Travel Identity.</div>
</div>
</footer>

    </FrontendLayout>
</template>
