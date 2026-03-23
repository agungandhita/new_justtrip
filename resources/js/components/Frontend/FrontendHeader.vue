<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref, onMounted, onUnmounted } from 'vue';

// Handle user state and URL info from Inertia globally
const page = usePage();
const auth = computed(() => page.props.auth as any);

const isMobileMenuOpen = ref(false);
const isUserDropdownOpen = ref(false);

const toggleMobileMenu = () => {
    isMobileMenuOpen.value = !isMobileMenuOpen.value;
    if (isMobileMenuOpen.value) {
        isUserDropdownOpen.value = false;
    }
};

const toggleUserDropdown = () => {
    isUserDropdownOpen.value = !isUserDropdownOpen.value;
    if (isUserDropdownOpen.value) {
        isMobileMenuOpen.value = false;
    }
};

const closeMenus = (e: MouseEvent) => {
    if (!document.getElementById('mobile-menu')?.contains(e.target as Node) && 
        !document.getElementById('mobile-menu-button')?.contains(e.target as Node)) {
        isMobileMenuOpen.value = false;
    }
    if (!document.getElementById('user-dropdown')?.contains(e.target as Node) && 
        !document.getElementById('user-menu-button')?.contains(e.target as Node)) {
        isUserDropdownOpen.value = false;
    }
};

const handleEscape = (e: KeyboardEvent) => {
    if (e.key === 'Escape') {
        isMobileMenuOpen.value = false;
        isUserDropdownOpen.value = false;
    }
};

onMounted(() => {
    document.addEventListener('click', closeMenus);
    document.addEventListener('keydown', handleEscape);
});

onUnmounted(() => {
    document.removeEventListener('click', closeMenus);
    document.removeEventListener('keydown', handleEscape);
});

// Assuming Wayfinder setup isn't fully operational for standard names in Frontend yet, we use strings or custom helpers as needed.
const routeIs = (path: string) => {
    // Basic route matching placeholder
    return page.url.startsWith(path);
};
</script>

