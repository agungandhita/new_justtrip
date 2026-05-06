<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- Floating Navigation Bar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] transition-all"><div class="flex justify-between items-center w-full px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 dark:bg-blue-400 rounded-full flex items-center justify-center">
<span class="text-white dark:text-slate-900 font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter uppercase">Justtrip</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinations</a>
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- CTA -->
<div>
<button class="bg-blue-800 dark:bg-blue-600 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-900 transition-all active:scale-95 duration-200">
            Daftar
        </button>
</div>
</div></nav>
<!-- Hero Section -->
<header class="relative pt-32 pb-20 px-4 overflow-hidden">
<div class="max-w-6xl mx-auto text-center relative z-10">
<span class="text-primary font-bold tracking-widest uppercase text-sm mb-4 block">Our Journey</span>
<h1 class="text-4xl md:text-6xl font-black text-slate-900 dark:text-white mb-6 leading-tight">
                Making every journey <br/><span class="text-primary underline decoration-primary/30">unforgettable.</span>
</h1>
<p class="text-lg text-slate-600 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed">
                We're a team of explorers, dreamers, and technologists dedicated to simplifying how the world experiences travel.
            </p>
</div>
<div class="absolute top-0 right-0 -z-0 opacity-10">
<span class="material-symbols-outlined text-[400px]">language</span>
</div>
</header>
<!-- Main Content Container -->
<main class="max-w-6xl mx-auto px-4 space-y-24 pb-24">
<!-- Story Section -->
<section class="grid md:grid-cols-2 gap-12 items-center">
<div class="rounded-xl overflow-hidden shadow-2xl aspect-video bg-slate-200 dark:bg-slate-800" data-alt="Modern team collaborating in a bright sunlit office space" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAs-HVOHfeB7Hp-dXCiodLvtPfHASydzGvQiFeDMkiWlM37fTRb6hg9z3ixwmTOdwaf6U5RzBJNk-H4yjYu4XiL-v8uqqp7Cbf5yTb-_CvTFUVX9Ov5caM5qzu-Kjzz_4Ouoc6ON6KFJJxklLdgVhfuPOFVA7dz1XQmbtA8rzKAQYx1bblkL7HV3Y_JsxxXsqdJymoDZAWfEaV6DdeAGp58DIZXONFPMwG203eYN_AGR13TvHV4F7pXzYXVU22gFJSQ0szGt80t1jNM'); background-size: cover;">
</div>
<div class="space-y-6">
<h2 class="text-3xl font-bold text-slate-900 dark:text-white">Our Story</h2>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    Founded in 2018 with a single laptop and a passion for seamless exploration, Justtrip began as a simple tool to help friends organize group trips. We realized the industry was cluttered with complex interfaces and hidden fees.
                </p>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    Today, we've helped over 2 million travelers discover hidden gems across 140 countries. Our platform combines cutting-edge AI with the warmth of human curation to ensure your next adventure is exactly what you dreamed of.
                </p>
<div class="flex gap-8 pt-4">
<div>
<div class="text-3xl font-bold text-primary">5+</div>
<div class="text-xs uppercase font-bold text-slate-400">Years</div>
</div>
<div>
<div class="text-3xl font-bold text-primary">150k+</div>
<div class="text-xs uppercase font-bold text-slate-400">Partners</div>
</div>
<div>
<div class="text-3xl font-bold text-primary">24/7</div>
<div class="text-xs uppercase font-bold text-slate-400">Support</div>
</div>
</div>
</div>
</section>
<!-- Vision & Mission Section -->
<section class="grid md:grid-cols-2 gap-6">
<div class="bg-white dark:bg-background-dark p-8 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
<span class="material-symbols-outlined">visibility</span>
</div>
<h3 class="text-2xl font-bold">Our Vision</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    To be the most trusted global travel companion, enabling every person on earth to explore the world with confidence, ease, and a sense of wonder.
                </p>
</div>
<div class="bg-white dark:bg-background-dark p-8 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col gap-4">
<div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center text-primary">
<span class="material-symbols-outlined">rocket_launch</span>
</div>
<h3 class="text-2xl font-bold">Our Mission</h3>
<p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                    We leverage technology to remove barriers in travel planning, providing transparent pricing and authentic experiences while supporting local communities.
                </p>
