<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ChevronRight } from 'lucide-vue-next'

interface Crumb {
    label: string
    href?: string
}

defineProps<{
    title: string
    breadcrumbs?: Crumb[]
    description?: string
}>()
</script>

<template>
    <div class="mb-6">
        <!-- Breadcrumbs -->
        <nav v-if="breadcrumbs?.length" class="flex items-center gap-1 text-xs text-slate-500 mb-2">
            <span>Admin</span>
            <template v-for="(crumb, idx) in breadcrumbs" :key="idx">
                <ChevronRight class="w-3 h-3" />
                <Link
                    v-if="crumb.href"
                    :href="crumb.href"
                    class="hover:text-slate-700 transition-colors"
                >
                    {{ crumb.label }}
                </Link>
                <span v-else class="text-slate-700 font-medium">{{ crumb.label }}</span>
            </template>
        </nav>

        <!-- Title + slot for actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl font-bold text-slate-900 dark:text-white">{{ title }}</h1>
                <p v-if="description" class="text-sm text-slate-500 mt-0.5">{{ description }}</p>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <slot />
            </div>
        </div>
    </div>
</template>