<template>
    <!-- JustTrip Bus Rental Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 border-b border-gray-100 shadow-sm backdrop-blur-md bg-white/95">
        <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 mx-auto">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <Link href="/" class="flex items-center space-x-3 group">
                        <div class="flex items-center justify-center w-10 h-10 overflow-hidden">
                            <img src="/image/LOGO TOSCA.png" alt="JustTrip Logo" class="object-contain w-10 h-10">
                        </div>
                        <div class="hidden sm:block">
                            <h1 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-900 to-blue-900">Justtrip</h1>
                            <p class="-mt-1 text-xs text-gray-500">#TripGagalMoveOn</p>
                        </div>
                    </Link>
                </div>

                <!-- Desktop Navigation -->
                <div class="items-center hidden space-x-8 md:flex">
                    <Link href="/" :class="['text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200', page.url === '/' ? 'text-blue-600' : '']">
                        Beranda
                    </Link>

                    <Link href="/destinations" :class="['text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200', routeIs('/destinations') ? 'text-blue-600' : '']">
                        Destinasi
                    </Link>
                    
                    <Link href="/opentrip" :class="['text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200', routeIs('/opentrip') ? 'text-blue-600' : '']">
                        Opentrip
                    </Link>

                    <Link href="/about" :class="['text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200', routeIs('/about') ? 'text-blue-600' : '']">
                        Tentang Kami
                    </Link>
                </div>

                <!-- CTA Button & User Menu & Mobile Menu -->
                <div class="flex items-center space-x-4">
                    <!-- User Dropdown Menu -->
                    <div v-if="auth?.user" class="relative">
                        <button id="user-menu-button" @click.stop="toggleUserDropdown" class="flex items-center p-2 space-x-2 text-gray-600 transition-colors duration-200 rounded-lg hover:text-gray-900 hover:bg-gray-100">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-blue-600">
                                <i class="text-sm text-white fas fa-user-circle"></i>
                            </div>
                            <span class="hidden text-sm font-medium md:block">{{ auth.user.name }}</span>
                            <i class="text-xs fas fa-chevron-down"></i>
                        </button>

                        <!-- Dropdown Menu -->
                        <div id="user-dropdown" v-show="isUserDropdownOpen" class="absolute right-0 z-50 w-64 mt-2 bg-white border border-gray-100 rounded-lg shadow-lg">
                            <div class="py-2">
                                <!-- User Info -->
                                <div class="px-4 py-3 border-b border-gray-100">
                                    <p class="text-sm font-medium text-gray-900">{{ auth.user.name }}</p>
                                    <p class="text-sm text-gray-500">{{ auth.user.email }}</p>
                                </div>

                                <!-- Menu Items -->
                                <div class="border-t border-gray-100">
                                    <Link href="/dashboard" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-50">
                                        <i class="mr-3 text-gray-400 fas fa-dashboard"></i>
                                        Dashboard
                                    </Link>
                                    <Link href="/settings/profile" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-50">
                                        <i class="mr-3 text-gray-400 fas fa-user-circle"></i>
                                        Profil Saya
                                    </Link>
                                    <Link href="/booking" class="flex items-center px-4 py-2 text-sm text-gray-700 transition-colors duration-200 hover:bg-gray-50">
                                        <i class="mr-3 text-gray-400 fas fa-history"></i>
                                        Riwayat Booking
                                    </Link>
                                </div>

                                <!-- Logout -->
                                <div class="border-t border-gray-100">
                                    <Link href="/logout" method="post" as="button" class="flex items-center w-full px-4 py-2 text-sm text-red-600 transition-colors duration-200 hover:bg-red-50">
                                        <i class="mr-3 text-red-500 fas fa-sign-out-alt"></i>
                                        Logout
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div v-else class="items-center hidden space-x-2 md:flex">
                        <!-- Login/Register Buttons for Guest -->
                        <Link href="/login" class="px-4 py-2 font-medium text-gray-700 transition-colors duration-200 hover:text-blue-600">
                            Masuk
                        </Link>
                        <Link href="/register" class="px-4 py-2 font-medium text-white transition-colors duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                            Daftar
                        </Link>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-button" @click.stop="toggleMobileMenu" class="p-2 text-gray-600 transition-colors duration-200 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" v-show="isMobileMenuOpen" class="bg-white border-t border-gray-100 md:hidden">
            <div class="px-4 py-3 space-y-2">
                <Link href="/" :class="['block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 rounded-lg', page.url === '/' ? 'text-blue-600 bg-blue-50' : '']">
                    <i class="mr-2 fas fa-home"></i> Beranda
                </Link>

                <Link href="/destinations" :class="['block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 rounded-lg', routeIs('/destinations') ? 'text-blue-600 bg-blue-50' : '']">
                    <i class="mr-2 fas fa-map-marked-alt"></i> Destinasi
                </Link>

                <Link href="/opentrip" :class="['block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 rounded-lg', routeIs('/opentrip') ? 'text-blue-600 bg-blue-50' : '']">
                    <i class="mr-2 fas fa-route"></i> Opentrip
                </Link>

                <Link href="/about" :class="['block px-3 py-2 text-gray-700 hover:text-blue-600 font-medium transition-colors duration-200 rounded-lg', routeIs('/about') ? 'text-blue-600 bg-blue-50' : '']">
                    <i class="mr-2 fas fa-info-circle"></i> Tentang Kami
                </Link>

                <div v-if="auth?.user" class="pt-3 mt-3 space-y-2 border-t border-gray-200">
                    <Link href="/settings/profile" class="block px-3 py-2 font-medium text-gray-700 transition-colors duration-200 rounded-lg hover:text-blue-600">
                        <i class="mr-2 fas fa-user-circle"></i> Profil Saya
                    </Link>
                    <Link href="/booking" class="block px-3 py-2 font-medium text-gray-700 transition-colors duration-200 rounded-lg hover:text-blue-600">
                        <i class="mr-2 fas fa-history"></i> Riwayat Booking
                    </Link>
                    <Link href="/logout" method="post" as="button" class="block w-full px-3 py-2 font-medium text-left text-red-600 transition-colors duration-200 rounded-lg hover:bg-red-50">
                        <i class="mr-2 fas fa-sign-out-alt"></i> Logout
                    </Link>
                </div>
                <div v-else class="pt-3 mt-3 space-y-2 border-t border-gray-200">
                    <Link href="/login" class="block px-3 py-2 font-medium text-gray-700 transition-colors duration-200 rounded-lg hover:text-blue-600">
                        <i class="mr-2 fas fa-sign-in-alt"></i> Masuk
                    </Link>
                    <Link href="/register" class="block px-3 py-2 font-medium text-white transition-colors duration-200 bg-blue-600 rounded-lg hover:bg-blue-700">
                        <i class="mr-2 fas fa-user-plus"></i> Daftar
                    </Link>
                </div>
            </div>
        </div>
    </nav>
</template>
