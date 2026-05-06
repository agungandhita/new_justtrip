<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<!-- Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)]">
<div class="flex justify-between items-center w-full px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Beranda</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinasi</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Tentang Kami</a>
</div>
<!-- CTA & Profile Integration -->
<div class="flex items-center gap-4">
<button class="bg-blue-800 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-900 transition-all active:scale-95 duration-200">
        Daftar
      </button>
<div class="h-10 w-10 rounded-full bg-slate-200 dark:bg-slate-700 bg-cover bg-center border-2 border-blue-800/20" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuByZVKBsCvWfFAKL0Sp5_bZtkyWOs6MzPZ6eJpKrUGoJeu0c4U7P9Z_vUq6W5ekwA7cy-EdoAhFNhOUI22xFnVgcVKarrrgjHk8h28nk65njqqljKTg586tnQuSlQ63Zado8eDYGUXKN5D0wmmiMB2WkUmOlbgw1RJXFWIDpxjEj-FCMI_Hn0_mkGinFexTplMj9qJohbZe7MpwD-5rm37HTS2At9Asbbm4_lWFCc0vcPaLnOwnoTe5krJRKXDYx2kwxjJ95iwT72CR")'></div>
</div>
</div>
</nav>
<main class="flex-1 max-w-5xl mx-auto w-full px-6 py-10 mt-16">
<!-- Profile Header -->
<div class="mb-10">
<h1 class="text-3xl font-bold tracking-tight">Profile</h1>
<p class="text-slate-500 dark:text-slate-400 mt-1">Manage your account and view your travel history</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<!-- Section 1: User Information -->
<aside class="lg:col-span-1">
<div class="bg-white dark:bg-slate-900 p-8 rounded-xl shadow-sm border border-slate-200 dark:border-slate-800 flex flex-col items-center text-center">
<div class="relative mb-6">
<div class="size-32 rounded-full border-4 border-primary/10 p-1">
<div class="w-full h-full rounded-full bg-cover bg-center" data-alt="Large profile photo of Budi Santoso" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCWbtP6Fh6p5kFY8kdRhIsXx5CVfGMlKq3iXRxOSGVQXayMk6YJvTu1uuCnouaNHnBZ96Wp-Q4SakdEuVb62rbrSh8lvdisACqnvlvL9ShB-2-qL0P-_ZqvxC7VwMSXkOZITJobJ4zW_sZ9BPksypOq1yEegmaQYQeuQYdyktdBYEDLmB_5Uk1KZnqpUIc-pRTo1bMMA8xEq8RAqh0NR57TAJUOcK3BxpenFdwaOq_mYP2fSdlCzxRCEbBcl5JWBgHoz4Tjyq1IUp8W")'></div>
</div>
<button class="absolute bottom-1 right-1 bg-primary text-white p-2 rounded-full shadow-lg hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined text-sm">photo_camera</span>
</button>
</div>
<h2 class="text-2xl font-bold mb-1">Budi Santoso</h2>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6">Explorer Level Gold</p>
<div class="w-full space-y-4 text-left border-t border-slate-100 dark:border-slate-800 pt-6">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl">mail</span>
<div>
<p class="text-xs text-slate-400 uppercase font-semibold">Email Address</p>
<p class="text-sm font-medium">budi.santoso@email.com</p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-xl">call</span>
<div>
<p class="text-xs text-slate-400 uppercase font-semibold">Phone Number</p>
<p class="text-sm font-medium">+62 812-3456-7890</p>
</div>
</div>
</div>
<button class="mt-8 w-full flex items-center justify-center gap-2 bg-primary text-white py-3 px-6 rounded-lg font-bold hover:bg-primary/90 transition-all shadow-md shadow-primary/20">
<span class="material-symbols-outlined text-lg">edit</span>
                            Edit Profile
                        </button>
