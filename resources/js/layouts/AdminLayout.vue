<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import AdminSidebar from '@/components/Admin/AdminSidebar.vue'
import FlashMessage from '@/components/Admin/FlashMessage.vue'
import type { PageProps } from '@/types'

const page = usePage<PageProps>()
const flash = computed(() => page.props.flash)
</script>

<template>
    <div class="flex h-screen overflow-hidden bg-muted/30">
        <!-- Sidebar -->
        <AdminSidebar />

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden min-w-0">
            <!-- Top bar -->
            <header class="h-16 bg-background border-b border-border flex items-center px-6 gap-4 shrink-0">
                <div class="flex-1 min-w-0">
                    <slot name="header" />
                </div>
                <div class="flex items-center gap-3 text-sm text-muted-foreground shrink-0">
                    <span class="hidden md:inline text-xs">
                        {{ new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}
                    </span>
                </div>
            </header>

            <!-- Flash messages -->
            <FlashMessage :flash="flash" />

            <!-- Page content -->
            <main class="flex-1 overflow-y-auto p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
