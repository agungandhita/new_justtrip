<script setup lang="ts">
import { AlertTriangle } from 'lucide-vue-next'
import {
    Dialog,
    DialogContent,
    DialogDescription,
    DialogFooter,
    DialogHeader,
    DialogTitle,
} from '@/components/ui/dialog'
import { Button } from '@/components/ui/button'
import { ref } from 'vue'

const props = defineProps<{
    title?: string
    message?: string
}>()

const emit = defineEmits<{
    confirm: []
    cancel: []
}>()

const open = ref(false)

function openDialog() {
    open.value = true
}

function confirm() {
    open.value = false
    emit('confirm')
}

function cancel() {
    open.value = false
    emit('cancel')
}

defineExpose({ open: openDialog })
</script>

<template>
    <Dialog v-model:open="open">
        <DialogContent class="sm:max-w-md">
            <DialogHeader>
                <div class="flex items-center gap-3 mb-1">
                    <div class="w-9 h-9 rounded-full bg-destructive/10 flex items-center justify-center flex-shrink-0">
                        <AlertTriangle class="w-4 h-4 text-destructive" />
                    </div>
                    <DialogTitle>{{ title ?? 'Konfirmasi Hapus' }}</DialogTitle>
                </div>
                <DialogDescription>
                    {{ message ?? 'Apakah Anda yakin ingin menghapus item ini? Tindakan ini tidak bisa dibatalkan.' }}
                </DialogDescription>
            </DialogHeader>
            <DialogFooter class="gap-2">
                <Button variant="outline" @click="cancel">Batal</Button>
                <Button variant="destructive" @click="confirm">Hapus</Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
