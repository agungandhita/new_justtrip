<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- Floating Top Nav Bar -->
<header class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)]">
<nav class="flex justify-between items-center w-full px-8 py-3">
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Beranda</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinasi</a>
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<div>
<button class="bg-blue-800 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-700 active:scale-95 duration-200 transition-all">
        Daftar
      </button>
</div>
</nav>
</header>
<main class="pt-32 pb-20">
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-4 md:px-10 mb-12">
<div class="relative h-[400px] md:h-[500px] w-full rounded-xl overflow-hidden shadow-2xl">
<img alt="Group of friends having fun" class="w-full h-full object-cover" data-alt="A diverse group of friends laughing together on a mountain peak" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAEr3haRhimoeCbZ4M49Nij8Jc81pXQWsM9Dwkog3hqX5NQZG--GEL-9yYw4c_psvAzuYWQykU4nOqZfNK3NZaFcYu2fwM7UeA8MwtXGd4fErhoYCwunVmwZmxV0uxIHk8I4CuendeLD3u5oUciLpzO6BaT9WOnHpFxfMXIhh_Phpy2ZOxlYvCdPZ6siVwaSdoBYifX-l3NTx8VhiFF8apNWkizWVKqUNiifNBblc8EhHriSdN10ivEECwIK1MiPf8IMk0h5Zveopu9"/>
<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent flex flex-col justify-end p-8 md:p-16">
<h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Join an Open Trip</h1>
<p class="text-slate-200 text-lg md:text-xl max-w-2xl">Don't wait for friends to be free. Join a group of like-minded travelers and explore the world's most beautiful destinations together.</p>
</div>
</div>
</section>
<!-- How It Works -->
<section class="max-w-7xl mx-auto px-4 md:px-10 mb-16">
<h2 class="text-2xl md:text-3xl font-bold mb-8 flex items-center gap-2">
<span class="material-symbols-outlined text-primary">info</span> How it Works
            </h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-6 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
<div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-3xl">search_check</span>
</div>
<h3 class="text-xl font-bold mb-2">Pick a Destination</h3>
<p class="text-slate-600 dark:text-slate-400">Browse our curated list of upcoming group trips to exotic locations worldwide.</p>
</div>
<div class="p-6 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
<div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-3xl">group_add</span>
</div>
<h3 class="text-xl font-bold mb-2">Secure Your Spot</h3>
<p class="text-slate-600 dark:text-slate-400">Check remaining seats and book your spot with a small deposit. Meet your group online.</p>
</div>
<div class="p-6 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
<div class="w-12 h-12 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-4">
<span class="material-symbols-outlined text-3xl">flight_takeoff</span>
</div>
<h3 class="text-xl font-bold mb-2">Travel Together</h3>
<p class="text-slate-600 dark:text-slate-400">Arrive at the destination and start your adventure with your new travel buddies.</p>
</div>
</div>
</section>
<!-- Scheduled Open Trips -->
<section class="max-w-7xl mx-auto px-4 md:px-10">
<div class="flex items-center justify-between mb-8">
<h2 class="text-2xl md:text-3xl font-bold">Jadwal Open Trip</h2>
<button class="flex items-center gap-2 text-primary font-bold hover:underline">Lihat semua <span class="material-symbols-outlined">arrow_forward</span></button>
</div>
<div class="grid grid-cols-1 gap-6">
<!-- Trip Card 1 -->
<div class="flex flex-col md:flex-row items-stretch bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-lg hover:shadow-xl transition-shadow group">
<div class="w-full md:w-1/3 aspect-video md:aspect-auto overflow-hidden">
<img alt="Bali Coastal" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Beautiful turquoise beach in Bali with palm trees" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCyGHdwBeMgpAmH_DC6uqLJxjjq8xKsMwzk045r77y03DfiQanZH2n_mQKpd6uFx9ZMD03Zh43bEuXr7yNuX2xqpjJiT1co4orqycJkaZTM-9AuDhD02cS7Zap5uV_TqlUusOBteo1wwMJ-uNo0192gFdv4_IOauvAMV8ByOFfzxpumQCgW6-EmQ8d4lKKltEYcBeqOyhe96AFgEYP9DVwXybTaUyayvmStO0LGFRChMiP6g89dhKwPgxwBm_fdUM2XzPbYW8PMtTX2"/>
</div>
<div class="flex-1 p-6 md:p-8 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full uppercase tracking-wider">Paling Populer</span>
<span class="text-slate-500 dark:text-slate-400 text-sm flex items-center gap-1">
<span class="material-symbols-outlined text-sm">location_on</span> Bali, Indonesia
                                </span>
