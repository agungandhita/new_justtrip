<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ArrowLeft, Plus, X } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import type { Gallery } from '@/types'

const props = defineProps<{ gallery: Gallery }>()

const form = useForm({
    judul: props.gallery.judul,
    lokasi_tujuan: props.gallery.lokasi_tujuan,
    deskripsi: props.gallery.deskripsi ?? '',
    tanggal_trip: props.gallery.tanggal_trip ?? '',
    kategori: props.gallery.kategori ?? '',
    cover_image: props.gallery.cover_image ?? '',
    is_active: props.gallery.is_active,
    images: [...(props.gallery.images ?? [])] as string[],
    _method: 'PUT',
})

const newImageUrl = ref('')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingImageUrl = ref('')

function addImage() {
    if (newImageUrl.value.trim()) {
        form.images.push(newImageUrl.value.trim())
        newImageUrl.value = ''
    }
}

function removeImage(idx: number) {
    form.images.splice(idx, 1)
}

function confirmDeleteImage(url: string) {
    deletingImageUrl.value = url
    confirmDialog.value?.open()
}

function handleDeleteImage() {
    router.post(`/admin/galleries/${props.gallery.id}/delete-image`, { image_url: deletingImageUrl.value }, { preserveScroll: true })
}

function submit() { form.post(`/admin/galleries/${props.gallery.id}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Edit Album</span></template>
        <PageHeader title="Edit Album Galeri" :breadcrumbs="[{ label: 'Galeri', href: '/admin/galleries' }, { label: 'Edit' }]">
            <a href="/admin/galleries" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-2xl">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Informasi Album</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Judul Album</label>
                    <input v-model="form.judul" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Lokasi</label>
                        <input v-model="form.lokasi_tujuan" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Kategori</label>
                        <input v-model="form.kategori" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Trip</label>
                        <input v-model="form.tanggal_trip" type="date" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">URL Cover</label>
                        <input v-model="form.cover_image" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    </div>
                </div>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input v-model="form.is_active" type="checkbox" class="rounded" />
                    <span class="text-sm text-slate-700">Tampilkan di halaman galeri</span>
                </label>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100 mb-4">Foto Album</h3>
                <div class="flex gap-2 mb-4">
                    <input v-model="newImageUrl" type="text" placeholder="Masukkan URL foto..." @keyup.enter="addImage" class="flex-1 px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    <button type="button" @click="addImage" class="flex items-center gap-2 px-4 py-2 text-sm font-medium bg-slate-700 text-white rounded-lg">
                        <Plus class="w-4 h-4" /> Tambah
                    </button>
                </div>
                <div v-if="form.images.length" class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                    <div v-for="(img, idx) in form.images" :key="idx" class="relative group">
                        <img :src="img" class="w-full aspect-square object-cover rounded-lg" />
                        <button type="button" @click="removeImage(idx)" class="absolute top-1.5 right-1.5 w-6 h-6 bg-red-600 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <X class="w-3.5 h-3.5" />
                        </button>
                    </div>
                </div>
                <p v-else class="text-sm text-slate-400 text-center py-6">Belum ada foto</p>
            </div>

            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </button>
                <a href="/admin/galleries" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>

        <ConfirmDialog ref="confirmDialog" message="Foto ini akan dihapus secara permanen." @confirm="handleDeleteImage" />
    </AdminLayout>
</template>
