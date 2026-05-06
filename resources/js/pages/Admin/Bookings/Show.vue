<script setup lang="ts">
import { router, useForm } from '@inertiajs/vue3'
import { ArrowLeft, CheckCircle, XCircle, Flag } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Textarea } from '@/components/ui/textarea'
import { Separator } from '@/components/ui/separator'
import type { Booking } from '@/types'

const props = defineProps<{ booking: Booking }>()

const rejectForm = useForm({ rejection_reason: '' })
const approveForm = useForm({ admin_notes: '' })
const showRejectForm = ref(false)
const showApproveForm = ref(false)

function approve() {
    approveForm.post(`/admin/bookings/${props.booking.booking_id}/approve`, {
        onSuccess: () => { showApproveForm.value = false; approveForm.reset() },
    })
}

function reject() {
    rejectForm.post(`/admin/bookings/${props.booking.booking_id}/reject`, {
        onSuccess: () => { showRejectForm.value = false; rejectForm.reset() },
    })
}

function complete() {
    router.post(`/admin/bookings/${props.booking.booking_id}/complete`)
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm font-medium text-muted-foreground">Detail Booking</span>
        </template>

        <PageHeader
            title="Detail Booking"
            :breadcrumbs="[{ label: 'Bookings', href: '/admin/bookings' }, { label: booking.booking_number }]"
        >
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/bookings">
                    <ArrowLeft class="w-4 h-4" /> Kembali
                </a>
            </Button>
        </PageHeader>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main info -->
            <div class="lg:col-span-2 space-y-4">
                <!-- Booking Info Card -->
                <Card>
                    <CardHeader class="pb-3">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-xs text-muted-foreground font-mono mb-1">Nomor Booking</p>
                                <CardTitle class="text-xl">{{ booking.booking_number }}</CardTitle>
                            </div>
                            <StatusBadge :label="booking.status_label" :status="booking.status as any" />
                        </div>
                    </CardHeader>
                    <Separator />
                    <CardContent class="pt-4">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-muted-foreground mb-1">Paket Wisata</p>
                                <p class="font-medium">{{ booking.layanan?.nama_layanan ?? '-' }}</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-1">Tanggal Keberangkatan</p>
                                <p class="font-medium">{{ booking.formatted_tanggal_keberangkatan }}</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-1">Jumlah Peserta</p>
                                <p class="font-medium">{{ booking.jumlah_peserta }} orang</p>
                            </div>
                            <div>
                                <p class="text-muted-foreground mb-1">Dibuat</p>
                                <p class="font-medium">{{ booking.created_at }}</p>
                            </div>
                        </div>

                        <div v-if="booking.catatan_khusus" class="mt-4 p-3 bg-muted/50 rounded-md border border-border">
                            <p class="text-xs text-muted-foreground mb-1">Catatan Khusus</p>
                            <p class="text-sm">{{ booking.catatan_khusus }}</p>
                        </div>
                    </CardContent>
                </Card>

                <!-- Payment Summary -->
                <Card>
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Ringkasan Pembayaran</CardTitle>
                    </CardHeader>
                    <Separator />
                    <CardContent class="pt-4 space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-muted-foreground">Harga Asli</span>
                            <span>Rp {{ Number(booking.original_amount).toLocaleString('id-ID') }}</span>
                        </div>
                        <div v-if="Number(booking.discount_amount) > 0" class="flex justify-between text-green-600">
                            <span>Diskon</span>
                            <span>- Rp {{ Number(booking.discount_amount).toLocaleString('id-ID') }}</span>
                        </div>
                        <Separator />
                        <div class="flex justify-between font-bold text-base">
                            <span>Total</span>
                            <span class="text-primary">{{ booking.formatted_total_amount }}</span>
                        </div>
                    </CardContent>
                </Card>

                <!-- Admin Notes -->
                <Card v-if="booking.admin_notes || booking.rejection_reason">
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Catatan Admin</CardTitle>
                    </CardHeader>
                    <CardContent>
                        <div v-if="booking.admin_notes" class="p-3 bg-blue-50 rounded-md border border-blue-100 text-sm text-blue-800 mb-2">
                            {{ booking.admin_notes }}
                        </div>
                        <div v-if="booking.rejection_reason" class="p-3 bg-destructive/10 rounded-md border border-destructive/20 text-sm text-destructive">
                            <strong>Alasan Penolakan:</strong> {{ booking.rejection_reason }}
                        </div>
                    </CardContent>
                </Card>
            </div>

            <!-- Sidebar: customer + actions -->
            <div class="space-y-4">
                <!-- Customer Info -->
                <Card>
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Data Pelanggan</CardTitle>
                    </CardHeader>
                    <Separator />
                    <CardContent class="pt-4 space-y-3 text-sm">
                        <div>
                            <p class="text-muted-foreground mb-0.5">Nama</p>
                            <p class="font-medium">{{ booking.customer_info?.name }}</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Email</p>
                            <p class="font-medium">{{ booking.customer_info?.email }}</p>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Telepon</p>
                            <a
                                :href="`https://wa.me/${booking.customer_info?.phone?.replace(/\D/g, '')}`"
                                target="_blank"
                                class="font-medium text-green-600 hover:text-green-700 hover:underline"
                            >
                                {{ booking.customer_info?.phone }}
                            </a>
                        </div>
                        <div>
                            <p class="text-muted-foreground mb-0.5">Alamat</p>
                            <p class="font-medium">{{ booking.customer_info?.address }}</p>
                        </div>
                    </CardContent>
                </Card>

                <!-- Actions -->
                <Card v-if="booking.status === 'pending' || booking.status === 'approved'">
                    <CardHeader class="pb-3">
                        <CardTitle class="text-base">Tindakan</CardTitle>
                    </CardHeader>
                    <CardContent class="space-y-3">
                        <!-- Approve -->
                        <div v-if="booking.status === 'pending'">
                            <div v-if="!showApproveForm">
                                <Button
                                    @click="showApproveForm = true"
                                    class="w-full gap-2 bg-green-600 hover:bg-green-700 text-white"
                                >
                                    <CheckCircle class="w-4 h-4" /> Setujui Booking
                                </Button>
                            </div>
                            <div v-else class="space-y-2">
                                <Textarea
                                    v-model="approveForm.admin_notes"
                                    rows="2"
                                    placeholder="Catatan untuk pelanggan (opsional)"
                                />
                                <div class="flex gap-2">
                                    <Button @click="approve" :disabled="approveForm.processing" class="flex-1 bg-green-600 hover:bg-green-700" size="sm">
                                        Konfirmasi
                                    </Button>
                                    <Button @click="showApproveForm = false" variant="outline" size="sm">Batal</Button>
                                </div>
                            </div>
                        </div>

                        <!-- Complete -->
                        <Button
                            v-if="booking.status === 'approved'"
                            @click="complete"
                            class="w-full gap-2"
                        >
                            <Flag class="w-4 h-4" /> Tandai Selesai
                        </Button>

                        <!-- Reject -->
                        <div v-if="booking.status === 'pending'">
                            <div v-if="!showRejectForm">
                                <Button
                                    @click="showRejectForm = true"
                                    variant="outline"
                                    class="w-full gap-2 border-destructive/30 text-destructive hover:bg-destructive/10 hover:text-destructive"
                                >
                                    <XCircle class="w-4 h-4" /> Tolak Booking
                                </Button>
                            </div>
                            <div v-else class="space-y-2">
                                <Textarea
                                    v-model="rejectForm.rejection_reason"
                                    rows="2"
                                    placeholder="Alasan penolakan (wajib)"
                                    required
                                />
                                <p v-if="rejectForm.errors.rejection_reason" class="text-xs text-destructive">{{ rejectForm.errors.rejection_reason }}</p>
                                <div class="flex gap-2">
                                    <Button @click="reject" :disabled="rejectForm.processing" variant="destructive" class="flex-1" size="sm">
                                        Konfirmasi
                                    </Button>
                                    <Button @click="showRejectForm = false" variant="outline" size="sm">Batal</Button>
                                </div>
                            </div>
                        </div>
                    </CardContent>
                </Card>
            </div>
        </div>
    </AdminLayout>
</template>
