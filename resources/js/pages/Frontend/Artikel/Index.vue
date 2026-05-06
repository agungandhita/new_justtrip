<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="min-h-screen flex flex-col">
<!-- Top Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl z-50 rounded-full border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)]">
<div class="flex justify-between items-center w-full px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Home</a>
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- CTA -->
<div>
<button class="bg-primary text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-800 transition-all active:scale-95 duration-200">
          Daftar
        </button>
</div>
</div>
</nav>
<main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
<!-- Category Filters -->
<div class="flex flex-wrap items-center gap-3 mb-8">
<button class="px-5 py-2 rounded-full bg-primary text-white text-sm font-semibold shadow-sm">All Stories</button>
<button class="px-5 py-2 rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition-colors">Adventure</button>
<button class="px-5 py-2 rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition-colors">Culture</button>
<button class="px-5 py-2 rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition-colors">Food</button>
<button class="px-5 py-2 rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition-colors">Luxury</button>
<button class="px-5 py-2 rounded-full bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-300 text-sm font-semibold hover:bg-slate-100 dark:hover:bg-slate-700 shadow-sm border border-slate-200 dark:border-slate-700 transition-colors">Budget</button>
</div>
<!-- Featured Highlight Section -->
<section class="mb-16">
<div class="relative rounded-3xl overflow-hidden group shadow-xl">
<div class="aspect-[21/9] w-full bg-slate-200 dark:bg-slate-800 relative">
<img alt="Tropical beach at sunset" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Stunning tropical beach sunset with turquoise water" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDtZTAV0Vc1SGc36R7iyy7wOK0PAxJ_DFCkg__Gr84swxfz8ZnKq3S4eEaYPgh14ubFhh9iXqrThHg8obdYCBar1CZAKrAjRwcw44q2Hde-XtwmyyOxyenC5hWERYjrcxt-07GdMzsIkcE1vHGi5yBX_3EAk0Yj63D_tcqxgnTypyvrzKCvndWr4DLznAZARKm1inLFhKaDs5DAfgFSdq5ZD04xkqfK9rbIMtbqmemSjJY58-6Xc36Ur78UnhqH6NoH7HjL0XKjijHv"/>
<div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/40 to-transparent"></div>
</div>
<div class="absolute bottom-0 left-0 p-6 md:p-12 text-white max-w-3xl">
<span class="inline-block px-3 py-1 rounded-full bg-accent text-white text-xs font-bold uppercase tracking-wider mb-4">Featured Highlight</span>
<h1 class="text-3xl md:text-5xl font-extrabold mb-4 leading-tight">Hidden Paradise: The Uncharted Islands of Southeast Asia</h1>
<p class="text-slate-200 text-lg mb-6 line-clamp-2 md:line-clamp-none">Discover the untouched beauty of remote islands where time stands still, and the only tracks in the sand are yours.</p>
<div class="flex items-center gap-6">
<button class="bg-white text-primary px-8 py-3 rounded-full font-bold hover:bg-primary hover:text-white transition-all transform hover:-translate-y-1">
                                Read More
                            </button>
<span class="text-sm font-medium text-slate-300 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">calendar_today</span> May 24, 2024
                            </span>
</div>
</div>
</div>
</section>
<!-- Latest Articles Grid -->
<section>
<div class="flex justify-between items-end mb-8">
<div>
<h2 class="text-3xl font-bold text-slate-900 dark:text-white">Latest Explorations</h2>
<p class="text-slate-500 dark:text-slate-400 mt-1">Fresh stories from around the globe</p>
</div>
<a class="text-primary font-bold flex items-center gap-1 hover:underline" href="#">
                        View All <span class="material-symbols-outlined">chevron_right</span>
