<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import type { User } from '@/types'

const props = defineProps<{ user: User }>()

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
    phone: props.user.phone ?? '',
    address: props.user.address ?? '',
    password: '',
    password_confirmation: '',
    _method: 'PUT',
})

function submit() { form.post(`/admin/users/${props.user.id}`) }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Edit User</span></template>
        <PageHeader title="Edit User" :breadcrumbs="[{ label: 'Pengguna', href: '/admin/users' }, { label: 'Edit' }]">
            <a href="/admin/users" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-lg">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Edit Akun</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                    <input v-model="form.name" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                    <input v-model="form.email" type="email" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    <p v-if="form.errors.email" class="text-xs text-red-500 mt-1">{{ form.errors.email }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                    <select v-model="form.role" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none bg-white">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Telepon</label>
                    <input v-model="form.phone" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
                <div class="pt-2 border-t border-slate-100">
                    <p class="text-xs text-slate-400 mb-3">Kosongkan field password jika tidak ingin mengubah password</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Password Baru</label>
                            <input v-model="form.password" type="password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi</label>
                            <input v-model="form.password_confirmation" type="password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                </button>
                <a href="/admin/users" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>
    </AdminLayout>
</template>
