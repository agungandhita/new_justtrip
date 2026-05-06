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
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { Separator } from '@/components/ui/separator'
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

function submit() { form.post('/admin/special-offers') }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Tambah Promo</span></template>

        <PageHeader title="Tambah Special Offer" :breadcrumbs="[{ label: 'Special Offer', href: '/admin/special-offers' }, { label: 'Tambah' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/special-offers"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-2xl space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Informasi Promo</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Paket Terkait <span class="text-muted-foreground font-normal">(opsional)</span></Label>
                        <Select v-model="form.layanan_id">
                            <SelectTrigger>
                                <SelectValue placeholder="-- Tidak terkait paket --" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectItem value="">-- Tidak terkait paket --</SelectItem>
                                <SelectItem v-for="l in layananList" :key="l.layanan_id" :value="l.layanan_id">{{ l.nama_layanan }}</SelectItem>
                            </SelectContent>
                        </Select>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Judul Promo <span class="text-destructive">*</span></Label>
                        <Input v-model="form.title" placeholder="Nama promo..." :class="form.errors.title ? 'border-destructive' : ''" />
                        <p v-if="form.errors.title" class="text-xs text-destructive">{{ form.errors.title }}</p>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Deskripsi</Label>
                        <Textarea v-model="form.description" rows="3" placeholder="Deskripsi promo..." />
                    </div>
                    <div class="grid grid-cols-3 gap-4">
                        <div class="space-y-1.5">
                            <Label>Harga Asli (Rp)</Label>
                            <Input v-model="form.original_price" type="number" min="0" placeholder="0" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>Harga Promo (Rp)</Label>
                            <Input v-model="form.discounted_price" type="number" min="0" placeholder="0" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>Diskon (%)</Label>
                            <Input v-model="form.discount_percentage" type="number" min="0" max="100" placeholder="0" />
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Berlaku Mulai</Label>
                            <Input v-model="form.valid_from" type="date" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>Berlaku Sampai</Label>
                            <Input v-model="form.valid_until" type="date" />
                        </div>
                    </div>
                    <Separator />
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-2">
                            <Checkbox id="is_active" v-model:checked="form.is_active" />
                            <Label for="is_active" class="cursor-pointer font-normal">Aktif</Label>
                        </div>
                        <div class="flex items-center gap-2">
                            <Checkbox id="is_featured" v-model:checked="form.is_featured" />
                            <Label for="is_featured" class="cursor-pointer font-normal">Featured (unggulan)</Label>
                        </div>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Promo' }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/special-offers">Batal</a>
                </Button>
            </div>
        </form>
    </AdminLayout>
</template>
