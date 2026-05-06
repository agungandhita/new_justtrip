<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        <nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)] flex justify-between items-center px-8 py-3 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<div class="flex items-center gap-2">
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Solaris Travel</span>
</div>
<div class="hidden md:flex items-center gap-8">
<a class="text-blue-800 dark:text-blue-400 relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-orange-500 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-full transition-all px-2 py-1" href="#">Home</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-full transition-all px-2 py-1" href="#">Destinations</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-full transition-all px-2 py-1" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-full transition-all px-2 py-1" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 hover:bg-white/50 dark:hover:bg-slate-800/50 rounded-full transition-all px-2 py-1" href="#">Tentang Kami</a>
</div>
<div>
<button class="bg-blue-800 dark:bg-blue-600 text-white px-6 py-2 rounded-full hover:opacity-90 active:scale-95 transition-all duration-200">Daftar</button>
</div>
</nav>
<div class="flex w-full max-w-[1200px] h-full min-h-[700px] bg-white dark:bg-slate-900 rounded-xl overflow-hidden shadow-2xl shadow-primary/10">
<!-- Left Side: Login Form -->
<div class="w-full lg:w-1/2 flex flex-col p-8 md:p-16 justify-center">
<!-- Logo & Header -->
<div class="mb-10 flex flex-col gap-2">
<div class="flex items-center gap-2 text-primary mb-4">
<span class="material-symbols-outlined text-4xl">travel_explore</span>
<h2 class="text-2xl font-bold tracking-tight">Solaris Travel</h2>
</div>
<h1 class="text-4xl font-black tracking-tight text-slate-900 dark:text-slate-100">Selamat Datang</h1>
<p class="text-slate-500 dark:text-slate-400">Silakan masuk ke akun Anda untuk melanjutkan perjalanan.</p>
</div>
<!-- Form -->
<form action="index.html" class="flex flex-col gap-6">
<!-- Email Field -->
<div class="flex flex-col gap-2">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Email</label>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">mail</span>
<input class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none" placeholder="nama@email.com" required="" type="email"/>
</div>
</div>
<!-- Password Field -->
<div class="flex flex-col gap-2">
<div class="flex justify-between items-center">
<label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Password</label>
<a class="text-xs font-medium text-primary hover:underline" href="#">Lupa Password?</a>
</div>
<div class="relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl">lock</span>
<input class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all outline-none" placeholder="Masukkan password Anda" required="" type="password"/>
<button class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-200" type="button">
<span class="material-symbols-outlined text-xl">visibility</span>
</button>
</div>
</div>
<!-- Remember Me -->
<div class="flex items-center gap-3">
<input class="w-5 h-5 rounded border-slate-300 text-primary focus:ring-primary cursor-pointer" id="remember" type="checkbox"/>
<label class="text-sm font-medium text-slate-600 dark:text-slate-400 cursor-pointer" for="remember">Ingat saya</label>
</div>
<!-- Submit Button -->
<button class="w-full py-4 bg-primary text-white rounded-xl font-bold text-lg hover:opacity-90 transition-opacity shadow-lg shadow-primary/20 active:scale-[0.98]" type="submit">
                    Masuk
                </button>