</div>
<h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">Bali Coastal Adventure</h3>
<p class="text-slate-600 dark:text-slate-400 mb-6">Explore hidden lagoons, sacred temples, and the vibrant surf culture of the Island of the Gods.</p>
<div class="flex flex-wrap gap-4 text-sm font-medium">
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">calendar_month</span> Oct 15 - Oct 22
                                </div>
<div class="flex items-center gap-1.5 text-primary"><span class="material-symbols-outlined">event_seat</span> Sisa 4 Kursi</div>
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">payments</span> From $1,299
                                </div>
</div>
</div>
<div class="mt-8 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 pt-6">
<div class="flex -space-x-3">
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPIazvllQpgAPvJVZfxGw-Lu3k1u2zgOESO8g7vrjUoPEsEA9SIliGdrhaB28mS3LXGUUnXr5QxD7ALWkOHWnz2ugymqI6o76ajKVhlaE6siIsa4B005UUw3S2fvbFXJPf01cN6F4FbavZgSnEESc8g_QLFUoQsUrY32xqF4P0WHw_Inv2zIlnonA9F4y-2XxFnh6QM_ZivT0LWZqk-CeO3e71RZbeQAL3OaNyBzKp3fBfGoHKZT8a3QmZbZsCOT4yW8538Pv7rb5a"/>
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuALqoYoAoH-eFW4BbTxNU7u9dJ6M_1fBj9_NrGThGT2pR8YUBxgi6fXWQjt7x4PrA0X7nblYjuxLEZiBtg453CZO16ndRRkvq00dh0E4LyPyPx-LAo0qhireSRk3-2nv0psL4iHquCpqjL473MwGWxCUFmIDAxfksxDOQ8QqjwIWkOXu_cNfl4AojFtaUCNOh8cfNbordOZgsGVzq29_Xi58k0xNjLAeKgihIVgCJk1n8pmB1e_FM4BbLi_bdg-ZldeZyOomXh0atx6"/>
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCvEOi76_svrdt82ajNkFdTiiIWThBcxqPnQQaooVNEF0BdHEKgtztsgMIm2JLkLcYpvOCjySJ8OoYik3cWca45vWATQP1M5ywhEFgpRFVhwo3CeEqJa3ZVyv_8JlH9L9KyLidfwGvutPCzoyMFt5_XV3MAjqIqlRLK8tbtNUexo7p-t0CH_SwcQ3hhsNvwLP1i5o_PlXoPUN_dI-oWudfWrIrVQ8pmiiCVZH2rB5X7-YQNrPn1kK_5sKjbtMaD_cwnVdR8wSVMUMX6"/>
<div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-700 text-[10px] font-bold ring-2 ring-white dark:ring-slate-800">+8</div>
</div>
<button class="bg-primary text-white px-8 py-3 rounded-xl font-bold flex items-center gap-2 hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">Lihat detail <span class="material-symbols-outlined">arrow_forward</span></button>
</div>
</div>
</div>
<!-- Trip Card 2 -->
<div class="flex flex-col md:flex-row items-stretch bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-lg hover:shadow-xl transition-shadow group">
<div class="w-full md:w-1/3 aspect-video md:aspect-auto overflow-hidden">
<img alt="Paris Lights" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Eiffel Tower at sunset with city lights" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_huU08PQLRmR0WCUYR66v6M4OTUMMN4TgQmpJb0OiGINFfWF8JGojNtV26cAx-r-SQQ8wZHn5j_Z_wVEYRWiUKuTw5ZU3OaK6e1mFZd3tBfRs3txKsREvYKNGfufDP8LgjeJe-z0G9wXeYvbVkBx74Ok4-KLwRP8mmzjeEozuSj1a1q_y-i7_39St2P0tNUAK91MUems_RVCFMiNEI22pnkwFyv7wHeVgfUEX234CgMQXQyk1yM6lo7nP_PeS9L7lKnUHoLR36q58"/>
</div>
<div class="flex-1 p-6 md:p-8 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="text-slate-500 dark:text-slate-400 text-sm flex items-center gap-1">
<span class="material-symbols-outlined text-sm">location_on</span> Paris, France
                                </span>
