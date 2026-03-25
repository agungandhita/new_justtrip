<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Eye, Search, Filter, X } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import type { Booking, PaginatedData } from '@/types'

const props = defineProps<{
    bookings: PaginatedData<Booking>
    filters: { search?: string; status?: string; date_from?: string; date_to?: string }
}>()

const search = ref(props.filters.search ?? '')
const status = ref(props.filters.status ?? '')

const statusOptions = [
    { value: '', label: 'Semua Status' },
    { value: 'pending', label: 'Pending' },
    { value: 'approved', label: 'Disetujui' },
    { value: 'rejected', label: 'Ditolak' },
    { value: 'completed', label: 'Selesai' },
    { value: 'cancelled', label: 'Dibatalkan' },
]

const statusColors: Record<string, string> = {
    pending: '#eab308',
    approved: '#3b82f6',
    completed: '#22c55e',
    rejected: '#ef4444',
    cancelled: '#6b7280',
}

function applyFilters() {
    router.get('/admin/bookings', { search: search.value, status: status.value }, { preserveState: true, replace: true })
}

function clearFilters() {
    search.value = ''
    status.value = ''
    router.get('/admin/bookings', {}, { replace: true })
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm text-slate-500">Booking Reguler</span>
        </template>

        <PageHeader
            title="Booking Reguler"
            description="Kelola semua pesanan dari pengguna yang sudah login"
            :breadcrumbs="[{ label: 'Booking' }]"
        />

        <!-- Filters -->
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5 flex flex-wrap gap-3">
            <div class="relative flex-1 min-w-48">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input
                    v-model="search"
                    @keyup.enter="applyFilters"
                    placeholder="Cari no. booking atau nama..."
                    class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500"
                />
            </div>
            <select
                v-model="status"
                @change="applyFilters"
                class="px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500 bg-white"
            >
                <option v-for="opt in statusOptions" :key="opt.value" :value="opt.value">{{ opt.label }}</option>
            </select>
            <button
                @click="applyFilters"
                class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors flex items-center gap-2"
            >
                <Filter class="w-4 h-4" /> Filter
            </button>
            <button
                v-if="filters.search || filters.status"
                @click="clearFilters"
                class="px-4 py-2 text-sm font-medium text-slate-600 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors flex items-center gap-2"
            >
                <X class="w-4 h-4" /> Reset
            </button>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">No. Booking</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Pelanggan</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Paket</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Tgl. Berangkat</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Total</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Status</th>
                            <th class="text-center px-4 py-3 font-semibold text-slate-600 dark:text-slate-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <tr
                            v-for="booking in bookings.data"
                            :key="booking.booking_id"
                            class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                        >
                            <td class="px-4 py-3 font-mono text-xs text-slate-600">{{ booking.booking_number }}</td>
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-900 dark:text-white">{{ booking.customer_info?.name }}</p>
                                <p class="text-xs text-slate-400">{{ booking.customer_info?.email }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-300 max-w-40 truncate">
                                {{ booking.layanan?.nama_layanan ?? '-' }}
                            </td>
                            <td class="px-4 py-3 text-slate-600 dark:text-slate-300 whitespace-nowrap">
                                {{ booking.formatted_tanggal_keberangkatan }}
                            </td>
                            <td class="px-4 py-3 font-semibold text-slate-900 dark:text-white whitespace-nowrap">
                                {{ booking.formatted_total_amount }}
                            </td>
                            <td class="px-4 py-3">
                                <StatusBadge :label="booking.status_label" :color="statusColors[booking.status]" />
                            </td>
                            <td class="px-4 py-3 text-center">
                                <Link
                                    :href="`/admin/bookings/${booking.booking_id}`"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors"
                                >
                                    <Eye class="w-3.5 h-3.5" /> Detail
                                </Link>
                            </td>
                        </tr>
                        <tr v-if="!bookings.data.length">
                            <td colspan="7" class="px-4 py-12 text-center text-slate-400">
                                Tidak ada data booking
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100 dark:border-slate-800">
                <Pagination :meta="bookings.meta" :links="bookings.links" />
            </div>
        </div>
    </AdminLayout>
</template>
