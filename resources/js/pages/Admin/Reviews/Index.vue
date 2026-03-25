<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Star } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { Review, PaginatedData } from '@/types'

const props = defineProps<{
    reviews: PaginatedData<Review>
    filters: { search?: string }
}>()

const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/reviews/${deletingId.value}`) }
function toggleActive(id: string) { router.post(`/admin/reviews/${id}/toggle-active`, {}, { preserveScroll: true }) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Review</span></template>
        <PageHeader title="Review Pelanggan" description="Kelola testimoni dan ulasan pelanggan" :breadcrumbs="[{ label: 'Review' }]">
            <Link href="/admin/reviews/buat" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                <Plus class="w-4 h-4" /> Tambah Review
            </Link>
        </PageHeader>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Reviewer</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Rating</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Komentar</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Destinasi</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                        <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="review in reviews.data" :key="review.id" class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div v-if="review.foto_reviewer" class="w-9 h-9 rounded-full overflow-hidden flex-shrink-0">
                                    <img :src="review.foto_reviewer" class="w-full h-full object-cover" />
                                </div>
                                <div v-else class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-sm flex-shrink-0">
                                    {{ review.nama_reviewer?.charAt(0).toUpperCase() }}
                                </div>
                                <p class="font-medium text-slate-900">{{ review.nama_reviewer }}</p>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-0.5">
                                <Star v-for="i in 5" :key="i" class="w-4 h-4" :class="i <= review.rating ? 'text-yellow-400 fill-yellow-400' : 'text-slate-200 fill-slate-200'" />
                            </div>
                        </td>
                        <td class="px-4 py-3 max-w-xs">
                            <p class="text-slate-600 text-xs truncate">{{ review.komentar }}</p>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">{{ review.destinasi ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-xs rounded-full" :class="review.is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500'">
                                {{ review.is_active ? 'Tampil' : 'Tersembunyi' }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="toggleActive(review.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Toggle tampil">
                                    <ToggleRight v-if="review.is_active" class="w-4 h-4 text-green-500" />
                                    <ToggleLeft v-else class="w-4 h-4" />
                                </button>
                                <Link :href="`/admin/reviews/${review.id}/edit`" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                    <Edit class="w-4 h-4" />
                                </Link>
                                <button @click="confirmDelete(review.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors">
                                    <Trash2 class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="!reviews.data.length">
                        <td colspan="6" class="px-4 py-12 text-center text-slate-400">Belum ada review</td>
                    </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="reviews.meta" :links="reviews.links" />
            </div>
        </div>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