</div>
<h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">Parisian Dream Week</h3>
<p class="text-slate-600 dark:text-slate-400 mb-6">Art, gastronomy, and the magic of the Seine. A perfect blend of culture and relaxation.</p>
<div class="flex flex-wrap gap-4 text-sm font-medium">
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">calendar_month</span> Nov 05 - Nov 12
                                </div>
<div class="flex items-center gap-1.5 text-primary"><span class="material-symbols-outlined">event_seat</span> Sisa 2 Kursi</div>
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">payments</span> From $1,850
                                </div>
</div>
</div>
<div class="mt-8 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 pt-6">
<div class="flex -space-x-3">
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA2vrxWid8kMLu1CTCUDzS6NNox9Lsv7FgLMoOzlkXKWMFZDhMLXKYkLda-Yu7Z6UM4aP6s4Q8F5B4srAKd2VtPj5glJcMS2cYTG5Hz724_fMC80XtHOlP8eS3PoXcbzCRH8TM4p4b9IGJtT1f7T0iVP7jLUgW_y8eSBTNcywqGpFCSgDsGjuYwjSzCjBiZ-ucDpU6jP9o0A1wSUfGc14_616onbbwzCypoTfeoI3wBKr5hsnNGQfttgGR1jsZ096DAyBDne1t8160t"/>
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjAXpN_E5_YwbcuMNY9-7RHkq_5FDO_aIAco1w7x76OrGTL5nvBK1UDiaB1z5Y8CMZAWabVihQhiLj4ccJf9rWDskhh02uUT-q-9DBEQdT9yfv5x4Oyp_R97G1uTdznmC-_fXi9YfuUbv6J3-wnzs2-iqJhHOBlC1m7qD3tnsREfxn3jZ0zItOVdV2MyJUOlqFVKPAjbFewuFzltw550ia2R1GxA5GBtbwr9YRkb7ZUd2JehgUQyEI8rSXKBKebQkid-acyYqE8DMb"/>
<div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-700 text-[10px] font-bold ring-2 ring-white dark:ring-slate-800">+14</div>
</div>
<button class="bg-primary text-white px-8 py-3 rounded-xl font-bold flex items-center gap-2 hover:bg-primary/90 transition-colors shadow-lg shadow-primary/20">Lihat detail <span class="material-symbols-outlined">arrow_forward</span></button>
</div>
</div>
</div>
<!-- Trip Card 3 -->
<div class="flex flex-col md:flex-row items-stretch bg-white dark:bg-slate-800 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-lg hover:shadow-xl transition-shadow group">
<div class="w-full md:w-1/3 aspect-video md:aspect-auto overflow-hidden">
<img alt="Iceland Aurora" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" data-alt="Aurora borealis green lights over snowy mountains" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC0lFElrNS2FA3ga7QzJ39rUwz9E7cpgFt6BDk_Wod5jPLP0lPx95cjEf0swB9dAKwSpozpbChNjuoHReWfZEJlO4gW1lacb8dc2aiHKf12Ny8lCHK8bq26fEPmo8Pue_gQzSp7eG1uop0BlTYS3Cvl4GZ9nA0WlrspykeawGk8h3-uFbV_ZtmrYqcqgGhg1pJ0fJWnlgLr3x_9HJsxM4uDcAF4jHiZ1zyd4nHjIWw1QpcgLW8eANORJkynwSkVjWYGeBYxeBhQfbT7"/>
</div>
<div class="flex-1 p-6 md:p-8 flex flex-col justify-between">
<div>
<div class="flex items-center gap-2 mb-2">
<span class="text-slate-500 dark:text-slate-400 text-sm flex items-center gap-1">
<span class="material-symbols-outlined text-sm">location_on</span> Reykjavik, Iceland
                                </span>
</div>
<h3 class="text-2xl font-bold mb-2 group-hover:text-primary transition-colors">Northern Lights Expedition</h3>
<p class="text-slate-600 dark:text-slate-400 mb-6">Chasing the Aurora across volcanic landscapes, glaciers, and geothermal springs.</p>
<div class="flex flex-wrap gap-4 text-sm font-medium">
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">calendar_month</span> Dec 10 - Dec 17
                                </div>
