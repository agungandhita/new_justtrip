<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft, Star } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import type { Review } from '@/types'

const props = defineProps<{ review: Review }>()

const form = useForm({
    nama_reviewer: props.review.nama_reviewer,
    rating: props.review.rating,
    komentar: props.review.komentar,
    destinasi: props.review.destinasi ?? '',
    foto_reviewer: props.review.foto_reviewer ?? '',
    is_active: props.review.is_active,
    order_column: props.review.order_column ?? 0,
    _method: 'PUT',
})

const hoverRating = ref(0)
function submit() { form.post(`/admin/reviews/${props.review.id}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Edit Review</span></template>
        <PageHeader title="Edit Review" :breadcrumbs="[{ label: 'Review', href: '/admin/reviews' }, { label: 'Edit' }]">
            <a href="/admin/reviews" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-lg">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Edit Review</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Reviewer</label>
                    <input v-model="form.nama_reviewer" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Rating</label>
                    <div class="flex items-center gap-1">
                        <button v-for="i in 5" :key="i" type="button" @click="form.rating = i" @mouseenter="hoverRating = i" @mouseleave="hoverRating = 0">
                            <Star class="w-7 h-7 transition-colors" :class="i <= (hoverRating || form.rating) ? 'text-yellow-400 fill-yellow-400' : 'text-slate-200 fill-slate-200'" />
                        </button>
                        <span class="ml-2 text-sm text-slate-500">{{ form.rating }}/5</span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Komentar</label>
                    <textarea v-model="form.komentar" rows="4" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Destinasi</label>
                    <input v-model="form.destinasi" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">URL Foto Reviewer</label>
                    <input v-model="form.foto_reviewer" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input v-model="form.is_active" type="checkbox" class="rounded" />
                    <span class="text-sm text-slate-700">Tampilkan di halaman</span>
                </label>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </button>
                <a href="/admin/reviews" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>
    </AdminLayout>
</template>
