<script setup lang="ts">
defineProps<{
    label: string
    value: string | number
    icon?: any
    color?: 'blue' | 'green' | 'yellow' | 'red' | 'purple' | 'slate'
    trend?: string
}>()

const colorMap: Record<string, string> = {
    blue: 'bg-blue-50 text-blue-600',
    green: 'bg-green-50 text-green-600',
    yellow: 'bg-amber-50 text-amber-600',
    red: 'bg-red-50 text-red-600',
    purple: 'bg-violet-50 text-violet-600',
    slate: 'bg-muted text-muted-foreground',
}
</script>

<template>
    <div class="bg-card rounded-lg border border-border p-5 flex items-start gap-4 hover:shadow-sm transition-shadow">
        <div
            v-if="icon"
            class="w-10 h-10 rounded-md flex items-center justify-center flex-shrink-0"
            :class="colorMap[color ?? 'blue']"
        >
            <component :is="icon" class="w-5 h-5" />
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-xs font-medium text-muted-foreground uppercase tracking-wide">{{ label }}</p>
            <p class="text-2xl font-bold text-foreground mt-1 leading-none">{{ value }}</p>
            <p v-if="trend" class="text-xs text-muted-foreground mt-1.5">{{ trend }}</p>
        </div>
    </div>
</template>
