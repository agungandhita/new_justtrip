<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps<{
    gallery: any
}>()
</script>

<template>
    <FrontendLayout :title="gallery.judul">
        <!-- Back -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pt-8">
            <Link href="/galeri" class="flex items-center gap-2 text-blue-700 text-sm font-medium hover:underline mb-6">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Galeri
            </Link>
        </div>

        <!-- Gallery Header -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ gallery.judul }}</h1>
            <div class="flex items-center gap-4 text-sm text-slate-500">
                <span v-if="gallery.kategori" class="px-2 py-1 bg-blue-50 text-blue-700 rounded-full text-xs font-semibold">{{ gallery.kategori }}</span>
                <span v-if="gallery.tanggal">{{ gallery.tanggal }}</span>
                <span v-if="gallery.lokasi"><i class="fas fa-map-marker-alt mr-1 text-blue-700"></i>{{ gallery.lokasi }}</span>
            </div>
        </div>

        <!-- Cover Image -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 mb-8">
            <div class="aspect-[16/9] rounded-2xl overflow-hidden shadow-xl">
                <img
                    :src="gallery.cover_image ? `/storage/${gallery.cover_image}` : '/image/1-SLIDE.png'"
                    :alt="gallery.judul"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>

        <!-- Deskripsi -->
        <div v-if="gallery.deskripsi" class="max-w-7xl mx-auto px-4 md:px-10 mb-10">
            <p class="text-slate-600 leading-relaxed text-lg">{{ gallery.deskripsi }}</p>
        </div>

        <!-- Photo Grid -->
        <div v-if="gallery.images && gallery.images.length > 0" class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <h2 class="text-xl font-bold text-gray-800 mb-6">Foto-foto</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div
                    v-for="(img, idx) in gallery.images"
                    :key="idx"
                    class="aspect-square rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all group cursor-pointer"
                >
                    <img
                        :src="`/storage/${img}`"
                        :alt="`${gallery.judul} - ${idx + 1}`"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                    >
                </div>
            </div>
        </div>
        <div v-else class="pb-20"></div>
    </FrontendLayout>
</template>
