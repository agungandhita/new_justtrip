<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        <!-- BEGIN: Floating Navbar -->
<nav class="fixed top-4 left-1/2 -translate-x-1/2 w-[95%] max-w-7xl rounded-full z-50 border border-white/20 dark:border-slate-800/50 bg-white/70 dark:bg-slate-900/70 backdrop-blur-xl shadow-[0_8px_32px_0_rgba(30,64,175,0.1)]">
<div class="flex justify-between items-center w-full px-8 py-3">
<!-- Logo -->
<div class="flex items-center gap-2">
<div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
<span class="text-white font-bold text-xl">J</span>
</div>
<span class="text-2xl font-extrabold text-blue-800 dark:text-blue-400 tracking-tighter">Justtrip</span>
</div>
<!-- Navigation Links -->
<div class="hidden md:flex items-center gap-8 font-plus-jakarta-sans text-sm font-semibold tracking-tight">
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Beranda</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Destinasi</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Open Trip</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Promo</a>
<a class="text-slate-600 dark:text-slate-400 hover:text-blue-700 transition-colors" href="#">Tentang Kami</a>
</div>
<!-- Primary Action -->
<div>
<button class="bg-primary text-white px-8 py-2.5 rounded-full font-bold text-sm shadow-md hover:bg-blue-800 transition-all">
        Daftar
      </button>
</div>
</div>
</nav>
<!-- END: Floating Navbar -->
<!-- Split Screen Layout for Transactional Page -->
<main class="flex min-h-screen pt-24">
<!-- Left Panel: Travel Image (Hidden on small screens) -->
<div class="hidden lg:block lg:w-1/2 xl:w-7/12 relative bg-surface-variant overflow-hidden">
<img alt="Beautiful travel destination" class="absolute inset-0 w-full h-full object-cover" data-alt="bright sunny day in Santorini Greece with white buildings blue domes overlooking the clear blue aegean sea high quality travel photography" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAnHoLlLti5oh7EI7t0Q_fbot9SGk4QkIbVAP_WQeFmh8gyMQUZa8d4hWWJy_lMXXdA8V3z8qbfYBfH0mWNeqzNm3wbUTRXZD3FDQ-Fdmw06rodcm5JHkNR2-9vXZ1JxziDxu8ahuKXDJutE_Xaovlxqu_66k5V79RCufQQP86moZhrKkvnl0NLXudWsSyRgnGli8jlgO3he1N8fAKRlkuFYd99sqi_rrBV347zSm2XeJQJ_XeZugomxbn6RjEhU5uMSEqgAZJ9GrPt"/>
<!-- Optional subtle overlay to ensure image isn't too stark -->
<div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
</div>
<!-- Right Panel: Registration Form -->
<div class="w-full lg:w-1/2 xl:w-5/12 flex flex-col justify-center px-6 sm:px-12 md:px-24 bg-surface">
<div class="max-w-md w-full mx-auto py-12">
<!-- Brand Anchor -->
<!-- Page Intent Header -->
<div class="mb-8">
<h1 class="font-h2 text-h2 text-on-surface mb-2">Create an Account</h1>
<p class="font-body-md text-body-md text-on-surface-variant">Start your journey today. Fill in your details below to get started.</p>
</div>
<!-- Registration Form -->
<form action="#" class="space-y-5" method="POST">
<div>
<label class="block font-label-sm text-label-sm text-on-surface mb-2" for="fullName">Full Name</label>
<input class="appearance-none block w-full px-4 py-3 border border-outline-variant rounded-lg bg-surface-lowest text-on-surface font-body-md text-body-md placeholder-outline focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition duration-150 ease-in-out shadow-sm" id="fullName" name="fullName" placeholder="John Doe" required="" type="text"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface mb-2" for="email">Email Address</label>
<input class="appearance-none block w-full px-4 py-3 border border-outline-variant rounded-lg bg-surface-lowest text-on-surface font-body-md text-body-md placeholder-outline focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition duration-150 ease-in-out shadow-sm" id="email" name="email" placeholder="you@example.com" required="" type="email"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface mb-2" for="password">Password</label>
<input class="appearance-none block w-full px-4 py-3 border border-outline-variant rounded-lg bg-surface-lowest text-on-surface font-body-md text-body-md placeholder-outline focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition duration-150 ease-in-out shadow-sm" id="password" name="password" placeholder="••••••••" required="" type="password"/>
</div>
<div>
<label class="block font-label-sm text-label-sm text-on-surface mb-2" for="confirmPassword">Confirm Password</label>
<input class="appearance-none block w-full px-4 py-3 border border-outline-variant rounded-lg bg-surface-lowest text-on-surface font-body-md text-body-md placeholder-outline focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition duration-150 ease-in-out shadow-sm" id="confirmPassword" name="confirmPassword" placeholder="••••••••" required="" type="password"/>
</div>
<div class="pt-4">
<button class="w-full flex justify-center items-center py-3 px-6 border border-transparent rounded-full shadow-sm font-label-sm text-label-sm text-on-primary bg-primary hover:bg-on-primary-fixed-variant focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200" type="submit">
                            Sign Up
                        </button>
</div>
</form>
<!-- Footer Link -->
<div class="mt-8 text-center">
<p class="font-body-md text-body-md text-on-surface-variant">
                        Already have an account? 
                        <a class="font-label-sm text-label-sm text-primary hover:text-primary-container transition-colors" href="#">Sign in</a>
</p>
</div>
</div>
</div>
</main>

    </FrontendLayout>
</template>
