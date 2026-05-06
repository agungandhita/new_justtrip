<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Eye, Search, X, Filter } from 'lucide-vue-next'
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
import type { Booking, PaginatedData } from '@/types'

const props = defineProps<{
    bookings: PaginatedData<Booking>
    filters: { search?: string; status?: string; date_from?: string; date_to?: string }
}>()

const search = ref(props.filters.search ?? '')
const status = ref(props.filters.status ?? '')

const statusOptions = [
    { value: 'all', label: 'Semua Status' },
    { value: 'pending', label: 'Pending' },
    { value: 'approved', label: 'Disetujui' },
    { value: 'rejected', label: 'Ditolak' },
    { value: 'completed', label: 'Selesai' },
    { value: 'cancelled', label: 'Dibatalkan' },
]

function applyFilters() {
    router.get('/admin/bookings', {
        search: search.value,
        status: status.value === 'all' ? '' : status.value,
    }, { preserveState: true, replace: true })
}

function clearFilters() {
    search.value = ''
    status.value = ''
    router.get('/admin/bookings', {}, { replace: true })
}

const hasFilters = () => !!props.filters.search || !!props.filters.status
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm font-medium text-muted-foreground">Booking Reguler</span>
        </template>

        <PageHeader
            title="Booking Reguler"
            description="Kelola semua pesanan dari pengguna yang sudah login"
            :breadcrumbs="[{ label: 'Booking' }]"
        />

        <!-- Filters -->
        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="flex flex-wrap gap-3 items-end">
                    <div class="relative flex-1 min-w-48">
                        <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                        <Input
                            v-model="search"
                            @keyup.enter="applyFilters"
                            placeholder="Cari no. booking atau nama..."
                            class="pl-9"
                        />
                    </div>
                    <Select v-model="status" @update:model-value="applyFilters">
                        <SelectTrigger class="w-44">
                            <SelectValue placeholder="Semua Status" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectItem v-for="opt in statusOptions" :key="opt.value" :value="opt.value">
                                {{ opt.label }}
                            </SelectItem>
                        </SelectContent>
                    </Select>
                    <Button @click="applyFilters" variant="default" size="sm" class="gap-2">
                        <Filter class="w-4 h-4" /> Filter
                    </Button>
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
                            <TableHead>Pelanggan</TableHead>
                            <TableHead>Paket</TableHead>
                            <TableHead>Tgl. Berangkat</TableHead>
                            <TableHead>Total</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-20">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow
                            v-for="booking in bookings.data"
                            :key="booking.booking_id"
                        >
                            <TableCell class="font-mono text-xs text-muted-foreground">{{ booking.booking_number }}</TableCell>
                            <TableCell>
                                <p class="font-medium text-foreground">{{ booking.customer_info?.name }}</p>
                                <p class="text-xs text-muted-foreground">{{ booking.customer_info?.email }}</p>
                            </TableCell>
                            <TableCell class="text-muted-foreground max-w-[160px] truncate">
                                {{ booking.layanan?.nama_layanan ?? '-' }}
                            </TableCell>
                            <TableCell class="text-muted-foreground whitespace-nowrap">
                                {{ booking.formatted_tanggal_keberangkatan }}
                            </TableCell>
                            <TableCell class="font-semibold whitespace-nowrap">
                                {{ booking.formatted_total_amount }}
                            </TableCell>
                            <TableCell>
                                <StatusBadge :label="booking.status_label" :status="booking.status as any" />
                            </TableCell>
                            <TableCell class="text-center">
                                <Button variant="outline" size="sm" as-child class="gap-1.5">
                                    <Link :href="`/admin/bookings/${booking.booking_id}`">
                                        <Eye class="w-3.5 h-3.5" /> Detail
                                    </Link>
                                </Button>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!bookings.data.length" :colspan="7">Tidak ada data booking</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="bookings.meta" :links="bookings.links" />
                </div>
            </CardContent>
        </Card>
    </AdminLayout>
</template>
