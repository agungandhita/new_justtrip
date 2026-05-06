<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'
import type { Booking } from '@/types'

const props = defineProps<{
    bookings: Booking[]
}>()

const statusColor: Record<string, string> = {
    pending:   'bg-yellow-100 text-yellow-700 border-yellow-200',
    approved:  'bg-blue-100 text-blue-700 border-blue-200',
    completed: 'bg-green-100 text-green-700 border-green-200',
    cancelled: 'bg-red-100 text-red-700 border-red-200',
    rejected:  'bg-gray-100 text-gray-600 border-gray-200',
}
const statusLabel: Record<string, string> = {
    pending:   'Menunggu Persetujuan',
    approved:  'Disetujui',
    completed: 'Selesai',
    cancelled: 'Dibatalkan',
    rejected:  'Ditolak',
}
</script>

<template>
    <FrontendLayout title="Riwayat Booking">
        <div class="max-w-4xl mx-auto px-4 py-10">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Riwayat Pemesanan</h1>
            <p class="text-slate-500 mb-8">Pantau status booking trip Anda di sini.</p>

            <!-- Empty State -->
            <div v-if="!bookings || bookings.length === 0" class="text-center py-20 bg-white rounded-xl border border-slate-200">
                <i class="fas fa-calendar-times text-6xl text-slate-300 mb-4"></i>
                <h3 class="text-xl font-bold text-slate-500 mb-2">Belum ada booking</h3>
                <p class="text-slate-400 mb-6">Yuk mulai perjalanan pertamamu bersama Justtrip!</p>
                <Link href="/open-trip" class="bg-blue-700 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-800 transition-colors inline-flex items-center gap-2">
                    <i class="fas fa-search"></i>
                    Lihat Paket Trip
                </Link>
            </div>

            <!-- Booking Cards -->
            <div v-else class="space-y-4">
                <div
                    v-for="booking in bookings"
                    :key="booking.id"
                    class="bg-white rounded-xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow overflow-hidden"
                >
                    <div class="p-4 bg-blue-700 flex items-center justify-between">
                        <span class="text-white text-sm font-mono font-semibold">
                            #{{ booking.booking_number }}
                        </span>
                        <span :class="['px-3 py-1 rounded-full border text-xs font-bold', statusColor[booking.status] ?? 'bg-gray-100 text-gray-600']">
                            {{ statusLabel[booking.status] ?? booking.status }}
                        </span>
                    </div>
                    <div class="p-5 flex flex-col md:flex-row gap-4">
                        <div class="w-full md:w-1/4 aspect-[4/3] rounded-lg overflow-hidden flex-shrink-0">
                            <img
                                :src="booking.layanan?.gambar_utama ? `/storage/${booking.layanan.gambar_utama}` : '/image/1-SLIDE.png'"
                                :alt="booking.layanan?.nama_layanan"
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="flex-1 space-y-2">
                            <h3 class="text-lg font-bold text-gray-800">{{ booking.layanan?.nama_layanan }}</h3>
                            <div class="flex flex-wrap gap-4 text-sm text-slate-600">
                                <div class="flex items-center gap-1.5">
                                    <i class="fas fa-calendar text-blue-700"></i>
                                    {{ booking.tanggal_keberangkatan }}
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <i class="fas fa-users text-blue-700"></i>
                                    {{ booking.jumlah_peserta }} peserta
                                </div>
                                <div class="flex items-center gap-1.5 font-semibold text-blue-700">
                                    <i class="fas fa-money-bill-wave"></i>
                                    {{ booking.total_harga_format }}
                                </div>
                            </div>
                        </div>
                        <div class="flex items-end">
                            <Link
                                :href="`/booking/${booking.id}`"
                                class="text-blue-700 border border-blue-200 hover:bg-blue-700 hover:text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors"
                            >
                                Lihat Detail
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
