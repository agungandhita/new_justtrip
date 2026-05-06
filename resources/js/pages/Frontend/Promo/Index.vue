<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'
import type { SpecialOffer } from '@/types'

const props = defineProps<{
    offers: SpecialOffer[]
    filters?: { search?: string }
}>()

const search = ref(props.filters?.search ?? '')
const doSearch = () => {
    router.get('/promo', { search: search.value }, { preserveState: true })
}
</script>

<template>
    <FrontendLayout title="Promo Spesial">
        <!-- Hero -->
        <section class="relative h-[320px] overflow-hidden">
            <img src="/image/2-SLIDE.png" alt="Promo Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-900/40 to-transparent flex items-end p-10 md:p-16">
                <div>
                    <span class="inline-block px-4 py-1 bg-orange-500 text-white text-xs font-bold rounded-full mb-3 uppercase tracking-wider">
                        Penawaran Terbatas
                    </span>
                    <h1 class="text-white text-3xl md:text-5xl font-bold">Promo & Diskon Spesial</h1>
                    <p class="text-blue-100 mt-2">Dapatkan harga terbaik untuk perjalanan impianmu</p>
                </div>
            </div>
        </section>

        <!-- Search -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-8">
            <form @submit.prevent="doSearch" class="flex gap-3 max-w-md">
                <div class="relative flex-1">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input
                        v-model="search"
                        type="text"
                        placeholder="Cari promo..."
                        class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-700 focus:border-blue-700 bg-white text-sm"
                    >
                </div>
                <button type="submit" class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800 transition-colors text-sm">
                    Cari
                </button>
            </form>
        </div>

        <!-- Offers Grid -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <!-- Empty State -->
            <div v-if="!offers || offers.length === 0" class="text-center py-20">
                <i class="fas fa-tags text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Tidak ada promo saat ini</h3>
                <p class="text-slate-400">Pantau terus halaman ini untuk promo terbaru</p>
            </div>

            <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div
                    v-for="offer in offers"
                    :key="offer.id"
                    class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-xl transition-all group"
                >
                    <!-- Image with badge -->
                    <div class="relative aspect-[16/9] overflow-hidden">
                        <img
                            :src="offer.gambar ? `/storage/${offer.gambar}` : '/image/3-SLIDE.png'"
                            :alt="offer.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute top-3 left-3 bg-orange-500 text-white text-sm font-bold px-3 py-1 rounded-full">
                            {{ offer.diskon_persen ?? '0' }}% OFF
                        </div>
                        <div v-if="offer.is_featured" class="absolute top-3 right-3 bg-blue-700 text-white text-xs font-bold px-2 py-1 rounded-full">
                            FEATURED
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-1 line-clamp-2">{{ offer.title }}</h3>
                        <p v-if="offer.deskripsi" class="text-slate-500 text-sm mb-4 line-clamp-2">{{ offer.deskripsi }}</p>

                        <div class="flex items-end justify-between mb-4">
                            <div>
                                <p class="text-xs text-slate-400 line-through">{{ offer.formatted_original_price }}</p>
                                <p class="text-xl font-bold text-blue-700">{{ offer.formatted_price }}</p>
                            </div>
                            <div v-if="offer.valid_until" class="text-right">
                                <p class="text-xs text-slate-400">Berlaku hingga</p>
                                <p class="text-sm font-semibold text-orange-600">{{ offer.valid_until }}</p>
                            </div>
                        </div>

                        <Link
                            :href="`/booking/promo/${offer.slug}`"
                            class="block w-full text-center bg-blue-700 text-white py-3 rounded-xl font-bold hover:bg-blue-800 transition-colors text-sm"
                        >
                            Gunakan Promo
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
