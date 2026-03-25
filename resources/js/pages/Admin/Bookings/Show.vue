<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ArrowLeft, CheckCircle, XCircle, Flag, RotateCcw } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import type { Booking } from '@/types'

const props = defineProps<{ booking: Booking }>()

const rejectForm = useForm({ rejection_reason: '' })
const approveForm = useForm({ admin_notes: '' })
const showRejectForm = ref(false)
const showApproveForm = ref(false)

const statusColors: Record<string, string> = {
    pending: '#eab308',
    approved: '#3b82f6',
    completed: '#22c55e',
    rejected: '#ef4444',
    cancelled: '#6b7280',
}

function approve() {
    approveForm.post(`/admin/bookings/${props.booking.booking_id}/approve`, {
        onSuccess: () => { showApproveForm.value = false; approveForm.reset() },
    })
}

function reject() {
    rejectForm.post(`/admin/bookings/${props.booking.booking_id}/reject`, {
        onSuccess: () => { showRejectForm.value = false; rejectForm.reset() },
    })
}

function complete() {
    router.post(`/admin/bookings/${props.booking.booking_id}/complete`)
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm text-slate-500">Detail Booking</span>
        </template>

        <PageHeader
            title="Detail Booking"
            :breadcrumbs="[{ label: 'Bookings', href: '/admin/bookings' }, { label: booking.booking_number }]"
        >
            <a href="/admin/bookings" class="flex items-center gap-2 text-sm text-slate-600 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg transition-colors">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main info -->
            <div class="lg:col-span-2 space-y-5">
                <!-- Booking Card -->
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <div class="flex items-start justify-between mb-5">
                        <div>
                            <p class="text-xs text-slate-400 font-mono mb-1">Nomor Booking</p>
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white">{{ booking.booking_number }}</h2>
                        </div>
                        <StatusBadge :label="booking.status_label" :color="statusColors[booking.status]" />
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="text-slate-400 mb-0.5">Paket Wisata</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.layanan?.nama_layanan ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Tanggal Keberangkatan</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.formatted_tanggal_keberangkatan }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Jumlah Peserta</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.jumlah_peserta }} orang</p>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Dibuat</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.created_at }}</p>
                        </div>
                    </div>

                    <div v-if="booking.catatan_khusus" class="mt-4 p-3 bg-slate-50 dark:bg-slate-800 rounded-lg">
                        <p class="text-xs text-slate-400 mb-1">Catatan Khusus</p>
                        <p class="text-sm text-slate-700 dark:text-slate-300">{{ booking.catatan_khusus }}</p>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-4">Ringkasan Pembayaran</h3>
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-slate-500">Harga Asli</span>
                            <span>Rp {{ Number(booking.original_amount).toLocaleString('id-ID') }}</span>
                        </div>
                        <div v-if="Number(booking.discount_amount) > 0" class="flex justify-between text-green-600">
                            <span>Diskon</span>
                            <span>- Rp {{ Number(booking.discount_amount).toLocaleString('id-ID') }}</span>
                        </div>
                        <div class="flex justify-between font-bold text-base pt-3 border-t border-slate-200">
                            <span class="text-slate-900 dark:text-white">Total</span>
                            <span class="text-blue-600">{{ booking.formatted_total_amount }}</span>
                        </div>
                    </div>
                </div>

                <!-- Admin Notes -->
                <div v-if="booking.admin_notes || booking.rejection_reason" class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-3">Catatan Admin</h3>
                    <div v-if="booking.admin_notes" class="p-3 bg-blue-50 rounded-lg text-sm text-blue-800">
                        {{ booking.admin_notes }}
                    </div>
                    <div v-if="booking.rejection_reason" class="p-3 bg-red-50 rounded-lg text-sm text-red-800 mt-2">
                        <strong>Alasan Penolakan:</strong> {{ booking.rejection_reason }}
                    </div>
                </div>
            </div>

            <!-- Sidebar: customer + actions -->
            <div class="space-y-5">
                <!-- Customer Info -->
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-4">Data Pelanggan</h3>
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="text-slate-400 mb-0.5">Nama</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.customer_info?.name }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Email</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.customer_info?.email }}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Telepon</p>
                            <a
                                :href="`https://wa.me/${booking.customer_info?.phone?.replace(/\D/g, '')}`"
                                target="_blank"
                                class="font-medium text-green-600 hover:text-green-700"
                            >
                                {{ booking.customer_info?.phone }}
                            </a>
                        </div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Alamat</p>
                            <p class="font-medium text-slate-900 dark:text-white">{{ booking.customer_info?.address }}</p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div v-if="booking.status === 'pending' || booking.status === 'approved'" class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 dark:text-white mb-4">Tindakan</h3>
                    <div class="space-y-3">
                        <!-- Approve -->
                        <div v-if="booking.status === 'pending'">
                            <div v-if="!showApproveForm">
                                <button
                                    @click="showApproveForm = true"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors"
                                >
                                    <CheckCircle class="w-4 h-4" /> Setujui Booking
                                </button>
                            </div>
                            <div v-else class="space-y-2">
                                <textarea
                                    v-model="approveForm.admin_notes"
                                    rows="2"
                                    placeholder="Catatan untuk pelanggan (opsional)"
                                    class="w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500/30 focus:border-green-500"
                                />
                                <div class="flex gap-2">
                                    <button @click="approve" :disabled="approveForm.processing" class="flex-1 px-3 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors disabled:opacity-50">
                                        Konfirmasi
                                    </button>
                                    <button @click="showApproveForm = false" class="px-3 py-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</button>
                                </div>
                            </div>
                        </div>

                        <!-- Complete -->
                        <button
                            v-if="booking.status === 'approved'"
                            @click="complete"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors"
                        >
                            <Flag class="w-4 h-4" /> Tandai Selesai
                        </button>

                        <!-- Reject -->
                        <div v-if="booking.status === 'pending'">
                            <div v-if="!showRejectForm">
                                <button
                                    @click="showRejectForm = true"
                                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors"
                                >
                                    <XCircle class="w-4 h-4" /> Tolak Booking
                                </button>
                            </div>
                            <div v-else class="space-y-2">
                                <textarea
                                    v-model="rejectForm.rejection_reason"
                                    rows="2"
                                    placeholder="Alasan penolakan (wajib)"
                                    required
                                    class="w-full text-sm border border-red-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500/30 focus:border-red-500"
                                />
                                <p v-if="rejectForm.errors.rejection_reason" class="text-xs text-red-600">{{ rejectForm.errors.rejection_reason }}</p>
                                <div class="flex gap-2">
                                    <button @click="reject" :disabled="rejectForm.processing" class="flex-1 px-3 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors disabled:opacity-50">
                                        Konfirmasi
                                    </button>
                                    <button @click="showRejectForm = false" class="px-3 py-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