<!-- Social Login Divider -->
<div class="relative my-4">
<div class="absolute inset-0 flex items-center">
<div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
</div>
<div class="relative flex justify-center text-xs uppercase">
<span class="bg-white dark:bg-slate-900 px-2 text-slate-500">Atau masuk dengan</span>
</div>
</div>
<!-- Social Buttons -->
<div class="grid grid-cols-2 gap-4">
<button class="flex items-center justify-center gap-2 py-3 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" type="button">
<img alt="Google Logo" class="w-5 h-5" data-alt="Official Google color logo icon" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4j6Ws4TtjFj39kPzJR8BZvHqGfeuv69CYZL9_Hff8NS5nAlKfY98HVzZhKIfZtTulsU-JkgOvLyXQyEN4hKKjZ3rN_Hh9gUTBXCwi6822ML3NkSOUXo-I6grpQSDUajskbg4y4AX31ejY2yCclHOux25rfTRDqwUdnVjZod__attL_Eq_UfjWCSV9kZxMWXtp1ndlI8DZkD2s24cbAaVfjgNwni3kkwk8qwf1ik4IrrreTda6AjPiyuFHs3zc9Yczo0uBtahEjONu"/>
<span class="text-sm font-semibold">Google</span>
</button>
<button class="flex items-center justify-center gap-2 py-3 rounded-xl border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors" type="button">
<img alt="Facebook Logo" class="w-5 h-5" data-alt="Official Facebook color logo icon" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD2jvbdwP0N7YrD-uc1EtbQk6MsafUXnXC-UE_2ZDk4egHelBwDA5YxYEceDzBDb14pJGctrv42H1_Q3SARaOOfI8qYxIwp9wT9XlYVqTJKF10DcuBxsE0f6BM_G8wKWwiRfkkhUuDMo1tzmy7nSw_Q8IhAoFIp1chT1Zo-ptZtq4gmKMqbyLtByAQkYGow7j-82Pb0vAocG3mgXT5DuX7x6fgPM1ddREckyJm7rWpQbnZSRF0SYwBSjepaH5e7YPI4RtSPCEJignAa"/>
<span class="text-sm font-semibold">Facebook</span>
</button>
</div>
</form>
<!-- Footer Link -->
<p class="mt-10 text-center text-slate-600 dark:text-slate-400">
                Belum punya akun? 
                <a class="text-primary font-bold hover:underline" href="register.html">Daftar sekarang</a>
</p>
</div>
<!-- Right Side: Visual Content -->
<div class="hidden lg:block w-1/2 relative bg-primary">
<div class="absolute inset-0 bg-cover bg-center mix-blend-multiply opacity-80" data-alt="Beautiful tropical beach with white sand and palm trees" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD3G2PzKJFwloSB7JYZRgNffU3u-yK9rAmbupRz-dKXEeGMxuzbtZDRL6uv5psYQg5dMbo5e54nf59sAuRv7mcW_tUMFujJLt_nGhkgjnjQhwJm7WiV--JRw8vbfHIYPyewtKgZuLz6DY412a0uwWesbfmcQ7ncDXORTCpW9QoBGX92344GEAzHp2L3LG2MFBv818NuCdgZjxAAs6oDVyFv_QhJmqQ-NumSo2QQ5qy5oGwV_avh-Y7qOY3pMyhv87IG40B9V8EeksnH')">
</div>
<div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
<!-- Floating Content on Image -->
<div class="absolute bottom-16 left-16 right-16 text-white">
<div class="flex gap-2 mb-4">
<span class="material-symbols-outlined text-yellow-400">star</span>
<span class="material-symbols-outlined text-yellow-400">star</span>
<span class="material-symbols-outlined text-yellow-400">star</span>
<span class="material-symbols-outlined text-yellow-400">star</span>
<span class="material-symbols-outlined text-yellow-400">star</span>
</div>
<blockquote class="text-2xl font-medium leading-tight mb-4 italic">
                    "Solaris Travel membuat perencanaan liburan keluarga kami menjadi sangat mudah dan menyenangkan. Pilihan destinasi tropisnya luar biasa!"
                </blockquote>
<div class="flex items-center gap-4">
<div class="w-12 h-12 rounded-full border-2 border-white/50 overflow-hidden">
<img alt="User Avatar" data-alt="Portrait of a smiling young woman traveler" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBjZv7jz3KOwiDNwbGDhoFNw-vgKJK9BxpseA-sMsUcf3bcSk7KI-ck4Rhe5vitmWf7Ggob-fsX330S9vrhSgGcjPNp7VPmXvcSNp6f41KUFR8UyV88B7EV6pdRZpHz9aONCyysNGWYZMn8hqMGkOtq0IUA_cKDIc-eJ-xpy4hysKEmyz3RFJv9OO6PvA4Ihcom-M01RpaMPacD4O4lB82FfGhsxWLIKGWplC8f7NGNp85DkHkFDfIckfmFgaZB4UqjmaHwCWcaeOO8"/>
</div>
<div>
<p class="font-bold">Anisa Rahmawati</p>
<p class="text-sm text-white/80">Solo Traveler, Jakarta</p>
</div>
</div>
</div>
<!-- Decorative Badges -->
<div class="absolute top-10 right-10 bg-white/20 backdrop-blur-md rounded-full px-6 py-3 flex items-center gap-2 border border-white/30">
<span class="material-symbols-outlined text-white">verified_user</span>
<span class="text-white font-medium text-sm">Terpercaya di 50+ Negara</span>
</div>
</div>
</div>

    </FrontendLayout>
</template>
