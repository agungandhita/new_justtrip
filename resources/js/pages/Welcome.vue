<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import FrontendLayout from '@/layouts/FrontendLayout.vue';
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps<{
    popularPackages?: any[];
    featuredOffers?: any[];
    testimonials?: any[];
    featuredGallery?: any[];
    pendingBooking?: any;
    canRegister?: boolean;
}>();

// Hero Slider logic
const currentHeroSlide = ref(0);
const heroSlidesCount = 3;
let heroSlideInterval: any = null;

const nextHeroSlide = () => {
    currentHeroSlide.value = (currentHeroSlide.value + 1) % heroSlidesCount;
};
const prevHeroSlide = () => {
    currentHeroSlide.value = (currentHeroSlide.value - 1 + heroSlidesCount) % heroSlidesCount;
};
const setHeroSlide = (index: number) => {
    currentHeroSlide.value = index;
    resetHeroInterval();
};
const resetHeroInterval = () => {
    if (heroSlideInterval) clearInterval(heroSlideInterval);
    heroSlideInterval = setInterval(nextHeroSlide, 5000);
};

// Search Form logic
const searchForm = useForm({
    destinasi: '',
    departure_date: '',
    participants: '',
});

const submitSearch = () => {
    searchForm.post('/guest-booking/search'); // Adjust URL correctly based on your routing
};

// Why Choose Slider logic
const currentWhySlide = ref(0);
const whySlidesCount = 8;
let whySlideInterval: any = null;
const setWhySlide = (index: number) => {
    currentWhySlide.value = index;
    resetWhyInterval();
};
const nextWhySlide = () => {
    currentWhySlide.value = (currentWhySlide.value + 1) % whySlidesCount;
};
const resetWhyInterval = () => {
    if (whySlideInterval) clearInterval(whySlideInterval);
    whySlideInterval = setInterval(nextWhySlide, 4000);
};

// Popular Packages Tabs logic
const activeTab = ref('open-trip');

// Dest populer mock data / processing
const openTripPackages = props.popularPackages?.filter((p) => p.jenis_layanan === 'open_trip') || [];
const corporateTripPackages = props.popularPackages?.filter((p) => p.jenis_layanan === 'corporate_trip') || [];
const eduTripPackages = props.popularPackages?.filter((p) => p.jenis_layanan === 'edu_trip') || [];

onMounted(() => {
    resetHeroInterval();
    resetWhyInterval();
    
    // Initialize AOS if available, otherwise recommend adding it
    if (typeof (window as any).AOS !== 'undefined') {
        (window as any).AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 50,
        });
    }
});

onUnmounted(() => {
    if (heroSlideInterval) clearInterval(heroSlideInterval);
    if (whySlideInterval) clearInterval(whySlideInterval);
});

// Helper for image URLs handling inner/outer assets
const getAssetUrl = (path: string) => `/${path}`;

</script>

