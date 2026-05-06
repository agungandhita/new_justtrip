<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
    articles: any[]
    filters?: { kategori?: string; search?: string }
}>()

const search = ref(props.filters?.search ?? '')
const doSearch = () => {
    router.get('/artikel', { search: search.value, kategori: props.filters?.kategori }, { preserveState: true })
}
</script>

<template>
    <FrontendLayout title="Artikel & Blog">
        <!-- Hero -->
        <section class="relative h-[300px] overflow-hidden">
            <img src="/image/2-SLIDE.png" alt="Artikel Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-900/70 flex items-center justify-center">
                <div class="text-center text-white">
                    <h1 class="text-4xl md:text-6xl font-bold mb-3">Blog & Artikel</h1>
                    <p class="text-blue-200 text-lg">Inspirasi dan tips perjalananmu bersama Justtrip</p>
                </div>
            </div>
        </section>

        <!-- Search & Filter -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-8">
            <form @submit.prevent="doSearch" class="flex gap-3 max-w-md">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input v-model="search" type="text" placeholder="Cari artikel..."
                        class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-700 bg-white">
                </div>
                <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800 text-sm">
                    Cari
                </button>
            </form>
        </div>

        <!-- Articles Grid -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <!-- Empty State -->
            <div v-if="!articles || articles.length === 0" class="text-center py-20">
                <i class="fas fa-newspaper text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Belum ada artikel</h3>
                <p class="text-slate-400">Konten akan segera tersedia</p>
            </div>

            <!-- Cards -->
            <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <Link
                    v-for="article in articles"
                    :key="article.id"
                    :href="`/artikel/${article.slug}`"
                    class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-xl transition-all"
                >
                    <div class="aspect-[16/9] overflow-hidden">
                        <img
                            :src="article.featured_image ? `/storage/${article.featured_image}` : '/image/1-SLIDE.png'"
                            :alt="article.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            loading="lazy"
                        >
                    </div>
                    <div class="p-5">
                        <span v-if="article.kategori" class="text-xs font-bold text-blue-700 uppercase tracking-wider bg-blue-50 px-2 py-1 rounded-full">
                            {{ article.kategori }}
                        </span>
                        <h3 class="text-lg font-bold text-gray-800 mt-2 mb-2 line-clamp-2 group-hover:text-blue-700 transition-colors">
                            {{ article.title }}
                        </h3>
                        <p v-if="article.excerpt" class="text-slate-500 text-sm line-clamp-2 mb-3">{{ article.excerpt }}</p>
                        <div class="flex items-center justify-between text-xs text-slate-400 pt-3 border-t border-slate-100">
                            <span>{{ article.published_at }}</span>
                            <span class="text-blue-700 font-semibold flex items-center gap-1">
                                Baca Selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                            </span>
                        </div>
                    </div>
                </Link>
            </div>
        </div>
    </FrontendLayout>
</template>
