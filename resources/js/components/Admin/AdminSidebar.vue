<script setup lang="ts">
import { Link, usePage, router } from '@inertiajs/vue3'
import {
    LayoutDashboard,
    CalendarCheck,
    ClipboardList,
    Package,
    Tag,
    Image,
    Newspaper,
    Star,
    Users,
    LogOut,
    ChevronRight,
    Globe,
} from 'lucide-vue-next'
import { computed, ref } from 'vue'
import type { PageProps } from '@/types'

interface NavGroup {
    label: string
    items: NavItem[]
}

interface NavItem {
    label: string
    href: string
    icon?: any
    badge?: number
    children?: NavItem[]
}

const page = usePage<PageProps>()
const user = computed(() => page.props.auth.user)
const currentPath = computed(() => window.location.pathname)

const isActive = (href: string) => currentPath.value.startsWith(href)

const navGroups: NavGroup[] = [
    {
        label: 'Overview',
        items: [
            { label: 'Dashboard', href: '/admin/dashboard', icon: LayoutDashboard },
        ],
    },
    {
        label: 'Pemesanan',
        items: [
            { label: 'Booking Reguler', href: '/admin/bookings', icon: CalendarCheck },
            { label: 'Request Trip', href: '/admin/guest-bookings', icon: ClipboardList },
        ],
    },
    {
        label: 'Paket & Promo',
        items: [
            { label: 'Layanan / Paket', href: '/admin/layanan', icon: Package },
            { label: 'Special Offer', href: '/admin/special-offers', icon: Tag },
        ],
    },
    {
        label: 'Konten',
        items: [
            { label: 'Galeri', href: '/admin/galleries', icon: Image },
            { label: 'Artikel', href: '/admin/news', icon: Newspaper },
            { label: 'Review', href: '/admin/reviews', icon: Star },
        ],
    },
    {
        label: 'Manajemen',
        items: [
            { label: 'Pengguna', href: '/admin/users', icon: Users },
        ],
    },
]

const sidebarOpen = ref(true)

function logout() {
    router.post('/logout')
}
</script>

<template>
    <aside
        class="flex flex-col h-screen bg-slate-900 text-slate-100 transition-all duration-300"
        :class="sidebarOpen ? 'w-64' : 'w-16'"
    >
        <!-- Logo -->
        <div class="flex items-center gap-3 px-4 py-5 border-b border-slate-800">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center flex-shrink-0">
                <Globe class="w-5 h-5 text-white" />
            </div>
            <span v-if="sidebarOpen" class="font-bold text-lg text-white leading-none">
                JustTrip<br />
                <span class="text-xs font-normal text-slate-400">Admin Panel</span>
            </span>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto py-4 px-2 space-y-1">
            <div v-for="group in navGroups" :key="group.label" class="mb-4">
                <p
                    v-if="sidebarOpen"
                    class="px-3 mb-1 text-xs font-semibold text-slate-500 uppercase tracking-wider"
                >
                    {{ group.label }}
                </p>
                <div v-else class="border-t border-slate-800 mb-2" />

                <Link
                    v-for="item in group.items"
                    :key="item.href"
                    :href="item.href"
                    class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium transition-all duration-150"
                    :class="
                        isActive(item.href)
                            ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/25'
                            : 'text-slate-400 hover:text-white hover:bg-slate-800'
                    "
                >
                    <component :is="item.icon" class="w-5 h-5 flex-shrink-0" />
                    <span v-if="sidebarOpen" class="truncate">{{ item.label }}</span>
                </Link>
            </div>
        </nav>

        <!-- User + Logout -->
        <div class="border-t border-slate-800 p-3 space-y-1">
            <div v-if="sidebarOpen" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-slate-800">
                <div class="w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                    {{ user?.name?.charAt(0)?.toUpperCase() }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-white truncate">{{ user?.name }}</p>
                    <p class="text-xs text-slate-400 truncate">{{ user?.email }}</p>
                </div>
            </div>
            <button
                @click="logout"
                class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-sm text-slate-400 hover:text-red-400 hover:bg-slate-800 transition-colors"
            >
                <LogOut class="w-5 h-5 flex-shrink-0" />
                <span v-if="sidebarOpen">Keluar</span>
            </button>
        </div>
    </aside>
</template>
