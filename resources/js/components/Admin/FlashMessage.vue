<script setup lang="ts">
import { CheckCircle, XCircle, X } from 'lucide-vue-next'
import { ref, watch } from 'vue'

const props = defineProps<{
    flash: { success?: string | null; error?: string | null }
}>()

const visible = ref(false)
const message = ref('')
const type = ref<'success' | 'error'>('success')

watch(
    () => props.flash,
    (flash) => {
        if (flash.success) {
            message.value = flash.success
            type.value = 'success'
            visible.value = true
            setTimeout(() => (visible.value = false), 4000)
        } else if (flash.error) {
            message.value = flash.error
            type.value = 'error'
            visible.value = true
            setTimeout(() => (visible.value = false), 5000)
        }
    },
    { immediate: true, deep: true },
)
</script>

<template>
    <Transition
        enter-active-class="transition-all duration-300"
        enter-from-class="-translate-y-2 opacity-0"
        enter-to-class="translate-y-0 opacity-100"
        leave-active-class="transition-all duration-200"
        leave-from-class="opacity-100"
        leave-to-class="opacity-0"
    >
        <div
            v-if="visible"
            class="mx-6 mt-4 flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium shadow-sm"
            :class="
                type === 'success'
                    ? 'bg-green-50 text-green-800 border border-green-200'
                    : 'bg-red-50 text-red-800 border border-red-200'
            "
        >
            <CheckCircle v-if="type === 'success'" class="w-5 h-5 text-green-500 flex-shrink-0" />
            <XCircle v-else class="w-5 h-5 text-red-500 flex-shrink-0" />
            <span class="flex-1">{{ message }}</span>
            <button @click="visible = false" class="text-current opacity-60 hover:opacity-100">
                <X class="w-4 h-4" />
            </button>
        </div>
    </Transition>
</template>
