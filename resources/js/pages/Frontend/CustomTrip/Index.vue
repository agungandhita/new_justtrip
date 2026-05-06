<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="relative flex min-h-screen flex-col overflow-x-hidden">
<!-- Top Navigation -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8">
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Beranda</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinasi</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- CTA -->
<div>
<button class="bg-blue-800 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-900 transition-all active:scale-95 duration-200">
      Daftar
    </button>
</div>
</nav>
<main class="flex-1 pt-24">
<!-- Hero & Form Container -->
<div class="max-w-4xl mx-auto px-4 py-12 md:py-20">
<!-- Header Section -->
<div class="text-center mb-12">
<span class="inline-block px-3 py-1 mb-4 text-xs font-bold uppercase tracking-widest text-primary bg-primary/10 rounded-full">Custom Request</span>
<h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white leading-tight mb-4">
                        Punya Rencana Liburan Sendiri?
                    </h1>
<p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto">
                        Tanyakan paket yang tidak tertera di website kami, kami akan kirimkan penawaran lewat email dalam kurun waktu kurang dari 24 jam.
                    </p>
</div>
<!-- Info Card: No Login Required -->
<div class="mb-10 p-6 rounded-2xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-800 shadow-sm">
<div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
<div class="flex items-start gap-4">
<div class="flex-shrink-0 size-12 flex items-center justify-center rounded-full bg-primary/10 text-primary">
<span class="material-symbols-outlined">no_accounts</span>
</div>
<div>
<h3 class="text-lg font-bold text-slate-900 dark:text-white">Bebas Tanpa Akun</h3>
<p class="text-sm text-slate-600 dark:text-slate-400">
                                    Anda dapat mengirimkan pertanyaan langsung tanpa perlu membuat akun atau masuk terlebih dahulu. Kami memprioritaskan kemudahan Anda.
                                </p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Aktif</span>
<label class="relative flex h-8 w-14 cursor-pointer items-center rounded-full bg-primary p-1">
<div class="h-6 w-6 translate-x-6 rounded-full bg-white shadow-md transition-transform"></div>
<input checked="" class="sr-only" disabled="" type="checkbox"/>
</label>
</div>
</div>
</div>
<!-- Inquiry Form -->
<div class="bg-white dark:bg-slate-900 rounded-3xl p-8 md:p-10 shadow-xl shadow-primary/5 border border-slate-100 dark:border-slate-800">
<form action="#" class="space-y-6">
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Name Field -->
<div class="space-y-2">
<label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Nama Lengkap</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">person</span>
<input class="w-full pl-12 pr-4 py-4 rounded-xl border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400 dark:text-white" placeholder="Masukkan nama Anda" type="text"/>
</div>
</div>
<!-- Email Field -->
<div class="space-y-2">
<label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Alamat Email</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">mail</span>
<input class="w-full pl-12 pr-4 py-4 rounded-xl border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400 dark:text-white" placeholder="email@contoh.com" type="email"/>
</div>
</div>
</div>
<!-- WhatsApp Field -->
<div class="space-y-2">
<label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Nomor WhatsApp</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg">chat</span>
<input class="w-full pl-12 pr-4 py-4 rounded-xl border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400 dark:text-white" placeholder="Contoh: 08123456789" type="tel"/>
</div>
<p class="text-[11px] text-slate-500 italic ml-1">Kami akan menghubungi Anda melalui WhatsApp untuk respon cepat.</p>
</div>
<!-- Details Field -->
<div class="space-y-2">
<label class="text-sm font-bold text-slate-700 dark:text-slate-300 ml-1">Detail Rencana Liburan</label>
<textarea class="w-full p-4 rounded-xl border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-slate-400 dark:text-white resize-none" placeholder="Sebutkan destinasi, jumlah orang, perkiraan tanggal, dan preferensi hotel atau kegiatan lainnya..." rows="5"></textarea>
</div>
<!-- Submit Button -->
<div class="pt-4">
<button class="w-full group relative flex items-center justify-center gap-2 bg-primary hover:bg-primary/90 text-white font-bold py-4 px-8 rounded-xl transition-all shadow-lg shadow-primary/20 overflow-hidden" type="submit">
<span class="relative z-10">Kirim Penawaran Saya</span>
<span class="material-symbols-outlined relative z-10 transition-transform group-hover:translate-x-1">send</span>
</button>
<p class="text-center mt-4 text-xs text-slate-500">Dengan menekan tombol, Anda menyetujui kebijakan privasi Justtrip.</p>
</div>
</form>
</div>
<!-- Trust Badges / Footer Info -->
<div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-8 text-center opacity-70 grayscale">
<div class="flex flex-col items-center gap-2">
<span class="material-symbols-outlined text-3xl">verified_user</span>
<span class="text-xs font-semibold">Terpercaya</span>
</div>
<div class="flex flex-col items-center gap-2">
<span class="material-symbols-outlined text-3xl">support_agent</span>
<span class="text-xs font-semibold">Respon Cepat</span>
</div>
<div class="flex flex-col items-center gap-2">
<span class="material-symbols-outlined text-3xl">savings</span>
<span class="text-xs font-semibold">Harga Kompetitif</span>
</div>
<div class="flex flex-col items-center gap-2">
<span class="material-symbols-outlined text-3xl">map</span>
<span class="text-xs font-semibold">Rute Fleksibel</span>
</div>
</div>
</div>
</main>
<!-- Minimal Footer -->
<footer class="py-10 border-t border-slate-200 dark:border-slate-800">
<div class="max-w-7xl mx-auto px-4 text-center">
<div class="flex items-center justify-center gap-2 mb-4">
<div class="size-6 bg-primary rounded-md flex items-center justify-center">
<span class="material-symbols-outlined text-white text-sm">explore</span>
</div>
<span class="font-bold text-slate-900 dark:text-white">Justtrip</span>
</div>
<p class="text-sm text-slate-500">© 2024 Justtrip Indonesia. Solusi liburan kustom terbaik.</p>
</div>
</footer>
</div>
<!-- Decorative background elements -->
<div class="fixed top-0 left-0 -z-10 w-full h-full overflow-hidden pointer-events-none">
<div class="absolute -top-[10%] -left-[10%] w-[40%] h-[40%] bg-primary/5 rounded-full blur-3xl"></div>
<div class="absolute bottom-[5%] -right-[5%] w-[30%] h-[30%] bg-primary/10 rounded-full blur-3xl"></div>
</div>

    </FrontendLayout>
</template>
