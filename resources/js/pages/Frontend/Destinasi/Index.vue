<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps<{
    packages: any[]
    filters?: { jenis_layanan?: string; wilayah?: string; search?: string }
}>()

const search = ref(props.filters?.search ?? '')
const jenis = ref(props.filters?.jenis_layanan ?? '')
const wilayah = ref(props.filters?.wilayah ?? '')

const doFilter = () => {
    router.get('/paket-wisata', {
        search: search.value,
        jenis_layanan: jenis.value,
        wilayah: wilayah.value,
    }, { preserveState: true })
}

const jenisLabel: Record<string, string> = {
    open_trip:     'Open Trip',
    private_trip:  'Private Trip',
    request_trip:  'Custom Trip',
    edu_trip:      'Edu Trip',
    corporate_trip:'Corporate Trip',
}
</script>

<template>
    <FrontendLayout title="Paket Wisata">
        <!-- Hero -->
        <section class="relative h-[350px] overflow-hidden">
            <img src="/image/3-SLIDE.png" alt="Destinasi Hero" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 via-blue-900/40 to-transparent flex items-end p-10 md:p-16">
                <div>
                    <h1 class="text-white text-4xl md:text-5xl font-bold mb-2">Paket Wisata Justtrip</h1>
                    <p class="text-blue-200 text-lg">Temukan paket perjalanan yang sesuai dengan impianmu</p>
                </div>
            </div>
        </section>

        <!-- Filter Bar -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-6">
            <form @submit.prevent="doFilter" class="flex flex-wrap gap-3 items-end">
                <!-- Search -->
                <div class="relative flex-1 min-w-[200px]">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input v-model="search" type="text" placeholder="Cari paket..."
                        class="w-full pl-11 pr-4 py-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-700 bg-white">
                </div>

                <!-- Jenis Layanan -->
                <select v-model="jenis"
                    class="py-3 px-4 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-700 bg-white min-w-[160px]">
                    <option value="">Semua Jenis</option>
                    <option value="open_trip">Open Trip</option>
                    <option value="private_trip">Private Trip</option>
                    <option value="request_trip">Custom Trip</option>
                    <option value="edu_trip">Edu Trip</option>
                    <option value="corporate_trip">Corporate Trip</option>
                </select>

                <!-- Wilayah -->
                <select v-model="wilayah"
                    class="py-3 px-4 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-blue-700 bg-white min-w-[140px]">
                    <option value="">Semua Wilayah</option>
                    <option value="domestik">Domestik</option>
                    <option value="internasional">Internasional</option>
                </select>

                <button type="submit"
                    class="px-6 py-3 bg-blue-700 text-white rounded-xl font-semibold hover:bg-blue-800 text-sm transition-colors">
                    Filter
                </button>
            </form>
        </div>

        <!-- Package List -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <!-- Empty State -->
            <div v-if="!packages || packages.length === 0" class="text-center py-20">
                <i class="fas fa-map-marked-alt text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Paket tidak ditemukan</h3>
                <p class="text-slate-400">Coba ubah filter pencarian Anda</p>
            </div>

            <div v-else>
                <p class="text-sm text-slate-500 mb-6">Menampilkan {{ packages.length }} paket wisata</p>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <Link
                        v-for="pkg in packages"
                        :key="pkg.id"
                        :href="`/paket-wisata/${pkg.slug}`"
                        class="group bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-xl transition-all hover:-translate-y-1"
                    >
                        <!-- Image -->
                        <div class="relative aspect-[16/9] overflow-hidden">
                            <img
                                :src="pkg.gambar_utama ? `/storage/${pkg.gambar_utama}` : '/image/1-SLIDE.png'"
                                :alt="pkg.nama_layanan"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                            <!-- Badge Jenis -->
                            <div class="absolute top-3 left-3">
                                <span class="px-2 py-1 bg-blue-700 text-white text-[11px] font-bold rounded-full uppercase">
                                    {{ jenisLabel[pkg.jenis_layanan] ?? pkg.jenis_layanan }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-5">
                            <h3 class="text-base font-bold text-gray-800 mb-1 line-clamp-2 group-hover:text-blue-700 transition-colors">
                                {{ pkg.nama_layanan }}
                            </h3>
                            <p v-if="pkg.lokasi_tujuan" class="text-slate-500 text-sm mb-3 flex items-center gap-1">
                                <i class="fas fa-map-marker-alt text-xs text-blue-700"></i>
                                {{ pkg.lokasi_tujuan }}
                            </p>
                            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
                                <div class="flex items-center gap-3 text-xs text-slate-600">
                                    <span v-if="pkg.durasi_hari">
                                        <i class="fas fa-clock text-blue-700 mr-1"></i>{{ pkg.durasi_hari }} Hari
                                    </span>
                                </div>
                                <span class="text-blue-700 font-bold text-sm">{{ pkg.harga_format }}</span>
                            </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