</div>
</aside>
<!-- Section 2: Booking History -->
<div class="lg:col-span-2 space-y-6">
<div class="flex items-center justify-between mb-2">
<h2 class="text-xl font-bold">Booking History</h2>
<div class="flex gap-2">
<button class="px-4 py-1.5 text-xs font-bold rounded-full bg-primary text-white">All</button>
<button class="px-4 py-1.5 text-xs font-bold rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700">Upcoming</button>
</div>
</div>
<!-- Booking List -->
<div class="space-y-4">
<!-- Booking Card 1 -->
<div class="group bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="flex flex-col md:flex-row">
<div class="md:w-48 h-40 md:h-auto bg-cover bg-center shrink-0" data-alt="Beautiful landscape of Bali cultural tour" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDd0P3D9DPFiRKDMDAEQw8t1d40PZAUrs4ZPV_e7sFAHWM9a-_ubjdwtO2VQ_bIEZOWQ7xrzxYEu6e15ht9MlP71xjjXVE1d0ryKSLA3cClWlQKC31hNSF63bDX14oyddIlmqw4CWIaPKDW1qcezc_acW8muR_JN8NoOX654NkgcO4l0ku3ILM2NUuJ4YAHJc3jxFz5C0Xf-UG7X-tul4eqDzIbc5S2QZERdH7-iN3zpq7kDMpMm60WYW94jCXTs4s_KH_Mk4fUvb67")'>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<div class="flex justify-between items-start gap-4">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="px-2 py-0.5 rounded bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-[10px] font-bold uppercase">Upcoming</span>
<span class="text-slate-400 text-xs">• ID #JT-28491</span>
</div>
<h3 class="text-lg font-bold group-hover:text-primary transition-colors">Bali Cultural &amp; Nature</h3>
<div class="flex items-center gap-3 mt-2 text-slate-500 dark:text-slate-400 text-sm">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> 12 Oct 2023</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">group</span> 2 People</span>
</div>
</div>
<div class="text-right">
<p class="text-xs text-slate-400">Total Price</p>
<p class="text-lg font-bold text-accent">IDR 2,500,000</p>
</div>
</div>
<div class="mt-4 pt-4 border-t border-slate-50 dark:border-slate-800 flex justify-end gap-3">
<button class="px-4 py-2 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors">Cancel</button>
<button class="px-4 py-2 text-sm font-semibold bg-primary/10 text-primary hover:bg-primary/20 rounded-lg transition-colors">View Details</button>
</div>
</div>
</div>
</div>
<!-- Booking Card 2 -->
<div class="group bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="flex flex-col md:flex-row">
<div class="md:w-48 h-40 md:h-auto bg-cover bg-center shrink-0 grayscale-[0.5]" data-alt="Vietnam Ha Long Bay cruise tour" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAlvLWAO3TTJjLzHzuiZub64j12pMnopgdhX6nTMM8ufuZAvRUw0ppmeAOuldeA4Sp3-ieLaISRSFDdRBr1HO2KEpCkqmlMuC7INGKCh2eHU9gRu-InpuneFXr-uUrcHwNB3eAJlPcg1jdDTpNj2ogxKfHn-DIAUq8l6-ov93JULsiBJf4KVhZYhZNhQl4OQmJgJAFr7eyU799irRr-uIPjfl0s4bO-E2mInl4h_5OcRMG_6VBwldrMC7UNGJBCxWH-DYPTFF3y8IRO")'>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<div class="flex justify-between items-start gap-4">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="px-2 py-0.5 rounded bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 text-[10px] font-bold uppercase">Completed</span>
<span class="text-slate-400 text-xs">• ID #JT-27103</span>
</div>
<h3 class="text-lg font-bold group-hover:text-primary transition-colors">Vietnam Ha Long Bay Cruise</h3>
<div class="flex items-center gap-3 mt-2 text-slate-500 dark:text-slate-400 text-sm">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> 15 Aug 2023</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">group</span> 1 Person</span>
</div>
</div>
<div class="text-right">
<p class="text-xs text-slate-400">Total Price</p>
<p class="text-lg font-bold text-accent">IDR 4,850,000</p>
</div>
</div>
<div class="mt-4 pt-4 border-t border-slate-50 dark:border-slate-800 flex justify-end gap-3">
<button class="px-4 py-2 text-sm font-semibold text-primary hover:underline flex items-center gap-1">
<span class="material-symbols-outlined text-sm">download</span> Receipt
                                        </button>
