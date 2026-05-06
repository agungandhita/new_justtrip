<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="relative flex h-auto min-screen w-full flex-col overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<!-- Navigation -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3 whitespace-nowrap">
<div class="flex items-center gap-8">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Nav Links -->
<nav class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Home</a>
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</nav>
</div>
<!-- CTA -->
<div>
<button class="bg-blue-800 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-700 active:scale-95 duration-200 transition-all">
          Daftar
        </button>
</div>
</header>
<main class="flex-1 max-w-[1280px] mx-auto w-full px-6 lg:px-10 py-10">
<!-- Header Section -->
<div class="flex flex-wrap justify-between items-end gap-6 mb-10">
<div class="flex flex-col gap-2">
<h1 class="text-slate-900 dark:text-white text-5xl font-black leading-tight tracking-tighter">
                        World <span class="text-primary">Gallery</span>
</h1>
<p class="text-slate-500 dark:text-slate-400 text-lg max-w-lg">Breathtaking moments captured across the globe. From sun-drenched shores to frozen peaks.</p>
</div>
<button class="flex items-center gap-2 px-6 py-3 bg-accent text-white rounded-xl font-bold hover:scale-105 transition-transform shadow-lg shadow-orange-500/20">
<span class="material-symbols-outlined">share</span>
<span>Share Your Story</span>
</button>
</div>
<!-- Filters -->
<div class="flex gap-3 pb-8 overflow-x-auto no-scrollbar">
<button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-primary text-white px-6 text-sm font-bold shadow-md shadow-blue-500/20">
                    All Explorations
                </button>
<button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-6 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:border-primary transition-colors">
<span class="material-symbols-outlined text-[18px]">beach_access</span>
                    Beaches
                </button>
<button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-6 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:border-primary transition-colors">
<span class="material-symbols-outlined text-[18px]">terrain</span>
                    Mountains
                </button>
<button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-6 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:border-primary transition-colors">
<span class="material-symbols-outlined text-[18px]">festival</span>
                    Culture
                </button>
<button class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-full bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-6 text-sm font-semibold text-slate-600 dark:text-slate-300 hover:border-primary transition-colors">
<span class="material-symbols-outlined text-[18px]">business_center</span>
                    Corporate
                </button>
</div>
<!-- Visual Masonry-style Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
<!-- Large Card -->
<div class="group relative overflow-hidden rounded-3xl aspect-[4/5] md:col-span-2 lg:col-span-1 shadow-xl"><div class="absolute top-4 right-4 z-20 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Facebook">
<span class="material-symbols-outlined text-[18px]">facebook</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Twitter">
<span class="material-symbols-outlined text-[18px]">share_reviews</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Instagram">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on WhatsApp">
<span class="material-symbols-outlined text-[18px]">chat</span>
</button>
</div>
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="Crystal clear tropical beach with turquoise water and white sand" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD8srQWSRLdd_DKu8XCNfuEop_Soq0Hu9BAKSQr1rQ-UzyyehGxpeemm-hy6rD_n4FcUnf47UFxbqMgeQj6FP2WLuaZdzcH5-1So-ywvvMJMYcikJsOvoH0rrulxlK_laghAE5p68LkoLzxwFSwYPpf5ee8WrxquvxtMrnrzBMWSbaAOasM637MxEn8Ri6FbU9KiqNeXmcB-t9j1FVBxc3cAZODLS59PwooCb5Vi8HpyVtGdNEw6q5CpVOzE9iff5JG1N231pEfmssJ");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
<div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition-transform">
<span class="inline-block px-3 py-1 bg-accent text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Beach</span>
<h3 class="text-white text-3xl font-black mb-1">Bora Bora Escape</h3>
<p class="text-slate-200 flex items-center gap-1 text-sm font-medium">
<span class="material-symbols-outlined text-sm">location_on</span> French Polynesia
                        </p>
