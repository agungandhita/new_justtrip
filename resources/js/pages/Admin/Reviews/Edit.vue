<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft, Star } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { Checkbox } from '@/components/ui/checkbox'
import { Separator } from '@/components/ui/separator'
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
        <template #header><span class="text-sm font-medium text-muted-foreground">Edit Review</span></template>

        <PageHeader title="Edit Review" :breadcrumbs="[{ label: 'Review', href: '/admin/reviews' }, { label: 'Edit' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/reviews"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-lg space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Edit Review</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Nama Reviewer</Label>
                        <Input v-model="form.nama_reviewer" />
                    </div>
                    <div class="space-y-2">
                        <Label>Rating</Label>
                        <div class="flex items-center gap-1.5">
                            <button
                                v-for="i in 5" :key="i" type="button"
                                @click="form.rating = i"
                                @mouseenter="hoverRating = i"
                                @mouseleave="hoverRating = 0"
                                class="transition-transform hover:scale-110"
                            >
                                <Star class="w-7 h-7 transition-colors"
                                    :class="i <= (hoverRating || form.rating) ? 'text-amber-400 fill-amber-400' : 'text-muted-foreground/20 fill-muted-foreground/20'" />
                            </button>
                            <span class="ml-2 text-sm font-medium">{{ form.rating }}<span class="text-muted-foreground">/5</span></span>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Komentar</Label>
                        <Textarea v-model="form.komentar" rows="4" />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Destinasi</Label>
                            <Input v-model="form.destinasi" />
                        </div>
                        <div class="space-y-1.5">
                            <Label>URL Foto Reviewer</Label>
                            <Input v-model="form.foto_reviewer" placeholder="https://..." />
                        </div>
                    </div>
                    <div class="flex items-center gap-2 pt-1">
                        <Checkbox id="is_active" v-model:checked="form.is_active" />
                        <Label for="is_active" class="cursor-pointer font-normal">Tampilkan di halaman depan</Label>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/reviews">Batal</a>
                </Button>
            </div>
        </form>
    </AdminLayout>
</template>
