<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<nav class="fixed top-6 left-0 right-0 z-50 px-4">
<div class="max-w-7xl mx-auto glassmorphism rounded-full px-6 py-3 flex items-center justify-between shadow-lg">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="font-extrabold text-xl tracking-tight text-primary">Justtrip</span>
</div>
<!-- Nav Links -->
<div class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-700">
<a class="hover:text-primary transition-colors" href="#">Beranda</a>
<a class="text-primary relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Destinasi</a>
<a class="hover:text-primary transition-colors" href="#">Open Trip</a>
<a class="hover:text-primary transition-colors" href="#">Promo</a>
<a class="hover:text-primary transition-colors" href="#">Tentang Kami</a>
</div>
<!-- CTA -->
<div>
<button class="bg-primary text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-800 transition-all">
          Daftar
        </button>
</div>
</div>
</nav>
<main class="pt-24 pb-20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="relative w-full h-[400px] rounded-xl overflow-hidden mb-12">
<div class="absolute inset-0 bg-cover bg-center" data-alt="Bright tropical beach with white sand and clear blue water" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD48hbgFlQXevaBD6kTm9Ss3WGifZROveO7yL1ZgFSItJj2mW4kJaodhvdXJEXhqYCvpKl5aYFHWPX_yTlC4z4j28o0cT_qThg0tmgCHnr1nzPGT3uMbOYtm6BtknAXaJW-5xmw0XnS91AwgeQ238V__ZpxINJimhl_YJjWyC_b6ILeQGgqLqA0bQd3Q1ovZk-CmYXewan6su8E5Jxg6lJPvPBasdrTJttKkwG4iewXQFqgJewDkqC7jHJ62okXA9IdogR0AeFq6p-i');">
<div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>
</div>
<div class="absolute bottom-0 left-0 p-8 md:p-12">
<h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Discover Paradise</h1>
<p class="text-white/90 text-lg max-w-xl">From pristine beaches to mountain peaks, find your next unforgettable journey with Justtrip.</p>
</div>
</div>
<section class="mb-12">
<div class="flex flex-col md:flex-row gap-4 items-center justify-between bg-white dark:bg-slate-800/50 p-4 rounded-xl shadow-sm border border-slate-200 dark:border-slate-700">
<div class="flex flex-1 w-full gap-4">
<div class="relative flex-1">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-slate-100 dark:bg-slate-900 border-none rounded-lg focus:ring-2 focus:ring-primary text-slate-900 dark:text-white" placeholder="Where do you want to go?" type="text"/>
</div>
</div>
<div class="flex gap-3 overflow-x-auto w-full md:w-auto no-scrollbar">
<button class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg font-medium whitespace-nowrap">
<span class="material-symbols-outlined text-sm">filter_list</span> All Categories
                        </button>
<button class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300 rounded-lg font-medium whitespace-nowrap hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-sm">beach_access</span> Beach
                        </button>
<button class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300 rounded-lg font-medium whitespace-nowrap hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-sm">terrain</span> Mountain
                        </button>
<button class="flex items-center gap-2 px-4 py-2 bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300 rounded-lg font-medium whitespace-nowrap hover:bg-primary/10 transition-colors">
<span class="material-symbols-outlined text-sm">apartment</span> City
                        </button>
