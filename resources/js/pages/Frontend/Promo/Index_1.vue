<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- Floating Navbar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<!-- Brand Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 dark:bg-blue-400 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Navigation Links -->
<div class="hidden md:flex items-center gap-8">
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- Trailing Action -->
<div>
<button class="bg-blue-800 dark:bg-blue-600 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-700 dark:hover:bg-blue-500 transition-all active:scale-95 duration-200">
      Daftar
    </button>
</div>
</nav>
<main class="pt-24 pb-12">
<!-- Hero Seasonal Banner -->
<section class="px-4 max-w-[1200px] mx-auto mb-12">
<div class="relative w-full aspect-[21/9] md:aspect-[3/1] rounded-xl overflow-hidden group">
<div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent z-10"></div>
<img class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="Tropical beach with palm trees and turquoise water" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOqDWqs4DNt5cF5Ul_hXWzmvgmg3DMhEU6zcUOqyrmIZMNQ7uVRV5KqP4kxIJkvqRct_0LPAOptZfnoHxfe0EavNfQjheEC5DhhXJ1xQ0FrYNT9eVBEe4v9kvvzHF1H-5bKGKgh-fXbScPZeq0dbPvdFrNlkBFdLHaRi14_-APG2q9ei_IFpNk4tfkFC5IkUj9Nyp4FcoDEjSbpKo3St8zYUjLkl0Kvscl_zw7qHMETAxW4-zXMVD7ZfSl2TzxIOvpDq2yLuBFwWLd"/>
<div class="relative z-20 h-full flex flex-col justify-center p-8 md:p-16">
<span class="inline-block bg-primary text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4">Limited Time</span>
<h1 class="text-4xl md:text-6xl font-extrabold text-white mb-4 leading-tight">Summer <br/><span class="text-primary">Blowout Sale</span></h1>
<p class="text-white/90 text-lg max-w-md mb-8">Up to 65% off on selected tropical destinations. Don't wait, these deals vanish in:</p>
<div class="flex gap-4">
<div class="flex flex-col items-center">
<div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-lg w-16 h-16 flex items-center justify-center">
<span class="text-2xl font-bold text-white">02</span>
</div>
<span class="text-[10px] uppercase text-white/70 mt-1 font-bold">Days</span>
</div>
<div class="flex flex-col items-center">
<div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-lg w-16 h-16 flex items-center justify-center">
<span class="text-2xl font-bold text-white">14</span>
</div>
<span class="text-[10px] uppercase text-white/70 mt-1 font-bold">Hours</span>
</div>
<div class="flex flex-col items-center">
<div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-lg w-16 h-16 flex items-center justify-center">
<span class="text-2xl font-bold text-white">45</span>
</div>
<span class="text-[10px] uppercase text-white/70 mt-1 font-bold">Mins</span>
</div>
<div class="flex flex-col items-center">
<div class="bg-primary/80 backdrop-blur-md border border-primary/20 rounded-lg w-16 h-16 flex items-center justify-center shadow-[0_0_15px_rgba(236,91,19,0.5)]">
<span class="text-2xl font-bold text-white">30</span>
</div>
<span class="text-[10px] uppercase text-white/70 mt-1 font-bold">Secs</span>
</div>
</div>
</div>
</div>
</section>
<!-- Flash Sale Header -->
<section class="px-4 max-w-[1200px] mx-auto mb-8 flex flex-col md:flex-row md:items-end justify-between gap-4">
<div>
<h2 class="text-3xl font-bold dark:text-white">Hot Flash Deals</h2>
<p class="text-slate-500 dark:text-slate-400">Exclusive 24-hour discounts on top-rated experiences</p>
</div>
<div class="flex gap-2">
<button class="bg-primary/10 text-primary border border-primary/20 px-4 py-2 rounded-lg text-sm font-bold hover:bg-primary/20 transition-colors">View All</button>
</div>
</section>
<!-- Promo Cards Grid -->
<section class="px-4 max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
<!-- Card 1 -->
<div class="bg-white dark:bg-slate-800/50 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all group">
<div class="relative h-48">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Santorini Greece sunset with white buildings" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDuEri83j9ss0A_WW69NaY--uHacVUSz-NkM1nlLnHAMD820imf591zkJZLvAdZQswcoBmewKTffbfMkX5QpanxzpZqM9c07AGoOf2vGQHB3_JcbzBTwAYkYhUrYTGB7c1QqpEJcTGhFkGu0fPIOhJvhDqEF5ZvryhilD6VyZwr6PgUnCDcxksJ1wjUU8op_46pvLvA2d3aJassoDFSHZ8-6xGgNFlmf4mbXmewRP18LGLOputWJyIFHb3Skt_Th295Ixl4eNeA4gOK"/>
<div class="absolute top-3 left-3 bg-red-600 text-white text-[10px] font-bold px-2 py-1 rounded flex items-center gap-1 uppercase tracking-tighter">
<span class="material-symbols-outlined text-sm">local_fire_department</span> High Demand
                    </div>
