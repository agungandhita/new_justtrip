<script setup lang="ts">
import { Badge } from '@/components/ui/badge'

defineProps<{
    label: string
    status?: 'pending' | 'approved' | 'completed' | 'rejected' | 'cancelled' | 'baru' | 'diproses' | 'dikonfirmasi' | 'ditolak' | 'selesai' | 'aktif' | 'nonaktif'
    color?: string
}>()

// Map status to Badge variant-like classes
const statusClassMap: Record<string, string> = {
    pending: 'bg-amber-100 text-amber-700 border-amber-200',
    approved: 'bg-blue-100 text-blue-700 border-blue-200',
    completed: 'bg-green-100 text-green-700 border-green-200',
    selesai: 'bg-green-100 text-green-700 border-green-200',
    rejected: 'bg-red-100 text-red-700 border-red-200',
    ditolak: 'bg-red-100 text-red-700 border-red-200',
    cancelled: 'bg-slate-100 text-slate-600 border-slate-200',
    baru: 'bg-blue-100 text-blue-700 border-blue-200',
    diproses: 'bg-amber-100 text-amber-700 border-amber-200',
    dikonfirmasi: 'bg-green-100 text-green-700 border-green-200',
    aktif: 'bg-emerald-100 text-emerald-700 border-emerald-200',
    nonaktif: 'bg-slate-100 text-slate-500 border-slate-200',
}
</script>

<template>
    <span
        class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium border"
        :class="status && statusClassMap[status] ? statusClassMap[status] : 'bg-muted text-muted-foreground border-border'"
        :style="!status && color ? { backgroundColor: color + '20', color: color, borderColor: color + '40' } : {}"
    >
        {{ label }}
    </span>
</template>