</div>
</div>
</section>
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Lush green infinity pool overlooking Bali jungle" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCa6IE2DiKroS_nsS54iW5ZB8Ml6qgvhBSfQjzn2wfDPM6ogbT2b61EGXQFZU4y04_5Wc5omOfkNqdkuZs8EO0BQ9EgomnA4F521AZEmxQglzI64vckikbGVysUcDxYQpkgZm8KmpRjVN--Gr8aitvBtQPFDANinU2-4EPabKcgQ-c5ZQYGH6HwD-lvz0YBu_C44NAc3wsSSHqOweC9CZoP8rJFEmtJYLAcJ66DeV0woJqymcuG4Mxvehv0KeyKv9RID9hzZNaFxk-c"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            4.9 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Ubud, Bali</h3>
<span class="text-primary font-bold">$120<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">Immerse yourself in the heart of Balinese culture, lush rice terraces, and serene wellness retreats.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Ancient Borobudur temple during sunrise in Yogyakarta" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDdqgUyuumdxeBeyUYwuqmbprnr-xwJOmft8G2NAHxgVevsiMtJEZK0J3lpVGF8K1tH1Qkwq0RhBZd30O58QYDt5Tf0eGHbRjPHKvM0r2xqHXhR2M0Y6EDZgy5GOy_dqBOpmAghZN2jQFRfwAaXHUZmDGCjBzRqkceHWBhwtQX1G_5SOvtz1R9BommSknSwS3W3n5bCbsBAyLwMan4sfJBm4QXDMArNT2IYvzacAACq22MMv7MYBpt5z_OVK7Z1kTk7wsLOMoyFAe7d"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            4.8 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Jogja, Java</h3>
<span class="text-primary font-bold">$85<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">Explore the historical soul of Indonesia with ancient temples and vibrant street art.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Crystal clear turquoise water and islands in Labuan Bajo" src="https://lh3.googleusercontent.com/aida-public/AB6AXuChFE7m8ROzSfbRxZ0W1GU_HLzpTkgZ569JQtnpQyvPwAC9i3V5fyoCCliV741CzdtKiml2Q8sl04ipZe055SLhaZ04iGZ_RS8pSCjNXL9DbB_b3L4eRZLHXQm6OrKQalmOtxEXhgv6UM4MX6JujpuTT8MZUON305KETXk6tdEjnN3Uq8nWZnQj9lxrQ493bqs9oRqVQ23M88QYCYg6qJPBHNo8KaqhsdDjBlytGeDslLZivMHvl9AUZr0nR83XAzolhVk3CU2CqmzO"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            5.0 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Labuan Bajo</h3>
<span class="text-primary font-bold">$210<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">Gateway to Komodo National Park. Experience breathtaking sunsets and world-class diving.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Mount Bromo volcano crater with sunrise clouds" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4XBJYlrVFRPKmFFb6e-TF5ChzDfsEpEnP1H2jq8mM-rXzbdOsAWpPLj4ZagGtAmD5D2L28gWjrNVpj9hYXq5WVp51ee73yL4pzN_WldvmWEGBdBZIXZv3xaMZx1X9mhyFtIgRlsyyzu9i59HJ6r2X6cjFmOl0oHD9Sh30O1lM6a1XEpIzJHGVc0rpAosMiDVco0FeKWhZ23Ye2HB3REXcPl_5FiPCOrgTcmfUCLDwFv0ulbzMmJHcxlUhvOXwN0u9qhaFNBVc62Tg"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            4.7 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Bromo, East Java</h3>
<span class="text-primary font-bold">$65<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">Witness the majestic volcanic landscape and iconic sunrise over the caldera.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Traditional phinisi boat sailing in Raja Ampat" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBi7yhmKtzras8kyYD8WcLhwBTPlgD9u6_J9cRWgwO7acYeupCojdCphoc10CDC5xRmWhEIUHJtPxlS0XjXHIX71IQgkg8RFEvmnmngWT12uOAhq4LRqfQtojW1UioNoht5_SIvLnWJlrFM5bqyt7qIgyviWOQilbhwhrfagA0-3KYgXni6ZI8bUjEHdtOsFfw9-zTek3KRyrwJ2N1GjoyMfMLXCwtoxUGHXBXkGNtLKXvR77bJrPpqItmoNasCooqQGR7RLs1GIPOP"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            5.0 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Raja Ampat</h3>
<span class="text-primary font-bold">$350<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">The ultimate paradise for divers and nature lovers in the far east of Indonesia.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
<div class="bg-white dark:bg-slate-800 rounded-xl overflow-hidden shadow-sm border border-slate-200 dark:border-slate-700 flex flex-col group">
<div class="relative h-64 overflow-hidden">
<img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" data-alt="Modern skyline of Jakarta at night" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCsuKtLwj-ejWbv5SfbkZ-ICSWmh1y7SlPaWYKUAcMs173pLP7_xNZELhWrl0DWtrvTQ8HpsC0BYEKaWUVYCmhS6YJKgz2p9Dk_Va_ZTOjiw85098TLF7lm7nI5zn-NsIvwURFilvTa97o9IgPzbhWDxwime_KNQcCuzS_JddFflm3fSIBXE0jJtbzYaLnlKHc8EP9y8Coql3xQUn2utKZcmt7Qdur9_AJtdwQpPs9V7g5iXC58u-DgQ6SYbLCUFEpJSzPa3VxPyhjH"/>
<div class="absolute top-4 right-4 bg-white/90 dark:bg-slate-900/90 px-3 py-1 rounded-full text-xs font-bold text-primary">
                            4.5 ★
                        </div>
