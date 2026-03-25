<script setup lang="ts">
defineProps<{
    label: string
    value: string | number
    icon?: any
    color?: 'blue' | 'green' | 'yellow' | 'red' | 'purple' | 'slate'
    trend?: string
}>()

const colorMap: Record<string, string> = {
    blue: 'bg-blue-50 text-blue-600 border-blue-100',
    green: 'bg-green-50 text-green-600 border-green-100',
    yellow: 'bg-yellow-50 text-yellow-600 border-yellow-100',
    red: 'bg-red-50 text-red-600 border-red-100',
    purple: 'bg-purple-50 text-purple-600 border-purple-100',
    slate: 'bg-slate-50 text-slate-600 border-slate-200',
}
</script>

<template>
    <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-5 flex items-start gap-4 shadow-sm hover:shadow-md transition-shadow">
        <div
            v-if="icon"
            class="w-12 h-12 rounded-xl flex items-center justify-center border flex-shrink-0"
            :class="colorMap[color ?? 'blue']"
        >
            <component :is="icon" class="w-6 h-6" />
        </div>
        <div class="flex-1 min-w-0">
            <p class="text-sm text-slate-500 font-medium">{{ label }}</p>
            <p class="text-2xl font-bold text-slate-900 dark:text-white mt-0.5">{{ value }}</p>
            <p v-if="trend" class="text-xs text-slate-400 mt-1">{{ trend }}</p>
        </div>
    </div>
</template>
