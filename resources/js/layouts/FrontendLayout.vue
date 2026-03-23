<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import FrontendHeader from '@/components/Frontend/FrontendHeader.vue';
import FrontendFooter from '@/components/Frontend/FrontendFooter.vue';

const props = defineProps<{
    title?: string;
}>();
</script>

<template>
    <Head :title="title ? `${title} - Justtrip` : 'Justtrip - #TripGagalMoveOn'" />
    
    <div class="font-sans antialiased text-gray-900 bg-gray-50 overflow-x-hidden">
        <!-- Header / Navbar -->
        <FrontendHeader />
        
        <!-- Main Content (pt-16 for navbar offset) -->
        <main class="min-h-screen pt-16">
            <slot />
        </main>
        
        <!-- Footer -->
        <FrontendFooter />
    </div>
</template>
