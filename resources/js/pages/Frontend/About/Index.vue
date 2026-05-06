<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- Top Navigation -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
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
<button class="bg-primary text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-800 transition-all active:scale-95 duration-200">
            Daftar
        </button>
</div>
</nav>
<main>
<!-- Hero Section -->
<section class="relative w-full h-[500px] flex items-end">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Commercial airplane flying above the clouds at sunset" style="background-image: linear-gradient(to top, rgba(30, 64, 175, 0.9), rgba(30, 64, 175, 0.2)), url('https://lh3.googleusercontent.com/aida-public/AB6AXuBySszoRmrKAPeghDnbsrQXAWk43u3CkOVphpznGOOFwtZy8emSIr9S8BNXPU6sVqqQEvbXf0iyuvLt94QNNbfFavbenZr65L55PFNf66c2zyyw9Ympz2TlpTu6h2mdyR_8lL29rpefkWr5ySImkWQjSYJNRnfxkwIiilKOm4UssfFmmBxH68rbiKa2dh9KVIvzZI3PH9zAj30hvG4eKFy3oljQNgSaVmyBbelQ5ukkrHNFJDu5dpQyhAye74y2Q2_1lbGWYFfjqPFp');"></div>
<div class="relative max-w-7xl mx-auto w-full px-6 lg:px-20 pb-16">
<span class="inline-block px-4 py-1 mb-4 rounded-full bg-accent text-white text-xs font-bold uppercase tracking-widest">Since 2010</span>
<h2 class="text-5xl md:text-7xl font-bold text-white leading-tight">We redefine how <br/>the world moves.</h2>
</div>
</section>
<!-- Company History -->
<section class="max-w-7xl mx-auto px-6 lg:px-20 mt-[120px]">
<div class="grid md:grid-cols-2 gap-16 items-center">
<div>
<h3 class="text-primary text-sm font-bold uppercase tracking-widest mb-4">Our History</h3>
<h2 class="text-4xl font-bold mb-6">A Decade of Travel Innovation</h2>
<p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                        Founded in 2010, Justtrip began as a visionary startup in a small London office. Our mission was simple: make global travel accessible, transparent, and seamless for everyone.
                    </p>
<p class="text-lg text-slate-600 dark:text-slate-400 leading-relaxed">
                        What started with just three passionate travel enthusiasts has blossomed into a global powerhouse, connecting millions of travelers with unique experiences across seven continents. We've weathered industry shifts and global changes, always emerging stronger through our commitment to technological excellence and human-centric service.
                    </p>
</div>
<div class="relative">
<div class="aspect-square rounded-2xl overflow-hidden shadow-2xl">
<img alt="Modern collaborative office space" class="w-full h-full object-cover" data-alt="Modern minimalist office workspace with sunlight" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPOboy34wKT3ZYcXYjLl6wL8GW-cWP1DW00iTQua6-fGhR8aqY9vURLvrjtJIEHAm8uhhrFx45zaQ_nNyf_R129xF8gnJ6RZUBgJwRo-ZtSmTHsxy_tgl-R6jTdkRSLjUwzZweddnunlbbaItGksqmrPtOL4B1K6GrW-gWolTNhgeeOlc8wL4LclX7Z33QD8cnFlPsE6z4rm0jRbBoHeY8WelH6PF6luomZdO6RFBM5_Kh3qtDwavjMyqYfgeO2iuEFqR4iZfLy-_9"/>
</div>
<div class="absolute -bottom-6 -left-6 bg-accent p-8 rounded-2xl text-white shadow-xl">
<p class="text-4xl font-bold">14+</p>
<p class="text-sm font-medium opacity-90">Years of Experience</p>
</div>
</div>
</div>
</section>
<!-- Vision & Mission -->
<section class="mt-[120px] bg-primary py-24">
<div class="max-w-7xl mx-auto px-6 lg:px-20 grid md:grid-cols-2 gap-20">
<div class="space-y-6">
<div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white">
<span class="material-symbols-outlined text-4xl">visibility</span>
</div>
<h2 class="text-3xl font-bold text-white">Our Vision</h2>
<p class="text-blue-100 text-xl leading-relaxed">
                        To become the world's most trusted travel companion, breaking down borders through technology and fostering cultural understanding through seamless exploration.
                    </p>
