<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        

<!-- BEGIN: Hero Section -->
<section class="relative h-screen min-h-[800px] flex items-center justify-center pt-20 px-4 overflow-hidden" id="hero">
<!-- Background Image -->
<div class="absolute inset-0 z-0">
<img alt="Sunny Tropical Beach" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAZD3jlGpvRBBzLw8JdOMsAb8jgL3BQpvFYCMpQ50Ozp1oXsUdV4JCAo-aCI_LW3qlHyVU7b7bpq4Jue8EmMSplB6y3lNpcT-6IrsZMzWVv--Lnk9QIEFH7z2GwZrCFJk8JqM63XfNgO4RPH8-p2wtOI59dsrIxeI83uT5dXYrYRfSIASjJ9wmcRQbBBph61vF2adRZE_qymocQ-FTN1s6h-H1Iamq2EKFI33q3YdOyP1T0AOKQFctayTxo4W9UzATFAaH0_X52y3ls"/>
</div>
<!-- Hero Content Card -->
<div class="relative z-10 max-w-5xl w-full">
<div class="bg-white/70 backdrop-blur-[10px] p-10 md:p-16 rounded-[40px] shadow-modern-lg text-center border border-white/30">
<span class="inline-block bg-white/50 text-primary font-bold px-4 py-1.5 rounded-full text-xs uppercase tracking-widest mb-6">Explore the beauty of Indonesia</span>
<h1 class="text-5xl md:text-7xl font-extrabold text-slate-900 mb-10 leading-tight tracking-tight">Liburan Makin Mudah, <br/><span class="text-primary">Tanpa Ribet</span></h1>
<div class="bg-white rounded-full p-2 shadow-modern flex flex-col md:flex-row gap-2 items-center">
<div class="flex-1 w-full text-left px-8 py-2">
<label class="block text-[10px] uppercase font-extrabold text-slate-400 mb-1">Destinasi</label>
<input class="w-full border-none focus:ring-0 p-0 text-slate-800 font-semibold placeholder:text-slate-300" placeholder="Mau kemana?" type="text"/>
</div>
<div class="hidden md:block w-px h-10 bg-slate-100"></div>
<div class="flex-1 w-full text-left px-8 py-2">
<label class="block text-[10px] uppercase font-extrabold text-slate-400 mb-1">Tanggal</label>
<input class="w-full border-none focus:ring-0 p-0 text-slate-800 font-semibold" type="date"/>
</div>
<div class="hidden md:block w-px h-10 bg-slate-100"></div>
<div class="flex-1 w-full text-left px-8 py-2">
<label class="block text-[10px] uppercase font-extrabold text-slate-400 mb-1">Peserta</label>
<select class="w-full border-none focus:ring-0 p-0 text-slate-800 font-semibold bg-transparent">
<option>1 Peserta</option>
<option>2 Peserta</option>
<option>3+ Peserta</option>
</select>
</div>
<button class="w-full md:w-auto bg-secondary hover:brightness-110 text-white px-12 py-5 rounded-full font-bold shadow-lg transition-all flex items-center justify-center gap-2">
<svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2.5" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            Cari
          </button>
