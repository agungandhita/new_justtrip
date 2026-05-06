<script setup lang="ts">
import { Link } from '@inertiajs/vue3'
import { ChevronLeft, ChevronRight } from 'lucide-vue-next'
import { Button } from '@/components/ui/button'

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
    <div class="flex items-center justify-between">
        <p class="text-sm text-muted-foreground">
            Menampilkan <span class="font-medium text-foreground">{{ meta.from ?? 0 }}–{{ meta.to ?? 0 }}</span> dari <span class="font-medium text-foreground">{{ meta.total }}</span> data
        </p>
        <div class="flex items-center gap-1">
            <Button
                v-if="links.prev"
                as-child
                variant="outline"
                size="icon-sm"
            >
                <Link :href="links.prev" preserve-scroll>
                    <ChevronLeft class="w-4 h-4" />
                </Link>
            </Button>
            <Button v-else variant="outline" size="icon-sm" disabled>
                <ChevronLeft class="w-4 h-4" />
            </Button>

            <span class="px-3 py-1 text-sm font-medium text-foreground bg-muted rounded-md min-w-[60px] text-center">
                {{ meta.current_page }} / {{ meta.last_page }}
            </span>

            <Button
                v-if="links.next"
                as-child
                variant="outline"
                size="icon-sm"
            >
                <Link :href="links.next" preserve-scroll>
                    <ChevronRight class="w-4 h-4" />
                </Link>
            </Button>
            <Button v-else variant="outline" size="icon-sm" disabled>
                <ChevronRight class="w-4 h-4" />
            </Button>
        </div>
    </div>
</template>
