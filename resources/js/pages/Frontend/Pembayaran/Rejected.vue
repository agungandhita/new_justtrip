<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
</script>

<template>
    <FrontendLayout>
        
<main class="w-full max-w-lg bg-surface-container-lowest rounded-[24px] shadow-[0_10px_30px_0_rgba(0,0,0,0.1)] p-stack-md md:p-stack-lg text-center flex flex-col items-center">
<div class="w-24 h-24 rounded-full bg-error-container flex items-center justify-center mb-stack-md">
<span class="material-symbols-outlined text-on-error-container text-[48px]" style="font-variation-settings: 'FILL' 1;">
                error
            </span>
</div>
<h1 class="font-h2 text-h2 text-on-surface mb-stack-sm">Payment Rejected</h1>
<p class="font-body-md text-body-md text-on-surface-variant mb-stack-lg max-w-[320px]">
            The proof of payment you provided was invalid or unreadable. Please ensure the document is clear and shows all required transaction details.
        </p>
<div class="w-full flex flex-col gap-stack-sm">
<button class="w-full bg-primary text-on-primary font-label-sm text-label-sm py-4 px-6 rounded-full hover:bg-primary-container transition-colors shadow-[0_4px_20px_0_rgba(0,40,142,0.05)]">
                Re-upload Proof
            </button>
<button class="w-full bg-transparent border-2 border-outline-variant text-primary font-label-sm text-label-sm py-4 px-6 rounded-full hover:bg-surface-container transition-colors">
                Contact Support
            </button>
</div>
<button class="mt-stack-md text-primary font-label-sm text-label-sm hover:text-primary-container transition-colors flex items-center gap-2">
<span class="material-symbols-outlined text-[20px]">arrow_back</span>
            Back to Bookings
        </button>
</main>

    </FrontendLayout>
</template>
