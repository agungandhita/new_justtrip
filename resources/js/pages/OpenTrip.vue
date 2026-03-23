<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import FrontendLayout from '@/layouts/FrontendLayout.vue';

const form = useForm({
    name: '',
    email: '',
    phone: '',
    destination: '',
    participants: 1,
});

const submitBooking = () => {
    alert('Bagus! Pendaftaran simulasi Open Trip berhasil terkirim.');
    form.reset();
};
</script>

<template>
    <Head title="Open Trips - Justtrip" />

    <FrontendLayout>
        <main class="bg-slate-50 min-h-screen">
            <!-- Hero Section (Full Width, Bleeds under Navbar) -->
            <section class="relative w-full h-[500px] md:h-[600px] lg:h-[800px] mb-20 overflow-hidden">
                <img alt="Open Trip Hero" class="absolute inset-0 w-full h-full object-cover" src="/image/3-SLIDE.png"/>
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-slate-900/10 flex flex-col justify-end">
                    <div class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 mx-auto pb-16 lg:pb-32">
                        <span class="inline-block px-4 py-1.5 bg-blue-600/90 text-white text-sm font-bold rounded-full uppercase tracking-wider shadow-lg mb-6 backdrop-blur-sm">Cari Teman Baru</span>
                        <h1 class="text-white text-4xl md:text-6xl lg:text-7xl font-black mb-6 tracking-tight drop-shadow-xl">Ikuti Open Trip.</h1>
                        <p class="text-slate-200 text-lg md:text-xl lg:text-2xl max-w-4xl leading-relaxed drop-shadow-md">Jangan menunggu teman Anda luang. Bergabunglah dengan rombongan yang sefrekuensi dan jelajahi berbagai destinasi eksotis bersama-sama!</p>
                    </div>
                </div>
            </section>

            <!-- How It Works -->
            <section class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 mx-auto mb-24">
                <h2 class="text-2xl md:text-4xl font-black mb-12 flex items-center gap-4 text-slate-800 border-l-4 border-blue-600 pl-4">
                    Cara Kerjanya
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 xl:gap-12">
                    <div class="p-10 bg-white rounded-3xl border border-blue-50/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30">
                            <i class="fa-solid fa-map-location-dot text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">1. Pilih Destinasi</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Tentukan pilihan dari daftar Open Trip seru kami ke banyak titik di berbagai belahan dunia.</p>
                    </div>
                    
                    <div class="p-10 bg-white rounded-3xl border border-blue-50/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30">
                            <i class="fa-solid fa-users text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">2. Amankan Kursi</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Cek slot yang tersisa dan bayar tiketnya. Segera terhubung dengan para travel buddies baru secara online.</p>
                    </div>
                    
                    <div class="p-10 bg-white rounded-3xl border border-blue-50/50 shadow-xl shadow-slate-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-500/30">
                            <i class="fa-solid fa-plane-departure text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-4 text-slate-800">3. Berangkat Bareng</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Kemas barangmu, temui rombonganmu di titik kumpul, dan warnai liburanmu dengan pengalaman baru!</p>
                    </div>
                </div>
            </section>

            <!-- Scheduled Open Trips -->
            <section class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 mx-auto mb-24 lg:mb-32">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-12 gap-6">
                    <h2 class="text-2xl md:text-4xl font-black text-slate-800 border-l-4 border-blue-600 pl-4">Jadwal Terdekat</h2>
                    <button class="flex items-center gap-3 bg-blue-50 text-blue-600 px-6 py-3 rounded-xl font-bold hover:bg-blue-100 hover:text-blue-700 transition-colors group">
                        Lihat semua perjalanan <i class="fa-solid fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                    </button>
                </div>
                
                <div class="grid grid-cols-1 gap-10">
                    <!-- Trip Card 1 -->
                    <div class="flex flex-col lg:flex-row items-stretch bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:border-blue-100 transition-all group">
                        <div class="w-full lg:w-[45%] xl:w-[40%] h-72 lg:h-auto overflow-hidden relative">
                            <img alt="Bali Coastal" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCyGHdwBeMgpAmH_DC6uqLJxjjq8xKsMwzk045r77y03DfiQanZH2n_mQKpd6uFx9ZMD03Zh43bEuXr7yNuX2xqpjJiT1co4orqycJkaZTM-9AuDhD02cS7Zap5uV_TqlUusOBteo1wwMJ-uNo0192gFdv4_IOauvAMV8ByOFfzxpumQCgW6-EmQ8d4lKKltEYcBeqOyhe96AFgEYP9DVwXybTaUyayvmStO0LGFRChMiP6g89dhKwPgxwBm_fdUM2XzPbYW8PMtTX2"/>
                            <div class="absolute top-6 left-6">
                                <span class="px-5 py-2 bg-blue-600/90 backdrop-blur-sm text-white text-sm font-bold rounded-full uppercase tracking-widest shadow-lg">Paling Laris</span>
                            </div>
                        </div>
                        <div class="flex-1 p-8 md:p-10 lg:p-14 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-slate-500 font-bold text-sm tracking-wider uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-location-dot text-red-500 text-lg"></i> Bali, Indonesia
                                    </span>
                                </div>
                                <h3 class="text-3xl md:text-4xl font-black mb-4 group-hover:text-blue-600 transition-colors text-slate-800 tracking-tight">Bali Coastal Adventure</h3>
                                <p class="text-slate-600 mb-10 leading-relaxed text-lg lg:text-xl">Jelajahi laguna tersembunyi, kuil suci, dan budaya pesisir yang fantastis bersama kawan baru di Pulau Dewata.</p>
                                
                                <div class="flex flex-col sm:flex-row flex-wrap gap-4 md:gap-8 text-base font-medium bg-slate-50 rounded-2xl p-6 border border-slate-100">
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600"><i class="fa-regular fa-calendar text-lg"></i></div>
                                        15 Okt - 22 Okt
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center shadow-sm text-orange-600"><i class="fa-solid fa-chair text-lg"></i></div>
                                        <span class="text-orange-600 font-bold">Sisa 4 kursi</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-green-600"><i class="fa-solid fa-money-bill text-lg"></i></div>
                                        <span class="font-bold text-lg">Mulai Rp 2.5jt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between border-t border-slate-100 pt-8 gap-6">
                                <div class="flex items-center w-full sm:w-auto">
                                    <div class="flex -space-x-3 overflow-hidden mr-4">
                                        <img alt="Avatar" class="h-12 w-12 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=BU&background=random"/>
                                        <img alt="Avatar" class="h-12 w-12 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=DA&background=random"/>
                                        <img alt="Avatar" class="h-12 w-12 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=JO&background=random"/>
                                    </div>
                                    <span class="text-slate-500 font-medium">8+ orang tertarik</span>
                                </div>
                                <button class="w-full sm:w-auto bg-blue-600 text-white px-10 py-4 rounded-xl font-bold text-lg flex justify-center items-center gap-3 hover:bg-blue-700 hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-600/30">
                                    Gabung Sekarang <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Trip Card 2 -->
                    <div class="flex flex-col lg:flex-row items-stretch bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:border-blue-100 transition-all group">
                        <div class="w-full lg:w-[45%] xl:w-[40%] h-72 lg:h-auto overflow-hidden relative">
                            <img alt="Paris Lights" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC_huU08PQLRmR0WCUYR66v6M4OTUMMN4TgQmpJb0OiGINFfWF8JGojNtV26cAx-r-SQQ8wZHn5j_Z_wVEYRWiUKuTw5ZU3OaK6e1mFZd3tBfRs3txKsREvYKNGfufDP8LgjeJe-z0G9wXeYvbVkBx74Ok4-KLwRP8mmzjeEozuSj1a1q_y-i7_39St2P0tNUAK91MUems_RVCFMiNEI22pnkwFyv7wHeVgfUEX234CgMQXQyk1yM6lo7nP_PeS9L7lKnUHoLR36q58"/>
                        </div>
                        <div class="flex-1 p-8 md:p-10 lg:p-14 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-slate-500 font-bold text-sm tracking-wider uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-location-dot text-red-500 text-lg"></i> Paris, Perancis
                                    </span>
                                </div>
                                <h3 class="text-3xl md:text-4xl font-black mb-4 group-hover:text-blue-600 transition-colors text-slate-800 tracking-tight">Parisian Dream Week</h3>
                                <p class="text-slate-600 mb-10 leading-relaxed text-lg lg:text-xl">Seni, gastronomi, dan keajaiban sungai Seine dalam perpaduan liburan santai yang sangat berkelas bersama komunitas elit.</p>
                                
                                <div class="flex flex-col sm:flex-row flex-wrap gap-4 md:gap-8 text-base font-medium bg-slate-50 rounded-2xl p-6 border border-slate-100">
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600"><i class="fa-regular fa-calendar text-lg"></i></div>
                                        05 Nov - 12 Nov
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center shadow-sm text-red-600"><i class="fa-solid fa-chair text-lg"></i></div>
                                        <span class="text-red-600 font-bold">Sisa 2 kursi !!</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-green-600"><i class="fa-solid fa-money-bill text-lg"></i></div>
                                        <span class="font-bold text-lg">Mulai Rp 18.5jt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between border-t border-slate-100 pt-8 gap-6">
                                <div class="flex items-center w-full sm:w-auto">
                                    <div class="flex -space-x-3 overflow-hidden mr-4">
                                        <img alt="Avatar" class="h-12 w-12 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=IN&background=random"/>
                                        <img alt="Avatar" class="h-12 w-12 rounded-full border-2 border-white shadow-sm" src="https://ui-avatars.com/api/?name=VI&background=random"/>
                                    </div>
                                    <span class="text-slate-500 font-medium">14 orang sudah bergabung</span>
                                </div>
                                <button class="w-full sm:w-auto bg-blue-600 text-white px-10 py-4 rounded-xl font-bold text-lg flex justify-center items-center gap-3 hover:bg-blue-700 hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-600/30">
                                    Gabung Sekarang <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Registration Form Area -->
            <section class="w-full px-4 sm:px-6 lg:px-12 xl:px-20 mx-auto py-10 lg:py-16 mb-20 bg-white border-y border-slate-100 shadow-sm relative overflow-hidden">
                <div class="absolute -top-64 -right-64 w-[500px] h-[500px] bg-blue-50 rounded-full blur-3xl z-0"></div>
                <div class="absolute -bottom-64 -left-64 w-[500px] h-[500px] bg-blue-50/50 rounded-full blur-3xl z-0"></div>
                
                <div class="bg-white rounded-[2rem] shadow-2xl p-8 md:p-16 xl:p-20 max-w-5xl mx-auto border border-blue-50/50 relative z-10 backdrop-blur-sm">
                    <div class="text-center mb-14 relative z-10">
                        <span class="inline-block px-4 py-1.5 bg-blue-50 text-blue-600 text-sm font-bold rounded-full uppercase tracking-wider mb-4">Mari Berpetualang</span>
                        <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-6 text-slate-800">Booking Seat Open Trip</h2>
                        <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto leading-relaxed">Formulir di bawah ini super cepat dan mudah. Isi sisa slot kursi sekarang sebelum kehabisan!</p>
                    </div>

                    <form @submit.prevent="submitBooking" class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10 w-full">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Nama Lengkap Sesuai KTP</label>
                            <input v-model="form.name" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="Contoh: Budi Santoso" type="text" required/>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Alamat Email Lengkap</label>
                            <input v-model="form.email" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="budi@example.com" type="email" required/>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Nomor WhatsApp Aktif</label>
                            <input v-model="form.phone" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="0812xxxxxx" type="tel" required/>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Trip Incaranmu</label>
                            <div class="relative">
                                <select v-model="form.destination" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all appearance-none cursor-pointer font-medium" required>
                                    <option disabled value="">Pilih destinasi...</option>
                                    <option value="bali">Bali Coastal - Mulai 2.5jt</option>
                                    <option value="paris">Paris Week - Mulai 18.5jt</option>
                                    <option value="iceland">Iceland Aurora - Mulai 24jt</option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Mau Daftar Berapa Orang?</label>
                            <input v-model="form.participants" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all font-medium" min="1" type="number" required/>
                        </div>
                        
                        <div class="col-span-1 md:col-span-2 mt-6">
                            <button type="submit" :disabled="form.processing" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 disabled:from-blue-300 disabled:to-blue-300 disabled:cursor-not-allowed text-white py-5 px-8 rounded-2xl font-black text-xl shadow-2xl shadow-blue-600/30 transition-all hover:scale-[1.01] active:scale-[0.98] flex justify-center items-center gap-3">
                                Daftarkan Saya Sekarang <i class="fa-solid fa-paper-plane"></i>
                            </button>
                            <p class="text-center text-slate-400 text-sm mt-4">*Tim Justtrip akan merespon dalam waktu maksimal 1x24 jam melalui WhatsApp.</p>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </FrontendLayout>
</template>
