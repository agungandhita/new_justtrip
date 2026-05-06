<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
<div class="layout-container flex h-full grow flex-col">
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)]">
<div class="flex justify-between items-center w-full px-8 py-3">
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<div>
<button class="bg-blue-800 text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-900 transition-all active:scale-95 duration-200">
                Daftar
            </button>
</div>
</div>
</nav>
<main class="flex-1 max-w-5xl mx-auto w-full px-4 md:px-0 py-6 mt-20">
<section class="@container mb-8">
<div class="relative group">
<div class="aspect-[16/9] w-full overflow-hidden rounded-xl bg-slate-200 dark:bg-slate-800 shadow-lg">
<div class="w-full h-full bg-cover bg-center transition-transform duration-700 hover:scale-105" data-alt="Stunning infinity pool overlooking Bali jungle landscape" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCI3q5GoGHIyDbNClpimQukkHpKCSfbf8NVBkMbRKGoaDv76RUEu2azYCDGWZHYg346m9UzTl5wenVjC-hSW44ieaqWgjfb7AniZ7_VH7RUO9TkiINVegfq8EMGZEf4jUrNQJpGoYop7WRiV4AMDb9wpJ96Xl55KJ1XZiLrqp-h0UasusDKWYvvL-5CgIEP_TWDS5Qla7DrLep0UWStMAnw7jL2uCIt_osHjsligawzZUY3QgPeQH0EjziXjBRfipNFuSuyNVn-2Erc');">
</div>
</div>
<div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-2 bg-black/20 backdrop-blur-md p-2 rounded-full">
<div class="size-2 rounded-full bg-white"></div>
<div class="size-2 rounded-full bg-white/40"></div>
<div class="size-2 rounded-full bg-white/40"></div>
<div class="size-2 rounded-full bg-white/40"></div>
</div>
<button class="absolute top-1/2 left-4 -translate-y-1/2 size-10 rounded-full bg-white/90 dark:bg-slate-900/90 shadow-md flex items-center justify-center text-slate-800 dark:text-white hover:bg-white">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="absolute top-1/2 right-4 -translate-y-1/2 size-10 rounded-full bg-white/90 dark:bg-slate-900/90 shadow-md flex items-center justify-center text-slate-800 dark:text-white hover:bg-white">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</section>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
<div class="lg:col-span-2 space-y-8">
<div class="flex items-center gap-5 p-2">
<div class="size-16 rounded-full bg-cover bg-center border-2 border-primary shadow-sm" data-alt="Professional photographer portrait with camera gear" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCdcfGaw560sN2EFStD7kba8kUTnQzK0VJmEP9pE9BJiMyULOZLNXZGXo2Yj2JH8kCRSm3dhXWsVgShrdQO3mQLxQtOCiH2dWIMo06_3grx5d1_BeTEAD77goHC7ujst7D_HdNgdvez0ndAJ3Zq0nEoVxYd4c4hRN9RNTAtiYiaGTagOJQn8OcWY2NOZpwLw8jLQlARyp6WTInMBdvK_q-pRLP77O8wOkfpX_5a-ALz9uYKmRKiMyjQo371hXusrleHzr6v779iH8s-');"></div>
<div>
<h3 class="text-xl font-bold text-slate-900 dark:text-white">Elena Rodriguez</h3>
<p class="text-slate-500 dark:text-slate-400 font-medium">Travel Content Creator &amp; Storyteller</p>
</div>
</div>
<div class="prose prose-slate dark:prose-invert max-w-none">
<h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-4">Island Whispers: A Week in Paradise</h2>
<p class="text-slate-600 dark:text-slate-300 leading-relaxed text-lg">
                                This journey through Bali was more than just a vacation; it was an immersion into the vibrant soul of Indonesia. From the misty sunrise over Mt. Batur to the emerald cascades of Tegenungan, every moment felt like a frame from a dream. We explored hidden temples where incense hung heavy in the humid air and surfed the azure breaks of Uluwatu.
                            </p>
<p class="text-slate-600 dark:text-slate-300 leading-relaxed mt-4">
                                Our group of four shared laughter over spicy Nasi Campur and quiet reflections during evening yoga sessions. The local hospitality in Ubud left us humbled, while the modern luxury of our private villa provided the perfect sanctuary after long days of exploration. Bali isn't just a destination; it's a feeling of pure tranquility.
                            </p>
