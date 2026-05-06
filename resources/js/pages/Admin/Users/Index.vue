<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Shield, User, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
import { Card, CardContent } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Table, TableBody, TableCell, TableHead, TableHeader, TableRow, TableEmpty } from '@/components/ui/table'
import { Badge } from '@/components/ui/badge'
import type { User as UserType, PaginatedData } from '@/types'

const props = defineProps<{
    users: PaginatedData<UserType>
    filters: { search?: string; role?: string }
}>()

const search = ref(props.filters.search ?? '')
const confirmDialog = ref<InstanceType<typeof ConfirmDialog>>()
const deletingId = ref<string>()

function applySearch() {
    router.get('/admin/users', { search: search.value }, { preserveState: true, replace: true })
}
function confirmDelete(id: string) { deletingId.value = id; confirmDialog.value?.open() }
function handleDelete() { if (deletingId.value) router.delete(`/admin/users/${deletingId.value}`) }
function toggleActive(id: string) { router.post(`/admin/users/${id}/toggle-active`, {}, { preserveScroll: true }) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-muted-foreground">Pengguna</span></template>

        <PageHeader title="Pengguna" description="Kelola akun pengguna dan admin" :breadcrumbs="[{ label: 'Pengguna' }]">
            <Button as-child class="gap-2">
                <Link href="/admin/users/buat">
                    <Plus class="w-4 h-4" /> Tambah User
                </Link>
            </Button>
        </PageHeader>

        <!-- Search -->
        <Card class="mb-5">
            <CardContent class="pt-4 pb-3">
                <div class="relative max-w-sm">
                    <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-muted-foreground" />
                    <Input v-model="search" @keyup.enter="applySearch" placeholder="Cari pengguna..." class="pl-9" />
                </div>
            </CardContent>
        </Card>

        <Card>
            <CardContent class="p-0">
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead>Pengguna</TableHead>
                            <TableHead>Role</TableHead>
                            <TableHead>Telepon</TableHead>
                            <TableHead>Status</TableHead>
                            <TableHead>Bergabung</TableHead>
                            <TableHead class="text-center w-28">Aksi</TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        <TableRow v-for="user in users.data" :key="user.id">
                            <TableCell>
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-xs flex-shrink-0"
                                        :class="user.role === 'admin' ? 'bg-violet-100 text-violet-700' : 'bg-blue-100 text-blue-700'">
                                        {{ user.name?.charAt(0).toUpperCase() }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-foreground">{{ user.name }}</p>
                                        <p class="text-xs text-muted-foreground">{{ user.email }}</p>
                                    </div>
                                </div>
                            </TableCell>
                            <TableCell>
                                <div class="flex items-center gap-1.5">
                                    <Shield v-if="user.role === 'admin'" class="w-3.5 h-3.5 text-violet-600" />
                                    <User v-else class="w-3.5 h-3.5 text-blue-500" />
                                    <span class="text-sm capitalize text-foreground">{{ user.role }}</span>
                                </div>
                            </TableCell>
                            <TableCell class="text-muted-foreground">{{ user.phone ?? '-' }}</TableCell>
                            <TableCell>
                                <Badge :variant="user.is_active ? 'default' : 'secondary'" class="text-xs">
                                    {{ user.is_active ? 'Aktif' : 'Non-aktif' }}
                                </Badge>
                            </TableCell>
                            <TableCell class="text-muted-foreground text-xs">{{ user.created_at }}</TableCell>
                            <TableCell>
                                <div class="flex items-center justify-center gap-1">
                                    <Button @click="toggleActive(user.id)" variant="ghost" size="icon-sm">
                                        <ToggleRight v-if="user.is_active" class="w-4 h-4 text-green-500" />
                                        <ToggleLeft v-else class="w-4 h-4 text-muted-foreground" />
                                    </Button>
                                    <Button variant="ghost" size="icon-sm" as-child>
                                        <Link :href="`/admin/users/${user.id}/edit`">
                                            <Edit class="w-4 h-4" />
                                        </Link>
                                    </Button>
                                    <Button @click="confirmDelete(user.id)" variant="ghost" size="icon-sm" class="text-destructive hover:bg-destructive/10 hover:text-destructive">
                                        <Trash2 class="w-4 h-4" />
                                    </Button>
                                </div>
                            </TableCell>
                        </TableRow>
                        <TableEmpty v-if="!users.data.length" :colspan="6">Belum ada pengguna</TableEmpty>
                    </TableBody>
                </Table>
                <div class="px-6 py-3 border-t border-border">
                    <Pagination :meta="users.meta" :links="users.links" />
                </div>
            </CardContent>
        </Card>

        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
