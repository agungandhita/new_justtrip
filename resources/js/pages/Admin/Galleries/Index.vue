<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, Search, Image } from 'lucide-vue-next'
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
import type { Gallery, PaginatedData } from '@/types'

const props = defineProps<{
    galleries: PaginatedData<Gallery>
    filters: { search?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/galleries', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/galleries/${deletingId.value}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Galeri</span></template>

        <PageHeader title="Galeri Foto" description="Kelola koleksi foto perjalanan" :breadcrumbs="[{ label: 'Galeri' }]">
            <Button as-child class="gap-2">
                <Link href="/admin/galleries/buat">
                    <Plus class="w-4 h-4" /> Tambah Album
                </Link>
            </Button>
        </PageHeader>

        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="relative max-w-sm">
                    <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input v-model="search" @keyup.enter="applySearch" placeholder="Cari galeri..." class="pl-9" />
                </div>
            </CardContent>
        </Card>

        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Album</TableHead>
                            <TableHead>Lokasi</TableHead>
                            <TableHead>Foto</TableHead>
                            <TableHead>Kategori</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-20">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="gallery in galleries.data" :key="gallery.id">
                            <TableCell>
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-8 rounded-md overflow-hidden flex-shrink-0 bg-muted flex items-center justify-center">
                                        <img v-if="gallery.cover_image" :src="gallery.cover_image" class="w-full h-full object-cover" />
                                        <Image v-else class="w-4 h-4 text-muted-foreground/40" />
                                    </div>
                                    <p class="font-medium text-foreground max-w-xs truncate">{{ gallery.judul }}</p>
                                </div>
                            </TableCell>
                            <TableCell class="text-muted-foreground">{{ gallery.lokasi_tujuan }}</TableCell>
                            <TableCell>
                                <Badge variant="secondary" class="text-xs">{{ gallery.images?.length ?? 0 }} foto</Badge>
                            </TableCell>
                            <TableCell class="text-muted-foreground">{{ gallery.kategori ?? '-' }}</TableCell>
                            <TableCell>
                                <Badge :variant="gallery.is_active ? 'default' : 'secondary'" class="text-xs">
                                    {{ gallery.is_active ? 'Tampil' : 'Tersembunyi' }}
                                </Badge>
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1">
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/galleries/${gallery.id}/edit`">
                                            <Edit class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                    <Button @click="confirmDelete(gallery.id)" variant="ghost" size="icon-sm" class="text-destructive hover:bg-destructive/10">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!galleries.data.length" :colspan="6">Belum ada galeri</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="galleries.meta" :links="galleries.links" />
                </div>
            </CardContent>
        </Card>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
