<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'

const form = useForm({
    judul: '',
    ringkasan: '',
    konten: '',
    kategori: '',
    is_published: false,
    gambar_utama: '',
})

function submit() {
    form.post('/admin/news')
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Tulis Artikel</span></template>
        <PageHeader title="Tulis Artikel" :breadcrumbs="[{ label: 'Artikel', href: '/admin/news' }, { label: 'Tulis' }]">
            <a href="/admin/news" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-3xl">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Informasi Artikel</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul <span class="text-red-500">*</span></label>
                    <input v-model="form.judul" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" :class="form.errors.judul ? 'border-red-400' : ''" />
                    <p v-if="form.errors.judul" class="text-xs text-red-500 mt-1">{{ form.errors.judul }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
                        <input v-model="form.kategori" type="text" placeholder="e.g. Travel Tips" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">URL Gambar Utama</label>
                        <input v-model="form.gambar_utama" type="text" placeholder="https://..." class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Ringkasan</label>
                    <textarea v-model="form.ringkasan" rows="2" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Konten <span class="text-red-500">*</span></label>
                    <textarea v-model="form.konten" rows="12" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none font-mono" :class="form.errors.konten ? 'border-red-400' : ''" />
                    <p v-if="form.errors.konten" class="text-xs text-red-500 mt-1">{{ form.errors.konten }}</p>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input v-model="form.is_published" type="checkbox" class="rounded" />
                    <span class="text-sm text-slate-700">Langsung terbitkan</span>
                </label>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : (form.is_published ? 'Terbitkan' : 'Simpan Draft') }}
                </button>
                <a href="/admin/news" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>
    </AdminLayout>
</template>