</div>
<div class="space-y-6 border-t md:border-t-0 md:border-l border-white/20 pt-10 md:pt-0 md:pl-20">
<div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white">
<span class="material-symbols-outlined text-4xl">rocket_launch</span>
</div>
<h2 class="text-3xl font-bold text-white">Our Mission</h2>
<p class="text-blue-100 text-xl leading-relaxed">
                        To empower every traveler with personalized tools, real-time intelligence, and sustainable choices that make every journey as enriching as the destination itself.
                    </p>
</div>
</div>
</section>
<!-- Core Values -->
<section class="max-w-7xl mx-auto px-6 lg:px-20 mt-[120px]">
<div class="text-center mb-16">
<h3 class="text-accent text-sm font-bold uppercase tracking-widest mb-4">Core Values</h3>
<h2 class="text-4xl font-bold">The principles that guide us</h2>
</div>
<div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
<div class="p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:border-primary transition-colors group">
<div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
<span class="material-symbols-outlined">favorite</span>
</div>
<h4 class="text-xl font-bold mb-3">Empathy First</h4>
<p class="text-slate-600 dark:text-slate-400">We design experiences with the traveler's heart and mind as our primary guide.</p>
</div>
<div class="p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:border-primary transition-colors group">
<div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
<span class="material-symbols-outlined">bolt</span>
</div>
<h4 class="text-xl font-bold mb-3">Radical Innovation</h4>
<p class="text-slate-600 dark:text-slate-400">We don't follow trends; we set the pace for the future of global logistics.</p>
</div>
<div class="p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:border-primary transition-colors group">
<div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
<span class="material-symbols-outlined">eco</span>
</div>
<h4 class="text-xl font-bold mb-3">Sustainability</h4>
<p class="text-slate-600 dark:text-slate-400">Committed to eco-friendly travel solutions that protect our planet's beauty.</p>
</div>
<div class="p-8 rounded-2xl border border-slate-200 dark:border-slate-800 hover:border-primary transition-colors group">
<div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-all">
<span class="material-symbols-outlined">verified_user</span>
</div>
<h4 class="text-xl font-bold mb-3">Absolute Trust</h4>
<p class="text-slate-600 dark:text-slate-400">Reliability and security are the foundations of every booking we manage.</p>
</div>
</div>
</section>
<!-- Our Team -->
<section class="max-w-7xl mx-auto px-6 lg:px-20 mt-[120px]">
<div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
<div>
<h3 class="text-primary text-sm font-bold uppercase tracking-widest mb-4">Our Leadership</h3>
<h2 class="text-4xl font-bold">The minds behind Justtrip</h2>
</div>
<p class="max-w-md text-slate-600 dark:text-slate-400">Our diverse team of experts brings together decades of experience in tech, travel, and customer service.</p>
</div>
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-10">
<div class="group">
<div class="aspect-[4/5] rounded-2xl overflow-hidden mb-6">
<img alt="Male Executive" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Portrait of a professional man in a suit" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCHQs2-q58eK7m44tsH4hy16-DILCKd_5pRSw1Iy-Qvfu_FG5KAWVnkm3IrSX5RHEAMFISnvgvlFgGHsEjf9J8bjC1DJFI_A9qEOOsf2ddYgAtT7rlr2i7fF43KhlLdq1xW9ZatUYHps8WcU5LrvsQeZ9H2Csiad0iMc_pTlX_2_67S3ZQIoqES3wnYnKT4ndqluJ97oUtbaPGRDeWfkwi5LQagTIlTZaAArqKVzdjQGfbxCXtdsEqkplgdTn-32QOI-wqLn8OT3dG9"/>
</div>
<h4 class="text-xl font-bold">Marcus Thorne</h4>
<p class="text-accent font-medium text-sm">CEO &amp; Founder</p>
</div>
<div class="group">
<div class="aspect-[4/5] rounded-2xl overflow-hidden mb-6">
<img alt="Female Executive" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Portrait of a professional woman in business attire" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCnR4kXIf5r7dHalgvLCpdwnCpyRA33kLp1e5u4CqKCBNzsJSQ7jifzCwZAP3lAS3YTTbXwWgetOktv01kYjpR1vq6Y3v4VFq3sA6joKcxevC5Ic20390VV7P7-5LrSU-p-UYuuiYGFvAX5yb41rx5FQ4mKP5TLnHxBeLPorEECzWCC_L2-imXlZagqP5tIJDSn-ecgiHWNASprVjidYuY2_WQsLiEjxbxtkTitwMuf-N6GFeykVX_5VqQbL-72LsOQ9sRCW-m7jJIa"/>
</div>
<h4 class="text-xl font-bold">Elena Rodriguez</h4>
<p class="text-accent font-medium text-sm">Chief Operations Officer</p>
</div>
<div class="group">
<div class="aspect-[4/5] rounded-2xl overflow-hidden mb-6">
<img alt="Male Executive" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500" data-alt="Professional man smiling in an office setting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCH7yMBH-VPWrCjZSSd9uJS21-o5SAmV3ueRf1Mg0e0pPHkgB78aWRye2cbxfgMDDp5iaZRdfYVuI6SFFIB0QPJU7A2pWXrsiYLK72cydcR03g5gvBl4BEwF9AKZnlVpwOUdPR2L-z7oWU1pWfHgDyNAwbENoYMhJbCGbKCiXA7tT-Ko4Cbh9baZXTm2R6OZabgCj6pMQihn7oapNBjkzWKFxxXDYPoBBl0sXmQ3SSCC9OeRfQCRP15gR8enjaaR6m_0xGJO9q1aDU"/>
</div>
<h4 class="text-xl font-bold">David Chen</h4>
<p class="text-accent font-medium text-sm">Head of Technology</p>
</div>
</div>
</section>
<!-- Partners -->
<section class="max-w-7xl mx-auto px-6 lg:px-20 mt-[120px] mb-[120px]">
<div class="bg-slate-100 dark:bg-slate-900/50 rounded-3xl p-16">
<h3 class="text-center text-slate-500 text-sm font-bold uppercase tracking-[0.2em] mb-12">Trusted by global partners</h3>
<div class="flex flex-wrap justify-center items-center gap-12 lg:gap-24 opacity-60">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-3xl">flight</span>
<span class="font-bold text-xl tracking-tight">SkyWings</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-3xl">apartment</span>
<span class="font-bold text-xl tracking-tight">UrbanStay</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-3xl">directions_car</span>
<span class="font-bold text-xl tracking-tight">DriveAuto</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-3xl">explore</span>
<span class="font-bold text-xl tracking-tight">GlobalEx</span>
</div>
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-3xl">payments</span>
<span class="font-bold text-xl tracking-tight">SecurePay</span>
</div>
</div>
</div>
</section>
</main>
<!-- Deep Navy Footer -->
<footer class="bg-[#1e0f24] text-white pt-24 pb-12 px-6 lg:px-20">
<div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-12 mb-20">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-3 mb-6">
<div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary text-white">
<span class="material-symbols-outlined text-lg">flight_takeoff</span>
</div>
<h2 class="text-xl font-bold tracking-tight">Justtrip</h2>
</div>
<p class="text-slate-400 leading-relaxed mb-6">
                    Making the world smaller, one journey at a time. Join our community of millions.
                </p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">chat</span>
