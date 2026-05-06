<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps<{
    layanan: any
}>()
</script>

<template>
    <FrontendLayout :title="layanan.nama_layanan">
        <!-- Hero Image -->
        <section class="relative h-[420px] md:h-[550px] overflow-hidden -mt-16 pt-16">
            <img
                :src="layanan.gambar_utama ? `/storage/${layanan.gambar_utama}` : '/image/1-SLIDE.png'"
                :alt="layanan.nama_layanan"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-slate-900/20 to-transparent flex items-end">
                <div class="max-w-7xl mx-auto w-full px-6 pb-10">
                    <Link href="/paket-wisata" class="text-white/70 hover:text-white text-sm flex items-center gap-2 mb-3 transition-colors">
                        <i class="fas fa-arrow-left text-xs"></i> Kembali ke Paket Wisata
                    </Link>
                    <div class="flex flex-wrap gap-2 mb-3">
                        <span v-if="layanan.jenis_layanan" class="px-3 py-1 bg-blue-700 text-white text-xs font-bold rounded-full uppercase">
                            {{ layanan.jenis_layanan?.replace('_', ' ') }}
                        </span>
                        <span v-if="layanan.wilayah" class="px-3 py-1 bg-orange-500 text-white text-xs font-bold rounded-full capitalize">
                            {{ layanan.wilayah }}
                        </span>
                    </div>
                    <h1 class="text-white text-3xl md:text-5xl font-bold leading-tight">{{ layanan.nama_layanan }}</h1>
                    <p v-if="layanan.lokasi_tujuan" class="text-white/80 text-lg mt-2 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-orange-400"></i>
                        {{ layanan.lokasi_tujuan }}
                    </p>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 md:px-10 py-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- Left: Detail -->
                <div class="lg:col-span-8 space-y-8">

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div v-if="layanan.durasi_hari" class="bg-blue-50 rounded-xl p-4 text-center">
                            <i class="fas fa-clock text-blue-700 text-xl mb-2"></i>
                            <p class="text-sm text-slate-500">Durasi</p>
                            <p class="font-bold text-gray-800">{{ layanan.durasi_hari }} Hari</p>
                        </div>
                        <div v-if="layanan.kuota_tersedia !== null && layanan.kuota_tersedia !== undefined" class="bg-orange-50 rounded-xl p-4 text-center">
                            <i class="fas fa-users text-orange-500 text-xl mb-2"></i>
                            <p class="text-sm text-slate-500">Sisa Kursi</p>
                            <p class="font-bold text-gray-800">{{ layanan.kuota_tersedia }}</p>
                        </div>
                        <div v-if="layanan.wilayah" class="bg-green-50 rounded-xl p-4 text-center">
                            <i class="fas fa-globe text-green-600 text-xl mb-2"></i>
                            <p class="text-sm text-slate-500">Wilayah</p>
                            <p class="font-bold text-gray-800 capitalize">{{ layanan.wilayah }}</p>
                        </div>
                        <div class="bg-slate-50 rounded-xl p-4 text-center">
                            <i class="fas fa-star text-yellow-500 text-xl mb-2"></i>
                            <p class="text-sm text-slate-500">Rating</p>
                            <p class="font-bold text-gray-800">5.0 / 5</p>
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div v-if="layanan.deskripsi" class="bg-white rounded-xl border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-info-circle text-blue-700"></i>
                            Tentang Paket Ini
                        </h2>
                        <p class="text-slate-600 leading-relaxed whitespace-pre-line">{{ layanan.deskripsi }}</p>
                    </div>

                    <!-- Fasilitas Include -->
                    <div v-if="layanan.fasilitas_include?.length > 0" class="bg-white rounded-xl border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-600"></i>
                            Fasilitas Termasuk
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div v-for="item in layanan.fasilitas_include" :key="item"
                                class="flex items-center gap-2 text-slate-700 text-sm">
                                <i class="fas fa-check text-green-500 text-xs flex-shrink-0"></i>
                                {{ item }}
                            </div>
                        </div>
                    </div>

                    <!-- Fasilitas Exclude -->
                    <div v-if="layanan.fasilitas_exclude?.length > 0" class="bg-white rounded-xl border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-times-circle text-red-500"></i>
                            Tidak Termasuk
                        </h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div v-for="item in layanan.fasilitas_exclude" :key="item"
                                class="flex items-center gap-2 text-slate-500 text-sm">
                                <i class="fas fa-times text-red-400 text-xs flex-shrink-0"></i>
                                {{ item }}
                            </div>
                        </div>
                    </div>

                    <!-- Jadwal Tersedia -->
                    <div v-if="layanan.tanggal_tersedia?.length > 0" class="bg-white rounded-xl border border-slate-200 p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-calendar-alt text-blue-700"></i>
                            Jadwal Keberangkatan
                        </h2>
                        <div class="flex flex-wrap gap-2">
                            <span v-for="tgl in layanan.tanggal_tersedia" :key="tgl"
                                class="px-4 py-2 bg-blue-50 text-blue-700 rounded-lg text-sm font-medium border border-blue-200">
                                {{ tgl }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: Sticky Booking Card -->
                <div class="lg:col-span-4">
                    <div class="sticky top-24 bg-white rounded-2xl border border-slate-200 shadow-xl p-6">
                        <p class="text-slate-400 text-sm mb-1">Harga mulai dari</p>
                        <h2 class="text-3xl font-bold text-blue-700 mb-1">
                            {{ layanan.harga_format }}
                        </h2>
                        <p class="text-slate-400 text-xs mb-6">per orang</p>

                        <div class="space-y-3 border-y border-slate-100 py-4 mb-6">
                            <div v-if="layanan.durasi_hari" class="flex justify-between text-sm">
                                <span class="text-slate-500">Durasi</span>
                                <span class="font-semibold text-gray-800">{{ layanan.durasi_hari }} Hari</span>
                            </div>
                            <div v-if="layanan.jenis_layanan" class="flex justify-between text-sm">
                                <span class="text-slate-500">Tipe Tour</span>
                                <span class="font-semibold text-gray-800 capitalize">{{ layanan.jenis_layanan?.replace('_', ' ') }}</span>
                            </div>
                            <div v-if="layanan.kuota_tersedia !== null && layanan.kuota_tersedia !== undefined" class="flex justify-between text-sm">
                                <span class="text-slate-500">Sisa Kursi</span>
                                <span :class="['font-semibold', layanan.kuota_tersedia < 5 ? 'text-red-600' : 'text-green-600']">
                                    {{ layanan.kuota_tersedia }} kursi
                                </span>
                            </div>
                        </div>

                        <Link
                            :href="`/booking/buat/${layanan.id}`"
                            class="block w-full text-center py-4 bg-blue-700 hover:bg-blue-800 text-white font-bold rounded-xl transition-colors shadow-lg shadow-blue-700/20"
                        >
                            <i class="fas fa-calendar-check mr-2"></i>
                            Pesan Sekarang
                        </Link>
                        <p class="text-xs text-slate-400 text-center mt-3 flex items-center justify-center gap-1">
                            <i class="fas fa-lock text-xs"></i>
                            Pembayaran Aman & Terjamin
                        </p>

                        <!-- WhatsApp -->
                        <a href="https://wa.me/6282266478147" target="_blank"
                            class="mt-3 flex items-center justify-center gap-2 w-full py-3 border border-green-500 text-green-600 hover:bg-green-50 rounded-xl text-sm font-semibold transition-colors">
                            <i class="fab fa-whatsapp text-lg"></i>
                            Tanya via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