</div>
</div>
<!-- Tall Card -->
<div class="group relative overflow-hidden rounded-3xl aspect-[4/5] shadow-xl"><div class="absolute top-4 right-4 z-20 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Facebook">
<span class="material-symbols-outlined text-[18px]">facebook</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Twitter">
<span class="material-symbols-outlined text-[18px]">share_reviews</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Instagram">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on WhatsApp">
<span class="material-symbols-outlined text-[18px]">chat</span>
</button>
</div>
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="Massive snow capped mountain peak against blue sky" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBxz1KrCtqAzQEJLy2PbM7g-i42y_63WFSddnT57uUW_geMI5gVmg0f9u_ymv1XXq8w121-kLYPlN0OFOovCWiYljBJ8XDoU_-OZecJ-AV8PPXjshvV_kiFCfXW8-KcRKc1H7P4skbolDxmxiALDPl-DWXVpY0zpDs-qLsmixMZhnr2XzGkZ4er_H39awxGVqtoGLwy9JhMu-b-7mtkEkWRoUShrUmY3JE51e8jLixs1N4YxncJgTLJNx73ALlDr0HpVra-pNmd7J-b");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
<div class="absolute bottom-0 left-0 p-8">
<span class="inline-block px-3 py-1 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Mountain</span>
<h3 class="text-white text-2xl font-bold mb-1">Swiss Alps Trek</h3>
<p class="text-slate-200 flex items-center gap-1 text-sm">
<span class="material-symbols-outlined text-sm">location_on</span> Zermatt, Switzerland
                        </p>
</div>
</div>
<!-- Standard Card -->
<div class="group relative overflow-hidden rounded-3xl aspect-[4/5] shadow-xl"><div class="absolute top-4 right-4 z-20 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Facebook">
<span class="material-symbols-outlined text-[18px]">facebook</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Twitter">
<span class="material-symbols-outlined text-[18px]">share_reviews</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Instagram">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on WhatsApp">
<span class="material-symbols-outlined text-[18px]">chat</span>
</button>
</div>
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="Colorful traditional lanterns at a vibrant Asian festival" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBpq3FoPMI3fIJ-vcyi2S_nkxjfqBXP0o9wR9rJzX6SB_udo06ZcChw2HMIEcMZ_FCoSafTafBD_U1cUnHaMjK4f2JTJVlOg7gQH3IheKN9A22541kTzSeqYFZA8yN8r44IHzqU3iiczZqQrtszWpYw4Mb-WyATQoOH-afFxxzDpR0zsmrJpTaqv7Fx1LnsVQJ-vsLNg-oP88VyYJyf55OfGGqykwE43BY4s0I3YRuZQsIcWRPlWACpRhGB4BXjDX5qjdJM7qNbBoQm");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
<div class="absolute bottom-0 left-0 p-8">
<span class="inline-block px-3 py-1 bg-purple-600 text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Culture</span>
<h3 class="text-white text-2xl font-bold mb-1">Lantern Night</h3>
<p class="text-slate-200 flex items-center gap-1 text-sm">
<span class="material-symbols-outlined text-sm">location_on</span> Hoi An, Vietnam
                        </p>
</div>
</div>
<!-- Another Wide/Tall Card -->
<div class="group relative overflow-hidden rounded-3xl aspect-[16/9] md:col-span-2 shadow-xl"><div class="absolute top-4 right-4 z-20 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Facebook">
<span class="material-symbols-outlined text-[18px]">facebook</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Twitter">
<span class="material-symbols-outlined text-[18px]">share_reviews</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Instagram">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on WhatsApp">
<span class="material-symbols-outlined text-[18px]">chat</span>
</button>
</div>
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="Cinematic drone view of colorful Italian coastal town houses" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA3hfoBKBv_AAo6qUctq03NEelwvV2YKx24VxVgF9EdamxFsCDF7xv5EhyFnAQFmaqn7-6h6wUFjo-gbmSzKZFZmGlU-uCi6tq_aGbf7v_xct3v4JfgOtgUNFXhfyg-70Z2ceo1uY5-LGP2_b5JRVAy4ro-pu6Nq9KsI3CFLIicdfpW8G1utkDYeypu3nQm1JhLF24MYlT2QEVPyTICROYAiLE-igs9drWoDFUsuHc6T3t0VW3nRY_JfrE4bl5HN_nYsgQ_JRsFmx8a");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
<div class="absolute bottom-0 left-0 p-8">
<span class="inline-block px-3 py-1 bg-accent text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Culture</span>
<h3 class="text-white text-3xl font-black mb-1">Cinque Terre Sunset</h3>
<p class="text-slate-200 flex items-center gap-1 text-sm font-medium">
<span class="material-symbols-outlined text-sm">location_on</span> Italian Riviera
                        </p>
