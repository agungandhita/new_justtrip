<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import type { Layanan } from '@/types'

defineProps<{ layananList: Layanan[] }>()

const form = useForm({
    layanan_id: '',
    title: '',
    description: '',
    original_price: '',
    discounted_price: '',
    discount_percentage: '',
    valid_from: '',
    valid_until: '',
    is_active: true,
    is_featured: false,
    terms_conditions: '',
})

function submit() {
    form.post('/admin/special-offers')
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Tambah Promo</span></template>

        <PageHeader title="Tambah Special Offer" :breadcrumbs="[{ label: 'Special Offer', href: '/admin/special-offers' }, { label: 'Tambah' }]">
            <a href="/admin/special-offers" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg transition-colors">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-2xl">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Informasi Promo</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Paket Terkait (opsional)</label>
                    <select v-model="form.layanan_id" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none bg-white">
                        <option value="">-- Tidak terkait paket --</option>
                        <option v-for="l in layananList" :key="l.layanan_id" :value="l.layanan_id">{{ l.nama_layanan }}</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul Promo <span class="text-red-500">*</span></label>
                    <input v-model="form.title" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" :class="form.errors.title ? 'border-red-400' : ''" />
                    <p v-if="form.errors.title" class="text-xs text-red-500 mt-1">{{ form.errors.title }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Deskripsi</label>
                    <textarea v-model="form.description" rows="3" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Harga Asli (Rp)</label>
                        <input v-model="form.original_price" type="number" min="0" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Harga Promo (Rp)</label>
                        <input v-model="form.discounted_price" type="number" min="0" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Diskon (%)</label>
                        <input v-model="form.discount_percentage" type="number" min="0" max="100" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Berlaku Mulai</label>
                        <input v-model="form.valid_from" type="date" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Berlaku Sampai</label>
                        <input v-model="form.valid_until" type="date" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input v-model="form.is_active" type="checkbox" class="rounded" />
                        <span class="text-sm text-slate-700">Aktif</span>
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input v-model="form.is_featured" type="checkbox" class="rounded" />
                        <span class="text-sm text-slate-700">Featured</span>
                    </label>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Promo' }}
                </button>
                <a href="/admin/special-offers" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>
    </AdminLayout>
</template>
