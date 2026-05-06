<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Star } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Badge } from '@/components/ui/badge'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import type { Review, PaginatedData } from '@/types'

const props = defineProps<{
    reviews: PaginatedData<Review>
    filters: { search?: string }
}>()

const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/reviews/${deletingId.value}`) }
function toggleActive(id: string) { router.post(`/admin/reviews/${id}/toggle-active`, {}, { preserveScroll: true }) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Review</span></template>

        <PageHeader title="Review Pelanggan" description="Kelola testimoni dan ulasan pelanggan" :breadcrumbs="[{ label: 'Review' }]">
            <Button as-child class="gap-2">
                <Link href="/admin/reviews/buat">
                    <Plus class="w-4 h-4" /> Tambah Review
                </Link>
            </Button>
        </PageHeader>

        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Reviewer</TableHead>
                            <TableHead>Rating</TableHead>
                            <TableHead>Komentar</TableHead>
                            <TableHead>Destinasi</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead class="text-center w-28">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="review in reviews.data" :key="review.id">
                            <TableCell>
                                <div class="flex items-center gap-3">
                                    <div v-if="review.foto_reviewer" class="w-8 h-8 rounded-full overflow-hidden flex-shrink-0">
                                        <img :src="review.foto_reviewer" class="w-full h-full object-cover" />
                                    </div>
                                    <div v-else class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold text-xs flex-shrink-0">
                                        {{ review.nama_reviewer?.charAt(0).toUpperCase() }}
                                    </div>
                                    <p class="font-medium text-foreground">{{ review.nama_reviewer }}</p>
                                </div>
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center gap-0.5">
                                    <Star v-for="i in 5" :key="i" class="w-3.5 h-3.5"
                                        :class="i <= review.rating ? 'text-amber-400 fill-amber-400' : 'text-muted-foreground/20 fill-muted-foreground/20'" />
                                </div>
                            </TableCell>
                            <TableCell class="max-w-[200px]">
                                <p class="text-muted-foreground text-xs truncate">{{ review.komentar }}</p>
                            </TableCell>
                            <TableCell class="text-muted-foreground text-xs">{{ review.destinasi ?? '-' }}</TableCell>
                            <TableCell>
                                <Badge :variant="review.is_active ? 'default' : 'secondary'" class="text-xs">
                                    {{ review.is_active ? 'Tampil' : 'Tersembunyi' }}
                                </Badge>
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1">
                                    <Button @click="toggleActive(review.id)" variant="ghost" size="icon-sm">
                                        <ToggleRight v-if="review.is_active" class="w-4 h-4 text-green-500" />
                                        <ToggleLeft v-else class="w-4 h-4 text-muted-foreground" />
                                    </Button>
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/reviews/${review.id}/edit`">
                                            <Edit class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                    <Button @click="confirmDelete(review.id)" variant="ghost" size="icon-sm" class="text-destructive hover:bg-destructive/10">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!reviews.data.length" :colspan="6">Belum ada review</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="reviews.meta" :links="reviews.links" />
                </div>
            </CardContent>
        </Card>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
