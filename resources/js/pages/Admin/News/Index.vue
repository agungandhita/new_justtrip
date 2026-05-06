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
import type { News, PaginatedData } from '@/types'

const props = defineProps<{
    newsList: PaginatedData<News>
    filters: { search?: string; is_published?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/news', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/news/${deletingId.value}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Artikel</span></template>

        <PageHeader title="Artikel / Berita" description="Kelola konten artikel dan berita" :breadcrumbs="[{ label: 'Artikel' }]">
            <Button as-child class="gap-2">
                <Link href="/admin/news/buat">
                    <Plus class="w-4 h-4" /> Tulis Artikel
                </Link>
            </Button>
        </PageHeader>

        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="relative max-w-sm">
                    <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input v-model="search" @keyup.enter="applySearch" placeholder="Cari artikel..." class="pl-9" />
                </div>
            </CardContent>
        </Card>

        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Judul</TableHead>
                            <TableHead>Kategori</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead>Tgl. Terbit</TableHead>
                            <TableHead class="text-center w-20">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="news in newsList.data" :key="news.id">
                            <TableCell>
                                <p class="font-medium text-foreground max-w-xs truncate">{{ news.judul }}</p>
                                <p v-if="news.ringkasan" class="text-xs text-muted-foreground max-w-xs truncate">{{ news.ringkasan }}</p>
                            </TableCell>
                            <TableCell class="text-muted-foreground">{{ news.kategori ?? '-' }}</TableCell>
                            <TableCell>
                                <Badge :variant="news.is_published ? 'default' : 'secondary'" class="text-xs">
                                    {{ news.is_published ? 'Terbit' : 'Draft' }}
                                </Badge>
                            </TableCell>
                            <TableCell class="text-muted-foreground text-xs">{{ news.published_at ?? '-' }}</TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1">
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/news/${news.id}/edit`">
                                            <Edit class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                    <Button @click="confirmDelete(news.id)" variant="ghost" size="icon-sm" class="text-destructive hover:bg-destructive/10">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!newsList.data.length" :colspan="5">Belum ada artikel</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="newsList.meta" :links="newsList.links" />
                </div>
            </CardContent>
        </Card>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