</div>
</div>
<!-- Last Card -->
<div class="group relative overflow-hidden rounded-3xl aspect-[16/9] md:col-span-1 shadow-xl"><div class="absolute top-4 right-4 z-20 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Facebook">
<span class="material-symbols-outlined text-[18px]">facebook</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Twitter">
<span class="material-symbols-outlined text-[18px]">share_reviews</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on Instagram">
<span class="material-symbols-outlined text-[18px]">photo_camera</span>
</button>
<button class="size-8 flex items-center justify-center rounded-full bg-black/40 backdrop-blur-md text-white hover:bg-primary transition-colors cursor-pointer" title="Share on WhatsApp">
<span class="material-symbols-outlined text-[18px]">chat</span>
</button>
</div>
<div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110" data-alt="Pristine mountain lake reflecting the surrounding forest and peaks" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDNcdvcp_ej0vEwYokWcXYQ0zNVSL1rXduAUziZRBPd-_BoeLpp8AKGP4cSQdMlWdw3u543ZnJ3wNQ5bth_VWIpfEkckywTcDLeVrdANTF6eR9yAH6W90XiGotmCppfcvy6iKO7AQZLqIbWH8mlc-npv227n2jQuEgU8yMvCOrlfzxhz4xJgHiQ-j_bAZ-to4p_RMVdDQjrXZiA3FdeRmyIcbwMkDw0C7w60Nr8M3ph6p_U8zhezUdckAoRKswmP0zQVt8Z0gP8ZJGk");'></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-60 group-hover:opacity-80 transition-opacity"></div>
<div class="absolute bottom-0 left-0 p-8">
<span class="inline-block px-3 py-1 bg-primary text-white text-[10px] font-black uppercase tracking-widest rounded-full mb-3">Retreat</span>
<h3 class="text-white text-2xl font-bold mb-1">Banff Serenity</h3>
<p class="text-slate-200 flex items-center gap-1 text-sm">
<span class="material-symbols-outlined text-sm">location_on</span> Alberta, Canada
                        </p>
</div>
</div>
</div>
<!-- CTA Section -->
<div class="mt-24 mb-12 rounded-[40px] bg-primary relative overflow-hidden px-8 py-20 text-center">
<div class="absolute top-0 right-0 w-64 h-64 bg-accent/20 rounded-full blur-3xl -mr-32 -mt-32"></div>
<div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -ml-32 -mb-32"></div>
<div class="relative z-10 max-w-2xl mx-auto">
<h2 class="text-white text-4xl md:text-5xl font-black mb-6 leading-tight">Inspired? Book Your Next Trip Now</h2>
<p class="text-blue-100 text-lg mb-10 opacity-90">Your next adventure is just a click away. Join 10k+ happy travelers exploring the world with Justtrip.</p>
<div class="flex flex-col sm:flex-row gap-4 justify-center">
<button class="px-10 py-4 bg-accent text-white font-black rounded-2xl hover:bg-orange-600 transition-all shadow-xl shadow-orange-900/20 text-lg uppercase tracking-tight">
                            Explore Destinations
                        </button>
<button class="px-10 py-4 bg-white text-primary font-black rounded-2xl hover:bg-blue-50 transition-all text-lg uppercase tracking-tight">
                            View Deals
                        </button>
</div>
</div>
</div>
</main>
<!-- Footer -->
<footer class="border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark py-12 px-6 lg:px-40">
<div class="flex flex-col md:flex-row justify-between items-center gap-8">
<div class="flex items-center gap-2 text-primary">
<span class="material-symbols-outlined font-bold">explore</span>
<span class="text-xl font-black text-slate-900 dark:text-white">Justtrip</span>
</div>
<div class="flex gap-8 text-sm font-semibold text-slate-500 dark:text-slate-400">
<a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="hover:text-primary transition-colors" href="#">Contact Support</a>
</div>
<div class="flex gap-4">
<div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-primary hover:text-white transition-all cursor-pointer">
<span class="material-symbols-outlined text-[20px]">public</span>
</div>
<div class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 hover:bg-primary hover:text-white transition-all cursor-pointer">
<span class="material-symbols-outlined text-[20px]">share</span>
</div>
</div>
</div>
<div class="mt-8 text-center text-slate-400 dark:text-slate-500 text-xs">
                © 2024 Justtrip Inc. All rights reserved. Exploring the world, one gallery at a time.
            </div>
</footer>
</div>
</div>
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

    </FrontendLayout>
</template>