</div>
<div class="p-6 flex flex-col flex-1">
<div class="flex justify-between items-start mb-2">
<h3 class="text-xl font-bold">Jakarta City</h3>
<span class="text-primary font-bold">$110<span class="text-slate-400 font-normal text-sm">/night</span></span>
</div>
<p class="text-slate-500 dark:text-slate-400 text-sm mb-6 line-clamp-2">The bustling capital offering world-class dining, luxury shopping, and rich history.</p>
<div class="mt-auto flex gap-3">
<button class="flex-1 bg-primary text-white py-2.5 rounded-lg font-semibold hover:bg-primary/90 transition-colors">Detail</button>
<button class="px-3 py-2.5 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-primary transition-colors">
<span class="material-symbols-outlined">favorite</span>
</button>
</div>
</div>
</div>
</section>
<div class="mt-12 flex justify-center">
<button class="px-8 py-3 border-2 border-primary text-primary font-bold rounded-xl hover:bg-primary hover:text-white transition-all duration-300">
                    Load More Destinations
                </button>
</div>
</div>
</main>
<footer class="bg-[#1e0f24] text-white pt-16 pb-8">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
<div class="col-span-1 md:col-span-1">
<div class="flex items-center gap-2 text-primary mb-6">
<span class="material-symbols-outlined font-bold">flight_takeoff</span>
<h2 class="text-white text-xl font-bold leading-tight tracking-tight">Justtrip</h2>
</div>
<p class="text-slate-400 text-sm leading-relaxed">Making your dream travel possible with the best deals and curated destinations across Indonesia and beyond.</p>
</div>
<div>
<h4 class="text-lg font-bold mb-6">Quick Links</h4>
<ul class="space-y-4 text-slate-400 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Destinations</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Travel Guides</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Contact</a></li>
</ul>
</div>
<div>
<h4 class="text-lg font-bold mb-6">Support</h4>
<ul class="space-y-4 text-slate-400 text-sm">
<li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Cancellation Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Privacy Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Terms of Service</a></li>
</ul>
</div>
<div>
<h4 class="text-lg font-bold mb-6">Newsletter</h4>
<p class="text-slate-400 text-sm mb-4">Get travel tips and exclusive deals straight to your inbox.</p>
<div class="flex gap-2">
<input class="flex-1 bg-slate-800/50 border-none rounded-lg focus:ring-1 focus:ring-primary text-sm" placeholder="Your email" type="email"/>
<button class="bg-primary text-white p-2 rounded-lg">
<span class="material-symbols-outlined">send</span>
</button>
</div>
</div>
</div>
<div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
<p class="text-slate-500 text-xs">© 2024 Justtrip Travel Services. All rights reserved.</p>
<div class="flex gap-6">
<a class="text-slate-500 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">language</span></a>
<a class="text-slate-500 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">share</span></a>
<a class="text-slate-500 hover:text-primary transition-colors" href="#"><span class="material-symbols-outlined text-xl">help</span></a>
</div>
</div>
</div>
</footer>

    </FrontendLayout>
</template>
