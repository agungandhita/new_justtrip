<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ChevronLeft, ChevronRight } from 'lucide-vue-next'

interface Link {
    url: string | null
    label: string
    active: boolean
}

defineProps<{
    meta: {
        current_page: number
        last_page: number
        per_page: number
        total: number
        from: number | null
        to: number | null
    }
    links: {
        prev: string | null
        next: string | null
    }
}>()
</script>

<template>
    <div class="flex items-center justify-between pt-4 border-t border-slate-200 dark:border-slate-800">
        <p class="text-sm text-slate-500">
            Menampilkan {{ meta.from ?? 0 }}-{{ meta.to ?? 0 }} dari {{ meta.total }} data
        </p>
        <div class="flex items-center gap-1">
            <Link
                v-if="links.prev"
                :href="links.prev"
                class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition-colors"
                preserve-scroll
            >
                <ChevronLeft class="w-4 h-4" />
            </Link>
            <span v-else class="p-2 rounded-lg text-slate-300 cursor-not-allowed">
                <ChevronLeft class="w-4 h-4" />
            </span>

            <span class="px-3 py-1 text-sm font-medium text-slate-700 bg-slate-100 rounded-lg">
                {{ meta.current_page }} / {{ meta.last_page }}
            </span>

            <Link
                v-if="links.next"
                :href="links.next"
                class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 transition-colors"
                preserve-scroll
            >
                <ChevronRight class="w-4 h-4" />
            </Link>
            <span v-else class="p-2 rounded-lg text-slate-300 cursor-not-allowed">
                <ChevronRight class="w-4 h-4" />
            </span>
        </div>
    </div>
</template>
