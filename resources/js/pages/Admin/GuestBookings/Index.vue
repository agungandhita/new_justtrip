<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Eye, Search, Filter, X } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import type { GuestBooking, PaginatedData } from '@/types'

const props = defineProps<{
    guestBookings: PaginatedData<GuestBooking>
    filters: { search?: string; status?: string; type?: string }
}>()

const search = ref(props.filters.search ?? '')
const status = ref(props.filters.status ?? '')
const type = ref(props.filters.type ?? '')

const statusOptions = [
    { value: '', label: 'Semua Status' },
    { value: 'baru', label: 'Baru' },
    { value: 'diproses', label: 'Diproses' },
    { value: 'dikonfirmasi', label: 'Dikonfirmasi' },
    { value: 'ditolak', label: 'Ditolak' },
    { value: 'selesai', label: 'Selesai' },
]

const statusColors: Record<string, string> = {
    baru: '#3b82f6',
    diproses: '#eab308',
    dikonfirmasi: '#22c55e',
    ditolak: '#ef4444',
    selesai: '#6b7280',
}

function applyFilters() {
    router.get('/admin/guest-bookings', { search: search.value, status: status.value, type: type.value }, { preserveState: true, replace: true })
}

function clearFilters() {
    search.value = ''; status.value = ''; type.value = ''
    router.get('/admin/guest-bookings', {}, { replace: true })
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm text-slate-500">Request Trip</span>
        </template>

        <PageHeader
            title="Request Trip"
            description="Kelola semua permintaan perjalanan dari tamu"
            :breadcrumbs="[{ label: 'Request Trip' }]"
        />

        <!-- Filters -->
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5 flex flex-wrap gap-3">
            <div class="relative flex-1 min-w-48">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input v-model="search" @keyup.enter="applyFilters" placeholder="Cari nama, email, no. booking..." class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500" />
            </div>
            <select v-model="status" @change="applyFilters" class="px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white">
                <option v-for="opt in statusOptions" :key="opt.value" :value="opt.value">{{ opt.label }}</option>
            </select>
            <select v-model="type" @change="applyFilters" class="px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white">
                <option value="">Semua Tipe</option>
                <option value="package">Paket</option>
                <option value="custom">Custom</option>
            </select>
            <button v-if="filters.search || filters.status || filters.type" @click="clearFilters" class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors flex items-center gap-2">
                <X class="w-4 h-4" /> Reset
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">No. Booking</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Pemohon</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Destinasi</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Peserta</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Tipe</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                            <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <tr v-for="gb in guestBookings.data" :key="gb.guest_booking_id" class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-4 py-3 font-mono text-xs text-slate-600">{{ gb.booking_number }}</td>
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-900 dark:text-white">{{ gb.nama_lengkap }}</p>
                                <p class="text-xs text-slate-400">{{ gb.email }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600 max-w-40 truncate">{{ gb.destinasi_dicari }}</td>
                            <td class="px-4 py-3 text-slate-600">{{ gb.jumlah_peserta }} orang</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 text-xs rounded-full" :class="gb.is_custom_request ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'">
                                    {{ gb.is_custom_request ? 'Custom' : 'Paket' }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <StatusBadge :label="gb.status_label" :color="statusColors[gb.status]" />
                            </td>
                            <td class="px-4 py-3 text-center">
                                <Link :href="`/admin/guest-bookings/${gb.guest_booking_id}`" class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors">
                                    <Eye class="w-3.5 h-3.5" /> Detail
                                </Link>
                            </td>
                        </tr>
                        <tr v-if="!guestBookings.data.length">
                            <td colspan="7" class="px-4 py-12 text-center text-slate-400">Tidak ada data request trip</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="guestBookings.meta" :links="guestBookings.links" />
            </div>
        </div>
    </AdminLayout>
</template>