</div>
<div class="space-y-4">
<h4 class="text-sm font-bold uppercase tracking-wider text-slate-400">Share this adventure</h4>
<div class="flex gap-3">
<button class="flex flex-col items-center gap-2 group">
<div class="size-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 group-hover:bg-primary/10 group-hover:text-primary transition-all">
<span class="material-symbols-outlined">social_leaderboard</span>
</div>
<span class="text-xs font-medium">Facebook</span>
</button>
<button class="flex flex-col items-center gap-2 group">
<div class="size-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 group-hover:bg-primary/10 group-hover:text-primary transition-all">
<span class="material-symbols-outlined">photo_camera</span>
</div>
<span class="text-xs font-medium">Instagram</span>
</button>
<button class="flex flex-col items-center gap-2 group">
<div class="size-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 group-hover:bg-primary/10 group-hover:text-primary transition-all">
<span class="material-symbols-outlined">send</span>
</div>
<span class="text-xs font-medium">Twitter</span>
</button>
<button class="flex flex-col items-center gap-2 group">
<div class="size-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-slate-600 dark:text-slate-300 group-hover:bg-primary/10 group-hover:text-primary transition-all">
<span class="material-symbols-outlined">chat</span>
</div>
<span class="text-xs font-medium">WhatsApp</span>
</button>
</div>
</div>
</div>
<div class="space-y-6">
<div class="bg-white dark:bg-slate-900 rounded-2xl p-6 shadow-sm border border-slate-100 dark:border-slate-800">
<h3 class="text-lg font-bold mb-4 text-slate-900 dark:text-white">Trip Details</h3>
<div class="space-y-4">
<div class="flex items-center justify-between py-2 border-b border-slate-50 dark:border-slate-800">
<div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
<span class="material-symbols-outlined text-sm">location_on</span>
<span class="text-sm font-medium">Destination</span>
</div>
<p class="text-slate-900 dark:text-white text-sm font-bold" data-location="Bali, Indonesia">Bali, Indonesia</p>
</div>
<div class="flex items-center justify-between py-2 border-b border-slate-50 dark:border-slate-800">
<div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
<span class="material-symbols-outlined text-sm">group</span>
<span class="text-sm font-medium">Group Size</span>
</div>
<p class="text-slate-900 dark:text-white text-sm font-bold">4 People</p>
</div>
<div class="flex items-center justify-between py-2 border-b border-slate-50 dark:border-slate-800">
<div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
<span class="material-symbols-outlined text-sm">beach_access</span>
<span class="text-sm font-medium">Trip Type</span>
</div>
<p class="text-slate-900 dark:text-white text-sm font-bold">Private Trip</p>
</div>
<div class="flex items-center justify-between py-2">
<div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
<span class="material-symbols-outlined text-sm">payments</span>
<span class="text-sm font-medium">Total Cost</span>
</div>
<p class="text-primary text-base font-extrabold tracking-tight">IDR 5.000.000</p>
</div>
</div>
<button class="w-full mt-6 bg-primary hover:bg-orange-600 text-white font-bold py-4 rounded-xl shadow-lg shadow-primary/20 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-2">
<span class="material-symbols-outlined">calendar_month</span>
                                Book This Trip Now
                            </button>