</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Article Card 1 -->
<article class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-100 dark:border-slate-700 flex flex-col h-full">
<div class="aspect-video relative overflow-hidden">
<img alt="Swiss Alps mountains" class="w-full h-full object-cover" data-alt="Snow capped peaks in the Swiss Alps" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBo_wWANn9kM_Cq9LzhgxyqAi3Ij4xZc_l_SFYy9HXPQ8Wxddu78HUg8cYaGc_gHOJB93IYBgLH4EdUCwBsmTaRl4xw7Yn8VS-r52EaIw_fI1E4qKgvR7R8imHrJULv8j05r614mbjGIFlK_quQc3PEdsL3bMZuqWxE6-s6qvZHPqEQlHdUm_y-2f2dOpzUtz2GwU3I89y_7UxreYkFBtd9E94DIwFMZkT9oM5C8pcwhe7hsvvl95E56qftBCzazYbJn3a7LDG7eFo6"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 rounded-full bg-primary/90 text-white text-[10px] font-bold uppercase">Adventure</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow">
<div class="text-slate-400 text-xs font-semibold mb-2">MAY 18, 2024</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 hover:text-primary transition-colors cursor-pointer">The Great Alpine Traverse: A Hiker's Ultimate Dream</h3>
<p class="text-slate-600 dark:text-slate-400 text-sm mb-6 flex-grow">A detailed guide on crossing the Alps on foot, from necessary gear to the most breathtaking viewpoints...</p>
<div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-700">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700">
<img alt="Author" class="rounded-full" data-alt="Profile picture of a travel writer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2erisRJZ4nYbaVjLGdg4BtuvgAl_0qL2ls3ScMRCWJZwUwjXz_eUQmoa8HT7XxVkIMhKqLAsLY_H1P482pUjDLWqVOVDvvHcAYeHYslBhU2qIAiKQefgaB57TPwcho8sn2q5uwXd6WnOPreKxX99DsedZV-i_CJKcmZ-cTc_tztTftA_bTP6L5G09Wd9yqLPFBoF55QdVTcKw9YCHx_mZVq2ql91X-4fS8RxnjhWn9ud1hfX7-CbIm2bIsL-lh89R3pbwWG4xw0gg"/>
</div>
<span class="text-xs font-bold text-slate-700 dark:text-slate-300">Alex Rivers</span>
</div>
<span class="text-xs text-slate-400 flex items-center gap-1">
<span class="material-symbols-outlined text-xs">schedule</span> 12 min read
                                </span>
</div>
</div>
</article>
<!-- Article Card 2 -->
<article class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-100 dark:border-slate-700 flex flex-col h-full">
<div class="aspect-video relative overflow-hidden">
<img alt="Luxury hotel room" class="w-full h-full object-cover" data-alt="Elegant luxury resort room with balcony view" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4EXb4gdy9ZERQtoksm08BaDvbcXTT5_ON1FvbVS4hUJcPpmYjSuYo4-kEWTAOEMTQVYs6Elxq2W0ny9ZMjoAazP0Cj_8B7snkL7F-Hd1iSaVniMEC5Gtl6GFboj-rt3qlZuQ_xNpJXAhRQ8IPwE2MqrucO_XaXeg9F4K51Alcd-EsiURd6eOq2KONUROYemMgX7y00_0llsYmCxD2MRGYf8nNiLLQC-aLguSF-tEtNNg1oKDOtjpOYaMnvrsA8uzRGSmZXnhWV17f"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 rounded-full bg-accent text-white text-[10px] font-bold uppercase">Luxury</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow">
<div class="text-slate-400 text-xs font-semibold mb-2">MAY 15, 2024</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 hover:text-primary transition-colors cursor-pointer">5 Hidden Boutique Hotels in Paris You Need to Visit</h3>
<p class="text-slate-600 dark:text-slate-400 text-sm mb-6 flex-grow">Step away from the tourist traps and discover these intimate, art-focused sanctuaries in the heart of Paris.</p>
<div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-700">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700">
<img alt="Author" class="rounded-full" data-alt="Profile picture of a luxury travel blogger" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCSnIhsegtxgIcXJlYlFCJj3tvET9tLl4Nv094UA7k_2E4Mdj3LDLc4mE6f38zA1RQ8pSx6R8ktS3a78yhoyvISbICNCbjDgRgCgmi6mz1UIEG6QQKSNmm2oO0IYN7GW6MrEShCOPB6F5po-JVoYVkHq1361w_MoXPemNS1m0LLGrNSbRSeF9aJPvgj1hZL7344r0jx7HiI_GnN0LykN6gV2wJb45C5b5Ro07f5EKS3kA_6VtHzhlQT61ja75DUfs8RUga2bTW7sCyh"/>
</div>
<span class="text-xs font-bold text-slate-700 dark:text-slate-300">Sophia Lane</span>
</div>
<span class="text-xs text-slate-400 flex items-center gap-1">
<span class="material-symbols-outlined text-xs">schedule</span> 8 min read
                                </span>
