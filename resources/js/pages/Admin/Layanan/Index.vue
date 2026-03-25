<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { Layanan, PaginatedData } from '@/types'

const props = defineProps<{
    layananList: PaginatedData<Layanan>
    filters: { search?: string; status?: string; jenis_layanan?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

const jenisColors: Record<string, string> = {
    open_trip: '#3b82f6',
    private_trip: '#7c3aed',
    request_trip: '#ea580c',
}

const jenisLabels: Record<string, string> = {
    open_trip: 'Open Trip',
    private_trip: 'Private Trip',
    request_trip: 'Request Trip',
}

const statusColors: Record<string, string> = {
    aktif: '#22c55e',
    nonaktif: '#6b7280',
}

function applySearch() {
    router.get('/admin/layanan', { search: search.value }, { preserveState: true, replace: true })
}

function confirmDelete(id: string) {
    deletingId.value = id
    confirmDialog.value?.open()
}

function handleDelete() {
    if (deletingId.value) {
        router.delete(`/admin/layanan/${deletingId.value}`)
    }
}

function toggleStatus(id: string) {
    router.post(`/admin/layanan/${id}/toggle-status`, {}, { preserveScroll: true })
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Layanan / Paket</span></template>

        <PageHeader title="Daftar Layanan Trip" description="Kelola semua paket wisata, harga, jadwal, dan Itinerary" :breadcrumbs="[{ label: 'Layanan' }]" />

        <!-- Top Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div class="relative max-w-sm w-full">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 dark:text-slate-500" />
                <input v-model="search" @keyup.enter="applySearch" placeholder="Cari layanan wisata..." class="w-full pl-9 pr-4 py-2.5 text-sm bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 text-slate-900 dark:text-white placeholder:text-slate-400 shadow-sm" />
            </div>
            <Link href="/admin/layanan/buat" class="flex items-center justify-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors shadow-sm shadow-blue-500/20">
                <Plus class="w-4 h-4" /> Buat Layanan Baru
            </Link>
        </div>

        <!-- Table -->
        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Nama Layanan</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Jenis</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Wilayah</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Harga Mulai</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                            <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800">
                        <tr v-for="layanan in layananList.data" :key="layanan.layanan_id" class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    <img v-if="layanan.gambar_utama" :src="layanan.gambar_utama" class="w-10 h-10 rounded-lg object-cover flex-shrink-0" />
                                    <div v-else class="w-10 h-10 rounded-lg bg-slate-100 flex-shrink-0" />
                                    <div>
                                        <p class="font-medium text-slate-900 dark:text-white">{{ layanan.nama_layanan }}</p>
                                        <p class="text-xs text-slate-400">{{ layanan.lokasi_tujuan }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <StatusBadge :label="jenisLabels[layanan.jenis_layanan]" :color="jenisColors[layanan.jenis_layanan]" />
                            </td>
                            <td class="px-4 py-3 text-slate-500 capitalize">{{ layanan.wilayah ?? '-' }}</td>
                            <td class="px-4 py-3 font-medium text-slate-900 dark:text-white">{{ layanan.harga_format }}</td>
                            <td class="px-4 py-3">
                                <StatusBadge :label="layanan.status === 'aktif' ? 'Aktif' : 'Non-aktif'" :color="statusColors[layanan.status]" />
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Toggle Status Button -->
                                    <button @click="toggleStatus(layanan.layanan_id)" class="px-2.5 py-1.5 text-xs font-semibold rounded-lg flex items-center gap-1.5 transition-colors" :class="layanan.status === 'aktif' ? 'bg-emerald-50 text-emerald-600 hover:bg-emerald-100 dark:bg-emerald-900/30 dark:text-emerald-400' : 'bg-slate-100 text-slate-500 hover:bg-slate-200 dark:bg-slate-800 dark:text-slate-400'">
                                        <ToggleRight v-if="layanan.status === 'aktif'" class="w-4 h-4" />
                                        <ToggleLeft v-else class="w-4 h-4" />
                                        {{ layanan.status === 'aktif' ? 'Aktif' : 'Non-aktif' }}
                                    </button>

                                    <!-- Edit Button -->
                                    <Link :href="`/admin/layanan/${layanan.layanan_id}/edit`" class="p-2 bg-blue-50 text-blue-600 hover:bg-blue-100 dark:bg-blue-900/30 dark:text-blue-400 rounded-lg transition-colors" title="Edit Layanan">
                                        <Edit class="w-4 h-4" />
                                    </Link>

                                    <!-- Delete Button -->
                                    <button @click="confirmDelete(layanan.layanan_id)" class="p-2 bg-rose-50 text-rose-600 hover:bg-rose-100 dark:bg-rose-900/30 dark:text-rose-400 rounded-lg transition-colors" title="Hapus Layanan">
                                        <Trash2 class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!layananList.data.length">
                            <td colspan="6" class="px-4 py-16 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <div class="w-16 h-16 bg-slate-50 dark:bg-slate-800 rounded-full flex items-center justify-center mb-4">
                                        <Search class="w-8 h-8 text-slate-300 dark:text-slate-600" />
                                    </div>
                                    <p class="text-slate-900 dark:text-white font-medium mb-1">Belum ada layanan wisata</p>
                                    <p class="text-sm text-slate-500">Mulai tambahkan layanan trip untuk dilihat pelanggan.</p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="layananList.meta" :links="layananList.links" />
            </div>
        </div>

        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
