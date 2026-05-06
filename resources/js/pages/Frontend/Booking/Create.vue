<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { useForm, usePage, Link } from '@inertiajs/vue3'
import { computed } from 'vue'
import type { Layanan, SpecialOffer } from '@/types'

const props = defineProps<{
    layanan: Layanan
    offer?: SpecialOffer
}>()

const auth = usePage().props.auth as any

const form = useForm({
    layanan_id: props.layanan.id,
    special_offer_id: props.offer?.id ?? null,
    jumlah_peserta: 1,
    tanggal_keberangkatan: '',
    catatan_khusus: '',
})

const totalHarga = computed(() => {
    if (props.offer) {
        return props.offer.discounted_price * form.jumlah_peserta
    }
    return (props.layanan.harga_per_orang ?? 0) * form.jumlah_peserta
})

const formatRupiah = (angka: number) =>
    'Rp ' + angka.toLocaleString('id-ID')

const submit = () => {
    form.post('/booking')
}
</script>

<template>
    <FrontendLayout title="Formulir Booking">
        <div class="max-w-4xl mx-auto w-full px-4 py-8">
            <!-- Breadcrumb -->
            <div class="mb-8">
                <div class="flex items-center gap-2 text-blue-700 mb-2">
                    <i class="fas fa-arrow-left text-sm"></i>
                    <Link :href="`/paket-wisata/${layanan.slug}`" class="text-sm font-medium hover:underline">
                        Kembali ke Detail Paket
                    </Link>
                </div>
                <h1 class="text-3xl font-bold text-slate-900">Formulir Pemesanan</h1>
                <p class="text-slate-500 mt-1">Lengkapi data Anda untuk melanjutkan pemesanan paket tour.</p>
            </div>

            <!-- Package Summary -->
            <section class="mb-8 bg-white rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                <div class="p-1 bg-blue-700"></div>
                <div class="p-6">
                    <h2 class="text-lg font-bold mb-4 flex items-center gap-2 text-gray-800">
                        <i class="fas fa-clipboard-list text-blue-700"></i>
                        Ringkasan Paket Tour
                    </h2>
                    <div class="flex flex-col md:flex-row gap-6">
                        <div class="w-full md:w-1/3 aspect-[4/3] rounded-lg overflow-hidden">
                            <img
                                :src="layanan.gambar_utama ? `/storage/${layanan.gambar_utama}` : '/image/1-SLIDE.png'"
                                :alt="layanan.nama_layanan"
                                class="w-full h-full object-cover"
                            >
                        </div>
                        <div class="flex-1 space-y-3">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 leading-tight">{{ layanan.nama_layanan }}</h3>
                                <div class="flex flex-wrap gap-4 mt-2">
                                    <div v-if="layanan.durasi_hari" class="flex items-center gap-1.5 text-slate-600 text-sm">
                                        <i class="fas fa-clock text-sm text-blue-700"></i>
                                        {{ layanan.durasi_hari }} Hari
                                    </div>
                                    <div v-if="layanan.lokasi_tujuan" class="flex items-center gap-1.5 text-slate-600 text-sm">
                                        <i class="fas fa-map-marker-alt text-sm text-blue-700"></i>
                                        {{ layanan.lokasi_tujuan }}
                                    </div>
                                </div>
                            </div>
                            <div v-if="layanan.fasilitas_include && layanan.fasilitas_include.length > 0" class="pt-4 border-t border-slate-100">
                                <p class="text-xs text-slate-500 uppercase tracking-wider font-semibold mb-2">Fasilitas Termasuk:</p>
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        v-for="f in layanan.fasilitas_include"
                                        :key="f"
                                        class="px-2 py-1 bg-blue-50 text-blue-700 rounded text-[11px] font-medium"
                                    >{{ f }}</span>
                                </div>
                            </div>
                            <!-- Promo Badge -->
                            <div v-if="offer" class="flex items-center gap-2 p-3 bg-orange-50 border border-orange-200 rounded-lg">
                                <i class="fas fa-tag text-orange-500"></i>
                                <span class="text-sm font-semibold text-orange-700">Promo: {{ offer.title }}</span>
                                <span class="text-xs text-orange-600 line-through ml-1">{{ offer.formatted_original_price }}</span>
                                <span class="text-sm font-bold text-orange-700">{{ offer.formatted_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Booking Form -->
            <section class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-slate-100">
                    <h2 class="text-lg font-bold flex items-center gap-2 text-gray-800">
                        <i class="fas fa-user-edit text-blue-700"></i>
                        Data Pemesan & Detail Peserta
                    </h2>
                </div>
                <form @submit.prevent="submit" class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama (readonly, from auth) -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Nama Lengkap</label>
                            <div class="relative">
                                <i class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input
                                    type="text"
                                    :value="auth?.user?.name"
                                    readonly
                                    class="w-full pl-10 pr-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-slate-600 cursor-not-allowed text-sm"
                                >
                            </div>
                        </div>

                        <!-- Email (readonly) -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Alamat Email</label>
                            <div class="relative">
                                <i class="fas fa-envelope absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input
                                    type="email"
                                    :value="auth?.user?.email"
                                    readonly
                                    class="w-full pl-10 pr-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-slate-500 cursor-not-allowed text-sm"
                                >
                            </div>
                        </div>

                        <!-- Jumlah Peserta -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Jumlah Peserta</label>
                            <div class="relative">
                                <i class="fas fa-users absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input
                                    v-model="form.jumlah_peserta"
                                    type="number"
                                    min="1"
                                    :max="layanan.kuota_tersedia ?? 100"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-700 focus:border-blue-700 text-sm"
                                    required
                                >
                            </div>
                            <p v-if="form.errors.jumlah_peserta" class="text-red-500 text-xs">{{ form.errors.jumlah_peserta }}</p>
                        </div>

                        <!-- Tanggal Keberangkatan -->
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700">Tanggal Keberangkatan</label>
                            <div class="relative">
                                <i class="fas fa-calendar-alt absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"></i>
                                <input
                                    v-model="form.tanggal_keberangkatan"
                                    type="date"
                                    class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-700 focus:border-blue-700 text-sm"
                                    required
                                >
                            </div>
                            <p v-if="form.errors.tanggal_keberangkatan" class="text-red-500 text-xs">{{ form.errors.tanggal_keberangkatan }}</p>
                        </div>
                    </div>

                    <!-- Catatan Khusus -->
                    <div class="space-y-2">
                        <label class="text-sm font-semibold text-slate-700">Permintaan Khusus (Opsional)</label>
                        <textarea
                            v-model="form.catatan_khusus"
                            class="w-full p-4 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-700 focus:border-blue-700 text-sm"
                            placeholder="Contoh: Alergi makanan, butuh kursi roda, atau perayaan ulang tahun"
                            rows="4"
                        ></textarea>
                    </div>

                    <!-- Info Box -->
                    <div class="flex items-start gap-3 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <i class="fas fa-info-circle text-blue-700 mt-0.5"></i>
                        <p class="text-sm text-slate-700">
                            <span class="font-bold">Informasi:</span>
                            Konfirmasi booking akan dikirimkan melalui email Anda setelah pembayaran berhasil diverifikasi oleh admin.
                        </p>
                    </div>

                    <!-- Submit -->
                    <div class="pt-4 flex flex-col sm:flex-row items-center justify-between gap-4 border-t border-slate-100">
                        <div class="text-center sm:text-left">
                            <p class="text-xs text-slate-500 uppercase font-semibold">Total Pembayaran</p>
                            <p class="text-2xl font-bold text-blue-700">
                                {{ formatRupiah(totalHarga) }}
                                <span class="text-sm font-normal text-slate-400">/{{ form.jumlah_peserta }} peserta</span>
                            </p>
                        </div>
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="w-full sm:w-auto px-10 py-4 bg-blue-700 hover:bg-blue-800 disabled:opacity-60 text-white font-bold rounded-xl transition-all shadow-lg flex items-center justify-center gap-2"
                        >
                            <i class="fas fa-check-circle"></i>
                            {{ form.processing ? 'Memproses...' : 'Konfirmasi Booking' }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </FrontendLayout>
</template>
