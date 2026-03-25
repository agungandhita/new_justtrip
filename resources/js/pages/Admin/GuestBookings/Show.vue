<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import type { GuestBooking } from '@/types'

const props = defineProps<{ guestBooking: GuestBooking }>()

const statusForm = useForm({ status: props.guestBooking.status, admin_notes: props.guestBooking.admin_notes ?? '' })

function updateStatus() {
    statusForm.post(`/admin/guest-bookings/${props.guestBooking.guest_booking_id}/status`)
}

const statusOptions = [
    { value: 'baru', label: 'Baru' },
    { value: 'diproses', label: 'Diproses' },
    { value: 'dikonfirmasi', label: 'Dikonfirmasi' },
    { value: 'ditolak', label: 'Ditolak' },
    { value: 'selesai', label: 'Selesai' },
]

const statusColors: Record<string, string> = {
    baru: '#3b82f6', diproses: '#eab308', dikonfirmasi: '#22c55e', ditolak: '#ef4444', selesai: '#6b7280',
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Detail Request Trip</span></template>

        <PageHeader
            title="Detail Request Trip"
            :breadcrumbs="[{ label: 'Request Trip', href: '/admin/guest-bookings' }, { label: guestBooking.booking_number }]"
        >
            <a href="/admin/guest-bookings" class="flex items-center gap-2 text-sm text-slate-600 hover:text-slate-800 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg transition-colors">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main -->
            <div class="lg:col-span-2 space-y-5">
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <p class="text-xs text-slate-400 font-mono mb-1">Nomor Request</p>
                            <h2 class="text-xl font-bold text-slate-900">{{ guestBooking.booking_number }}</h2>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="px-2 py-0.5 text-xs rounded-full" :class="guestBooking.is_custom_request ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'">
                                {{ guestBooking.is_custom_request ? 'Custom Request' : 'Paket' }}
                            </span>
                            <StatusBadge :label="guestBooking.status_label" :color="statusColors[guestBooking.status]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div><p class="text-slate-400 mb-0.5">Destinasi</p><p class="font-medium">{{ guestBooking.destinasi_dicari }}</p></div>
                        <div><p class="text-slate-400 mb-0.5">Jumlah Peserta</p><p class="font-medium">{{ guestBooking.jumlah_peserta }} orang</p></div>
                        <div><p class="text-slate-400 mb-0.5">Tanggal Diinginkan</p><p class="font-medium">{{ guestBooking.tanggal_keberangkatan_diinginkan }}</p></div>
                        <div><p class="text-slate-400 mb-0.5">Budget Estimasi</p><p class="font-medium">{{ guestBooking.formatted_budget }}</p></div>
                    </div>

                    <div v-if="guestBooking.catatan_tambahan" class="mt-4 p-3 bg-slate-50 rounded-lg">
                        <p class="text-xs text-slate-400 mb-1">Catatan Tambahan</p>
                        <p class="text-sm text-slate-700">{{ guestBooking.catatan_tambahan }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-5">
                <!-- Pemohon -->
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 mb-4">Data Pemohon</h3>
                    <div class="space-y-3 text-sm">
                        <div><p class="text-slate-400 mb-0.5">Nama</p><p class="font-medium">{{ guestBooking.nama_lengkap }}</p></div>
                        <div><p class="text-slate-400 mb-0.5">Email</p><p class="font-medium">{{ guestBooking.email }}</p></div>
                        <div>
                            <p class="text-slate-400 mb-0.5">Telepon</p>
                            <a :href="`https://wa.me/${guestBooking.nomor_telepon?.replace(/\D/g, '')}`" target="_blank" class="font-medium text-green-600 hover:text-green-700">{{ guestBooking.nomor_telepon }}</a>
                        </div>
                        <div><p class="text-slate-400 mb-0.5">Kota/Provinsi</p><p class="font-medium">{{ guestBooking.kota }}, {{ guestBooking.provinsi }}</p></div>
                    </div>
                </div>

                <!-- Update Status -->
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                    <h3 class="font-semibold text-slate-900 mb-4">Update Status</h3>
                    <form @submit.prevent="updateStatus" class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-slate-500 mb-1">Status</label>
                            <select v-model="statusForm.status" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white">
                                <option v-for="opt in statusOptions" :key="opt.value" :value="opt.value">{{ opt.label }}</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-slate-500 mb-1">Catatan Admin</label>
                            <textarea v-model="statusForm.admin_notes" rows="3" placeholder="Tambahkan catatan..." class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" />
                        </div>
                        <button type="submit" :disabled="statusForm.processing" class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors disabled:opacity-50">
                            Simpan Status
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
