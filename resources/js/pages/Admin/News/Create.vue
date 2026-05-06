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

const form = useForm({
    judul: '',
    ringkasan: '',
    konten: '',
    kategori: '',
    is_published: false,
    gambar_utama: '',
})

function submit() { form.post('/admin/news') }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Tulis Artikel</span></template>

        <PageHeader title="Tulis Artikel" :breadcrumbs="[{ label: 'Artikel', href: '/admin/news' }, { label: 'Buat' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/news"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-3xl space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Informasi Artikel</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Judul <span class="text-destructive">*</span></Label>
                        <Input v-model="form.judul" placeholder="Judul artikel..." :class="form.errors.judul ? 'border-destructive' : ''" />
                        <p v-if="form.errors.judul" class="text-xs text-destructive">{{ form.errors.judul }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Kategori</Label>
                            <Input v-model="form.kategori" placeholder="e.g. Travel Tips" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>URL Gambar Utama</Label>
                            <Input v-model="form.gambar_utama" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Ringkasan</Label>
                        <Textarea v-model="form.ringkasan" rows="2" placeholder="Ringkasan singkat artikel..." />
                    </div>
                    <div class="space-y-1.5">
                        <Label>Konten <span class="text-destructive">*</span></Label>
                        <Textarea v-model="form.konten" rows="14" placeholder="Tulis konten artikel di sini..." class="font-mono text-sm" :class="form.errors.konten ? 'border-destructive' : ''" />
                        <p v-if="form.errors.konten" class="text-xs text-destructive">{{ form.errors.konten }}</p>
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <Checkbox id="is_published" v-model:checked="form.is_published" />
                        <Label for="is_published" class="cursor-pointer font-normal">Langsung terbitkan artikel</Label>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : (form.is_published ? 'Terbitkan' : 'Simpan Draft') }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/news">Batal</a>
                </Button>
            </div>
        </form>
    </AdminLayout>
</template>