<div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full">
                        Ends in 08:22:15
                    </div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-bold text-lg leading-tight">7-Day Greek Islands Escape</h3>
<div class="flex items-center text-primary">
<span class="material-symbols-outlined text-sm">star</span>
<span class="text-xs font-bold ml-1">4.9</span>
</div>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-4 line-clamp-2">Inclusive tour of Mykonos, Santorini, and Crete with boutique hotels.</p>
<div class="flex items-center justify-between mt-auto">
<div class="flex flex-col">
<span class="text-slate-400 line-through text-sm font-medium">$2,450</span>
<span class="text-2xl font-extrabold text-primary">$1,199</span>
</div>
<button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/20">Book Now</button>
</div>
</div>
</div>
<!-- Card 2 -->
<div class="bg-white dark:bg-slate-800/50 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all group">
<div class="relative h-48">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Tokyo city lights at night" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYJDEvcvIRn2PYmzuLYIJX4Dn3NMiDwfVIOEKpjzUhu6Cy0hI9UVSCCITxni_ewexiXY1svguefYioFX-C7rgcOKgMdImzbevgMI_5ay8D8hxIFaC-FFe8qA34NR8Ntm0elj_qriAP-nk4Mf7FRc3nEjvka1Pgy1lExwmIMmiZNSoP_MrtWFfjlYa-79nHGsy5vvC_YRXUaxSVK_evVPKNpstAr8uxVdO24t8h6xPy7H0L2HVbEsq3-aPh9YVU8hvJmVsRING18013"/>
<div class="absolute top-3 left-3 bg-primary text-white text-[10px] font-bold px-2 py-1 rounded uppercase tracking-tighter">
                        Flash Sale
                    </div>
<div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full">
                        Ends in 04:15:30
                    </div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-bold text-lg leading-tight">Tokyo &amp; Kyoto Tech &amp; Tradition</h3>
<div class="flex items-center text-primary">
<span class="material-symbols-outlined text-sm">star</span>
<span class="text-xs font-bold ml-1">4.8</span>
</div>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-4 line-clamp-2">Experience the contrast of ultra-modern Tokyo and historic Kyoto shrines.</p>
<div class="flex items-center justify-between mt-auto">
<div class="flex flex-col">
<span class="text-slate-400 line-through text-sm font-medium">$1,890</span>
<span class="text-2xl font-extrabold text-primary">$1,250</span>
</div>
<button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/20">Book Now</button>
</div>
</div>
</div>
<!-- Card 3 -->
<div class="bg-white dark:bg-slate-800/50 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-sm hover:shadow-xl transition-all group">
<div class="relative h-48">
<img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" data-alt="Paris Eiffel tower in autumn" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQAunjjDK-WEClxlJARLZSLa99MkOshixCfibbRshkIcL-gcgROmKJny2X8o-M-njeRodtvTqyZn7yCfskWoJXhG8JCO1N48wmSnkDjYTOGwIHMrPuXT4WqybS-yYU_acuUPFCNkAu7RRavYmf0h-gR6YNLI11miyWPebuC7vV8aXSyIQ8LtqIxHu9EYyCAZELSWAzmiSa_ALH4dKsrUPUSUTc8dJS8Pqqoa7NriarhPfRrulmS-UEIzllBy2Yy39i2pGJYkW0Z5zo"/>
<div class="absolute top-3 left-3 bg-green-600 text-white text-[10px] font-bold px-2 py-1 rounded flex items-center gap-1 uppercase tracking-tighter">
<span class="material-symbols-outlined text-sm">check_circle</span> Verified Deal
                    </div>
<div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur-sm text-white text-xs font-bold px-3 py-1 rounded-full">
                        Ends in 12:05:00
                    </div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-bold text-lg leading-tight">Paris Romantic Weekend</h3>