</a>
<a class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">share</span>
</a>
</div>
</div>
<div>
<h4 class="font-bold mb-6">Company</h4>
<ul class="space-y-4 text-slate-400">
<li><a class="hover:text-white transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-white transition-colors" href="#">Careers</a></li>
<li><a class="hover:text-white transition-colors" href="#">Blog</a></li>
<li><a class="hover:text-white transition-colors" href="#">Press</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Support</h4>
<ul class="space-y-4 text-slate-400">
<li><a class="hover:text-white transition-colors" href="#">Help Center</a></li>
<li><a class="hover:text-white transition-colors" href="#">Safety Information</a></li>
<li><a class="hover:text-white transition-colors" href="#">Cancellation Options</a></li>
<li><a class="hover:text-white transition-colors" href="#">Community Support</a></li>
</ul>
</div>
<div>
<h4 class="font-bold mb-6">Newsletter</h4>
<p class="text-slate-400 mb-6">Stay updated with the latest travel insights.</p>
<div class="flex gap-2">
<input class="bg-white/5 border-none rounded-lg focus:ring-1 focus:ring-primary text-white flex-1 h-12" placeholder="Email" type="email"/>
<button class="bg-primary px-4 rounded-lg hover:opacity-90">
<span class="material-symbols-outlined">arrow_forward</span>
</button>
</div>
</div>
</div>
<div class="max-w-7xl mx-auto border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
<p>© 2024 Justtrip Inc. All rights reserved.</p>
<div class="flex gap-8">
<a class="hover:text-white" href="#">Privacy Policy</a>
<a class="hover:text-white" href="#">Terms of Service</a>
<a class="hover:text-white" href="#">Cookies Settings</a>
</div>
</div>
</footer>

    </FrontendLayout>
</template>
