<script setup lang="ts">
import { ref } from 'vue'
import { AlertTriangle, X } from 'lucide-vue-next'

const props = defineProps<{
    title?: string
    message?: string
}>()

const emit = defineEmits<{
    confirm: []
    cancel: []
}>()

const visible = ref(false)

function open() {
    visible.value = true
}

function confirm() {
    visible.value = false
    emit('confirm')
}

function cancel() {
    visible.value = false
    emit('cancel')
}

defineExpose({ open })
</script>

<template>
    <Teleport to="body">
        <Transition
            enter-active-class="transition-opacity duration-200"
            enter-from-class="opacity-0"
            enter-to-class="opacity-100"
            leave-active-class="transition-opacity duration-150"
            leave-from-class="opacity-100"
            leave-to-class="opacity-0"
        >
            <div
                v-if="visible"
                class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4"
                @click.self="cancel"
            >
                <div class="bg-white dark:bg-slate-900 rounded-xl shadow-2xl w-full max-w-sm p-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                            <AlertTriangle class="w-5 h-5 text-red-600" />
                        </div>
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-slate-900 dark:text-white">
                                {{ title ?? 'Konfirmasi Hapus' }}
                            </h3>
                            <p class="text-sm text-slate-500 mt-1">
                                {{ message ?? 'Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak bisa dibatalkan.' }}
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3 mt-6 justify-end">
                        <button
                            @click="cancel"
                            class="px-4 py-2 text-sm font-medium text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-lg transition-colors"
                        >
                            Batal
                        </button>
                        <button
                            @click="confirm"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors"
                        >
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </Transition>
    </Teleport>
</template>
