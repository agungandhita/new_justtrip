<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
    galleries: any[]
    filters?: { kategori?: string; search?: string }
}>()

const search = ref(props.filters?.search ?? '')
const doSearch = () => {
    router.get('/galeri', { search: search.value }, { preserveState: true })
}
</script>

<template>
    <FrontendLayout title="Galeri">
        <!-- Hero -->
        <section class="relative h-[300px] overflow-hidden">
            <img src="/image/1.jpg" alt="Galeri Hero" class="w-full h-full object-cover"
                 onerror="this.src='/image/1-SLIDE.png'">
            <div class="absolute inset-0 bg-blue-900/70 flex items-center justify-center">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-6xl font-bold mb-3">Galeri Foto</h1>
                    <p class="text-blue-200 text-lg">Kumpulan momen tak terlupakan bersama Justtrip</p>
                </div>
            </div>
        </section>

        <!-- Search -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-8">
            <form @submit.prevent="doSearch" class="flex gap-3 max-w-md">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input v-model="search" type="text" placeholder="Cari galeri..."
                        class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-700 bg-white">
                </div>
                <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800 text-sm">
                    Cari
                </button>
            </form>
        </div>

        <!-- Gallery Grid -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <!-- Empty State -->
            <div v-if="!galleries || galleries.length === 0" class="text-center py-20">
                <i class="fas fa-images text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Belum ada foto</h3>
                <p class="text-slate-400">Galeri kami akan segera diperbarui</p>
            </div>

            <!-- Masonry-style Grid -->
            <div v-else class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <Link
                    v-for="gallery in galleries"
                    :key="gallery.id"
                    :href="`/galeri/${gallery.slug}`"
                    class="group relative aspect-square overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all"
                >
                    <img
                        :src="gallery.cover_image ? `/storage/${gallery.cover_image}` : '/image/1-SLIDE.png'"
                        :alt="gallery.judul"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="text-white font-bold text-sm line-clamp-2">{{ gallery.judul }}</h3>
                            <p v-if="gallery.kategori" class="text-white/70 text-xs mt-1">{{ gallery.kategori }}</p>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </FrontendLayout>
</template>
