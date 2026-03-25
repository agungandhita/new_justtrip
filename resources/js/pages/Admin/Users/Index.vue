<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3'
import { Plus, Edit, Trash2, ToggleLeft, ToggleRight, Shield, User, Search } from 'lucide-vue-next'
import { ref } from 'vue'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import Pagination from '@/components/Admin/Pagination.vue'
import ConfirmDialog from '@/components/Admin/ConfirmDialog.vue'
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
        <template #header><span class="text-sm text-slate-500">Pengguna</span></template>
        <PageHeader title="Pengguna" description="Kelola akun pengguna dan admin" :breadcrumbs="[{ label: 'Pengguna' }]">
            <Link href="/admin/users/buat" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors">
                <Plus class="w-4 h-4" /> Tambah User
            </Link>
        </PageHeader>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-4 mb-5">
            <div class="relative max-w-xs">
                <Search class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" />
                <input v-model="search" @keyup.enter="applySearch" placeholder="Cari pengguna..." class="w-full pl-9 pr-4 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Pengguna</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Role</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Telepon</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Status</th>
                        <th class="text-left px-4 py-3 font-semibold text-slate-600">Bergabung</th>
                        <th class="text-center px-4 py-3 font-semibold text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <tr v-for="user in users.data" :key="user.id" class="hover:bg-slate-50 transition-colors">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm flex-shrink-0" :class="user.role === 'admin' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'">
                                    {{ user.name?.charAt(0).toUpperCase() }}
                                </div>
                                <div>
                                    <p class="font-medium text-slate-900">{{ user.name }}</p>
                                    <p class="text-xs text-slate-400">{{ user.email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1.5">
                                <Shield v-if="user.role === 'admin'" class="w-4 h-4 text-purple-600" />
                                <User v-else class="w-4 h-4 text-blue-500" />
                                <span class="capitalize text-slate-700">{{ user.role }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-slate-500">{{ user.phone ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-0.5 text-xs rounded-full" :class="user.is_active ? 'bg-green-100 text-green-700' : 'bg-slate-100 text-slate-500'">
                                {{ user.is_active ? 'Aktif' : 'Non-aktif' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">{{ user.created_at }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center justify-center gap-1">
                                <button @click="toggleActive(user.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors" title="Toggle aktif">
                                    <ToggleRight v-if="user.is_active" class="w-4 h-4 text-green-500" />
                                    <ToggleLeft v-else class="w-4 h-4" />
                                </button>
                                <Link :href="`/admin/users/${user.id}/edit`" class="p-1.5 rounded-lg text-slate-400 hover:text-blue-600 hover:bg-blue-50 transition-colors">
                                    <Edit class="w-4 h-4" />
                                </Link>
                                <button @click="confirmDelete(user.id)" class="p-1.5 rounded-lg text-slate-400 hover:text-red-600 hover:bg-red-50 transition-colors">
                                    <Trash2 class="w-4 h-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr v-if="!users.data.length">
                        <td colspan="6" class="px-4 py-12 text-center text-slate-400">Belum ada pengguna</td>
                    </tr>
                </tbody>
            </table>
            <div class="px-6 py-4 border-t border-slate-100">
                <Pagination :meta="users.meta" :links="users.links" />
            </div>
        </div>
        <ConfirmDialog ref="confirmDialog" @confirm="handleDelete" />
    </AdminLayout>
</template>
