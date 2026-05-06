<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ArrowLeft, Plus, X } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { Checkbox } from '@/components/ui/checkbox'
import { Separator } from '@/components/ui/separator'
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
function removeImage(idx: number) { form.images.splice(idx, 1) }
function confirmDeleteImage(url: string) { deletingImageUrl.value = url; confirmDialog.value?.open() }
function handleDeleteImage() {
    router.post(`/admin/galleries/${props.gallery.id}/delete-image`, { image_url: deletingImageUrl.value }, { preserveScroll: true })
}
function submit() { form.post(`/admin/galleries/${props.gallery.id}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Edit Album</span></template>

        <PageHeader title="Edit Album Galeri" :breadcrumbs="[{ label: 'Galeri', href: '/admin/galleries' }, { label: 'Edit' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/galleries"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-2xl space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Informasi Album</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Judul Album</Label>
                        <Input v-model="form.judul" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Lokasi</Label>
                            <Input v-model="form.lokasi_tujuan" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>Kategori</Label>
                            <Input v-model="form.kategori" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Tanggal Trip</Label>
                            <Input v-model="form.tanggal_trip" type="date" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>URL Cover</Label>
                            <Input v-model="form.cover_image" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Deskripsi</Label>
                        <Textarea v-model="form.deskripsi" rows="3" />
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <Checkbox id="is_active" v-model:checked="form.is_active" />
                        <Label for="is_active" class="cursor-pointer font-normal">Tampilkan di halaman galeri</Label>
                    </div>
                </CardContent>
            </Card>

            <!-- Foto Album -->
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Foto Album</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="flex gap-2">
                        <Input v-model="newImageUrl" placeholder="Masukkan URL foto..." @keyup.enter="addImage" class="flex-1" />
                        <Button type="button" variant="outline" @click="addImage" class="gap-2 flex-shrink-0">
                            <Plus class="w-4 h-4" /> Tambah
                        </Button>
                    </div>
                    <div v-if="form.images.length" class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                        <div v-for="(img, idx) in form.images" :key="idx" class="relative group">
                            <img :src="img" class="w-full aspect-square object-cover rounded-lg border border-border" />
                            <button
                                type="button"
                                @click="removeImage(idx)"
                                class="absolute top-1.5 right-1.5 w-6 h-6 bg-destructive text-destructive-foreground rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity shadow"
                            >
                                <X class="w-3.5 h-3.5" />
                            </button>
                        </div>
                    </div>
                    <div v-else class="flex items-center justify-center py-8 border-2 border-dashed border-border rounded-lg">
                        <p class="text-sm text-muted-foreground">Belum ada foto</p>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/galleries">Batal</a>
                </Button>
            </div>
        </form>

        <ConfirmDialog ref="confirmDialog" message="Foto ini akan dihapus secara permanen." @confirm="handleDeleteImage" />
    </AdminLayout>
</template>
