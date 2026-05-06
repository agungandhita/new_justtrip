<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import StatusBadge from '@/components/Admin/StatusBadge.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import type { Layanan, PaginatedData } from '@/types'

const props = defineProps<{
    layananList: PaginatedData<Layanan>
    filters: { search?: string; status?: string; jenis_layanan?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

const jenisLabels: Record<string, string> = {
    open_trip: 'Open Trip',
    private_trip: 'Private Trip',
    request_trip: 'Request Trip',
}

const jenisStatus: Record<string, any> = {
    open_trip: 'approved',
    private_trip: 'dikonfirmasi',
    request_trip: 'baru',
}

function applySearch() {
    router.get('/admin/layanan', { search: search.value }, { preserveState: true, replace: true })
}

function confirmDelete(id: string) {
    deletingId.value = id
    confirmDialog.value?.open()
}

function handleDelete() {
    if (deletingId.value) {
        router.delete(`/admin/layanan/${deletingId.value}`)
    }
}

function toggleStatus(id: string) {
    router.post(`/admin/layanan/${id}/toggle-status`, {}, { preserveScroll: true })
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Layanan / Paket</span></template>

        <PageHeader title="Daftar Layanan Trip" description="Kelola semua paket wisata, harga, jadwal, dan Itinerary" :breadcrumbs="[{ label: 'Layanan' }]" />

        <!-- Top Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-5">
            <div class="relative max-w-sm w-full">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                <Input v-model="search" @keyup.enter="applySearch" placeholder="Cari layanan wisata..." class="pl-9" />
            </div>
            <Button as-child class="gap-2">
                <Link href="/admin/layanan/buat">
                    <Plus class="w-4 h-4" /> Buat Layanan Baru
                </Link>
            </Button>
        </div>

        <!-- Table -->
        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Nama Layanan</TableHead>
                            <TableHead>Jenis</TableHead>
                            <TableHead>Wilayah</TableHead>
                            <TableHead>Harga Mulai</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-44">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="layanan in layananList.data" :key="layanan.layanan_id">
                            <TableCell>
                                <div class="flex items-center gap-3">
                                    <img v-if="layanan.gambar_utama" :src="layanan.gambar_utama" class="w-9 h-9 rounded-md object-cover flex-shrink-0" />
                                    <div v-else class="w-9 h-9 rounded-md bg-muted flex-shrink-0" />
                                    <div>
                                        <p class="font-medium text-foreground">{{ layanan.nama_layanan }}</p>
                                        <p class="text-xs text-muted-foreground">{{ layanan.lokasi_tujuan }}</p>
                                    </div>
                                </div>
                            </TableCell>
                            <TableCell>
                                <StatusBadge :label="jenisLabels[layanan.jenis_layanan]" :status="jenisStatus[layanan.jenis_layanan]" />
                            </TableCell>
                            <TableCell class="text-muted-foreground capitalize">{{ layanan.wilayah ?? '-' }}</TableCell>
                            <TableCell class="font-medium">{{ layanan.harga_format }}</TableCell>
                            <TableCell>
                                <StatusBadge :label="layanan.status === 'aktif' ? 'Aktif' : 'Non-aktif'" :status="layanan.status as any" />
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1.5">
                                    <Button
                                        @click="toggleStatus(layanan.layanan_id)"
                                        variant="outline"
                                        size="sm"
                                        class="gap-1.5 text-xs"
                                        :class="layanan.status === 'aktif' ? 'text-emerald-600 border-emerald-200 hover:bg-emerald-50' : 'text-muted-foreground'"
                                    >
                                        <ToggleRight v-if="layanan.status === 'aktif'" class="w-3.5 h-3.5" />
                                        <ToggleLeft v-else class="w-3.5 h-3.5" />
                                        {{ layanan.status === 'aktif' ? 'Aktif' : 'Non-aktif' }}
                                    </Button>
                                    <Button variant="outline" size="icon-sm" as-child>
                                        <Link :href="`/admin/layanan/${layanan.layanan_id}/edit`">
                                            <Edit class="w-3.5 h-3.5" />
                                        </Link>
                                    </Button>
                                    <Button variant="outline" size="icon-sm" @click="confirmDelete(layanan.layanan_id)"
                                        class="text-destructive border-destructive/30 hover:bg-destructive/10 hover:text-destructive">
                                        <Trash2 class="w-3.5 h-3.5" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!layananList.data.length" :colspan="6">
                            <div class="flex flex-col items-center justify-center py-4">
                                <Search class="w-8 h-8 text-muted-foreground/30 mb-3" />
                                <p class="font-medium text-foreground mb-1">Belum ada layanan wisata</p>
                                <p class="text-sm text-muted-foreground">Mulai tambahkan layanan trip untuk dilihat pelanggan.</p>
                            </div>
                        </TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="layananList.meta" :links="layananList.links" />
                </div>
            </CardContent>
        </Card>

        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