</div>
</div>
</div>
</section>
<!-- END: Hero Section -->
<!-- BEGIN: Why Choose Us -->
<section class="py-section max-w-7xl mx-auto px-4">
<div class="flex flex-col lg:flex-row items-center gap-20">
<div class="lg:w-1/2">
<img alt="Happy Travelers" class="w-full h-[650px] object-cover rounded-[24px] shadow-modern-lg" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3azbFUZVye_EyEzKAWWy-eA_AREhKjLA9L4NegdR7WidJw3mkOHXg0z0souVsrG_gJNQ4MTO4aV22uLXBpR3KGOfWFnHavgjdWoAeGZbdo2kz96m-buG6SLNsuSkkGQfmGhtIVg7KOFQ8lN6ZSD1IZnQuUOSTO9JqM9T9nnCFYJPNtvIgM4aRVjs4dQANKyRI3TQSUkkuUu21bj20Uvd6wL3zZAZYnnD4ZGMd9smjZrUzf3JJAu3fD5J-ZgESdQ5uZ9v4baRKimro"/>
</div>
<div class="lg:w-1/2">
<h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">Kenapa Memilih Justtrip?</h2>
<p class="text-slate-500 mb-12 text-lg leading-relaxed">Kami memberikan pengalaman liburan terbaik dengan standar pelayanan kelas dunia untuk kenyamanan Anda.</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-y-12 gap-x-10">
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Harga Terjangkau</h4><p class="text-sm text-slate-500 leading-relaxed">Harga kompetitif tanpa biaya tersembunyi.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Fast Response</h4><p class="text-sm text-slate-500 leading-relaxed">Admin standby 24/7 melayani kebutuhan Anda.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Aman &amp; Terpercaya</h4><p class="text-sm text-slate-500 leading-relaxed">Terdaftar resmi dan terpercaya.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Destinasi Beragam</h4><p class="text-sm text-slate-500 leading-relaxed">Paket domestik &amp; internasional.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Guide Profesional</h4><p class="text-sm text-slate-500 leading-relaxed">Pemandu ramah &amp; berlisensi.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Fasilitas Mewah</h4><p class="text-sm text-slate-500 leading-relaxed">Hotel &amp; transportasi premium.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Pemesanan Mudah</h4><p class="text-sm text-slate-500 leading-relaxed">Proses cepat &amp; transparan.</p></div>
</div>
<div class="flex gap-5">
<div class="flex-shrink-0 w-14 h-14 bg-accent rounded-full flex items-center justify-center text-primary">
<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div><h4 class="font-extrabold text-slate-900 mb-1">Kepuasan Tamu</h4><p class="text-sm text-slate-500 leading-relaxed">Prioritas utama kenyamanan Anda.</p></div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Why Choose Us -->
<!-- BEGIN: Popular Destinations -->
<section class="py-section bg-slate-50/50">
<div class="max-w-7xl mx-auto px-4">
<div class="text-center mb-12">
<h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">Destinasi Populer</h2>
<!-- Filters -->
<div class="flex flex-wrap justify-center gap-3">
<button class="px-6 py-2 bg-primary text-white rounded-full font-bold text-sm">Semua</button>
<button class="px-6 py-2 bg-white text-slate-600 hover:bg-slate-100 rounded-full font-bold text-sm transition-all shadow-sm">Open Trip</button>
<button class="px-6 py-2 bg-white text-slate-600 hover:bg-slate-100 rounded-full font-bold text-sm transition-all shadow-sm">Corporate</button>
<button class="px-6 py-2 bg-white text-slate-600 hover:bg-slate-100 rounded-full font-bold text-sm transition-all shadow-sm">Edu Trip</button>
</div>
</div>
<!-- Destination Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
<!-- Destination Card 1 -->
<div class="bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all group rounded-xl shadow-modern">
<div class="relative h-72 overflow-hidden">
<img alt="Bali" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA11ynXJo_UBYRL0T7lAXqav69ThcHMX5S-IdUUOTB9Z5AkdnQN60EmSggYs8z5Z9RahPyOcHcrDIb6pZUlXOcPN2Nt9nIk4zVxdEpeAKLJM1TV9tkPMhqsBJgglZYWrmCghf7nuyW9V7i8-Fs6F7DWvP9Mp3H-C9mXVi_IcoerluBNrGvw_EYP7qa73UI02CzTRXduDSKPheHbvHQK_hW3_ndreok43l0WKl9dpW7-k1rrwuQtlu_GVv3G07JiMzgtjVjxC1ZPQM45"/>
<div class="absolute top-4 left-4">
<span class="bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-bold text-primary">Open Trip</span>
</div>
</div>
<div class="p-8">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-extrabold text-slate-900">Uluwatu Sunset Tour</h3>
<div class="flex items-center text-yellow-400">
<svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<span class="text-slate-600 text-sm font-bold ml-1">4.9</span>
</div>
</div>
<p class="text-slate-500 text-sm mb-6">Nikmati keindahan sunset di pura tebing Uluwatu yang spektakuler.</p>
<div class="flex items-center justify-between">
<div>
<p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Mulai Dari</p>
<p class="text-xl font-extrabold text-primary">Rp 450.000</p>
</div>
<button class="bg-secondary hover:bg-orange-600 text-white px-6 py-3 rounded-full font-bold text-sm transition-all shadow-md shadow-orange-100">Detail</button>
</div>
</div>
</div>
<!-- Destination Card 2 -->
<div class="bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all group rounded-xl shadow-modern">
<div class="relative h-72 overflow-hidden">
<img alt="Borobudur" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBb-SMTd_jQIqFo0DP-fPV_ZQi_In5QcL1aUpOBTtkDa3vXSDQUkTqkuwNoJFomc4hbNr0lq998ur1CkartsJxdLlfmP3gkYvTRHwFk6VAhcFqPEFQ9nwJEopmQ314-pK3eUOasrQ6MQxdWZpmAYXjI7o8hFT2Wc1rf3l02jF0PIC0uCnqlHWcFtXaxater3W_sQ4NMa0GN2X8ihWo1DlvMugyBCVjBvExhyVrRZ0qrJa55TXLEfqqx_Af-Za093QRSzrrbDkNwxZWv"/>
<div class="absolute top-4 left-4">
<span class="bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-bold text-primary">Edu Trip</span>
</div>
</div>
<div class="p-8">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-extrabold text-slate-900">Spiritual Borobudur</h3>
<div class="flex items-center text-yellow-400">
<svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<span class="text-slate-600 text-sm font-bold ml-1">4.8</span>
</div>
</div>
<p class="text-slate-500 text-sm mb-6">Menelusuri sejarah kejayaan masa lalu di Candi Buddha terbesar di dunia.</p>
<div class="flex items-center justify-between">
<div>
<p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Mulai Dari</p>
<p class="text-xl font-extrabold text-primary">Rp 325.000</p>
</div>
<button class="bg-secondary hover:bg-orange-600 text-white px-6 py-3 rounded-full font-bold text-sm transition-all shadow-md shadow-orange-100">Detail</button>
</div>
</div>
</div>
<!-- Destination Card 3 -->
<div class="bg-white rounded-[32px] overflow-hidden shadow-xl hover:shadow-2xl transition-all group rounded-xl shadow-modern">
<div class="relative h-72 overflow-hidden">
<img alt="Bali Rice Terrace" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBnTUuuzktASIA0eTRvWrbGO27BVhGLY0CHvntX21adIFFnN3AE1bBiNROpAYQDSldRxIusazkPqLNKH8LP-Mocnq3hypBzY7_C5sFBNCs0zWaYBktBNKwH1wOUp78JX9_l4cBl6IQxmVc93TaqWR0tlB55lyGaiFhisTNOk2MmxHIZJc1NayBqC5ErYCAHLYKHOOIqhzlsvq3NmvkYiiHiZkpSaKaVj7xLK4uHw_F5TB01ZzhCaEq-ZvQAka7eSWJWCsi7pGRT9G34"/>
<div class="absolute top-4 left-4">
<span class="bg-white/90 backdrop-blur px-4 py-1.5 rounded-full text-xs font-bold text-primary">Corporate</span>
</div>
</div>
<div class="p-8">
<div class="flex justify-between items-start mb-4">
<h3 class="text-xl font-extrabold text-slate-900">Ubud Retreat &amp; Team</h3>
<div class="flex items-center text-yellow-400">
<svg class="h-4 w-4" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<span class="text-slate-600 text-sm font-bold ml-1">5.0</span>
</div>
</div>
<p class="text-slate-500 text-sm mb-6">Membangun kekompakan tim di tengah alam Ubud yang asri dan menenangkan.</p>
<div class="flex items-center justify-between">
<div>
<p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Mulai Dari</p>
<p class="text-xl font-extrabold text-primary">Rp 1.200.000</p>
</div>
<button class="bg-secondary hover:bg-orange-600 text-white px-6 py-3 rounded-full font-bold text-sm transition-all shadow-md shadow-orange-100">Detail</button>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Popular Destinations -->
<!-- BEGIN: Testimonials -->
<section class="py-section px-4 overflow-hidden">
<div class="max-w-7xl mx-auto mb-12 flex items-end justify-between">
<div>
<h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">Apa Kata Mereka?</h2>
<p class="text-slate-500">Pengalaman nyata dari pelanggan setia kami.</p>
</div>
<div class="hidden md:flex gap-4">
<button class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center hover:bg-primary hover:text-white transition-all">
<svg class="h-6 w-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
<button class="w-12 h-12 rounded-full border border-slate-200 flex items-center justify-center hover:bg-primary hover:text-white transition-all">
<svg class="h-6 w-6" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
</div>
</div>
<!-- Horizontal Carousel Container -->
<div class="flex gap-8 overflow-x-auto no-scrollbar pb-12 snap-x px-4 lg:px-0">
<!-- Testimonial 1 -->
<div class="min-w-[350px] md:min-w-[450px] bg-white p-8 rounded-[32px] shadow-lg border border-slate-50 snap-center rounded-xl shadow-modern">
<div class="flex items-center gap-1 text-yellow-400 mb-4">
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
</div>
<p class="text-slate-600 italic mb-8 leading-relaxed">"Pelayanan Justtrip sangat luar biasa. Tour guide sangat sabar dan menguasai medan. Paketnya lengkap dan harganya sangat masuk akal. Gak nyesel pilih Open Trip ke Bali kemarin!"</p>
<div class="flex items-center gap-4">
<img alt="User 1" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlnN7VjtRjebK68gSA3jQYk2iA1qnmkXrqckt2uk3x0HYQWRTEIlphYVpCb42WamAa_ha0sZz5utzfbOY4g0oTzsrx86u53crnVzqdOl49AqWJUmBd8Z42b6B_of1j32qLKHpZtRV5Uj_n5kvVJUHp28vga2ryljJCxy5BiaUJK1vSm-sajec0WyN7Pgs1iSxfv5LqSlbSiXZEfLFMQ4NT8WOuB-Slko07V1YMsVkES_d1p9RdWYD7t50Xrp9KFE90B_oduE5dOXHD"/>
<div>
<h5 class="font-bold text-slate-900">Sarah Wijaya</h5>
<span class="text-xs bg-accent text-primary px-2 py-0.5 rounded-full font-semibold">Jakarta</span>
</div>
</div>
</div>
<!-- Testimonial 2 -->
<div class="min-w-[350px] md:min-w-[450px] bg-white p-8 rounded-[32px] shadow-lg border border-slate-50 snap-center rounded-xl shadow-modern">
<div class="flex items-center gap-1 text-yellow-400 mb-4">
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
</div>
<p class="text-slate-600 italic mb-8 leading-relaxed">"Perusahaan kami mempercayakan outbound tahunan ke Justtrip dan hasilnya memuaskan. Koordinasi lancar, hotelnya mewah, dan kegiatannya seru banget. Top!"</p>
<div class="flex items-center gap-4">
<img alt="User 2" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDdk20wxHVklH04CZNCfpb06uwAyQbVxqAGEvnPuzXAQeoMaPvLbwvJJ7yeleITOtGXDkt4SLeX2JekNxn7MQGvx8tQO3ZNCObhbVxZASjzX4gfrShsNPEV_f7ANaTEvrbzCo3PjYJFgfspg8vbJL-1ckjXudbNDCNPkm6MY_CowOqgSGMn3uBPyJ_ucsgXGIQqh_c1BpaoW2lMSUBUP_7Xeloicuio80jvoUvw9uAmQOelSjB5gjduxcu3uKoK0B46oUaqfo7Jv3t"/>
<div>
<h5 class="font-bold text-slate-900">Budi Pratama</h5>
<span class="text-xs bg-accent text-primary px-2 py-0.5 rounded-full font-semibold">Surabaya</span>
</div>
</div>
</div>
<!-- Testimonial 3 -->
<div class="min-w-[350px] md:min-w-[450px] bg-white p-8 rounded-[32px] shadow-lg border border-slate-50 snap-center rounded-xl shadow-modern">
<div class="flex items-center gap-1 text-yellow-400 mb-4">
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
<svg class="h-5 w-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
</div>
<p class="text-slate-600 italic mb-8 leading-relaxed">"Healing sendirian ke Jogja jadi lebih aman karena ikut paket tour Justtrip. Teman-teman baru seru, dokumentasi fotonya keren-keren banget buat Instagram!"</p>
<div class="flex items-center gap-4">
<img alt="User 3" class="w-14 h-14 rounded-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBblax82Kn41KAUQnaCU4-9G_oNuySClh0Ov1HGAd-QtfdQ_nASQTiKEGv8RIL4wxfWuAlndWy085IQwi3ZSnzsH__WonUucXfIWkul25NlmISAwVlarivVN5fGoTJ3DzoVj6SY7_iUYfQFX7u482BwSb3akXBSVYqw4Zu8a578wSKYMKd1OsmL6S8pj_Rui81AHQZh9TvilScp8VGfPszRh2ZYT1gpqQ2gSCXQjE-YRxtmQOTbC6pz-hV5UNVKGRtfev4o92ZFTj9T"/>
<div>
<h5 class="font-bold text-slate-900">Linda Kusuma</h5>
<span class="text-xs bg-accent text-primary px-2 py-0.5 rounded-full font-semibold">Bandung</span>
</div>
</div>
</div>
</div>
</section>
<!-- END: Testimonials -->
<!-- BEGIN: Partners -->
<section class="py-16 bg-white overflow-hidden border-y border-slate-100">
<div class="max-w-7xl mx-auto px-4 mb-8 text-center">
<p class="text-[10px] uppercase font-bold text-slate-400 tracking-[0.2em]">Partner Kami</p>
</div>
<div class="relative flex overflow-x-hidden">
<div class="animate-marquee flex items-center gap-20 py-4">
<!-- Partner Logos (Greyscale) -->
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkUpiEV0ZrfCoLh2k-I3qlPBSjwUv71MV4LQzSLNG4YNRPbrGWg0DJ7cL530D4jPZloQ2rUADN-qBpnqWPrUv4-D5-vp-UnHR_S5x9tW00Xi9vfDIaXlVtW9PNI9W-nJHL90VxkW9x8rT00popbnfKQKaF_tAq9qesZ81p6Ph0_3iY3-V-DE6uO-33cnJPps5z2zfFtbqCSsqR7y4NibVV6COuYjhKtjof5q_mpuTQnyo_gILcr8Vp_pEEQgfbAfzYbqtnnzaV14Zb"/>
<img alt="Partner" class="h-10 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMXjOIlhRT6Yk_RaJ86QzKfMAD6Ev5CHEsUuu4tJA1MiKWiAgpcDlF7enmxmB1SNDx7GxjmafEsYwzxTsoYv8bM_ftGU7kxjEkB8ZMwGyc8FvYMxgNxbOyIcqZejOh29QyR4zDgJl8jKJlSbSY9mLKebs3VUfe23w-BzhhT41DNwHoUyF1S92P5BzniZdTgkkCSBnsbBcRAe2p1DnTqdJkxwK32ICVCdCUd_dgMruDN08LIpIzYU2Z9IlQQSIyhflwdNd7BP77uyW3"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkRWoTtb-5N97mOPTOogBQ-SnG_QUToU-7e5SSUDg28FsEYhL-YmDzhimjRzsQTEpby7xNapaxmEKt01X1Q3V1Wn5CCLXfOHFQsmWXKMQp0IFGtadwL3nRXTqn2yLvIY6tdGoVv1KEQniTqRomC7kcM9KhS8i1FkZGzdc7KD6G2M1OKbt-ZV09BpQIKLgb9CGtcZQJOP0_zlz6Upat5-EFsvp5uq_SWi2MCS2BvlBdIZyrHiU1OLM5rkeGJeDCJHqh3up0m4ZZEUJ_"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7lBwEdrUgwQq2Yr552j-M0W2NuSVZYFmL7mutchg53Z59qBcyxJ_Rd0vuLv-Ld0dzmV3Hu3LDgNNdTCfQDfbe5-ezAxLtKgRwGC7Qi3PWTbKnO0RvWMkUhklGDo1pBRjItDNM8nKw8vfLjGP34Xnp5o-3latZ6eiyQXlAX20KlB1d6Bbc_DNfdAUfIyc18Y6lJ2LvLcLTqx3MMZYrreUQCOI0BWfuqQsm8d-JtppXW5ycywI3f5Qcleb0lgEOqZdhKjiAD3oPKqTs"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCIjAgzkJmidxVX2u7fSqzx7N9GkYVslb7JL0BeAaO__CDaDAXvMxiFEqgxivwPe5E7UOwJiPoc24UMMyD_6SQjDXbO2ozf6XrZqH9LxMiNgd44nfyeRic1FqCEzdzBJsOj1yuAN05thPEhHaWcg5JFeSC9tRc3u7_MLhiY17NQSucRU8eyOBmstFfqhdXkxlGmm34qIp2-lEZr1hzLpkvaXSbnUrjKAKsupguw2yG2O9jz95s1wnVWOCpSYtYsUttYPzuvoiRMpxQ0"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDzlBYe7O1FVRyW1emw_lvQzFT2jIEkr4bHZ1dz2Mq3QufWoOUClF9L-keywS_J-MBJv8Pj04Wzr8IouQlYjwlPnBTCqQgEbgu9YDDzhaTlpRsJ1PmU6EW3LBptOHWgRLn9P9ciPa8KRgOPFDqYPUj4fRE88HgvM74lh51ND-NGMfsl3a9q_EzI6vHo3q05P9DRSeJi1GMXVM8A6N3GEk8kBflZBG670Y1gjxCvpU-5CCdvhFU-RHlj82FmQdj868tx9xRVGDErbyiW"/>
<!-- Duplicate for Marquee -->
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmLZ28ueer4fQ638uj3bk6UTVxV_zhnEplfZZ9mTVf7VMAUfFiM2xUq-I-rpqBkllmAtsnrzA-FEWtfSQa6KikNTc8uhT-nCv9tI734EiHL_zHktgYe1L9zzTCwxzMzgKxXqOi9jRobPcxyB08y1j8FEeNb1tOFsjYPQKqfjwUQgqiSuJYl8MINaZHawwLswbx-qsvOAIwhCSwwpHocG7rQBJpm-4fa498Yqiz6AD4bSwvsrBWRBQLCmCqz6c8wns625mfxF0p-Re-"/>
<img alt="Partner" class="h-10 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB54CqWQucSKBFr3YNpxbKJyKtMVb18FcBIoU6qXyq8StuTk37V0CRJ_cBqpOiaYN97mZHvnEhsWVeOorX8l25hYx6ld4glpbNeIvL77ayVJ4olv_2crfh1cj-brla50j5dVfFEbwVgrhJLjBr9HxCzlEnsGC8c-HTMxzQ9cyG2gskm57e-p7Ih3LGwtgkKCNuXIDK3Yus4Ml6lDYHrW-eSAnG0H3SBPu7YqzsH9uZCwkg5bWBRqtj_p3sYVgI8c__8WWEGnbR9mAlo"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtfG41X5o-TpvqAqUuoDSlyB0LQtjrI29lwPyPH8257kvqNmhqUk5VBq2QAa2VBIeAvCCd2u7kfJB9lwGqbuotpvpIZw1726Mh8-XpdsIcJZAMJQeQMqk59dMULDa6HQMiNKPYgrSuHxwcSBPlvOo71sLpKTL0AMFHaceFxW__HJp_tTewAGijb5XGS9RptMxI3WHOnZUZx0fAgscYd3ZXAAD_Ew-zAraXtBpxUXWpN9z6CjoCbdoSzLqtWAvYwX4qn9kSE-8oqzEI"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA-YA7mVClO6WYLzPFyQmPJ9EtQ9rLelecJ8poy2kih-Mob0yK4aNLs2QBYH38jhSdY-SrtFh85wwAQ_fWJNubCL-AWW0jjiiwQ1_uGOtjo9mq7WGi99N3Omdm53omhoOYlwUF70dFzpWsE9FcCDBJG-eQuGDY3VpH1ysnaB4UvS9cfCfO_jVG-M3HqARLe9QWwNVehk3QyXMFNXJx6t-q5hyHOJM3_X4uksFfpVxWjY2QwyuHf3-1uWLhHTaNJAlHN6CXbilwQbJVd"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBYk5FoKcV28DD8ZdAiG3aV--9aE_4N28uF2EWtUdQ4MYd5wThNV51hEeFPBnUIaW431QYJbLECP9fZRj1zjFobcShwVVAJs7I1QqhcOYGJPB5foayRAZY0EbOKDcyR5obpwrXug1JtmxRJy_JebrVn1SVOewGEH8dclbTKu2WUo24_gY2kNpzofHuvdmBm2888hhks-WOGDpEBRVKd-qDdudyTNsqzOiDPL--jCDC4wPw7Qk0BWSwEvi5QKe1l_1AamjJ1CieLjEoY"/>
<img alt="Partner" class="h-8 grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition-all cursor-pointer" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlT1MUuP2xPvNB1STCj4WALvGn3zHz5xH1YYhNv0uYdtdMDkKWQtHJanZO3QYVC9W8KX4VRWHZIMl2oMXLMk9dNcG9g5XG5_aoYa9N5oeNWaYhmkeywUp_aNv4H5wqEB-OPxuYSL5gkLYNIsR-sxnXFS2aicN5BlnS1X9km9Q9R-ui0TRbfxvZOW4A8_w7hP2ryjNmMoVYmMgixlMi57nJuwHyrCc2UOLIDj9S_ZQSpR6AU2oz_ez5bCqHyC_d9FulALywmO4LcMPi"/>
</div>
</div>
</section>
<!-- END: Partners -->
<!-- BEGIN: Articles -->
<section class="py-section max-w-7xl mx-auto px-4">
<div class="flex items-end justify-between mb-12">
<div>
<h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-2">Inspirasi Liburan</h2>
<p class="text-slate-500">Tips, trik, dan destinasi tersembunyi untuk referensi Anda.</p>
</div>
<a class="text-primary font-bold hover:underline" href="#">Lihat Semua</a>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
<!-- Article 1 -->
<article class="group cursor-pointer">
<div class="relative h-64 overflow-hidden rounded-[24px] mb-6">
<img alt="Bali Tips" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCFNR4uLc0inE3J9Pr8dN06g_7KgV_6YdGnDokgJ_GQXynajHSlklPpw0ZWiVrDnhUxtiY7DNRZdnJQBDcw6KX8RTvbswDDHhBgLfN-E58XnXV_K71k4upCiMXg3VjexPegVFB9Bje8qkK_En6v951oi22zTCZM2eAiyFRZHAgz812gxYyAMDCKokK4ukweLbP5eUNNUSogh_aFy_HtvRSBzfqKmb13oLg96Z3SBOpiYhVG35xFOuEQNuo5QYmy8283z-It-Ac2y6cy"/>
<div class="absolute top-4 left-4">
<span class="bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Tips &amp; Trik</span>
</div>
</div>
<h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-primary transition-colors">5 Tempat Hidden Gem di Bali yang Belum Banyak Diketahui</h3>
<p class="text-slate-500 text-sm leading-relaxed mb-4">Temukan keindahan Bali yang sesungguhnya jauh dari keramaian turis...</p>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden">
<img alt="Author" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQRmJmrk7P0bolDcqQfnHs0bcMLgYil9GDfKp84q_1NCtBtQ0RboPDOcF2RGMbEKCAcr07b9gw6rcE4r9bF-IhS-dVNfFJE441mUMmfSynPAPPSbxXAWtXaRZUfCPmKSVUB3yEuDLHRK60yIRyaYvzDpwp1Iisk89IWn6fItI8ZwFUUa2XpulBfdPFxg1YPWr_mKyT9A64raPdjubEPZUb6h9-uMWVrY_Om2Rsd0C_wRWFGzHffR3MvJrsTZCst0Q7NGYBbcpHS8be"/>
</div>
<span class="text-xs font-bold text-slate-400">Oleh Admin Justtrip • 12 Menit Baca</span>
</div>
</article>
<!-- Article 2 -->
<article class="group cursor-pointer">
<div class="relative h-64 overflow-hidden rounded-[24px] mb-6">
<img alt="Packing Tips" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDSvRTHNsYY5prSCTNMyBlwuhQhz0lG9kmG9045U_Qw0sk48eEgeK9SvYMSSd6rFSYcNgTjfi1F0HiL3wKB5B8HBd4WtDKoZEL40B8ESOFRKsR6MX7coFD-1hRMWsF9HxD6lUKZD2D_OjPs2uV52ORdDn9q0d4k7L5Rsc2o6xC0sMPg2_DOWFg8DliQGL5xYDrY80DtSt3MxJuEtDe8Kmts6J3qazj5mg22LXI4g4UhgQ7ZaDS5p179jvMrAuOMT7UL-Rl_nCuM6bCB"/>
<div class="absolute top-4 left-4">
<span class="bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Preparation</span>
</div>
</div>
<h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-primary transition-colors">Barang yang Wajib Dibawa Saat Open Trip ke Gunung</h3>
<p class="text-slate-500 text-sm leading-relaxed mb-4">Pastikan persiapan mendaki Anda maksimal dengan daftar perlengkapan ini...</p>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden">
<img alt="Author" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAspeQOERcs5IH8iW3yfFuvOSAw30ptzXeg2gvjE7rB2bXpuONwIpK_nUdBwc5QkZRcjOKBzxpzw1t0BfNtvjwNASQqmlKpsYRnFYcHYjtbOs9XBEJ-vBlDteP1fEsgOf0n1O87M3VilX1Qr-zTpP08k_AmF60IMdYl8PHy4tQKGYSchsfUZ9CxP3wg6XvCJlwEYzKnPw-drJyyNu-J4u2aNPqPGtAnzOFKD_t8_mu1IUjJw12Dl5pNHzHoeTW3yqKwgruU3cNvTUlI"/>
</div>
<span class="text-xs font-bold text-slate-400">Oleh Admin Justtrip • 8 Menit Baca</span>
</div>
</article>
<!-- Article 3 -->
<article class="group cursor-pointer">
<div class="relative h-64 overflow-hidden rounded-[24px] mb-6">
<img alt="Travel Budget" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAtkdeoWJG1fQwGzS3gBAEffuY8Ofh0Y66IA9BJnRC2KF8IIwNX1zCioSk1IK6FqwdjWy6GDWgBWpXAkmsh6n3OLl_Eq0GrIlIRN2DKA-qrWsUYmt5-zbv-WCXwh_87cg-DT5NOgWAb5clmm4NMbZYA8pFToyozJw1BTsQrIW8di7LfhTGdpAjHgKlwFGL26Ke4UNSjxTeVOlam9PdaQwx_U1xgIYLN6CxTONXHkHfzbRQfTxjQxzi4A8t62L53Ntt8Yqb8YfmpKvks"/>
<div class="absolute top-4 left-4">
<span class="bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider">Lifestyle</span>
</div>
</div>
<h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-primary transition-colors">Cara Mengatur Budget Liburan Keluarga Agar Tetap Hemat</h3>
<p class="text-slate-500 text-sm leading-relaxed mb-4">Liburan bersama keluarga tak harus mahal jika Anda tahu cara mengaturnya...</p>
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center overflow-hidden">
<img alt="Author" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBExk4kX9MGDrWcH31_vK5pAjjY3KxYKuvk7cwYvEyq-U-TvDyMybo_xytqkCUbDDsAnSh7AdGmNSUmZ0OzlNLbDKsMJOfjD5grURFIX54UBfwvh0oUhei_-MJVB78MSTyDqcby1yK01iBgZ7ADMVAdEoUFj-P6ISv0DQPiCzVjkN9tcxHl4D8K94AmX6_BojYJujyFcbEVS_12tiirwQtaJ6ueRHjPEzmw0d2yj7GKH41OeJs-uciLEmYsITI7ohNnC1tyLJmjYPqy"/>
</div>
<span class="text-xs font-bold text-slate-400">Oleh Admin Justtrip • 15 Menit Baca</span>
</div>
</article>
</div>
</section>
<!-- END: Articles -->


    </FrontendLayout>
</template>
