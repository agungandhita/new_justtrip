<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'

const form = useForm({
    name: '',
    email: '',
    role: 'user',
    password: '',
    password_confirmation: '',
    phone: '',
    address: '',
})

function submit() { form.post('/admin/users') }
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm text-slate-500">Tambah User</span></template>
        <PageHeader title="Tambah User" :breadcrumbs="[{ label: 'Pengguna', href: '/admin/users' }, { label: 'Tambah' }]">
            <a href="/admin/users" class="flex items-center gap-2 text-sm text-slate-600 bg-slate-100 hover:bg-slate-200 px-3 py-2 rounded-lg">
                <ArrowLeft class="w-4 h-4" /> Kembali
            </a>
        </PageHeader>

        <form @submit.prevent="submit" class="space-y-6 max-w-lg">
            <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 shadow-sm p-6 space-y-4">
                <h3 class="text-base font-semibold text-slate-900 pb-3 border-b border-slate-100">Akun Baru</h3>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input v-model="form.name" type="text" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    <p v-if="form.errors.name" class="text-xs text-red-500 mt-1">{{ form.errors.name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Email <span class="text-red-500">*</span></label>
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
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Password <span class="text-red-500">*</span></label>
                    <input v-model="form.password" type="password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                    <p v-if="form.errors.password" class="text-xs text-red-500 mt-1">{{ form.errors.password }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1">Konfirmasi Password</label>
                    <input v-model="form.password_confirmation" type="password" class="w-full px-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none" />
                </div>
            </div>
            <div class="flex items-center gap-3">
                <button type="submit" :disabled="form.processing" class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg disabled:opacity-50">
                    {{ form.processing ? 'Menyimpan...' : 'Buat Akun' }}
                </button>
                <a href="/admin/users" class="px-6 py-2.5 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg">Batal</a>
            </div>
        </form>
    </AdminLayout>
</template>
