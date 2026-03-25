<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { News, PaginatedData } from '@/types'

const props = defineProps<{
    newsList: PaginatedData<News>
    filters: { search?: string; is_published?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/news', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/news/${deletingId.value}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Artikel</span></template>
        <PageHeader title="Artikel / Berita" description="Kelola konten artikel dan berita" :breadcrumbs="[{ label: 'Artikel' }]">
            <Link href="/admin/news/buat" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                <Plus class="w-4 h-4" /> Tulis Artikel
            </Link>
        </PageHeader>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5">
            <div class="relative max-w-xs">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input v-model="search" @keyup.enter="applySearch" placeholder="Cari artikel..." class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" />
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Judul</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Kategori</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Tgl. Terbit</th>
                        <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="news in newsList.data" :key="news.id" class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3">
                            <p class="font-medium text-slate-900 max-w-xs truncate">{{ news.judul }}</p>
                            <p v-if="news.ringkasan" class="text-xs text-slate-400 max-w-xs truncate">{{ news.ringkasan }}</p>
                        </td>
                        <td class="px-4 py-3 text-slate-500">{{ news.kategori ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-xs rounded-full" :class="news.is_published ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-600'">
                                {{ news.is_published ? 'Terbit' : 'Draft' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">{{ news.published_at ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <Link :href="`/admin/news/${news.id}/edit`" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                    <Edit class="w-4 h-4" />
                                </Link>
                                <button @click="confirmDelete(news.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors">
                                    <Trash2 class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="!newsList.data.length">
                        <td colspan="5" class="px-4 py-12 text-center text-slate-400">Belum ada artikel</td>
                    </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="newsList.meta" :links="newsList.links" />
            </div>
        </div>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
