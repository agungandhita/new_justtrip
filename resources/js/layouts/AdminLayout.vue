<script setup lang="ts">
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'
import AdminSidebar from '@/components/Admin/AdminSidebar.vue'
import FlashMessage from '@/components/Admin/FlashMessage.vue'
import type { PageProps } from '@/types'
import { Sun, Moon, Monitor } from 'lucide-vue-next'
import { useAppearance } from '@/composables/useAppearance'

const page = usePage<PageProps>()
const flash = computed(() => page.props.flash)
const { appearance, updateAppearance } = useAppearance()

const toggleTheme = () => {
    if (appearance.value === 'light') {
        updateAppearance('dark')
    } else if (appearance.value === 'dark') {
        updateAppearance('system')
    } else {
        updateAppearance('light')
    }
}
</script>

<template>
    <div class="flex h-screen overflow-hidden bg-slate-50 dark:bg-slate-950">
        <!-- Sidebar -->
        <AdminSidebar />

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top bar -->
            <header class="h-14 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800 flex items-center px-6 gap-4 flex-shrink-0">
                <div class="flex-1">
                    <slot name="header" />
                </div>
                <div class="flex items-center gap-4 text-sm text-slate-500">
                    <span class="hidden md:inline">{{ new Date().toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }) }}</span>
                    <button @click="toggleTheme" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors focus:outline-none" title="Ganti Tema">
                        <Sun v-if="appearance === 'light'" class="w-5 h-5 text-amber-500" />
                        <Moon v-else-if="appearance === 'dark'" class="w-5 h-5 text-blue-400" />
                        <Monitor v-else class="w-5 h-5 text-slate-500 dark:text-slate-400" />
                    </button>
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