<div class="flex items-center gap-1.5 text-primary"><span class="material-symbols-outlined">event_seat</span> Penuh</div>
<div class="flex items-center gap-1.5 text-slate-700 dark:text-slate-300">
<span class="material-symbols-outlined text-primary">payments</span> From $2,100
                                </div>
</div>
</div>
<div class="mt-8 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 pt-6">
<div class="flex -space-x-3">
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA9nLqC7gcNXWtKyg8Qp0hUSmO426yY-FTUQmb36U94OwEr52YOXTY8w07i-4Zq8dN47mnv6Mynrh0hodj-MLJQSHTDdCZdl2VI3l5JDQhUzQQTCH6I2eJD5gqt6jGUinMT9rZMO2mHDIoRmYlOKThU3yWAA0L18Txo0-WNoflomOdn7LS7Mv-m1TOR0fb5rIQm5x-BIt7cQ5G_Bf7FVFPkY-SgeHjuHSMSghcz5cWV_HehqpYuLMmJiDG7y5dMNptutokJ6MBDEgGa"/>
<img alt="Avatar" class="h-8 w-8 rounded-full ring-2 ring-white dark:ring-slate-800" data-alt="User avatar thumbnail" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAy4dlqANUC2ldSmev2nvuG5LCWKCHjthay7S1ZJ5yEOESaBolGyswWxtVKPO-tuGib8LmYb0w7-a7fsqG0i0F7MmAkbIS25DwvoEe6k-lQM5T0TP18bdOv5HAJ-A5EAOLdgROAOfFBR51CWxt7Sjp7T8qfKh1I4jvfItyeCGKkG9v9MA9jJI2miBSFvQyFz8rSmxHA0PfwjLGU4T6-GXev7MvtcY9WNETstSwL8ab_vu9PLtFlhJguLUbejdw7ZVyyU-U16gKjjTUx"/>
<div class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100 dark:bg-slate-700 text-[10px] font-bold ring-2 ring-white dark:ring-slate-800">+3</div>
</div>
<button class="bg-slate-200 dark:bg-slate-700 text-slate-500 dark:text-slate-400 px-8 py-3 rounded-xl font-bold flex items-center gap-2 cursor-not-allowed" disabled="">
  Penuh <span class="material-symbols-outlined">block</span>
</button>
</div>
</div>
</div>
</div>
</section>
</main>
<!-- Navy Blue Footer -->
<footer class="bg-[#0f172a] text-slate-300 py-16 px-4 md:px-10">
<div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-2 text-primary mb-6">
<span class="material-symbols-outlined text-3xl font-bold">travel</span>
<h2 class="text-white text-2xl font-bold tracking-tight">Justtrip</h2>
</div>
<p class="text-sm leading-relaxed mb-6">Redefining group travel for the modern explorer. Find your tribe, discover the world.</p>
<div class="flex gap-4">
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">public</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">share</span>
</a>
<a class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-primary transition-colors" href="#">
<span class="material-symbols-outlined text-xl">alternate_email</span>
</a>
</div>
</div>
<div>
<h4 class="text-white font-bold mb-6">Tautan Langsung</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Tentang Kami</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Open Trips</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Cerita Kami</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Panduan Perjalanan</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Bantuan</h4>
<ul class="space-y-4 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Pusat Bantuan</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Syarat &amp; Ketentuan</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Kebijakan Privasi</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Informasi Keselamatan</a></li>
</ul>
</div>
<div>
<h4 class="text-white font-bold mb-6">Newsletter</h4>
<p class="text-sm mb-4">Dapatkan update perjalanan terbaru langsung di kotak masuk Anda.</p>
<form class="flex flex-col gap-2">
<input class="bg-slate-800 border-none rounded-lg px-4 py-3 text-sm focus:ring-2 focus:ring-primary w-full" placeholder="Alamat email Anda" type="email"/>
<button class="bg-primary text-white py-3 rounded-lg font-bold hover:bg-primary/90 transition-colors">Berlangganan</button>
</form>
</div>
</div>
<div class="max-w-7xl mx-auto border-t border-slate-800 mt-16 pt-8 text-xs text-center">
            © 2024 Justtrip Inc. All rights reserved.
        </div>
</footer>

    </FrontendLayout>
</template>
