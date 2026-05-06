<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<!-- TopAppBar Semantic Shell Intent Filtered: Suppressed for Transactional Page -->
<!-- Content Canvas -->
<main class="flex-grow w-full max-w-container-max mx-auto px-gutter py-stack-lg">
<div class="mb-stack-lg">
<a class="inline-flex items-center text-primary hover:text-secondary-container transition-colors mb-stack-sm" href="#">
<span class="material-symbols-outlined mr-2 text-label-sm" style="font-variation-settings: 'FILL' 0;">arrow_back</span>
<span class="text-label-sm">Back to Booking Details</span>
</a>
<h1 class="text-h2 font-h2">Secure Checkout</h1>
<p class="text-body-lg font-body-lg text-on-surface-variant mt-2">Complete your payment to confirm your adventure.</p>
</div>
<div class="grid grid-cols-1 lg:grid-cols-12 gap-gutter">
<!-- Left Column: Payment Methods -->
<div class="lg:col-span-8 space-y-stack-md">
<section class="bg-surface rounded-xl shadow-level-1 p-stack-md">
<h2 class="text-h3 font-h3 mb-stack-md flex items-center">
<span class="material-symbols-outlined mr-3 text-primary" style="font-variation-settings: 'FILL' 1;">account_balance</span>
                        Select Payment Method
                    </h2>