<template>
    <FrontendLayout title="Welcome">
        
        <!-- Payment Notification Banner -->
        <div v-if="pendingBooking" class="relative bg-orange-600 z-[60] animate-banner-slide-down" id="paymentBanner">
            <div class="max-w-7xl mx-auto px-4 py-3 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <div class="flex-1 flex items-center min-w-0">
                        <span class="flex p-2 rounded-xl bg-orange-700/50 backdrop-blur-sm border border-orange-400/30">
                            <i class="fas fa-credit-card text-white"></i>
                        </span>
                        <p class="ml-3 font-bold text-white truncate text-sm sm:text-base">
                            <span class="md:hidden">Bayar booking #{{ pendingBooking.booking_id }} segera!</span>
                            <span class="hidden md:inline">Pesanan ke {{ pendingBooking.layanan?.nama_layanan }} sedang menunggu pembayaran. Selesaikan sekarang!</span>
                        </p>
                    </div>
                    <div class="flex flex-shrink-0 gap-3">
                        <Link :href="`/booking/${pendingBooking.booking_id}`" class="flex items-center justify-center px-6 py-2 rounded-xl shadow-xl text-xs sm:text-sm font-black text-orange-600 bg-white hover:bg-orange-50 hover:scale-105 transition-all outline-none">
                            Lanjut Bayar
                        </Link>
                        <button type="button" @click="pendingBooking = null" class="flex items-center justify-center p-2 rounded-xl hover:bg-orange-700/50 transition-colors">
                            <i class="fas fa-times text-white"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center justify-center overflow-hidden -mt-16 pt-16">
            <!-- Background Slider -->
            <div class="absolute inset-0 z-0 bg-blue-900" id="heroSlider">
                <!-- Premium Dual Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-blue-950/60 to-black/80 z-10"></div>
                <div class="absolute inset-0 bg-blue-900/10 mix-blend-overlay z-10"></div>

                <!-- Slider Images -->
                <div class="slider-container h-full relative overflow-hidden">
                    <div :class="['slide absolute inset-0 bg-cover bg-center transition-all duration-1000 transform', currentHeroSlide === 0 ? 'opacity-100 scale-100' : 'opacity-0 scale-110']" :style="{ backgroundImage: `url(${getAssetUrl('image/1-SLIDE.png')})` }"></div>
                    <div :class="['slide absolute inset-0 bg-cover bg-center transition-all duration-1000 transform', currentHeroSlide === 1 ? 'opacity-100 scale-100' : 'opacity-0 scale-110']" :style="{ backgroundImage: `url(${getAssetUrl('image/2-SLIDE.png')})` }"></div>
                    <div :class="['slide absolute inset-0 bg-cover bg-center transition-all duration-1000 transform', currentHeroSlide === 2 ? 'opacity-100 scale-100' : 'opacity-0 scale-110']" :style="{ backgroundImage: `url(${getAssetUrl('image/3-SLIDE.png')})` }"></div>
                </div>

                <!-- Modern Slider Navigation Dots -->
                <div class="absolute bottom-24 sm:bottom-20 left-1/2 transform -translate-x-1/2 z-20 flex space-x-4">
                    <button v-for="n in heroSlidesCount" :key="n" @click="setHeroSlide(n-1)" :class="['slider-dot group relative w-10 h-1.5 rounded-full transition-all duration-500 overflow-hidden', currentHeroSlide === (n-1) ? 'bg-white' : 'bg-white/30']">
                    </button>
                </div>

                <!-- Premium Navigation Arrows (Desktop Only) -->
                <button @click="prevHeroSlide" class="hidden md:flex absolute left-8 top-1/2 transform -translate-y-1/2 z-30 w-14 h-14 items-center justify-center rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white hover:text-blue-900 transition-all duration-500 group">
                    <svg class="w-6 h-6 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>
                <button @click="nextHeroSlide" class="hidden md:flex absolute right-8 top-1/2 transform -translate-y-1/2 z-30 w-14 h-14 items-center justify-center rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-white hover:bg-white hover:text-blue-900 transition-all duration-500 group">
                    <svg class="w-6 h-6 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
            </div>

            <!-- Hero Content -->
            <div class="relative z-20 w-full px-4 max-w-7xl mx-auto pt-20 md:pt-0">
                <div class="max-w-4xl mx-auto text-center mb-4 md:mb-10">
                    <div class="flex flex-col items-center">
                        <div class="relative inline-block mt-12" data-aos="fade-down" data-aos-duration="1200">
                            <img :src="getAssetUrl('image/TITLE.png')" 
                                alt="Justtrip Title" 
                                fetchpriority="high"
                                class="w-full max-w-[200px] sm:max-w-[240px] md:max-w-[280px] h-auto drop-shadow-[0_5px_10px_rgba(0,0,0,0.2)] hover:scale-105 transition-all duration-500">
                        </div>
                        <p class="text-sm sm:text-base md:text-lg text-blue-50/90 font-medium max-w-2xl mx-auto leading-relaxed mt-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            Temukan destinasi impian Anda dan nikmati perjalanan tak terlupakan dengan pelayanan terbaik dari <span class="text-orange-400 font-bold">Justtrip</span>.
                        </p>
                    </div>            
                    <div class="mt-6 flex flex-wrap gap-3 justify-center" data-aos="zoom-in" data-aos-delay="400">
                        <Link href="/special-offers" class="group relative px-5 sm:px-8 py-2.5 sm:py-3.5 bg-orange-500 rounded-xl text-white font-bold text-sm sm:text-base transition-all duration-500 hover:bg-orange-600 hover:shadow-[0_0_20px_rgba(249,115,22,0.4)] overflow-hidden">
                            <span class="relative z-10 flex items-center">
                                <i class="fas fa-tags mr-2 group-hover:rotate-12 transition-transform"></i>
                                Promo Spesial
                            </span>
                        </Link>
                        <Link href="/packages" class="px-5 sm:px-8 py-2.5 sm:py-3.5 bg-white/10 backdrop-blur-md border border-white/30 rounded-xl text-white font-bold text-sm sm:text-base hover:bg-white hover:text-blue-900 transition-all duration-500 flex items-center">
                            <i class="fas fa-plane mr-2"></i>
                            Jelajahi Paket
                        </Link>
                    </div>
                </div>

                <!-- Premium Glassmorphism Search Form -->
                <div class="max-w-5xl mx-auto" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1200">
                    <div class="relative group">
                        <!-- Background Glow Effect -->
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500/20 to-blue-500/20 rounded-[2.5rem] blur-2xl opacity-75 group-hover:opacity-100 transition duration-1000"></div>
                        
                        <div class="relative bg-white/10 backdrop-blur-2xl border border-white/20 rounded-[2.5rem] p-5 sm:p-6 md:p-8 shadow-2xl transition-all duration-500 hover:bg-white/[0.15]">
                            <h2 class="text-lg sm:text-xl font-bold text-white mb-6 text-center tracking-wide">Cari Perjalanan Impian Anda</h2>
                            
                            <form @submit.prevent="submitSearch">
                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 lg:gap-6">
                                    <!-- Destinasi -->
                                    <div class="md:col-span-4 group/input">
                                        <label class="block text-blue-100 text-xs font-bold uppercase tracking-wider mb-2 ml-1">Destinasi</label>
                                        <div class="relative">
                                            <input type="text" v-model="searchForm.destinasi" placeholder="Mau ke mana?" 
                                                class="w-full bg-white/10 border border-white/10 rounded-2xl py-3.5 sm:py-4 pl-12 pr-4 text-white placeholder-blue-200/50 focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:bg-white/20 transition-all" required>
                                            <i class="fas fa-map-marker-alt absolute left-4 top-1/2 -translate-y-1/2 text-orange-400 group-hover/input:scale-110 transition-transform"></i>
                                        </div>
                                    </div>

                                    <!-- Tanggal -->
                                    <div class="md:col-span-4 group/input">
                                        <label class="block text-blue-100 text-xs font-bold uppercase tracking-wider mb-2 ml-1">Tanggal Keberangkatan</label>
                                        <div class="relative">
                                            <input type="date" v-model="searchForm.departure_date" 
                                                class="w-full bg-white/10 border border-white/10 rounded-2xl py-3.5 sm:py-4 pl-12 pr-4 text-white placeholder-blue-200/50 focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:bg-white/20 transition-all color-scheme-dark" required>
                                            <i class="fas fa-calendar-alt absolute left-4 top-1/2 -translate-y-1/2 text-orange-400 group-hover/input:scale-110 transition-transform"></i>
                                        </div>
                                    </div>

                                    <!-- Peserta -->
                                    <div class="md:col-span-4 group/input">
                                        <label class="block text-blue-100 text-xs font-bold uppercase tracking-wider mb-2 ml-1">Jumlah Peserta</label>
                                        <div class="relative lg:flex lg:gap-4">
                                            <div class="relative flex-grow mb-4 lg:mb-0">
                                                <select v-model="searchForm.participants" class="w-full bg-white/10 border border-white/10 rounded-2xl py-3.5 sm:py-4 pl-12 pr-10 text-white appearance-none focus:outline-none focus:ring-2 focus:ring-orange-500/50 focus:bg-white/20 transition-all cursor-pointer" required>
                                                    <option value="" class="bg-blue-900">Pilih orang</option>
                                                    <option value="1" class="bg-blue-900">1 Orang</option>
                                                    <option value="2" class="bg-blue-900">2 Orang</option>
                                                    <option value="3-5" class="bg-blue-900">3-5 Orang</option>
                                                    <option value="6+" class="bg-blue-900">6+ Orang</option>
                                                </select>
                                                <i class="fas fa-users absolute left-4 top-1/2 -translate-y-1/2 text-orange-400 group-hover/input:scale-110 transition-transform"></i>
                                            </div>
                                            
                                            <button type="submit" class="w-full lg:w-auto px-8 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-black rounded-2xl transition-all duration-300 transform hover:scale-[1.02] active:scale-95 shadow-lg flex items-center justify-center whitespace-nowrap min-w-[140px] py-3.5 sm:py-0" :disabled="searchForm.processing">
                                                <i class="fas fa-search mr-2"></i>
                                                Cari
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Animated Scroll Hint -->
            <a href="#why-choose" class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20 flex flex-col items-center group">
                <span class="text-white/50 text-[10px] uppercase tracking-[0.2em] font-bold mb-2 group-hover:text-white transition-colors">Scroll</span>
                <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center p-1 group-hover:border-white transition-colors">
                    <div class="w-1.5 h-1.5 bg-white rounded-full animate-bounce"></div>
                </div>
            </a>
        </section>

        <!-- Why Choose JustTrip Section -->
        <section id="why-choose" class="bg-white overflow-hidden scroll-mt-20">
            <div class="flex flex-col lg:flex-row">
                <!-- Left Side: Copywriting -->
                <div class="w-full lg:w-3/5 bg-blue-700 p-8 md:p-12 lg:p-16 text-white relative flex flex-col justify-center">
                    <div class="absolute inset-0 opacity-[0.08]" style="background-image: linear-gradient(#fff 1px, transparent 1px), linear-gradient(90deg, #fff 1px, transparent 1px); background-size: 40px 40px;"></div>
                    
                    <div class="relative z-10" data-aos="fade-right">
                        <h2 class="text-2xl md:text-3xl font-black mb-10 tracking-tight uppercase">Kenapa Memilih <span class="text-orange-400">JustTrip?</span></h2>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-8">
                            <div class="flex gap-4 group" v-for="point in [
                                {title: 'Sudah Berlegalitas PT', desc: 'Keamanan transaksi terjamin dengan payung hukum resmi PT Justtrip Indonesia.', icon: 'fa-shield-alt'},
                                {title: 'Tim Bersertifikat LSP & BNSP', desc: 'Dikawal oleh tenaga ahli yang kompeten dan diakui secara nasional.', icon: 'fa-user-check'},
                                {title: 'Trip Penuh Kesan & Makna', desc: 'Fokus membangun hubungan dan kebersamaan, bukan sekadar jalan-jalan.', icon: 'fa-heart'},
                                {title: 'Jaminan & Keuntungan di MOU', desc: 'Kepastian layanan tertulis jelas dalam kontrak kerja sama yang transparan.', icon: 'fa-file-signature'},
                                {title: 'Tenaga Ahli Berkompeten', desc: 'Tim fasilitator berpengalaman yang ahli di bidang manajemen acara dan SDM.', icon: 'fa-users'},
                                {title: 'Fleksibel & Customizable', desc: 'Program dapat disesuaikan sepenuhnya dengan budget dan kebutuhan Anda.', icon: 'fa-adjust'},
                                {title: 'Trip Kekinian & Up to Date', desc: 'Destinasi dan konten acara yang selalu mengikuti tren terbaru (Instagrammable).', icon: 'fa-camera-retro'},
                                {title: 'Perencanaan Sistematis', desc: 'Alur kerja yang rapi dan laporan berkala yang transparan kepada klien.', icon: 'fa-tasks'},
                                {title: 'Mitra Terpercaya', desc: 'Bekerja sama dengan vendor hotel, transport, dan katering pilihan terbaik.', icon: 'fa-handshake'},
                                {title: 'Harga Dapat Dinegosiasi', desc: 'Penawaran harga yang kompetitif dan fleksibel sesuai kebutuhan paket Anda.', icon: 'fa-tags'},
                            ]" :key="point.title">
                                <div class="flex-shrink-0 w-10 h-10 border border-white/20 rounded-lg flex items-center justify-center bg-white/5 group-hover:bg-orange-500 transition-all duration-300">
                                    <i :class="['fas text-sm text-orange-400 group-hover:text-white transition-colors', point.icon]"></i>
                                </div>
                                <div class="flex flex-col">
                                    <h3 class="font-bold text-sm md:text-base text-white mb-1 uppercase tracking-wide">{{ point.title }}</h3>
                                    <p class="text-blue-100/70 text-xs leading-relaxed">{{ point.desc }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Visual Image/Slider -->
                <div class="w-full lg:w-2/5 relative min-h-[450px] lg:min-h-full group overflow-hidden">
                    <div class="absolute inset-x-0 top-0 p-8 z-20 text-center bg-gradient-to-b from-black/60 to-transparent">
                        <p class="text-orange-400 font-bold text-xs md:text-sm uppercase tracking-[0.3em] mb-1">Kenapa Harus Pilih</p>
                        <h2 class="text-white text-3xl md:text-4xl font-black italic tracking-tighter uppercase mb-1">JustTrip Tour</h2>
                    </div>

                    <!-- Slider Container -->
                    <div class="absolute inset-0">
                        <div v-for="n in whySlidesCount" :key="n" :class="['absolute inset-0 transition-opacity duration-1000 ease-in-out', currentWhySlide === (n-1) ? 'opacity-100' : 'opacity-0']">
                            <img :src="getAssetUrl(`image/${n}.jpg`)" loading="lazy" class="w-full h-full object-cover grayscale-[15%] group-hover:grayscale-0 transition-all duration-700">
                            <div class="absolute inset-0 bg-blue-900/10 mix-blend-multiply"></div>
                        </div>
                    </div>

                    <!-- Slider Indicators -->
                    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2 z-20">
                        <button v-for="n in whySlidesCount" :key="n" @click="setWhySlide(n-1)" :class="['h-1 rounded-full transition-all duration-300', currentWhySlide === (n-1) ? 'bg-orange-500 w-8' : 'w-2 bg-white/30']"></button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Customer Reviews Section -->
        <section v-if="testimonials && testimonials.length > 0" id="customer-reviews" class="py-12 sm:py-16 md:py-20 bg-gradient-to-br from-teal-50 to-cyan-50">
            <div class="container mx-auto px-4 max-w-7xl">
                <!-- Section Header -->
                <div class="text-center mb-8 sm:mb-12 md:mb-16" data-aos="fade-up">
                    <p class="text-xs sm:text-sm font-semibold text-teal-600 uppercase tracking-widest mb-2">Testimoni Pelanggan</p>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-3 sm:mb-4">Apa Kata Mereka?</h2>
                    <p class="text-sm sm:text-base md:text-lg text-gray-600 max-w-2xl mx-auto">Pengalaman nyata dari pelanggan yang telah menikmati perjalanan bersama JustTrip</p>
                </div>

                <!-- Reviews Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    <div v-for="(review, index) in testimonials" :key="index" class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 overflow-hidden" data-aos="fade-up" :data-aos-delay="(index + 1) * 100">
                        <!-- Card Content -->
                        <div class="p-6 sm:p-8">
                            <!-- Quote Icon -->
                            <div class="mb-4">
                                <svg class="w-8 h-8 sm:w-10 sm:h-10 text-teal-400/50" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                                </svg>
                            </div>
                            
                            <!-- Rating -->
                            <div class="mb-4 text-yellow-400 text-lg sm:text-xl">
                                {{ review.formatted_rating || '★★★★★' }}
                            </div>

                            <!-- Review Content -->
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed mb-6 line-clamp-4">"{{ review.content }}"</p>

                            <!-- Customer Info -->
                            <div class="flex items-center border-t border-gray-100 pt-6">
                                <img :src="review.avatar_url || (review.featured_image ? getAssetUrl('storage/' + review.featured_image) : 'https://ui-avatars.com/api/?name='+encodeURIComponent(review.customer_name || review.title))" :alt="review.customer_name || review.title" loading="lazy" class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover border-2 border-teal-100 mr-4 group-hover:border-teal-400 transition-colors">
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-gray-800 text-sm sm:text-base truncate">{{ review.customer_name || review.title }}</h4>
                                    <p v-if="review.customer_position || review.excerpt" class="text-gray-500 text-xs sm:text-sm truncate">{{ review.customer_position || review.excerpt }}</p>
                                </div>
                            </div>

                            <!-- Destination Badge -->
                            <div v-if="review.destination" class="mt-4">
                                <span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-teal-50 to-cyan-50 text-teal-700 px-3 py-1.5 rounded-full text-xs sm:text-sm font-medium border border-teal-100">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ review.destination }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partner Slider Section -->
        <section id="partner-slider" class="py-10 sm:py-12 overflow-hidden bg-white">
            <div class="container mx-auto px-4 mb-6 text-center max-w-7xl" data-aos="fade-up">
                <p class="text-xs sm:text-sm font-semibold text-teal-600 uppercase tracking-widest mb-2">Our Trusted Partners</p>
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-800">Bekerja Sama Dengan Yang Terbaik</h2>
            </div>

            <div class="partner-marquee">
                <div class="partner-track">
                    <!-- Original Set -->
                    <img v-for="partner in [
                        'img_0353.png', 'img_0354.jpg', 'img_0355.png', 'img_0356.png',
                        'img_0357.png', 'img_0358.jpg', 'img_0359.png', 'img_0360.png',
                        'img_0361.png', 'img_0362.png', 'img_0363.png', 'img_0364.png',
                        'img_0365.png', 'img_0366.png', 'img_0367.jpg', 'img_0368.jpg'
                    ]" :key="partner" :src="getAssetUrl('img/' + partner)" loading="lazy" alt="Partner" class="partner-logo">
                    
                    <!-- Duplicate Set for Seamless Loop -->
                    <img v-for="partner in [
                        'img_0353.png', 'img_0354.jpg', 'img_0355.png', 'img_0356.png',
                        'img_0357.png', 'img_0358.jpg', 'img_0359.png', 'img_0360.png',
                        'img_0361.png', 'img_0362.png', 'img_0363.png', 'img_0364.png',
                        'img_0365.png', 'img_0366.png', 'img_0367.jpg', 'img_0368.jpg'
                    ]" :key="'dup-'+partner" :src="getAssetUrl('img/' + partner)" loading="lazy" alt="Partner" class="partner-logo">
                </div>
            </div>
        </section>

    </FrontendLayout>
</template>

<style scoped>
.color-scheme-dark::-webkit-calendar-picker-indicator {
    filter: invert(1);
    cursor: pointer;
}
@keyframes banner-slide-down {
    from { transform: translateY(-100%); }
    to { transform: translateY(0); }
}
.animate-banner-slide-down {
    animation: banner-slide-down 0.5s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Partner Marquee Animation */
.partner-marquee {
    overflow: hidden;
    width: 100%;
}
.partner-track {
    display: flex;
    gap: 2rem;
    animation: scroll-left 25s linear infinite;
    width: max-content;
}
.partner-logo {
    height: 40px;
    width: auto;
    object-fit: contain;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}
.partner-logo:hover {
    transform: scale(1.1);
}
.partner-marquee:hover .partner-track {
    animation-play-state: paused;
}
@keyframes scroll-left {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
@media (min-width: 640px) {
    .partner-logo { height: 48px; }
    .partner-track { gap: 3rem; }
}
@media (min-width: 768px) {
    .partner-logo { height: 56px; }
    .partner-track { gap: 4rem; }
}
</style>
