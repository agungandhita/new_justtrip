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
    Globe,
    ChevronLeft,
    ChevronRight,
} from 'lucide-vue-next'
import { computed, ref } from 'vue'
import { Button } from '@/components/ui/button'
import { Separator } from '@/components/ui/separator'
import { Tooltip, TooltipContent, TooltipProvider, TooltipTrigger } from '@/components/ui/tooltip'
import type { PageProps } from '@/types'

interface NavGroup {
    label: string
    items: NavItem[]
}

interface NavItem {
    label: string
    href: string
    icon?: any
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

const collapsed = ref(false)

function logout() {
    router.post('/logout')
}
</script>

<template>
    <aside
        class="relative flex flex-col h-screen bg-white border-r border-border transition-all duration-300 shrink-0"
        :class="collapsed ? 'w-[60px]' : 'w-64'"
    >
        <!-- Toggle collapse button -->
        <button
            @click="collapsed = !collapsed"
            class="absolute -right-3 top-6 z-10 w-6 h-6 bg-background border border-border rounded-full flex items-center justify-center shadow-sm hover:bg-accent transition-colors"
        >
            <ChevronLeft v-if="!collapsed" class="w-3.5 h-3.5 text-muted-foreground" />
            <ChevronRight v-else class="w-3.5 h-3.5 text-muted-foreground" />
        </button>

        <!-- Logo -->
        <div class="flex items-center gap-3 px-4 h-16 border-b border-border shrink-0 overflow-hidden">
            <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center flex-shrink-0">
                <Globe class="w-4 h-4 text-primary-foreground" />
            </div>
            <div v-if="!collapsed" class="flex flex-col leading-tight overflow-hidden">
                <span class="font-bold text-sm text-foreground truncate">JustTrip</span>
                <span class="text-xs text-muted-foreground truncate">Admin Panel</span>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 overflow-y-auto py-3 px-2">
            <TooltipProvider :delay-duration="0">
                <div v-for="group in navGroups" :key="group.label" class="mb-4">
                    <p
                        v-if="!collapsed"
                        class="px-3 mb-1 text-[10px] font-semibold text-muted-foreground uppercase tracking-widest"
                    >
                        {{ group.label }}
                    </p>
                    <Separator v-else class="mb-2 mx-2" />

                    <Tooltip v-for="item in group.items" :key="item.href">
                        <TooltipTrigger as-child>
                            <Link
                                :href="item.href"
                                class="flex items-center gap-3 px-3 py-2 mb-0.5 rounded-md text-sm font-medium transition-all duration-150"
                                :class="
                                    isActive(item.href)
                                        ? 'bg-primary text-primary-foreground shadow-sm'
                                        : 'text-muted-foreground hover:text-foreground hover:bg-accent'
                                "
                            >
                                <component :is="item.icon" class="w-4 h-4 flex-shrink-0" />
                                <span v-if="!collapsed" class="truncate">{{ item.label }}</span>
                            </Link>
                        </TooltipTrigger>
                        <TooltipContent v-if="collapsed" side="right">
                            {{ item.label }}
                        </TooltipContent>
                    </Tooltip>
                </div>
            </TooltipProvider>
        </nav>

        <!-- User + Logout -->
        <div class="border-t border-border p-3 space-y-1 shrink-0">
            <div v-if="!collapsed" class="flex items-center gap-3 px-3 py-2 rounded-md bg-muted/50 mb-1 overflow-hidden">
                <div class="w-7 h-7 rounded-full bg-primary flex items-center justify-center text-primary-foreground text-xs font-bold flex-shrink-0">
                    {{ user?.name?.charAt(0)?.toUpperCase() }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-foreground truncate">{{ user?.name }}</p>
                    <p class="text-[10px] text-muted-foreground truncate">{{ user?.email }}</p>
                </div>
            </div>
            <TooltipProvider :delay-duration="0">
                <Tooltip>
                    <TooltipTrigger as-child>
                        <Button
                            @click="logout"
                            variant="ghost"
                            class="w-full justify-start gap-3 text-muted-foreground hover:text-destructive hover:bg-destructive/10 px-3"
                            :class="collapsed ? 'px-0 justify-center' : ''"
                            size="sm"
                        >
                            <LogOut class="w-4 h-4 flex-shrink-0" />
                            <span v-if="!collapsed">Keluar</span>
                        </Button>
                    </TooltipTrigger>
                    <TooltipContent v-if="collapsed" side="right">Keluar</TooltipContent>
                </Tooltip>
            </TooltipProvider>
        </div>
    </aside>
</template>
