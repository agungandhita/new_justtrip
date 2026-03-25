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
} from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatCard from '@/components/Admin/StatCard.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
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

const statusColors: Record<string, string> = {
    pending: '#eab308',
    approved: '#3b82f6',
    completed: '#22c55e',
    rejected: '#ef4444',
    cancelled: '#6b7280',
}

function formatRupiah(amount: number): string {
    return 'Rp ' + amount.toLocaleString('id-ID')
}
</script>

<template>
    <AdminLayout>
        <template #header>
            <span class="text-sm font-medium text-slate-600">Dashboard</span>
        </template>

        <PageHeader
            title="Dashboard"
            description="Ringkasan aktivitas dan performa JustTrip"
        />

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <StatCard label="Total Pengguna" :value="statistics.total_users" :icon="Users" color="slate" />
            <StatCard label="Booking Disetujui" :value="statistics.approved_bookings" :icon="TrendingUp" color="blue" />
            <StatCard label="Selesai" :value="statistics.completed_bookings" :icon="CalendarCheck" color="green" />
            <StatCard label="Total Paket" :value="statistics.total_layanan" :icon="Package" color="purple" />
        </div>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Recent Bookings -->
            <div class="lg:col-span-2 bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="flex items-center justify-between px-6 py-4 border-b border-slate-200 dark:border-slate-800">
                    <h2 class="font-semibold text-slate-900 dark:text-white">Booking Terbaru</h2>
                    <Link
                        href="/admin/bookings"
                        class="text-sm text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1"
                    >
                        Lihat Semua <Eye class="w-4 h-4" />
                    </Link>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    <div
                        v-for="booking in recentBookings"
                        :key="booking.booking_id"
                        class="px-6 py-3 flex items-center gap-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors"
                    >
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-900 dark:text-white truncate">
                                {{ booking.customer_info?.name }}
                            </p>
                            <p class="text-xs text-slate-500 truncate">
                                {{ booking.layanan?.nama_layanan }} · {{ booking.booking_number }}
                            </p>
                        </div>
                        <div class="text-right flex-shrink-0">
                            <StatusBadge
                                :label="booking.status_label"
                                :color="statusColors[booking.status]"
                            />
                            <p class="text-xs text-slate-400 mt-1">{{ booking.formatted_total_amount }}</p>
                        </div>
                        <Link
                            :href="`/admin/bookings/${booking.booking_id}`"
                            class="text-slate-400 hover:text-slate-600"
                        >
                            <Eye class="w-4 h-4" />
                        </Link>
                    </div>
                    <div v-if="!recentBookings.length" class="px-6 py-8 text-center text-sm text-slate-400">
                        Belum ada booking
                    </div>
                </div>
            </div>

            <!-- Top Services -->
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm">
                <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-800">
                    <h2 class="font-semibold text-slate-900 dark:text-white">Paket Terpopuler</h2>
                </div>
                <div class="p-4 space-y-3">
                    <div
                        v-for="(service, idx) in topServices"
                        :key="service.layanan_id"
                        class="flex items-center gap-3"
                    >
                        <div
                            class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0"
                            :class="[
                                idx === 0 && 'bg-yellow-100 text-yellow-700',
                                idx === 1 && 'bg-slate-100 text-slate-600',
                                idx === 2 && 'bg-orange-100 text-orange-700',
                                idx > 2 && 'bg-slate-50 text-slate-500',
                            ]"
                        >
                            {{ idx + 1 }}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-slate-800 dark:text-slate-200 truncate">
                                {{ service.nama_layanan }}
                            </p>
                            <div class="mt-1 h-1.5 bg-slate-100 rounded-full overflow-hidden">
                                <div
                                    class="h-full bg-blue-500 rounded-full"
                                    :style="{ width: `${(service.bookings_count / (topServices[0]?.bookings_count || 1)) * 100}%` }"
                                />
                            </div>
                        </div>
                        <span class="text-xs font-semibold text-slate-500 flex-shrink-0">{{ service.bookings_count }}</span>
                    </div>
                    <div v-if="!topServices.length" class="text-center text-sm text-slate-400 py-4">
                        Belum ada data
                    </div>
                </div>
            </div>
        </div>
    </AdminLayout>
</template>
