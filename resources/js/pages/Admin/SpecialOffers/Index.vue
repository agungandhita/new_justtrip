<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Badge } from '@/components/ui/badge'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import type { SpecialOffer, PaginatedData } from '@/types'

const props = defineProps<{
    offers: PaginatedData<SpecialOffer>
    filters: { search?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/special-offers', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/special-offers/${deletingId.value}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Special Offer</span></template>

        <PageHeader title="Special Offer" description="Kelola promo dan penawaran spesial" :breadcrumbs="[{ label: 'Special Offer' }]">
            <Button as-child class="gap-2">
                <Link href="/admin/special-offers/buat">
                    <Plus class="w-4 h-4" /> Tambah Promo
                </Link>
            </Button>
        </PageHeader>

        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="relative max-w-sm">
                    <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input v-model="search" @keyup.enter="applySearch" placeholder="Cari offer..." class="pl-9" />
                </div>
            </CardContent>
        </Card>

        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Judul</TableHead>
                            <TableHead>Harga Asli</TableHead>
                            <TableHead>Harga Promo</TableHead>
                            <TableHead>Diskon</TableHead>
                            <TableHead>Berlaku s/d</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-20">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="offer in offers.data" :key="offer.id">
                            <TableCell>
                                <p class="font-medium text-foreground">{{ offer.title }}</p>
                                <p v-if="offer.layanan" class="text-xs text-muted-foreground">{{ offer.layanan.nama_layanan }}</p>
                            </TableCell>
                            <TableCell class="text-muted-foreground line-through">{{ offer.formatted_original_price }}</TableCell>
                            <TableCell class="font-semibold text-green-600">{{ offer.formatted_price }}</TableCell>
                            <TableCell>
                                <Badge variant="destructive" class="text-xs font-bold">{{ offer.discount_percentage }}%</Badge>
                            </TableCell>
                            <TableCell class="text-muted-foreground">{{ offer.valid_until }}</TableCell>
                            <TableCell>
                                <Badge :variant="offer.is_active ? 'default' : 'secondary'" class="text-xs">
                                    {{ offer.is_active ? 'Aktif' : 'Non-aktif' }}
                                </Badge>
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1">
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/special-offers/${offer.id}/edit`">
                                            <Edit class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                    <Button @click="confirmDelete(offer.id)" variant="ghost" size="icon-sm" class="text-destructive hover:bg-destructive/10">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!offers.data.length" :colspan="7">Belum ada promo</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="offers.meta" :links="offers.links" />
                </div>
            </CardContent>
        </Card>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