</div>
</div>
</article>
<!-- Article Card 3 -->
<article class="bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-slate-100 dark:border-slate-700 flex flex-col h-full">
<div class="aspect-video relative overflow-hidden">
<img alt="Platter of street food" class="w-full h-full object-cover" data-alt="Colorful assortment of Asian street food dishes" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvO_AXtDMcjdtsU1zq_t25n2iV1H-0AYtywhiu9QrSrnevRc608XAZGKJPYyhFRNnz-1rx11U8nqQPNUQP_FKKySyOpg4Hffd3SEBspwznNLBVEQ-GJ7JBrz5ra3huMJKHdSB5TZXmCOjTeis2gvc-inmSOqFOkZyeQiMzlN__XQEcaOnGsT9BxkmTucrvHOgnIFYP6baetDWPL-iGIPQbWXX4udBdUnWScyN1_XO7WLGJfzy9WSYQeTw-kwmH8lNNfheiQGhGfH5Y"/>
<div class="absolute top-4 left-4">
<span class="px-3 py-1 rounded-full bg-primary/90 text-white text-[10px] font-bold uppercase">Food</span>
</div>
</div>
<div class="p-6 flex flex-col flex-grow">
<div class="text-slate-400 text-xs font-semibold mb-2">MAY 12, 2024</div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 hover:text-primary transition-colors cursor-pointer">A Culinary Tour of Tokyo's Back Alleys</h3>
<p class="text-slate-600 dark:text-slate-400 text-sm mb-6 flex-grow">From hidden yakitori stands to world-class ramen, we explore the flavors that define Tokyo's nightlife.</p>
<div class="flex items-center justify-between pt-4 border-t border-slate-100 dark:border-slate-700">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-full bg-slate-200 dark:bg-slate-700">
<img alt="Author" class="rounded-full" data-alt="Profile picture of a food travel expert" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAoUAftsilMc60V9cTQJFqvxVxcv8iGz1TELeK2yQ92yLIX0y6LdYB5DYzZESFgFg7WLo6tm9hPjJ8L27_jVD0LFwiuYKie5W2GIZkM7toBar9x6t8xELE1rMrTlXVnBiwYrcgB_snSgyKFcS2gAtwSSfTXKO318V-c7SVq3Il8wU17Mx-XB8oLCkl3ZnXoyaoVgm0LCK3uRBDU-njzR8Ba-tXxy8AhKTMRg-E3hvbifeIH9ZebieNOonLxbhBe8YvxT4XPG8ecDIr8"/>
</div>
<span class="text-xs font-bold text-slate-700 dark:text-slate-300">Kenji Sato</span>
</div>
<span class="text-xs text-slate-400 flex items-center gap-1">
<span class="material-symbols-outlined text-xs">schedule</span> 15 min read
                                </span>
</div>
</div>
</article>
</div>
<!-- Load More Section -->
<div class="flex justify-center mt-12">
<button class="bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-200 px-10 py-3 rounded-full font-bold hover:bg-slate-300 dark:hover:bg-slate-700 transition-colors shadow-sm">
                        Load More Articles
                    </button>
</div>
</section>
</main>
<!-- Newsletter Subscription -->
<section class="bg-primary py-16 mt-20">
<div class="max-w-4xl mx-auto px-4 text-center text-white">
<span class="material-symbols-outlined text-6xl mb-6">mail</span>
<h2 class="text-3xl font-bold mb-4">Join Our Global Community</h2>
<p class="text-primary-100/80 mb-8 text-lg">Get the best travel tips and stories delivered to your inbox every Sunday.</p>
<form class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
<input class="flex-grow rounded-full px-6 py-4 border-none text-slate-900 focus:ring-4 focus:ring-accent/50 text-base" placeholder="Your email address" type="email"/>
<button class="bg-accent hover:bg-accent/90 text-white font-bold py-4 px-10 rounded-full transition-all shadow-lg text-base" type="submit">
                        Join Now
                    </button>
</form>
</div>
</section>
<footer class="bg-white dark:bg-slate-900 py-12 border-t border-slate-100 dark:border-slate-800">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex flex-col md:flex-row justify-between items-center gap-8">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-2xl">map</span>
<span class="text-xl font-bold text-slate-900 dark:text-white">Justtrip</span>
</div>
<div class="flex gap-8">
<a class="text-slate-500 hover:text-primary transition-colors" href="#">Privacy Policy</a>
<a class="text-slate-500 hover:text-primary transition-colors" href="#">Terms of Service</a>
<a class="text-slate-500 hover:text-primary transition-colors" href="#">Contact</a>
</div>
<div class="flex gap-4">
<div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-lg">public</span>
</div>
<div class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 cursor-pointer hover:bg-primary hover:text-white transition-colors">
<span class="material-symbols-outlined text-lg">camera</span>
</div>
</div>
</div>
<div class="mt-8 text-center text-slate-400 text-sm">
                    © 2024 Justtrip Media Group. All travel rights reserved.
                </div>
</div>
</footer>
</div>

    </FrontendLayout>
</template>