<div class="flex items-center text-primary">
<span class="material-symbols-outlined text-sm">star</span>
<span class="text-xs font-bold ml-1">4.7</span>
</div>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-4 line-clamp-2">Business class flights and luxury hotel stay near the Champs-Élysées.</p>
<div class="flex items-center justify-between mt-auto">
<div class="flex flex-col">
<span class="text-slate-400 line-through text-sm font-medium">$950</span>
<span class="text-2xl font-extrabold text-primary">$499</span>
</div>
<button class="bg-primary hover:bg-primary/90 text-white px-5 py-2 rounded-lg font-bold text-sm transition-all shadow-lg shadow-primary/20">Book Now</button>
</div>
</div>
</div>
</section>
<!-- Category Discounts Section -->
<section class="px-4 max-w-[1200px] mx-auto mb-16">
<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="bg-slate-900 rounded-2xl p-8 flex items-center justify-between overflow-hidden relative group">
<div class="relative z-10 max-w-[60%]">
<h3 class="text-white text-3xl font-bold mb-2">Flight Only Deals</h3>
<p class="text-white/70 mb-6">Fly to over 150+ destinations with exclusive airlines partner rates.</p>
<span class="text-primary text-5xl font-black block mb-6">-40%</span>
<button class="bg-white text-slate-900 px-6 py-2 rounded-full font-bold text-sm hover:scale-105 transition-transform">Browse Flights</button>
</div>
<span class="material-symbols-outlined text-[180px] text-white/5 absolute -right-10 -bottom-10 rotate-12 group-hover:rotate-0 transition-transform duration-500">flight</span>
</div>
<div class="bg-primary rounded-2xl p-8 flex items-center justify-between overflow-hidden relative group">
<div class="relative z-10 max-w-[60%]">
<h3 class="text-white text-3xl font-bold mb-2">Hotel Early Bird</h3>
<p class="text-white/80 mb-6">Book 60 days in advance and get massive savings on premium stays.</p>
<span class="text-white text-5xl font-black block mb-6">Up to $500 Off</span>
<button class="bg-slate-900 text-white px-6 py-2 rounded-full font-bold text-sm hover:scale-105 transition-transform">Find Hotels</button>
</div>
<span class="material-symbols-outlined text-[180px] text-white/10 absolute -right-10 -bottom-10 -rotate-12 group-hover:rotate-0 transition-transform duration-500">hotel</span>
</div>
</div>
</section>
<!-- Newsletter / Urgency Banner -->
<section class="px-4 max-w-[1200px] mx-auto mb-20">
<div class="bg-background-dark text-white rounded-3xl p-10 md:p-16 text-center relative overflow-hidden">
<div class="absolute inset-0 bg-primary/10 mix-blend-overlay"></div>
<h2 class="text-3xl md:text-4xl font-bold mb-4 relative z-10">Never miss a price drop again</h2>
<p class="text-slate-400 mb-8 max-w-xl mx-auto relative z-10">Join 500,000+ travelers who get our secret deals delivered directly to their inbox every Tuesday.</p>
<form class="flex flex-col md:flex-row gap-3 max-w-lg mx-auto relative z-10" onsubmit="return false;">
<input class="flex-1 bg-white/10 border border-white/20 rounded-xl px-5 py-3 text-white placeholder:text-white/50 focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter your email address" type="email"/>
<button class="bg-primary hover:bg-primary/90 text-white px-8 py-3 rounded-xl font-bold transition-all whitespace-nowrap">Subscribe Now</button>
</form>
</div>
</section>
</main>
<!-- Navy Footer -->
<footer class="bg-slate-950 text-slate-400 py-16 px-4">
<div class="max-w-[1200px] mx-auto grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-12">
<div class="col-span-2 lg:col-span-1">
<div class="flex items-center gap-2 text-white font-bold text-xl mb-6">
<span class="material-symbols-outlined text-primary">flight_takeoff</span>
<span>Justtrip</span>
</div>
<p class="text-sm leading-relaxed mb-6">Making travel accessible and affordable for everyone. Your next adventure starts with a single click.</p>
<div class="flex gap-4">
<a class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-sm">share</span></a>
<a class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-sm">camera</span></a>
<a class="w-8 h-8 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary hover:text-white transition-all" href="#"><span class="material-symbols-outlined text-sm">public</span></a>
</div>
</div>
<div>
<h4 class="text-white font-bold mb-6">Company</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Careers</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Blog</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Press</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Destinations</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Europe</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Asia</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Americas</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Oceania</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Support</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Safety Center</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
</ul>
</div>
<div class="hidden lg:block">
<h4 class="text-white font-bold mb-6">Install App</h4>
<div class="flex flex-col gap-3">
<div class="bg-white/5 border border-white/10 p-3 rounded-lg flex items-center gap-3 cursor-pointer hover:border-primary transition-colors">
<span class="material-symbols-outlined text-white">phone_iphone</span>
<div class="text-[10px]">
<p class="text-white/50 uppercase">Download on</p>
<p class="text-white font-bold text-xs">App Store</p>
</div>
</div>
<div class="bg-white/5 border border-white/10 p-3 rounded-lg flex items-center gap-3 cursor-pointer hover:border-primary transition-colors">
<span class="material-symbols-outlined text-white">play_store_installed</span>
<div class="text-[10px]">
<p class="text-white/50 uppercase">Get it on</p>
<p class="text-white font-bold text-xs">Google Play</p>
</div>
</div>
</div>
</div>
</div>
<div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
<p>© 2024 Justtrip. All rights reserved.</p>
<div class="flex gap-6">
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">verified_user</span> Secure Checkout</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">language</span> English (US)</span>
<span class="flex items-center gap-1"><span class="material-symbols-outlined text-sm">payments</span> USD</span>
</div>
</div>
</footer>

    </FrontendLayout>
</template>
