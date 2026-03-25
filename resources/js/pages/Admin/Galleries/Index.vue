<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, Search, Image } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { Gallery, PaginatedData } from '@/types'

const props = defineProps<{
    galleries: PaginatedData<Gallery>
    filters: { search?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/galleries', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/galleries/${deletingId.value}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Galeri</span></template>
        <PageHeader title="Galeri Foto" description="Kelola koleksi foto perjalanan" :breadcrumbs="[{ label: 'Galeri' }]">
            <Link href="/admin/galleries/buat" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                <Plus class="w-4 h-4" /> Tambah Album
            </Link>
        </PageHeader>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5">
            <div class="relative max-w-xs">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input v-model="search" @keyup.enter="applySearch" placeholder="Cari galeri..." class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Album</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Lokasi</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Foto</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Kategori</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                        <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="gallery in galleries.data" :key="gallery.id" class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-14 h-10 rounded-lg overflow-hidden flex-shrink-0 bg-slate-100">
                                    <img v-if="gallery.cover_image" :src="gallery.cover_image" class="w-full h-full object-cover" />
                                    <div v-else class="w-full h-full flex items-center justify-center">
                                        <Image class="w-5 h-5 text-slate-300" />
                                    </div>
                                </div>
                                <p class="font-medium text-slate-900 max-w-xs truncate">{{ gallery.judul }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-500">{{ gallery.lokasi_tujuan }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-0.5 text-xs bg-slate-100 text-slate-600 rounded-full">{{ gallery.images?.length ?? 0 }} foto</span>
                        </td>
                        <td class="px-4 py-3 text-slate-500">{{ gallery.kategori ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-xs rounded-full" :class="gallery.is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500'">
                                {{ gallery.is_active ? 'Tampil' : 'Tersembunyi' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <Link :href="`/admin/galleries/${gallery.id}/edit`" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                    <Edit class="w-4 h-4" />
                                </Link>
                                <button @click="confirmDelete(gallery.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors">
                                    <Trash2 class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="!galleries.data.length">
                        <td colspan="6" class="px-4 py-12 text-center text-slate-400">Belum ada galeri</td>
                    </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="galleries.meta" :links="galleries.links" />
            </div>
        </div>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
