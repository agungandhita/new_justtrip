<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import FrontendLayout from '@/layouts/FrontendLayout.vue';
import { store } from '@/actions/App/Http/Controllers/GuestBookingController';

defineProps<{
    openTrips: any;
}>();

const form = useForm({
    nama_lengkap: '',
    email: '',
    no_hp: '',
    jenis_layanan: 'open_trip',
    layanan_id: '',
    catatan: '',
    jumlah_peserta: 1,
});

const submitBooking = () => {
    form.post(store.url(), {
        preserveScroll: true,
        onSuccess: () => {
            alert('Pendaftaran Open Trip berhasil terkirim! Tim kami akan segera menghubungi Anda.');
            form.reset();
        },
    });
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
                    <div v-if="!openTrips.data.length" class="text-center py-10 text-slate-500">
                        Belum ada jadwal Open Trip terdekat.
                    </div>
                    
                    <div v-for="trip in openTrips.data" :key="trip.layanan_id" class="flex flex-col lg:flex-row items-stretch bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:border-blue-100 transition-all group">
                        <div class="w-full lg:w-[45%] xl:w-[40%] h-72 lg:h-auto overflow-hidden relative">
                            <img :alt="trip.nama_layanan" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" :src="trip.gambar_utama || 'https://images.unsplash.com/photo-1506012787146-f92b2d7d6d96?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'"/>
                        </div>
                        <div class="flex-1 p-8 md:p-10 lg:p-14 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-2 mb-4">
                                    <span class="text-slate-500 font-bold text-sm tracking-wider uppercase flex items-center gap-2">
                                        <i class="fa-solid fa-location-dot text-red-500 text-lg"></i> {{ trip.lokasi_tujuan }}
                                    </span>
                                </div>
                                <h3 class="text-3xl md:text-4xl font-black mb-4 group-hover:text-blue-600 transition-colors text-slate-800 tracking-tight">{{ trip.nama_layanan }}</h3>
                                <p class="text-slate-600 mb-10 leading-relaxed text-lg lg:text-xl">{{ trip.deskripsi }}</p>
                                
                                <div class="flex flex-col sm:flex-row flex-wrap gap-4 md:gap-8 text-base font-medium bg-slate-50 rounded-2xl p-6 border border-slate-100">
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-blue-600"><i class="fa-regular fa-calendar text-lg"></i></div>
                                        {{ trip.durasi_hari }} Hari
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-orange-100 flex items-center justify-center shadow-sm text-orange-600"><i class="fa-solid fa-chair text-lg"></i></div>
                                        <span class="text-orange-600 font-bold">Sisa {{ trip.kuota_tersedia }} kursi</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-slate-700">
                                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shadow-sm text-green-600"><i class="fa-solid fa-money-bill text-lg"></i></div>
                                        <span class="font-bold text-lg">Rp {{ Number(trip.harga_per_orang).toLocaleString('id-ID') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10 flex flex-col sm:flex-row items-center justify-between border-t border-slate-100 pt-8 gap-6">
                                <div class="flex items-center w-full sm:w-auto">
                                </div>
                                <button @click="form.layanan_id = trip.layanan_id; document.getElementById('booking-form').scrollIntoView({behavior: 'smooth'})" class="w-full sm:w-auto bg-blue-600 text-white px-10 py-4 rounded-xl font-bold text-lg flex justify-center items-center gap-3 hover:bg-blue-700 hover:scale-105 active:scale-95 transition-all shadow-xl shadow-blue-600/30">
                                    Pilih Trip Ini <i class="fa-solid fa-arrow-right"></i>
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

                    <form id="booking-form" @submit.prevent="submitBooking" class="grid grid-cols-1 md:grid-cols-2 gap-8 relative z-10 w-full">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Nama Lengkap Sesuai KTP</label>
                            <input v-model="form.nama_lengkap" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="Contoh: Budi Santoso" type="text" required/>
                            <div v-if="form.errors.nama_lengkap" class="text-red-500 text-sm mt-1">{{ form.errors.nama_lengkap }}</div>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Alamat Email Lengkap</label>
                            <input v-model="form.email" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="budi@example.com" type="email" required/>
                            <div v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</div>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Nomor WhatsApp Aktif</label>
                            <input v-model="form.no_hp" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all placeholder:text-slate-400 font-medium" placeholder="0812xxxxxx" type="tel" required/>
                            <div v-if="form.errors.no_hp" class="text-red-500 text-sm mt-1">{{ form.errors.no_hp }}</div>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Trip Incaranmu</label>
                            <div class="relative">
                                <select v-model="form.layanan_id" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all appearance-none cursor-pointer font-medium" required>
                                    <option disabled value="">Pilih destinasi...</option>
                                    <option v-for="trip in openTrips.data" :key="trip.layanan_id" :value="trip.layanan_id">
                                        {{ trip.nama_layanan }} - Mulai Rp {{ Number(trip.harga_per_orang).toLocaleString('id-ID') }}
                                    </option>
                                </select>
                                <i class="fa-solid fa-chevron-down absolute right-6 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none"></i>
                            </div>
                            <div v-if="form.errors.layanan_id" class="text-red-500 text-sm mt-1">{{ form.errors.layanan_id }}</div>
                        </div>
                        
                        <div class="col-span-1">
                            <label class="block text-sm font-bold mb-2 text-slate-700">Mau Daftar Berapa Orang?</label>
                            <input v-model="form.jumlah_peserta" class="w-full px-6 py-4 rounded-xl border border-slate-200 bg-slate-50 text-slate-900 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white outline-none transition-all font-medium" min="1" type="number" required/>
                            <div v-if="form.errors.jumlah_peserta" class="text-red-500 text-sm mt-1">{{ form.errors.jumlah_peserta }}</div>
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
