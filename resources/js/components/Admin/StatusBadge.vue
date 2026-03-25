<script setup lang="ts">
defineProps<{
    label: string
    color?: string
}>()
</script>

<template>
    <span
        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold"
        :style="color ? { backgroundColor: color + '20', color: color } : {}"
        :class="!color ? 'bg-slate-100 text-slate-600' : ''"
    >
        {{ label }}
    </span>
</template>
