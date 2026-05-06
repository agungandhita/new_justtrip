<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps<{
    booking: any
}>()
</script>

<template>
    <FrontendLayout title="Booking Berhasil">
        <div class="min-h-[70vh] flex items-center justify-center px-4">
            <div class="max-w-lg w-full text-center">
                <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-5xl text-green-500"></i>
                </div>
                <h1 class="text-3xl font-bold text-gray-800 mb-2">Booking Berhasil!</h1>
                <p class="text-slate-500 mb-6">
                    Terima kasih! Booking trip Anda sedang diproses. Tim kami akan segera menghubungi Anda untuk konfirmasi pembayaran.
                </p>

                <!-- Booking Summary Card -->
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 text-left mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-slate-500">Nomor Booking</span>
                        <span class="font-mono font-bold text-blue-700">#{{ booking.booking_number }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-slate-500">Paket Trip</span>
                        <span class="font-semibold text-gray-800 text-right max-w-[60%]">{{ booking.layanan?.nama_layanan }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-sm text-slate-500">Tanggal</span>
                        <span class="font-semibold text-gray-800">{{ booking.tanggal_keberangkatan }}</span>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-slate-100">
                        <span class="text-sm text-slate-500">Total Pembayaran</span>
                        <span class="text-lg font-bold text-blue-700">{{ booking.total_harga_format }}</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <Link :href="`/booking/${booking.id}`" class="flex-1 py-3 bg-blue-700 text-white rounded-xl font-bold hover:bg-blue-800 transition-colors text-sm text-center">
                        Lihat Detail Booking
                    </Link>
                    <Link href="/" class="flex-1 py-3 border border-slate-200 text-slate-700 rounded-xl font-semibold hover:bg-slate-50 transition-colors text-sm text-center">
                        Kembali ke Beranda
                    </Link>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
