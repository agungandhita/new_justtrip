<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<main class="w-full max-w-md bg-surface rounded-xl shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] p-stack-md flex flex-col items-center text-center">
<!-- Icon Container -->
<div class="w-24 h-24 rounded-full bg-primary-fixed flex items-center justify-center mb-stack-md relative">
<div class="absolute inset-0 rounded-full bg-primary-fixed opacity-50 animate-ping" style="animation-duration: 3s;"></div>
<span class="material-symbols-outlined text-4xl text-primary z-10" data-icon="fact_check" style="font-variation-settings: 'FILL' 1;">
                fact_check
            </span>
</div>
<!-- Content -->
<h1 class="font-h2 text-h2 text-on-surface mb-stack-sm">Waiting for Verification</h1>
<p class="font-body-md text-body-md text-on-surface-variant mb-stack-lg max-w-[300px]">
            We are processing your payment. Our team will verify it within 24 hours. You will receive an email notification once it's confirmed.
        </p>
<!-- Details Card (Optional but adds to "Processing" feel) -->
<div class="w-full bg-surface-container rounded-lg p-stack-sm mb-stack-lg text-left shadow-[0_4px_20px_0_rgba(0,40,142,0.05)] border border-outline-variant/30">
<div class="flex justify-between items-center mb-unit pb-unit border-b border-outline-variant/50">
<span class="font-label-sm text-label-sm text-on-surface-variant">Booking Ref:</span>
<span class="font-body-md text-body-md text-on-surface font-semibold">JT-8492-BX</span>
</div>
<div class="flex justify-between items-center">
<span class="font-label-sm text-label-sm text-on-surface-variant">Status:</span>
<span class="font-body-md text-body-md text-secondary-container font-semibold flex items-center gap-1">
<span class="w-2 h-2 rounded-full bg-secondary-container inline-block"></span>
                    Processing
                 </span>
</div>
</div>
<!-- Action Button -->
<a class="w-full inline-flex justify-center items-center py-3 px-6 rounded-full bg-primary text-on-primary font-label-sm text-label-sm hover:bg-primary-container transition-colors shadow-sm" href="#">
            Back to Booking History
        </a>
</main>

    </FrontendLayout>
</template>
