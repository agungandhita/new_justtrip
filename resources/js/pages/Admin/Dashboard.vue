<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import {
    CalendarCheck,
    ClipboardList,
    DollarSign,
    Package,
    TrendingUp,
    Users,
    Eye,
    Clock,
    ArrowRight,
} from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatCard from '@/components/Admin/StatCard.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import type { Booking } from '@/types'

interface Statistics {
    total_bookings: number
    pending_bookings: number
    approved_bookings: number
    completed_bookings: number
    total_guest_bookings: number
    new_guest_bookings: number
    total_users: number
    total_revenue: number
    total_layanan: number
    total_reviews: number
}

const props = defineProps<{
    statistics: Statistics
    recentBookings: Booking[]
    topServices: Array<{ layanan_id: string; nama_layanan: string; bookings_count: number }>
}>()

const statusMap: Record<string, string> = {
    pending: 'pending',
    approved: 'approved',
    completed: 'completed',
    rejected: 'rejected',
    cancelled: 'cancelled',
}

function formatRupiah(amount: number): string {
    return 'Rp ' + amount.toLocaleString('id-ID')
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm font-medium text-muted-foreground">Dashboard</span>
        </template>

        <PageHeader
            title="Dashboard"
            description="Ringkasan aktivitas dan performa JustTrip"
        />

        <!-- Stats Grid Row 1 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <StatCard
                label="Total Booking"
                :value="statistics.total_bookings"
                :icon="CalendarCheck"
                color="blue"
            />
            <StatCard
                label="Menunggu Konfirmasi"
                :value="statistics.pending_bookings"
                :icon="Clock"
                color="yellow"
                :trend="statistics.pending_bookings > 0 ? 'Perlu tindakan segera' : 'Semua sudah diproses'"
            />
            <StatCard
                label="Request Trip Baru"
                :value="statistics.new_guest_bookings"
                :icon="ClipboardList"
                color="purple"
            />
            <StatCard
                label="Total Pendapatan"
                :value="formatRupiah(statistics.total_revenue)"
                :icon="DollarSign"
                color="green"
            />
        </div>

        <!-- Stats Grid Row 2 -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <StatCard label="Total Pengguna" :value="statistics.total_users" :icon="Users" color="slate" />
            <StatCard label="Booking Disetujui" :value="statistics.approved_bookings" :icon="TrendingUp" color="blue" />
            <StatCard label="Selesai" :value="statistics.completed_bookings" :icon="CalendarCheck" color="green" />
            <StatCard label="Total Paket" :value="statistics.total_layanan" :icon="Package" color="purple" />
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Bookings -->
            <Card class="lg:col-span-2">
                <CardHeader class="flex flex-row items-center justify-between pb-3">
                    <CardTitle class="text-base font-semibold">Booking Terbaru</CardTitle>
                    <Button variant="ghost" size="sm" as-child>
                        <Link href="/admin/bookings" class="flex items-center gap-1 text-xs">
                            Lihat Semua <ArrowRight class="w-3 h-3" />
                        </Link>
                    </Button>
                </CardHeader>
                <CardContent class="px-0 pb-0">
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>Pelanggan</TableHead>
                                <TableHead>Paket</TableHead>
                                <TableHead>Total</TableHead>
                                <TableHead>Status</TableHead>
                                <TableHead class="w-10"></TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            <TableRow
                                v-for="booking in recentBookings"
                                :key="booking.booking_id"
                            >
                                <TableCell>
                                    <p class="font-medium text-foreground text-sm">{{ booking.customer_info?.name }}</p>
                                    <p class="text-xs text-muted-foreground">{{ booking.booking_number }}</p>
                                </TableCell>
                                <TableCell class="text-sm text-muted-foreground max-w-[140px] truncate">
                                    {{ booking.layanan?.nama_layanan }}
                                </TableCell>
                                <TableCell class="text-sm font-medium">{{ booking.formatted_total_amount }}</TableCell>
                                <TableCell>
                                    <StatusBadge :label="booking.status_label" :status="booking.status as any" />
                                </TableCell>
                                <TableCell>
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/bookings/${booking.booking_id}`">
                                            <Eye class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                </TableCell>
                            </TableRow>
                            <TableEmpty v-if="!recentBookings.length" :colspan="5">Belum ada booking</TableEmpty>
                        </TableBody>
                    </Table>
                </CardContent>
            </Card>

            <!-- Top Services -->
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base font-semibold">Paket Terpopuler</CardTitle>
                </CardHeader>
                <CardContent>
                    <div class="space-y-4">
                        <div
                            v-for="(service, idx) in topServices"
                            :key="service.layanan_id"
                            class="flex items-center gap-3"
                        >
                            <div
                                class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold flex-shrink-0"
                                :class="[
                                    idx === 0 && 'bg-amber-100 text-amber-700',
                                    idx === 1 && 'bg-slate-100 text-slate-600',
                                    idx === 2 && 'bg-orange-100 text-orange-700',
                                    idx > 2 && 'bg-muted text-muted-foreground',
                                ]"
                            >
                                {{ idx + 1 }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-foreground truncate">
                                    {{ service.nama_layanan }}
                                </p>
                                <div class="mt-1.5 h-1.5 bg-muted rounded-full overflow-hidden">
                                    <div
                                        class="h-full bg-primary rounded-full transition-all duration-500"
                                        :style="{ width: `${(service.bookings_count / (topServices[0]?.bookings_count || 1)) * 100}%` }"
                                    />
                                </div>
                            </div>
                            <span class="text-xs font-semibold text-muted-foreground flex-shrink-0 tabular-nums">{{ service.bookings_count }}</span>
                        </div>
                        <div v-if="!topServices.length" class="text-center text-sm text-muted-foreground py-4">
                            Belum ada data
                        </div>
                    </div>
                </CardContent>
            </Card>
        </div>
    </AdminLayout>
</template>
