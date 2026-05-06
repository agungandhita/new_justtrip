<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { Checkbox } from '@/components/ui/checkbox'
import { Separator } from '@/components/ui/separator'
import type { News } from '@/types'

const props = defineProps<{ news: News }>()

const form = useForm({
    judul: props.news.judul,
    ringkasan: props.news.ringkasan ?? '',
    konten: props.news.konten,
    kategori: props.news.kategori ?? '',
    is_published: props.news.is_published,
    gambar_utama: props.news.gambar_utama ?? '',
    _method: 'PUT',
})

function submit() { form.post(`/admin/news/${props.news.id}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Edit Artikel</span></template>

        <PageHeader title="Edit Artikel" :breadcrumbs="[{ label: 'Artikel', href: '/admin/news' }, { label: 'Edit' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/news"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-3xl space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Edit Artikel</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Judul</Label>
                        <Input v-model="form.judul" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Kategori</Label>
                            <Input v-model="form.kategori" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>URL Gambar Utama</Label>
                            <Input v-model="form.gambar_utama" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Ringkasan</Label>
                        <Textarea v-model="form.ringkasan" rows="2" />
                    </div>
                    <div class="space-y-1.5">
                        <Label>Konten</Label>
                        <Textarea v-model="form.konten" rows="14" class="font-mono text-sm" />
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <Checkbox id="is_published" v-model:checked="form.is_published" />
                        <Label for="is_published" class="cursor-pointer font-normal">Terbitkan artikel</Label>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/news">Batal</a>
                </Button>
            </div>
        </form>
    </AdminLayout>
</template>
