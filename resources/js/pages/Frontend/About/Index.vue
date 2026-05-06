<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import type { Review } from '@/types'

const props = defineProps<{
    reviews?: Review[]
}>()
</script>

<template>
    <FrontendLayout title="Tentang Kami">
        <!-- Hero Section -->
        <section class="relative w-full h-[500px] flex items-end">
            <div class="absolute inset-0 bg-cover bg-center"
                style="background-image: linear-gradient(to top, rgba(30, 64, 175, 0.9), rgba(30, 64, 175, 0.2)), url('/image/1-SLIDE.png')">
            </div>
            <div class="relative max-w-7xl mx-auto w-full px-6 lg:px-20 pb-16">
                <span class="inline-block px-4 py-1 mb-4 rounded-full bg-orange-500 text-white text-xs font-bold uppercase tracking-widest">
                    Since 2022
                </span>
                <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                    Kami merancang cerita,<br>bukan sekadar perjalanan.
                </h1>
            </div>
        </section>

        <!-- Company Info -->
        <section class="max-w-7xl mx-auto px-6 lg:px-20 mt-24">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <h3 class="text-blue-700 text-sm font-bold uppercase tracking-widest mb-4">Tentang Justtrip</h3>
                    <h2 class="text-4xl font-bold mb-6 text-gray-800">Pengalaman Perjalanan yang Bermakna</h2>
                    <p class="text-lg text-slate-600 leading-relaxed mb-6">
                        Justtrip hadir untuk mengubah cara Anda berwisata. Kami percaya bahwa setiap perjalanan adalah kesempatan untuk membangun kenangan indah dan menjalin persahabatan baru.
                    </p>
                    <p class="text-lg text-slate-600 leading-relaxed">
                        Dengan tim bersertifikat LSP & BNSP, kami menghadirkan program wisata yang tidak hanya menyenangkan, tetapi juga penuh makna dan kebersamaan.
                    </p>
                </div>
                <div class="relative">
                    <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl">
                        <img src="/image/1.jpg" alt="Tim Justtrip" class="w-full h-full object-cover"
                             onerror="this.src='/image/1-SLIDE.png'">
                    </div>
                    <div class="absolute -bottom-6 -left-6 bg-orange-500 p-8 rounded-2xl text-white shadow-xl">
                        <p class="text-4xl font-bold">3+</p>
                        <p class="text-sm font-medium opacity-90">Tahun Pengalaman</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="mt-24 bg-blue-700 py-24">
            <div class="max-w-7xl mx-auto px-6 lg:px-20 grid md:grid-cols-2 gap-20">
                <div class="space-y-6">
                    <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white">
                        <i class="fas fa-eye text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white">Visi Kami</h2>
                    <p class="text-blue-100 text-xl leading-relaxed">
                        Menjadi penyedia jasa wisata terpercaya yang menghadirkan pengalaman perjalanan berkesan dan bermakna bagi setiap traveler Indonesia.
                    </p>
                </div>
                <div class="space-y-6 border-t md:border-t-0 md:border-l border-white/20 pt-10 md:pt-0 md:pl-20">
                    <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-white">
                        <i class="fas fa-rocket text-3xl"></i>
                    </div>
                    <h2 class="text-3xl font-bold text-white">Misi Kami</h2>
                    <p class="text-blue-100 text-xl leading-relaxed">
                        Memberikan layanan wisata berkualitas dengan tim profesional bersertifikat, harga transparan, dan program yang dapat disesuaikan dengan kebutuhan setiap klien.
                    </p>
                </div>
            </div>
        </section>

        <!-- Core Values -->
        <section class="max-w-7xl mx-auto px-6 lg:px-20 mt-24">
            <div class="text-center mb-16">
                <h3 class="text-orange-500 text-sm font-bold uppercase tracking-widest mb-4">Nilai Utama</h3>
                <h2 class="text-4xl font-bold text-gray-800">Prinsip yang Membimbing Kami</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div v-for="value in [
                    {icon: 'fa-shield-alt', title: 'Berlegalitas PT', desc: 'Terdaftar resmi sebagai PT Justtrip Indonesia untuk keamanan transaksi Anda.'},
                    {icon: 'fa-user-check', title: 'Tim Bersertifikat', desc: 'Dikawal tenaga ahli bersertifikat LSP & BNSP yang kompeten.'},
                    {icon: 'fa-heart', title: 'Penuh Makna', desc: 'Fokus membangun hubungan dan kebersamaan, bukan sekadar jalan-jalan.'},
                    {icon: 'fa-handshake', title: 'Transparan', desc: 'Kepastian layanan tertulis jelas dalam kontrak kerja sama yang jujur.'},
                ]" :key="value.title"
                class="p-8 rounded-2xl border border-slate-200 hover:border-blue-700 transition-colors group">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-700 flex items-center justify-center mb-6 group-hover:bg-blue-700 group-hover:text-white transition-all">
                        <i :class="['fas text-xl', value.icon]"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-3 text-gray-800">{{ value.title }}</h4>
                    <p class="text-slate-600">{{ value.desc }}</p>
                </div>
            </div>
        </section>

        <!-- Testimonials from DB -->
        <section v-if="reviews && reviews.length > 0" class="max-w-7xl mx-auto px-6 lg:px-20 mt-24 mb-24">
            <div class="text-center mb-12">
                <h3 class="text-orange-500 text-sm font-bold uppercase tracking-widest mb-4">Testimoni</h3>
                <h2 class="text-4xl font-bold text-gray-800">Apa Kata Mereka?</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="review in reviews" :key="review.id"
                    class="bg-white rounded-2xl shadow-lg p-6 border border-slate-100 hover:shadow-xl transition-shadow">
                    <div class="text-yellow-400 text-xl mb-3">
                        <span v-for="n in (review.rating ?? 5)" :key="n">★</span>
                    </div>
                    <p class="text-slate-700 mb-4 line-clamp-4">"{{ review.komentar }}"</p>
                    <div class="flex items-center gap-3 border-t border-slate-100 pt-4">
                        <img
                            :src="review.foto_reviewer ?? `https://ui-avatars.com/api/?name=${encodeURIComponent(review.nama_reviewer)}`"
                            :alt="review.nama_reviewer"
                            class="w-10 h-10 rounded-full object-cover"
                        >
                        <div>
                            <p class="font-bold text-sm text-gray-800">{{ review.nama_reviewer }}</p>
                            <p v-if="review.destinasi" class="text-xs text-slate-500">{{ review.destinasi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div v-else class="pb-24"></div>
    </FrontendLayout>
</template>
