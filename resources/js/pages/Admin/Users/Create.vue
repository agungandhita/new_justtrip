<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { Separator } from '@/components/ui/separator'

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
        <template #header><span class="text-sm font-medium text-muted-foreground">Tambah User</span></template>

        <PageHeader title="Tambah User" :breadcrumbs="[{ label: 'Pengguna', href: '/admin/users' }, { label: 'Tambah' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/users"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <form @submit.prevent="submit" class="max-w-lg space-y-5">
            <Card>
                <CardHeader class="pb-3">
                    <CardTitle class="text-base">Informasi Akun</CardTitle>
                </CardHeader>
                <Separator />
                <CardContent class="pt-5 space-y-4">
                    <div class="space-y-1.5">
                        <Label>Nama Lengkap <span class="text-destructive">*</span></Label>
                        <Input v-model="form.name" type="text" placeholder="Nama lengkap" :class="form.errors.name ? 'border-destructive' : ''" />
                        <p v-if="form.errors.name" class="text-xs text-destructive">{{ form.errors.name }}</p>
                    </div>
                    <div class="space-y-1.5">
                        <Label>Email <span class="text-destructive">*</span></Label>
                        <Input v-model="form.email" type="email" placeholder="email@contoh.com" :class="form.errors.email ? 'border-destructive' : ''" />
                        <p v-if="form.errors.email" class="text-xs text-destructive">{{ form.errors.email }}</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Role</Label>
                            <Select v-model="form.role">
                                <SelectTrigger><SelectValue /></SelectTrigger>
                                <SelectContent>
                                    <SelectItem value="user">User</SelectItem>
                                    <SelectItem value="admin">Admin</SelectItem>
                                </SelectContent>
                            </Select>
                        </div>
                        <div class="space-y-1.5">
                            <Label>Telepon</Label>
                            <Input v-model="form.phone" type="text" placeholder="08xx-xxxx-xxxx" />
                        </div>
                    </div>
                    <Separator />
                    <div class="grid grid-cols-2 gap-4">
                        <div class="space-y-1.5">
                            <Label>Password <span class="text-destructive">*</span></Label>
                            <Input v-model="form.password" type="password" :class="form.errors.password ? 'border-destructive' : ''" />
                            <p v-if="form.errors.password" class="text-xs text-destructive">{{ form.errors.password }}</p>
                        </div>
                        <div class="space-y-1.5">
                            <Label>Konfirmasi Password</Label>
                            <Input v-model="form.password_confirmation" type="password" />
                        </div>
                    </div>
                </CardContent>
            </Card>

            <div class="flex items-center gap-3">
                <Button type="submit" :disabled="form.processing">
                    {{ form.processing ? 'Menyimpan...' : 'Buat Akun' }}
                </Button>
                <Button variant="outline" as-child>
                    <a href="/admin/users">Batal</a>
                </Button>
            </div>
        </form>
    </AdminLayout>
</template>