</div>
</section>
<!-- Team Section -->
<section class="space-y-12">
<div class="text-center">
<h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-4">Meet Our Team</h2>
<p class="text-slate-600 dark:text-slate-400 max-w-xl mx-auto">The humans behind the screens, dedicated to making your travel dreams come true.</p>
</div>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Member 1 -->
<div class="text-center group">
<div class="aspect-[4/5] rounded-xl mb-4 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/0 transition-colors duration-300"></div>
<img class="w-full h-full object-cover" data-alt="Professional female executive smiling warmly" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9rRk0syaxX64nu3yOMrZzdXqfyOsRqBJb8gGsG2ZIcZ2LRw2gpANqP2PE-oNpXhfhM2clYZoSbxaUuIoYkpDQX-Jsn133AR3UjAby14sOdBtLx-3vMkcrinhLir7WWjORxlgah3sRfWJoaqkl5vmVzTQC8_gK3A0dUWz_T6cE4wjQ3EusQFsTOOmNQFbIgqLA0o9NJUnyYKqthldt_BPwCyjsWXCgjShojJm-PTPvD0nA7cElb9ifw2ZFUXP4SfQT_C-YfLtwhTKY"/>
</div>
<h4 class="font-bold text-lg">Sarah Jenkins</h4>
<p class="text-primary text-sm font-semibold">Founder &amp; CEO</p>
</div>
<!-- Member 2 -->
<div class="text-center group">
<div class="aspect-[4/5] rounded-xl mb-4 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/0 transition-colors duration-300"></div>
<img class="w-full h-full object-cover" data-alt="Male director in business casual attire" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvCtAWWzc8TlRq7cCFmaz_9k7Hfm3Xlm6NX3kv_GN_rwZ7j6GfWScCNFf6A1TkIv1NCqtAPidMh0q7Ad4cqwmjUe2BgnRp5BElpiiAX4_51CbM1XEQNwTa05RFRNpq13rLVKG_Ks0AUtezEJ8mlyzeXe9DPgemSeHTC9qeuWrTzp32BhvdZstVDP-iU7kp8OeyQH1B-BKGrZgdEk55-x1BrsQz4R3BKwdLVpS3YltPWm8y2Zx7HJkgeE7VVjPnXtLHaj7s39AGtFtq"/>
</div>
<h4 class="font-bold text-lg">David Chen</h4>
<p class="text-primary text-sm font-semibold">Head of Product</p>
</div>
<!-- Member 3 -->
<div class="text-center group">
<div class="aspect-[4/5] rounded-xl mb-4 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/0 transition-colors duration-300"></div>
<img class="w-full h-full object-cover" data-alt="Creative woman smiling in office setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkoQYpuTq7RRh_8Qz-hNOztig1lCqs9rZzPrmU6r567t8kTdZlalnczZ-qXBxHmq3rQB_sLHdLXKBXla3yhE9Ue-Znrh2HerxWXI11-7BpqkZeGIvRVX1D-3Sqq8r1MDvNDBc6oioIP5KOF9T2ItIbCHw_XmNfDTd943NW_DzGk4aEVZ-AMdJE6k465KMj3JrWGpxyEVsVILrwCzhVJcGM2iPOQKN2zlyvwci5ZWd701sNor6K95oKfeQQuGwvPbDgR4z1lPtUhlUO"/>
</div>
<h4 class="font-bold text-lg">Elena Rodriguez</h4>
<p class="text-primary text-sm font-semibold">Creative Director</p>
</div>
<!-- Member 4 -->
<div class="text-center group">
<div class="aspect-[4/5] rounded-xl mb-4 overflow-hidden relative">
<div class="absolute inset-0 bg-primary/20 group-hover:bg-primary/0 transition-colors duration-300"></div>
<img class="w-full h-full object-cover" data-alt="Friendly male developer looking at camera" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAz7DMjZn-z71V_hODDEieXDD8KjSZkeWmYeVMQgA2xBt7jsGLBjBEOkWxQFy4URLbc3xzppG-l0w9cKBum0yarmG-9-KMjOsjcdIMr4-WCpXbz7oyMV-WVyoMTjoHiXYavQSFSmOgo4SckH-NBzHf63yqBQml05o0FdBY9V3ioyu1Qi5Kj3rqhg-ka3mqILX8rFtdLNdXRlJJWsxbl_fBeExZ7DjD_80mX4KA9HxmNj5D7xj9-wzpOTXMes6Rs5bQzGgnqKYM7i-cw"/>
</div>
<h4 class="font-bold text-lg">Marcus Wright</h4>
<p class="text-primary text-sm font-semibold">Lead Architect</p>
</div>
</div>
</section>
</main>
<!-- Footer -->
<footer class="bg-[#1a2b4b] dark:bg-[#0f172a] text-slate-300 pt-20 pb-10 px-4">
<div class="max-w-6xl mx-auto">
<div class="grid md:grid-cols-4 gap-12 mb-16">
<div class="space-y-6">
<div class="flex items-center gap-2 text-white">
<span class="material-symbols-outlined">travel_explore</span>
<span class="text-xl font-bold uppercase">Justtrip</span>
</div>
<p class="text-sm leading-relaxed opacity-80">
                        Making the world more accessible, one trip at a time. Join our community of global travelers.
                    </p>
<div class="flex gap-4">
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">public</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">alternate_email</span></a>
<a class="hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined">share</span></a>
</div>
</div>
<div>
<h5 class="text-white font-bold mb-6">Explore</h5>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Popular Places</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Travel Guides</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Booking Help</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Stories</a></li>
</ul>
</div>
<div>
<h5 class="text-white font-bold mb-6">Company</h5>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Careers</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Press</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Legal</a></li>
</ul>
</div>
<div>
<h5 class="text-white font-bold mb-6">Newsletter</h5>
<p class="text-xs mb-4 opacity-70">Get travel tips and exclusive offers.</p>
<div class="flex gap-2">
<input class="bg-white/10 border-none rounded-lg px-4 py-2 text-sm w-full focus:ring-2 focus:ring-primary" placeholder="Email address" type="email"/>
<button class="bg-primary text-white p-2 rounded-lg"><span class="material-symbols-outlined">send</span></button>
</div>
</div>
</div>
<div class="border-t border-white/10 pt-8 text-center text-xs opacity-50">
                © 2024 Justtrip Inc. All rights reserved. Designed for explorers.
            </div>
</div>
</footer>

    </FrontendLayout>
</template>
