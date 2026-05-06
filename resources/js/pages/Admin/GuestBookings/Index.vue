<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Eye, Search, X } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import type { GuestBooking, PaginatedData } from '@/types'

const props = defineProps<{
    guestBookings: PaginatedData<GuestBooking>
    filters: { search?: string; status?: string; type?: string }
}>()

const search = ref(props.filters.search ?? '')
const status = ref(props.filters.status ?? '')
const type = ref(props.filters.type ?? '')

const statusOptions = [
    { value: 'all', label: 'Semua Status' },
    { value: 'baru', label: 'Baru' },
    { value: 'diproses', label: 'Diproses' },
    { value: 'dikonfirmasi', label: 'Dikonfirmasi' },
    { value: 'ditolak', label: 'Ditolak' },
    { value: 'selesai', label: 'Selesai' },
]

function applyFilters() {
    router.get('/admin/guest-bookings', {
        search: search.value,
        status: status.value === 'all' ? '' : status.value,
        type: type.value === 'all' ? '' : type.value,
    }, { preserveState: true, replace: true })
}

function clearFilters() {
    search.value = ''; status.value = ''; type.value = ''
    router.get('/admin/guest-bookings', {}, { replace: true })
}

const hasFilters = () => !!props.filters.search || !!props.filters.status || !!props.filters.type
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm font-medium text-muted-foreground">Request Trip</span>
        </template>

        <PageHeader
            title="Request Trip"
            description="Kelola semua permintaan perjalanan dari tamu"
            :breadcrumbs="[{ label: 'Request Trip' }]"
        />

        <!-- Filters -->
        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="flex flex-wrap gap-3">
                    <div class="relative flex-1 min-w-48">
                        <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                        <Input v-model="search" @keyup.enter="applyFilters" placeholder="Cari nama, email, no. booking..." class="pl-9" />
                    </div>
                    <Select v-model="status" @update:model-value="applyFilters">
                        <SelectTrigger class="w-40">
                            <SelectValue placeholder="Semua Status" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem v-for="opt in statusOptions" :key="opt.value" :value="opt.value">{{ opt.label }}</SelectItem>
                        </SelectContent>
                    </Select>
                    <Select v-model="type" @update:model-value="applyFilters">
                        <SelectTrigger class="w-36">
                            <SelectValue placeholder="Semua Tipe" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem value="all">Semua Tipe</SelectItem>
                            <SelectItem value="package">Paket</SelectItem>
                            <SelectItem value="custom">Custom</SelectItem>
                        </SelectContent>
                    </Select>
                    <Button v-if="hasFilters()" @click="clearFilters" variant="outline" size="sm" class="gap-2">
                        <X class="w-4 h-4" /> Reset
                    </Button>
                </div>
            </CardContent>
        </Card>

        <!-- Table -->
        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>No. Booking</TableHead>
                            <TableHead>Pemohon</TableHead>
                            <TableHead>Destinasi</TableHead>
                            <TableHead>Peserta</TableHead>
                            <TableHead>Tipe</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-20">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="gb in guestBookings.data" :key="gb.guest_booking_id">
                            <TableCell class="font-mono text-xs text-muted-foreground">{{ gb.booking_number }}</TableCell>
                            <TableCell>
                                <p class="font-medium text-foreground">{{ gb.nama_lengkap }}</p>
                                <p class="text-xs text-muted-foreground">{{ gb.email }}</p>
                            </TableCell>
                            <TableCell class="text-muted-foreground max-w-[160px] truncate">{{ gb.destinasi_dicari }}</TableCell>
                            <TableCell class="text-muted-foreground">{{ gb.jumlah_peserta }} orang</TableCell>
                            <TableCell>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium border"
                                    :class="gb.is_custom_request ? 'bg-violet-50 text-violet-700 border-violet-200' : 'bg-blue-50 text-blue-700 border-blue-200'">
                                    {{ gb.is_custom_request ? 'Custom' : 'Paket' }}
                                </span>
                            </TableCell>
                            <TableCell>
                                <StatusBadge :label="gb.status_label" :status="gb.status as any" />
                            </TableCell>
                            <TableCell class="text-center">
                                <Button variant="outline" size="sm" as-child class="gap-1.5">
                                    <Link :href="`/admin/guest-bookings/${gb.guest_booking_id}`">
                                        <Eye class="w-3.5 h-3.5" /> Detail
                                    </Link>
                                </Button>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!guestBookings.data.length" :colspan="7">Tidak ada data request trip</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="guestBookings.meta" :links="guestBookings.links" />
                </div>
            </CardContent>
        </Card>
    </AdminLayout>
</template>