<p class="text-center text-[10px] text-slate-400 mt-4 uppercase tracking-widest font-bold">Limited slots available for June</p>
</div>
<div class="rounded-2xl overflow-hidden shadow-sm h-48 relative border border-slate-100 dark:border-slate-800">
<div class="absolute inset-0 bg-cover bg-center grayscale opacity-60" data-alt="Monochrome map texture of Bali coastline" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDWcudeux5OlZzPkdt3svw4stEogk6uyDM661OhYbxzHFDm8KKBBmr9bxtXf91QmsvPfUHRnPujHJEnWF8LILPFYiVPB09wwNvqwwQEqrg0siYCkhAnNI82pZCjvXhg5eIiNBRK1ilomQMGY_o4Orq-9TP_twe2BdG3sL5HbzESq5p2PfuVZxsXknbZZUpkY8tjyeRik-_h5hkD3wQgZOzl5qks2WG_MNcVNIuN3e6PngLClLiJ-4fgPsM9PRyFexpnJn_iJguF4Y2E');"></div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<div class="absolute bottom-4 left-4 flex items-center gap-2 text-white">
<span class="material-symbols-outlined text-primary">map</span>
<span class="font-bold text-sm">View Trip Route</span>
</div>
</div>
</div>
</div>
<section class="mt-16">
<h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">More from this Gallery</h3>
<div class="grid grid-cols-2 md:grid-cols-4 gap-4">
<div class="aspect-square rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center hover:scale-110 transition-transform duration-500" data-alt="Lush green rice terraces in Ubud" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBaXJBrTs6-Sf_Ee1ZXcHl0RTS9Z_cW20uGIUQzrnzKjSIUvBE9BTCHep62z64a14ovjO_kbsXf25xT-oT9FR0x_9-BKuVFTytoejWQv1JbzQGYamKeZwj9NsvTnCI6xrx0p2cX4riGshrpX8gwsJc77fNLaW6Qt4QEZXdEq11_W_I77uOQrMTE8lXR5Uhq_63y5YFYx9ukmgxYw35Mjd_WjCc2Io3oe_21wedaWO5TA-C3m7YiEwWGv3NT2a2XTrAUGLQ1ifk_qOcH');"></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center hover:scale-110 transition-transform duration-500" data-alt="Traditional Balinese temple architecture" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCgKw5YWRYCADVfLwslkb7ofqxbO6xY-k88XhGTU56u7wKG8UTV1Ho_i7Kd3jArofu5fiC36Y2DiKXzaBVXV4lwSXZzp5iKxApKGoi79H0m6uxCsz0kZtxiDWfQQxdpMOtSKiYfNMHVR0J4pTRNf8zLNDH6GRqPuxpUFQTPekGFIlkrXvbbsAoDeC-w81mhGVCQKvbCn9mZp4NVQ2IhsEixIXZ9-kNX5b1f3chZOlvOsARxRpdR8kWVupP7E2_3cfGwP4QE3qhilNgV');"></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden">
<div class="w-full h-full bg-cover bg-center hover:scale-110 transition-transform duration-500" data-alt="Tropical beach with turquoise water" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuDuflfm037velHAhA4lDzYOABLVErDA2CJKaK7LdRlsxJYulQcr6cfARsUbMdV3YuJaHp1xJakRe7fTteBZSXjTrdeiLJhYz5FukWyQopYhWccEBkzCnfLX3o4MH80oKJX5dpitYAWTPPeDNO3uM71qmcZdLmpsj9-FQlkLp7YtpFXMfD0LNtAUJ7Jew4t15Qy395lFPLKqv3j0UWn-w1NN5i9YMLEuDXKuKvBHgGoH3GDzIROpM07ZDdQ_eQE65foTpUzSDpr3La-V');"></div>
</div>
<div class="aspect-square rounded-xl overflow-hidden relative">
<div class="w-full h-full bg-cover bg-center" data-alt="Sunset silhouette of a Balinese dancer" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBcTUtgZpZvVBB-yZ_X9s4g2zZLaoN7pcWKWS589gs6LU4vJ1Gr-O09adEMdHNNeEd8IY9YGeIer32lR-JPnWhDBz3YOryzxwmKw-sjBjKe4yGMfo3OO5pl4Ffl395-SGoYhEvzrB3MUMSU4k-nSWhphnhowtkBYI9-lx9ZK4b9Im9Mv7nROheZ2RtGzxs2FzhpntKt3clvEqgbcvVh_exeSVutVfypSgdjAFnCFrhIggOfERl8NhL6_2WNb_hmeAvGAbpC62OLQMoO');"></div>
<div class="absolute inset-0 bg-black/40 flex items-center justify-center cursor-pointer">
<span class="text-white font-bold text-lg">+12 more</span>
</div>
</div>
</div>
</section>
</main>
<footer class="mt-20 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 py-12 px-6 md:px-20">
<div class="max-w-5xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary text-2xl">explore</span>
<h2 class="text-slate-900 dark:text-white text-lg font-bold tracking-tight">Justtrip</h2>
</div>
<div class="flex gap-8 text-sm font-medium text-slate-500 dark:text-slate-400">
<a class="hover:text-primary transition-colors" href="#">Destinations</a>
<a class="hover:text-primary transition-colors" href="#">Our Stories</a>
<a class="hover:text-primary transition-colors" href="#">About Us</a>
<a class="hover:text-primary transition-colors" href="#">Contact</a>
</div>
<p class="text-xs text-slate-400">© 2024 Justtrip. All rights reserved.</p>
</div>
</footer>
</div>
</div>

    </FrontendLayout>
</template>