<div class="space-y-stack-sm">
<!-- Accordion Item 1: Manual Bank Transfer (Prioritized) -->
<div class="border border-outline-variant rounded-lg overflow-hidden bg-surface-container-lowest">
<label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex items-center">
<input checked="" class="form-radio h-5 w-5 text-primary border-outline focus:ring-primary focus:ring-opacity-20 focus:ring-offset-0 focus:border-primary focus:border-2" name="payment_method" type="radio" value="manual_transfer"/>
<span class="ml-4 text-body-md font-bold">Manual Bank Transfer</span>
</div>
<span class="material-symbols-outlined text-outline">expand_less</span>
</label>
<div class="p-4 border-t border-outline-variant bg-surface-container-low">
<div class="mb-6 p-4 bg-primary-fixed rounded-lg border border-primary-fixed-dim">
<h4 class="font-bold text-on-primary-fixed mb-2">Transfer to:</h4>
<div class="space-y-2 text-on-primary-fixed-variant">
<div class="flex justify-between border-b border-primary-fixed-dim pb-2">
<span class="text-sm font-semibold">Bank Name:</span>
<span>Bank Central Asia (BCA)</span>
</div>
<div class="flex justify-between border-b border-primary-fixed-dim pb-2">
<span class="text-sm font-semibold">Account Number:</span>
<span class="font-mono font-bold">892 123 4567</span>
</div>
<div class="flex justify-between">
<span class="text-sm font-semibold">Account Name:</span>
<span>PT Solaris Travelindo</span>
</div>
</div>
</div>
<div class="mt-4">
<h4 class="font-bold text-on-surface mb-2">Upload Proof of Payment</h4>
<div class="border-2 border-dashed border-outline-variant rounded-lg p-8 flex flex-col items-center justify-center bg-surface hover:bg-surface-container-highest transition-colors cursor-pointer group">
<span class="material-symbols-outlined text-4xl text-outline group-hover:text-primary mb-3 transition-colors" style="font-variation-settings: 'FILL' 0;">cloud_upload</span>
<p class="text-body-md font-semibold text-on-surface mb-1">Click to upload or drag and drop</p>
<p class="text-sm text-on-surface-variant text-center">SVG, PNG, JPG or PDF (max. 5MB)</p>
<input accept=".jpg,.jpeg,.png,.pdf,.svg" class="hidden" type="file"/>
</div>
</div>
</div>
</div>
<!-- Accordion Item 2: Virtual Account -->
<div class="border border-outline-variant rounded-lg overflow-hidden bg-surface-container-lowest">
<label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex items-center">
<input class="form-radio h-5 w-5 text-primary border-outline focus:ring-primary focus:ring-opacity-20 focus:ring-offset-0 focus:border-primary focus:border-2" name="payment_method" type="radio" value="virtual_account"/>
<span class="ml-4 text-body-md font-bold">Virtual Account</span>
</div>
<span class="material-symbols-outlined text-outline">expand_more</span>
</label>
</div>
<!-- Accordion Item 3: Credit Card -->
<div class="border border-outline-variant rounded-lg overflow-hidden bg-surface-container-lowest">
<label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex items-center">
<input class="form-radio h-5 w-5 text-primary border-outline focus:ring-primary focus:ring-opacity-20 focus:ring-offset-0 focus:border-primary focus:border-2" name="payment_method" type="radio" value="credit_card"/>
<span class="ml-4 text-body-md font-bold">Kartu Kredit</span>
</div>
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-outline" style="font-variation-settings: 'FILL' 1;">credit_card</span>
<span class="material-symbols-outlined text-outline">expand_more</span>
</div>
</label>
</div>
<!-- Accordion Item 4: E-Wallet -->
<div class="border border-outline-variant rounded-lg overflow-hidden bg-surface-container-lowest">
<label class="flex items-center justify-between p-4 cursor-pointer hover:bg-surface-container-low transition-colors">
<div class="flex items-center">
<input class="form-radio h-5 w-5 text-primary border-outline focus:ring-primary focus:ring-opacity-20 focus:ring-offset-0 focus:border-primary focus:border-2" name="payment_method" type="radio" value="ewallet"/>
<span class="ml-4 text-body-md font-bold">E-Wallet (Gopay/OVO)</span>
</div>
<div class="flex items-center space-x-2">
<span class="material-symbols-outlined text-outline" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
<span class="material-symbols-outlined text-outline">expand_more</span>
</div>
</label>
</div>
</div>
</section>
<section class="bg-surface rounded-xl shadow-level-1 p-stack-md flex items-start space-x-4">
<span class="material-symbols-outlined text-primary text-3xl" style="font-variation-settings: 'FILL' 1;">verified_user</span>
<div>
<h4 class="text-body-md font-bold mb-1">Secure Payment Processing</h4>
<p class="text-body-md font-body-md text-on-surface-variant text-sm">All transactions are encrypted and processed securely. We never store your full payment details.</p>
</div>
</section>
</div>
<!-- Right Column: Order Summary Card -->
<div class="lg:col-span-4">
<aside class="bg-surface rounded-xl shadow-level-1 sticky top-stack-md overflow-hidden flex flex-col">
<!-- Trip Image -->
<div class="h-48 bg-surface-variant relative w-full">
<img class="w-full h-full object-cover" data-alt="A lush green rice terrace in Bali, Indonesia, bathed in warm, golden morning light. The scene captures the serene beauty of the cultural landscape, representing the 'Bali Cultural &amp; Nature' trip. The color palette emphasizes vibrant natural greens, warm earthy browns, and the bright, optimistic tones of the Corporate Modern travel aesthetic. The high-quality image evokes a sense of premium adventure and relaxation." src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRS8irc3iJ-FXhxtGCE5CZ4V7CTbAhctUlsPoJ9Rh2ohzeGkzplZ6yfs0bYvkkADnl19wN_a9mglNQu9XcSy3wXGtzPDEQaLznt8Jv90rogt_Xr9ggR6juMQ9wokhbZ3NSJKd2xXPz8EZwpa07EE31aVRAZQiel938gEmWmIEwFQt9XVN3CNTPG4woUqfKfb-sfOT8mZiR-Q12M71umOtxpcQlm-K5uzEDZqEaU40Qs_F2Yt5N4wEbJuBJQNpPLVHYsCaTS6cvOije"/>
</div>
<div class="p-stack-md flex-grow flex flex-col">
<h3 class="text-h3 font-h3 mb-2">Bali Cultural &amp; Nature</h3>
<div class="space-y-3 mb-6">
<div class="flex items-center text-on-surface-variant">
<span class="material-symbols-outlined text-outline mr-2 text-sm">calendar_month</span>
<span class="text-body-md font-body-md text-sm">15 Oct 2024 - 20 Oct 2024</span>
</div>
<div class="flex items-center text-on-surface-variant">
<span class="material-symbols-outlined text-outline mr-2 text-sm">group</span>
<span class="text-body-md font-body-md text-sm">2 Travelers</span>
</div>
</div>
<div class="border-t border-outline-variant pt-4 mb-6 space-y-2">
<div class="flex justify-between text-body-md font-body-md">
<span class="text-on-surface-variant">Base Price (x2)</span>
<span>Rp 12.000.000</span>
</div>
<div class="flex justify-between text-body-md font-body-md">
<span class="text-on-surface-variant">Taxes &amp; Fees</span>
<span>Rp 1.200.000</span>
</div>
<div class="flex justify-between text-body-md font-body-md text-green-600">
<span>Promo Code Applied</span>
<span>- Rp 500.000</span>
</div>
</div>
<div class="border-t border-outline-variant pt-4 mb-stack-md flex justify-between items-center">
<span class="text-body-lg font-bold">Total Bayar</span>
<span class="text-h3 font-h3 text-primary">Rp 12.700.000</span>
</div>
<button class="w-full bg-secondary-container hover:bg-secondary text-on-secondary py-3 px-6 rounded-full font-label-sm text-label-sm transition-colors mt-auto flex items-center justify-center">
<span class="material-symbols-outlined mr-2" style="font-variation-settings: 'FILL' 1;">lock</span>
                            Bayar Sekarang
                        </button>
</div>
</aside>
</div>
</div>
</main>
<!-- Footer Semantic Shell Intent Filtered: Suppressed for Transactional Page -->

    </FrontendLayout>
</template>
