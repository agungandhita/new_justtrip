<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { SpecialOffer, PaginatedData } from '@/types'

const props = defineProps<{
    offers: PaginatedData<SpecialOffer>
    filters: { search?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/special-offers', { search: search.value }, { preserveState: true, replace: true })
}

function confirmDelete(id: string) {
    deletingId.value = id
    confirmDialog.value?.open()
}

function handleDelete() {
    if (deletingId.value) router.delete(`/admin/special-offers/${deletingId.value}`)
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Special Offer</span></template>

        <PageHeader title="Special Offer" description="Kelola promo dan penawaran spesial" :breadcrumbs="[{ label: 'Special Offer' }]">
            <Link href="/admin/special-offers/buat" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                <Plus class="w-4 h-4" /> Tambah Promo
            </Link>
        </PageHeader>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5">
            <div class="relative max-w-xs">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input v-model="search" @keyup.enter="applySearch" placeholder="Cari offer..." class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" />
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 border-b border-slate-200">
                        <tr>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Judul</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Harga Asli</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Harga Promo</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Diskon</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Berlaku s/d</th>
                            <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                            <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <tr v-for="offer in offers.data" :key="offer.id" class="hover:bg-slate-50 transition-colors">
                            <td class="px-4 py-3">
                                <p class="font-medium text-slate-900">{{ offer.title }}</p>
                                <p v-if="offer.layanan" class="text-xs text-slate-400">{{ offer.layanan.nama_layanan }}</p>
                            </td>
                            <td class="px-4 py-3 text-slate-500 line-through">{{ offer.formatted_original_price }}</td>
                            <td class="px-4 py-3 font-semibold text-green-700">{{ offer.formatted_price }}</td>
                            <td class="px-4 py-3">
                                <span class="px-2 py-0.5 text-xs font-bold bg-red-100 text-red-700 rounded-full">{{ offer.discount_percentage }}%</span>
                            </td>
                            <td class="px-4 py-3 text-slate-500">{{ offer.valid_until }}</td>
                            <td class="px-4 py-3">
                                <StatusBadge :label="offer.is_active ? 'Aktif' : 'Non-aktif'" :color="offer.is_active ? '#22c55e' : '#6b7280'" />
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center justify-center gap-1">
                                    <Link :href="`/admin/special-offers/${offer.id}/edit`" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                        <Edit class="w-4 h-4" />
                                    </Link>
                                    <button @click="confirmDelete(offer.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors">
                                        <Trash2 class="w-4 h-4" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr v-if="!offers.data.length">
                            <td colspan="7" class="px-4 py-12 text-center text-slate-400">Belum ada promo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="offers.meta" :links="offers.links" />
            </div>
        </div>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
