<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
import type { Layanan } from '@/types'

const props = defineProps<{
    openTrips: Layanan[]
}>()

const getImageUrl = (path: string | null) => path ? `/storage/${path}` : '/image/1-SLIDE.png'

const formatTanggal = (tanggal: string[] | null) => {
    if (!tanggal || tanggal.length === 0) return 'Jadwal Fleksibel'
    return tanggal[0]
}
</script>

<template>
    <FrontendLayout title="Open Trip">
        <!-- Hero Section -->
        <section class="relative h-[400px] md:h-[500px] w-full overflow-hidden">
            <img
                src="/image/1-SLIDE.png"
                alt="Open Trip Hero"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/30 to-transparent flex flex-col justify-end p-8 md:p-16">
                <h1 class="text-white text-4xl md:text-6xl font-bold mb-4">Open Trip Bersama Justtrip</h1>
                <p class="text-slate-200 text-lg md:text-xl max-w-2xl">
                    Jangan tunggu teman punya waktu. Bergabung bersama komunitas traveler dan jelajahi destinasi impianmu sekarang.
                </p>
            </div>
        </section>

        <!-- How It Works -->
        <section class="max-w-7xl mx-auto px-4 md:px-10 py-16">
            <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center text-gray-800">Cara Bergabung</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white rounded-xl border border-slate-200 shadow-sm text-center">
                    <div class="w-16 h-16 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Pilih Destinasi</h3>
                    <p class="text-slate-600">Lihat daftar trip yang tersedia dan pilih yang sesuai keinginanmu.</p>
                </div>
                <div class="p-6 bg-white rounded-xl border border-slate-200 shadow-sm text-center">
                    <div class="w-16 h-16 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-check text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Booking Sekarang</h3>
                    <p class="text-slate-600">Amankan tempatmu dengan booking online yang mudah dan cepat.</p>
                </div>
                <div class="p-6 bg-white rounded-xl border border-slate-200 shadow-sm text-center">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-plane-departure text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">Berangkat Bersama</h3>
                    <p class="text-slate-600">Bertemu teman baru dan mulai petualangan tak terlupakan.</p>
                </div>
            </div>
        </section>

        <!-- Trip List -->
        <section class="max-w-7xl mx-auto px-4 md:px-10 pb-20">
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Jadwal Open Trip</h2>
                <span class="text-sm text-slate-500">{{ openTrips.length }} paket tersedia</span>
            </div>

            <!-- Empty State -->
            <div v-if="!openTrips || openTrips.length === 0" class="text-center py-20">
                <i class="fas fa-map-marked-alt text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Belum ada Open Trip</h3>
                <p class="text-slate-400">Pantau terus halaman ini untuk trip terbaru</p>
            </div>

            <!-- Trip Cards -->
            <div v-else class="grid grid-cols-1 gap-6">
                <div
                    v-for="trip in openTrips"
                    :key="trip.id"
                    class="flex flex-col md:flex-row items-stretch bg-white rounded-xl overflow-hidden border border-slate-200 shadow-lg hover:shadow-xl transition-shadow group"
                >
                    <!-- Image -->
                    <div class="w-full md:w-1/3 aspect-video md:aspect-auto overflow-hidden min-h-[220px]">
                        <img
                            :src="trip.gambar_utama ? `/storage/${trip.gambar_utama}` : '/image/1-SLIDE.png'"
                            :alt="trip.nama_layanan"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                    </div>

                    <!-- Content -->
                    <div class="flex-1 p-6 md:p-8 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wider">
                                    Open Trip
                                </span>
                                <span v-if="trip.wilayah" class="text-slate-500 text-sm flex items-center gap-1">
                                    <i class="fas fa-map-marker-alt text-xs text-blue-600"></i>
                                    {{ trip.wilayah === 'domestik' ? 'Domestik' : 'Internasional' }}
                                </span>
                            </div>
                            <h3 class="text-2xl font-bold mb-2 text-gray-800 group-hover:text-blue-700 transition-colors">
                                {{ trip.nama_layanan }}
                            </h3>
                            <p v-if="trip.lokasi_tujuan" class="text-slate-500 mb-2 flex items-center gap-1">
                                <i class="fas fa-map-pin text-xs text-orange-500"></i>
                                {{ trip.lokasi_tujuan }}
                            </p>
                            <p v-if="trip.deskripsi" class="text-slate-600 mb-4 line-clamp-2">{{ trip.deskripsi }}</p>

                            <div class="flex flex-wrap gap-4 text-sm font-medium">
                                <div v-if="trip.durasi_hari" class="flex items-center gap-1.5 text-slate-700">
                                    <i class="fas fa-clock text-blue-600"></i>
                                    {{ trip.durasi_hari }} Hari
                                </div>
                                <div v-if="trip.kuota_tersedia !== null" class="flex items-center gap-1.5 text-orange-600">
                                    <i class="fas fa-users"></i>
                                    {{ trip.kuota_tersedia }} kursi tersisa
                                </div>
                                <div class="flex items-center gap-1.5 text-slate-700">
                                    <i class="fas fa-tag text-blue-600"></i>
                                    {{ trip.harga_format }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-6">
                            <div v-if="trip.tanggal_tersedia && trip.tanggal_tersedia.length > 0" class="text-sm text-slate-500">
                                <i class="fas fa-calendar mr-1"></i>
                                {{ formatTanggal(trip.tanggal_tersedia) }}
                            </div>
                            <div v-else class="text-sm text-slate-400">Jadwal Fleksibel</div>

                            <Link
                                :href="`/booking/buat/${trip.id}`"
                                class="bg-blue-700 text-white px-8 py-3 rounded-xl font-bold flex items-center gap-2 hover:bg-blue-800 transition-colors shadow-lg shadow-blue-700/20"
                            >
                                Daftar Sekarang
                                <i class="fas fa-arrow-right"></i>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </FrontendLayout>
</template>
