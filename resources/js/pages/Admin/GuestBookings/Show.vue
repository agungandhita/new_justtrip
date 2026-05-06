<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { Separator } from '@/components/ui/separator'
import type { GuestBooking } from '@/types'

const props = defineProps<{ guestBooking: GuestBooking }>()

const statusForm = useForm({ status: props.guestBooking.status, admin_notes: props.guestBooking.admin_notes ?? '' })

function updateStatus() {
    statusForm.post(`/admin/guest-bookings/${props.guestBooking.guest_booking_id}/status`)
}

const statusOptions = [
    { value: 'baru', label: 'Baru' },
    { value: 'diproses', label: 'Diproses' },
    { value: 'dikonfirmasi', label: 'Dikonfirmasi' },
    { value: 'ditolak', label: 'Ditolak' },
    { value: 'selesai', label: 'Selesai' },
]
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Detail Request Trip</span></template>

        <PageHeader
            title="Detail Request Trip"
            :breadcrumbs="[{ label: 'Request Trip', href: '/admin/guest-bookings' }, { label: guestBooking.booking_number }]"
        >
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/guest-bookings">
                    <ArrowLeft class="w-4 h-4" /> Kembali
                </a>
            </Button>
        </PageHeader>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main -->
            <div class="lg:col-span-2 space-y-4">
                <Card>
                    <CardHeader class="pb-3">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs text-muted-foreground font-mono mb-1">Nomor Request</p>
                                <CardTitle class="text-xl">{{ guestBooking.booking_number }}</CardTitle>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium border"
                                    :class="guestBooking.is_custom_request ? 'bg-violet-50 text-violet-700 border-violet-200' : 'bg-blue-50 text-blue-700 border-blue-200'">
                                    {{ guestBooking.is_custom_request ? 'Custom Request' : 'Paket' }}
                                </span>
                                <StatusBadge :label="guestBooking.status_label" :status="guestBooking.status as any" />
                            </div>
                        </div>
                    </CardHeader>
                    <Separator />
                    <CardContent class="pt-4">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-muted-foreground mb-0.5">Destinasi</p>
                                <p class="font-medium">{{ guestBooking.destinasi_dicari }}</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-0.5">Jumlah Peserta</p>
                                <p class="font-medium">{{ guestBooking.jumlah_peserta }} orang</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-0.5">Tanggal Diinginkan</p>
                                <p class="font-medium">{{ guestBooking.tanggal_keberangkatan_diinginkan }}</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-0.5">Budget Estimasi</p>
                                <p class="font-medium">{{ guestBooking.formatted_budget }}</p>
                            </div>
                        </div>

                        <div v-if="guestBooking.catatan_tambahan" class="mt-4 p-3 bg-muted/50 rounded-md border border-border">
                            <p class="text-xs text-muted-foreground mb-1">Catatan Tambahan</p>
                            <p class="text-sm">{{ guestBooking.catatan_tambahan }}</p>
                        </div>
                    </CardContent>
                </Card>
            </div>

            <!-- Sidebar -->
            <div class="space-y-4">
                <!-- Pemohon -->
                <Card>
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Data Pemohon</CardTitle>
                    </CardHeader>
                    <Separator />
                    <CardContent class="pt-4 space-y-3 text-sm">
                        <div>
                            <p class="text-muted-foreground mb-0.5">Nama</p>
                            <p class="font-medium">{{ guestBooking.nama_lengkap }}</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Email</p>
                            <p class="font-medium">{{ guestBooking.email }}</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Telepon</p>
                            <a :href="`https://wa.me/${guestBooking.nomor_telepon?.replace(/\D/g, '')}`" target="_blank" class="font-medium text-green-600 hover:text-green-700 hover:underline">{{ guestBooking.nomor_telepon }}</a>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Kota/Provinsi</p>
                            <p class="font-medium">{{ guestBooking.kota }}, {{ guestBooking.provinsi }}</p>
                        </div>
                    </CardContent>
                </Card>

                <!-- Update Status -->
                <Card>
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Update Status</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form @submit.prevent="updateStatus" class="space-y-3">
                            <div class="space-y-1.5">
                                <Label>Status</Label>
                                <Select v-model="statusForm.status">
                                    <SelectTrigger>
                                        <SelectValue />
                                    </SelectTrigger>
                                    <SelectContent>
                                        <SelectItem v-for="opt in statusOptions" :key="opt.value" :value="opt.value">{{ opt.label }}</SelectItem>
                                    </SelectContent>
                                </Select>
                            </div>
                            <div class="space-y-1.5">
                                <Label>Catatan Admin</Label>
                                <Textarea v-model="statusForm.admin_notes" rows="3" placeholder="Tambahkan catatan..." />
                            </div>
                            <Button type="submit" :disabled="statusForm.processing" class="w-full">
                                {{ statusForm.processing ? 'Menyimpan...' : 'Simpan Status' }}
                            </Button>
                        </form>
                    </CardContent>
                </Card>
            </div>
        </div>
    </AdminLayout>
</template>