<button class="px-4 py-2 text-sm font-semibold bg-primary text-white rounded-lg transition-colors">Review Tour</button>
</div>
</div>
</div>
</div>
<!-- Booking Card 3 -->
<div class="group bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 overflow-hidden shadow-sm hover:shadow-md transition-shadow">
<div class="flex flex-col md:flex-row">
<div class="md:w-48 h-40 md:h-auto bg-cover bg-center shrink-0 opacity-60" data-alt="Tokyo city lights at night" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBCSSidr_SAYwXcqbxKNDar5-fQd3suJwNIoYIVX3t9ziSsH2xieztOqzwwyaDVgP1bOvzgpAduB8VWH13hSrC88plI3IpIGaIyO5Jsv49vUMRHC71IuD1Duwk6WjXIZnUn52HFq4Ep1HjrKO2Dv-fUfr01FzlYhHQyXJN23mFvUBM2MpfetT0NwRJibkMJFOOQkFKlmQmAFqZoV2FivVu03MoW10r0lIQaQJudXxwFhxeXe_NvXxdlpPtMcz4JIxiWYjW6-Vibp_yv")'>
</div>
<div class="p-5 flex-1 flex flex-col justify-between">
<div class="flex justify-between items-start gap-4">
<div>
<div class="flex items-center gap-2 mb-1">
<span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-800 text-slate-500 dark:text-slate-400 text-[10px] font-bold uppercase">Canceled</span>
<span class="text-slate-400 text-xs">• ID #JT-26011</span>
</div>
<h3 class="text-lg font-bold text-slate-500 dark:text-slate-400 line-through">Tokyo Modern Explorer</h3>
<div class="flex items-center gap-3 mt-2 text-slate-400 text-sm">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">calendar_today</span> 02 Jul 2023</span>
</div>
</div>
<div class="text-right">
<p class="text-xs text-slate-400">Total Price</p>
<p class="text-lg font-bold text-slate-400">IDR 8,200,000</p>
</div>
</div>
<div class="mt-4 pt-4 border-t border-slate-50 dark:border-slate-800 flex justify-end gap-3">
<button class="px-4 py-2 text-sm font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-lg cursor-not-allowed">Refund Processed</button>
</div>
</div>
</div>
</div>
</div>
<button class="w-full py-4 text-sm font-bold text-primary hover:bg-primary/5 rounded-xl border-2 border-dashed border-primary/20 transition-all">
                        View All History
                    </button>
</div>
</div>
</main>
<!-- Footer -->
<footer class="bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 mt-20 pt-16 pb-8">
<div class="max-w-5xl mx-auto px-6">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
<div class="md:col-span-1">
<div class="flex items-center gap-2 text-primary mb-6">
<span class="material-symbols-outlined font-bold">travel_explore</span>
<span class="text-xl font-bold">Justtrip</span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm leading-relaxed">
                            Discover the world with ease. Your trusted partner for unforgettable travel experiences across the globe.
                        </p>
<div class="flex gap-4 mt-6">
<a class="size-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all" href="#">
<span class="material-symbols-outlined text-lg">public</span>
</a>
<a class="size-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all" href="#">
<span class="material-symbols-outlined text-lg">photo_camera</span>
</a>
<a class="size-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-400 hover:bg-primary hover:text-white transition-all" href="#">
<span class="material-symbols-outlined text-lg">videocam</span>
</a>
</div>
</div>
<div>
<h4 class="font-bold mb-6">Company</h4>
<ul class="space-y-4 text-sm text-slate-500 dark:text-slate-400">
<li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Our Tours</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Testimonials</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Contact</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Support</h4>
<ul class="space-y-4 text-sm text-slate-500 dark:text-slate-400">
<li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Refund Policy</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Newsletter</h4>
<p class="text-sm text-slate-500 dark:text-slate-400 mb-4">Get the latest travel tips and exclusive deals.</p>
<div class="flex gap-2">
<input class="flex-1 px-4 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 border-none focus:ring-2 focus:ring-primary text-sm" placeholder="Email" type="email"/>
<button class="bg-primary text-white p-2 rounded-lg hover:bg-primary/90 transition-colors">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="border-t border-slate-100 dark:border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-xs text-slate-400">© 2023 Justtrip Tour &amp; Travel. All rights reserved.</p>
<div class="flex gap-6 text-xs text-slate-400">
<span>Managed by Budi Santoso</span>
<span>v2.4.0</span>
</div>
</div>
</div>
</footer>
</div>

    </FrontendLayout>
</template>
