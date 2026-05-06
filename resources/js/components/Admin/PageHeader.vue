<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ChevronRight, Home } from 'lucide-vue-next'

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
        <nav v-if="breadcrumbs?.length" class="flex items-center gap-1 text-xs text-muted-foreground mb-2">
            <Home class="w-3 h-3" />
            <ChevronRight class="w-3 h-3" />
            <span>Admin</span>
            <template v-for="(crumb, idx) in breadcrumbs" :key="idx">
                <ChevronRight class="w-3 h-3" />
                <Link
                    v-if="crumb.href"
                    :href="crumb.href"
                    class="hover:text-foreground transition-colors"
                >
                    {{ crumb.label }}
                </Link>
                <span v-else class="text-foreground font-medium">{{ crumb.label }}</span>
            </template>
        </nav>

        <!-- Title + slot for actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div>
                <h1 class="text-xl font-bold tracking-tight text-foreground">{{ title }}</h1>
                <p v-if="description" class="text-sm text-muted-foreground mt-0.5">{{ description }}</p>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <slot />
            </div>
        </div>
    </div>
</template>
