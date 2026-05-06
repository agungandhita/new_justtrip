<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps<{
    booking: any
}>()

const cancelForm = useForm({})
const cancel = () => {
    if (confirm('Yakin ingin membatalkan booking ini?')) {
        cancelForm.post(`/booking/${props.booking.id}/batal`)
    }
}

const statusColor: Record<string, string> = {
    pending:   'bg-yellow-100 text-yellow-700',
    approved:  'bg-blue-100 text-blue-700',
    completed: 'bg-green-100 text-green-700',
    cancelled: 'bg-red-100 text-red-700',
    rejected:  'bg-gray-100 text-gray-600',
}
const statusLabel: Record<string, string> = {
    pending:   'Menunggu Persetujuan',
    approved:  'Disetujui — Segera Bayar',
    completed: 'Perjalanan Selesai',
    cancelled: 'Dibatalkan',
    rejected:  'Ditolak',
}
</script>

<template>
    <FrontendLayout title="Detail Booking">
        <div class="max-w-3xl mx-auto px-4 py-10">
            <!-- Back -->
            <Link href="/booking" class="flex items-center gap-2 text-blue-700 text-sm font-medium mb-6 hover:underline">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Riwayat
            </Link>

            <!-- Status Card -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-6">
                <div class="p-4 bg-blue-700 flex items-center justify-between">
                    <span class="text-white font-mono font-bold">#{{ booking.booking_number }}</span>
                    <span :class="['px-3 py-1 rounded-full text-xs font-bold', statusColor[booking.status] ?? 'bg-gray-100 text-gray-600']">
                        {{ statusLabel[booking.status] ?? booking.status }}
                    </span>
                </div>
                <div class="p-6 flex flex-col md:flex-row gap-6">
                    <img
                        :src="booking.layanan?.gambar_utama ? `/storage/${booking.layanan.gambar_utama}` : '/image/1-SLIDE.png'"
                        :alt="booking.layanan?.nama_layanan"
                        class="w-full md:w-1/3 aspect-[4/3] rounded-lg object-cover"
                    >
                    <div class="space-y-3 flex-1">
                        <h2 class="text-xl font-bold text-gray-800">{{ booking.layanan?.nama_layanan }}</h2>
                        <div class="grid grid-cols-2 gap-3 text-sm">
                            <div>
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-0.5">Tanggal Keberangkatan</p>
                                <p class="font-semibold text-gray-800 flex items-center gap-1.5">
                                    <i class="fas fa-calendar text-blue-700"></i>
                                    {{ booking.tanggal_keberangkatan }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-0.5">Jumlah Peserta</p>
                                <p class="font-semibold text-gray-800 flex items-center gap-1.5">
                                    <i class="fas fa-users text-blue-700"></i>
                                    {{ booking.jumlah_peserta }} orang
                                </p>
                            </div>
                            <div>
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-0.5">Total Harga</p>
                                <p class="text-lg font-bold text-blue-700">{{ booking.total_harga_format }}</p>
                            </div>
                            <div v-if="booking.catatan_khusus">
                                <p class="text-xs text-slate-400 uppercase font-semibold mb-0.5">Catatan Khusus</p>
                                <p class="text-sm text-slate-600">{{ booking.catatan_khusus }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-3 justify-end">
                <button
                    v-if="['pending'].includes(booking.status)"
                    @click="cancel"
                    :disabled="cancelForm.processing"
                    class="px-6 py-3 bg-red-50 border border-red-200 text-red-600 hover:bg-red-100 rounded-xl text-sm font-semibold transition-colors disabled:opacity-60"
                >
                    <i class="fas fa-times mr-1.5"></i>
                    Batalkan Booking
                </button>
                <Link
                    v-if="booking.status === 'approved'"
                    href="#pembayaran"
                    class="px-6 py-3 bg-blue-700 text-white hover:bg-blue-800 rounded-xl text-sm font-bold transition-colors"
                >
                    <i class="fas fa-credit-card mr-1.5"></i>
                    Lanjutkan Pembayaran
                </Link>
            </div>
        </div>
    </FrontendLayout>
</template>
