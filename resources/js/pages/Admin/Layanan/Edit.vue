<script setup lang="ts">
import { useForm } from '@inertiajs/vue3'
import { ArrowLeft, Plus, Trash2, Check, ChevronRight, ChevronLeft, MapPin, Calendar, DollarSign, List, FileText, Image as ImageIcon, UploadCloud } from 'lucide-vue-next'
import AdminLayout from '@/layouts/AdminLayout.vue'
import PageHeader from '@/components/Admin/PageHeader.vue'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import { Textarea } from '@/components/ui/textarea'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select'
import { ref, watch } from 'vue'
import type { Layanan } from '@/types'

const props = defineProps<{ layanan: Layanan }>()

// Helper to format arrays to strings for text areas
const formatArrayToStr = (arr: any) => {
    if (!arr) return '';
    if (Array.isArray(arr)) return arr.join('\n');
    return String(arr);
}

// Extract group prices if private trip
let priceTiers: Record<string, string | number> = {
    harga_2_3: '', harga_5_6: '', harga_9_10: '', harga_13_15: '', 
    harga_18_20: '', harga_30_35: '', harga_50_59: ''
}

if (props.layanan.jenis_layanan === 'private_trip' && props.layanan.harga_group) {
    // Attempt to map from array to input names
    // Normally it's saved as [{ min_orang: 2, max_orang: 3, harga: 5000 }, ...]
    const groupArr = Array.isArray(props.layanan.harga_group) ? props.layanan.harga_group : []
    groupArr.forEach((tier: any) => {
        const key = `harga_${tier.min_orang}_${tier.max_orang}`
        if (key in priceTiers) {
            priceTiers[key] = tier.harga
        }
    })
}

// Prepare Itinerary Array
let mappedItinerary = []
if (Array.isArray(props.layanan.itinerary) && props.layanan.itinerary.length > 0) {
    mappedItinerary = [...props.layanan.itinerary]
} else {
    // If durasi_hari exists but no itinerary objects
    const dur = props.layanan.durasi_hari ? parseInt(String(props.layanan.durasi_hari)) : 0
    if (dur > 0) {
        for(let i=1; i<=dur; i++) {
            mappedItinerary.push({ hari: i, judul: '', deskripsi: '' })
        }
    }
}

const form = useForm({
    nama_layanan: props.layanan.nama_layanan,
    jenis_layanan: props.layanan.jenis_layanan,
    wilayah: props.layanan.wilayah ?? '',
    lokasi_tujuan: props.layanan.lokasi_tujuan,
    durasi_hari: props.layanan.durasi_hari ?? '',
    status: props.layanan.status,
    deskripsi: props.layanan.deskripsi ?? '',
    
    // Open trip
    harga_per_orang: props.layanan.harga_per_orang ?? '',
    kuota_maksimal: props.layanan.kuota_total ?? '',
    
    // Private trip group pricing
    ...priceTiers,
    
    // Wizard Form Specifics
    itinerary: mappedItinerary as { hari: number, judul: string, deskripsi: string }[],
    fasilitas_include: formatArrayToStr(props.layanan.fasilitas_include),
    fasilitas_exclude: formatArrayToStr(props.layanan.fasilitas_exclude),
    catatan_penting: props.layanan.catatan ?? '',
    
    // New fields
    gambar_utama: null as File | null,
    gambar_destinasi: [] as File[],
    tanggal_tersedia: formatArrayToStr(props.layanan.tanggal_tersedia),
    
    _method: 'PUT',
})

// UI handles for previewing images
const previewUtama = ref<string | null>(props.layanan.gambar_utama ?? null)

// Render existing destinations
let initDestinasi: { file: File, url: string, isExisting: boolean }[] = []
if (Array.isArray(props.layanan.gambar_destinasi)) {
    initDestinasi = props.layanan.gambar_destinasi.map((url: string) => ({
        file: new File([], "existing.png"), // mock
        url: url,
        isExisting: true
    }))
}
const previewDestinasi = ref<{ file: File, url: string, isExisting?: boolean }[]>(initDestinasi)

// Datepicker logic for tanggal_tersedia
const newDateObj = ref('')
const dateList = ref<string[]>(Array.isArray(props.layanan.tanggal_tersedia) ? props.layanan.tanggal_tersedia : [])

const addTanggalTersedia = () => {
    if (newDateObj.value && !dateList.value.includes(newDateObj.value)) {
        dateList.value.push(newDateObj.value)
        form.tanggal_tersedia = dateList.value.join(',')
        newDateObj.value = ''
    }
}
const removeTanggalTersedia = (index: number) => {
    dateList.value.splice(index, 1)
    form.tanggal_tersedia = dateList.value.join(',')
}

const handleUtamaUpload = (event: Event) => {
    const target = event.target as HTMLInputElement
    if (target.files && target.files[0]) {
        form.gambar_utama = target.files[0]
        previewUtama.value = URL.createObjectURL(target.files[0])
    }
}

const handleDestinasiUpload = (event: Event) => {
    const target = event.target as HTMLInputElement
    if (target.files) {
        for(let i = 0; i < target.files.length; i++) {
            const file = target.files[i]
            form.gambar_destinasi.push(file)
            previewDestinasi.value.push({
                file: file,
                url: URL.createObjectURL(file)
            })
        }
    }
    target.value = ''
}

const removeDestinasi = (index: number) => {
    const item = previewDestinasi.value[index]
    if (!item.isExisting) {
        // Find in form.gambar_destinasi and remove
        const fileIndex = form.gambar_destinasi.findIndex(f => f === item.file)
        if (fileIndex > -1) form.gambar_destinasi.splice(fileIndex, 1)
    }
    previewDestinasi.value.splice(index, 1)
}

// Wizard Step Management
const currentStep = ref(1)

const steps = [
    { id: 1, title: 'Informasi Dasar', icon: MapPin },
    { id: 2, title: 'Harga & Kuota', icon: DollarSign },
    { id: 3, title: 'Itinerary Trip', icon: List },
    { id: 4, title: 'Fasilitas & Catatan', icon: FileText },
    { id: 5, title: 'Media & Galeri', icon: ImageIcon }
]

const nextStep = () => { if (currentStep.value < steps.length) currentStep.value++ }
const prevStep = () => { if (currentStep.value > 1) currentStep.value-- }
const setStep = (step: number) => { currentStep.value = step }

// Auto-populate itinerary when durasi_hari changes
watch(() => form.durasi_hari, (newVal) => {
    const durasi = parseInt(newVal as string)
    if (!isNaN(durasi) && durasi > 0) {
        const currentLength = form.itinerary.length
        if (durasi > currentLength) {
            for (let i = currentLength + 1; i <= durasi; i++) {
                form.itinerary.push({ hari: i, judul: '', deskripsi: '' })
            }
        } else if (durasi < currentLength) {
            form.itinerary = form.itinerary.slice(0, durasi)
        }
    } else {
        form.itinerary = []
    }
})

// Helper functions for itinerary
const addItineraryDay = () => {
    form.itinerary.push({ hari: form.itinerary.length + 1, judul: '', deskripsi: '' })
    form.durasi_hari = form.itinerary.length.toString()
}
const removeItineraryDay = (index: number) => {
    form.itinerary.splice(index, 1)
    form.itinerary.forEach((item, idx) => { item.hari = idx + 1 })
    form.durasi_hari = form.itinerary.length.toString()
}

function submit() {
    form.post(`/admin/layanan/${props.layanan.layanan_id}`)
}
</script>

<template>
    <AdminLayout>
        <template #header><span class="text-sm font-medium text-slate-500">Edit Layanan</span></template>

        <PageHeader title="Edit Layanan Trip" :breadcrumbs="[{ label: 'Layanan', href: '/admin/layanan' }, { label: 'Edit Layanan' }]">
            <Button variant="outline" size="sm" as-child class="gap-2">
                <a href="/admin/layanan"><ArrowLeft class="w-4 h-4" /> Kembali</a>
            </Button>
        </PageHeader>

        <!-- Main Wizard Container -->
        <div class="max-w-4xl bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-8">
            
            <!-- Wizard Headers (Progress) -->
            <div class="flex flex-col md:flex-row border-b border-slate-200 bg-slate-50/50 overflow-x-auto">
                <div 
                    v-for="(step, index) in steps" 
                    :key="step.id"
                    @click="setStep(step.id)"
                    class="flex-1 relative py-4 px-6 flex items-center justify-center gap-3 cursor-pointer transition-colors"
                    :class="[
                        currentStep === step.id ? 'bg-white border-b-2 border-blue-600' : 'hover:bg-slate-100 text-slate-500'
                    ]"
                >
                    <div class="flex items-center justify-center w-8 h-8 rounded-full border-2 text-sm font-bold"
                        :class="currentStep === step.id ? 'border-blue-600 text-blue-600 bg-blue-50' : (currentStep > step.id ? 'border-green-500 text-green-500 bg-green-50' : 'border-slate-300 text-slate-400')">
                        <Check v-if="currentStep > step.id" class="w-4 h-4" />
                        <span v-else>{{ step.id }}</span>
                    </div>
                    <span class="font-medium whitespace-nowrap text-sm" :class="currentStep === step.id ? 'text-blue-700' : 'text-slate-600'">
                        {{ step.title }}
                    </span>
                    
                    <!-- Chevron separator -->
                    <ChevronRight v-if="index < steps.length - 1" class="absolute right-0 w-5 h-5 text-slate-300 transform translate-x-1/2 hidden md:block" />
                </div>
            </div>

            <!-- Wizard Content -->
            <form @submit.prevent="submit" class="p-6 md:p-8">
                
                <!-- STEP 1: INFORMASI DASAR -->
                <div v-show="currentStep === 1" class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-300">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-900">Informasi Dasar Layanan</h3>
                        <p class="text-sm text-slate-500">Ubah profil utama dari trip/layanan yang Anda tawarkan.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Layanan <span class="text-red-500">*</span></label>
                        <input v-model="form.nama_layanan" type="text" placeholder="e.g. Trip Pesona Raja Ampat 4D3N" class="w-full px-4 py-2.5 text-sm border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30" :class="form.errors.nama_layanan ? 'border-red-400' : 'border-slate-200 bg-white text-slate-900'" />
                        <p v-if="form.errors.nama_layanan" class="text-xs text-red-500 mt-1.5">{{ form.errors.nama_layanan }}</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jenis Layanan <span class="text-red-500">*</span></label>
                            <select v-model="form.jenis_layanan" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900">
                                <option value="open_trip">Open Trip (Gabungan)</option>
                                <option value="private_trip">Private Trip (Eksklusif)</option>
                                <option value="request_trip">Request Trip (Custom)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Wilayah</label>
                            <select v-model="form.wilayah" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900">
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="domestik">Domestik (Indonesia)</option>
                                <option value="internasional">Internasional (Luar Negeri)</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Lokasi Tujuan <span class="text-red-500">*</span></label>
                            <input v-model="form.lokasi_tujuan" type="text" placeholder="e.g. Sumba, Nusa Tenggara Timur" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Total Durasi (Hari)</label>
                            <div class="relative">
                                <input v-model="form.durasi_hari" type="number" min="1" placeholder="Masukkan angka" class="w-full pl-4 pr-12 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm">Hari</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-1.5">Status Tampilan</label>
                            <select v-model="form.status" class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900">
                                <option value="aktif">Aktif (Tampil di Frontend)</option>
                                <option value="nonaktif">Non-aktif (Disembunyikan)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Deskripsi Menarik</label>
                        <textarea v-model="form.deskripsi" rows="4" placeholder="Tuliskan deskripsi yang menarik tentang layanan trip ini..." class="w-full px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900 resize-y" />
                    </div>
                </div>

                <!-- STEP 2: HARGA & KUOTA -->
                <div v-show="currentStep === 2" class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-300">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-900">Harga & Ketersediaan</h3>
                        <p class="text-sm text-slate-500">Konfigurasi harga sesuai dengan jenis layanan yang Anda pilih ({{ form.jenis_layanan.replace('_', ' ').toUpperCase() }}).</p>
                    </div>

                    <div v-if="form.jenis_layanan === 'open_trip'" class="p-5 bg-blue-50/50 border border-blue-100 rounded-xl space-y-6">
                        <div class="flex items-center gap-2 text-blue-800 mb-2">
                            <DollarSign class="w-5 h-5" /> <h4 class="font-semibold">Pengaturan Open Trip</h4>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Harga per Orang (Rp)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm font-medium">Rp</span>
                                    <input v-model="form.harga_per_orang" type="number" min="0" class="w-full pl-10 pr-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Kuota Maksimal Total</label>
                                <div class="relative">
                                    <input v-model="form.kuota_maksimal" type="number" min="1" class="w-full pl-4 pr-16 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 text-sm">Orang</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else-if="form.jenis_layanan === 'private_trip'" class="p-5 bg-indigo-50/50 border border-indigo-100 rounded-xl">
                        <div class="flex items-center gap-2 text-indigo-800 mb-4">
                            <Users class="w-5 h-5" /> <h4 class="font-semibold">Skema Harga Kelompok (Tier)</h4>
                        </div>
                        <p class="text-sm text-slate-600 mb-6">Untuk Private Trip, harga biasanya disesuaikan berdasar jumlah peserta grup.</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                            <div v-for="tier in [
                                { key: 'harga_2_3', label: 'Tier 2 – 3 Orang' },
                                { key: 'harga_5_6', label: 'Tier 5 – 6 Orang' },
                                { key: 'harga_9_10', label: 'Tier 9 – 10 Orang' },
                                { key: 'harga_13_15', label: 'Tier 13 – 15 Orang' },
                                { key: 'harga_18_20', label: 'Tier 18 – 20 Orang' },
                                { key: 'harga_30_35', label: 'Tier 30 – 35 Orang' },
                                { key: 'harga_50_59', label: 'Tier 50 – 59+ Orang' },
                            ]" :key="tier.key">
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">{{ tier.label }}</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs font-medium">Rp</span>
                                    <input v-model="(form as any)[tier.key]" type="number" min="0" placeholder="0" class="w-full pl-9 pr-3 py-2 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500/30 bg-white text-slate-900" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div v-else class="p-6 bg-slate-50 border border-slate-200 rounded-xl text-center">
                        <MapPin class="w-10 h-10 text-slate-300 mx-auto mb-3" />
                        <h4 class="text-slate-700 font-medium">Request Trip bersifat Custom</h4>
                        <p class="text-sm text-slate-500 mt-1">Harga akan disesuaikan secara personal melalui kesepakatan request pelanggan.</p>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Jadwal Tanggal Tersedia</label>
                        <p class="text-xs text-slate-500 mb-2">Pilih tanggal dan tambahkan ke daftar jadwal pelayanan trip.</p>
                        <div class="flex items-center gap-2 mb-3">
                            <input v-model="newDateObj" type="date" class="flex-1 px-4 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                            <button type="button" @click="addTanggalTersedia" class="px-4 py-2.5 bg-blue-50 text-blue-600 hover:bg-blue-100 hover:text-blue-700 rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2">
                                <Plus class="w-4 h-4"/> Tambah
                            </button>
                        </div>
                        <div v-if="dateList.length > 0" class="flex flex-wrap gap-2 p-3 bg-slate-50 border border-slate-100 rounded-xl">
                            <span v-for="(dt, index) in dateList" :key="index" class="inline-flex items-center gap-1.5 pl-3 pr-1 py-1 bg-white border border-slate-200 rounded-full text-xs font-medium text-slate-700 shadow-sm">
                                <Calendar class="w-3.5 h-3.5 text-blue-500" />
                                {{ dt }}
                                <button type="button" @click="removeTanggalTersedia(index)" class="text-slate-400 hover:text-red-500 ml-1 flex items-center justify-center w-5 h-5 bg-slate-100 hover:bg-red-50 rounded-full transition-colors"><Trash2 class="w-2.5 h-2.5" /></button>
                            </span>
                        </div>
                        <div v-else class="text-sm text-slate-400 italic p-3 bg-slate-50 rounded-lg border border-dashed border-slate-200 text-center">
                            Belum ada jadwal yang ditambahkan.
                        </div>
                    </div>
                </div>

                <!-- STEP 3: ITINERARY WIZARD -->
                <div v-show="currentStep === 3" class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-300">
                    <div class="flex justify-between items-end mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900">Itinerary Perjalanan</h3>
                            <p class="text-sm text-slate-500">Edit jadwal aktivitas harian. Data auto-terisi berdasarkan total durasi ({{ form.durasi_hari || 0 }} hari).</p>
                        </div>
                        <button type="button" @click="addItineraryDay" class="flex items-center gap-1.5 px-3 py-1.5 text-xs font-medium bg-blue-50 text-blue-600 hover:bg-blue-100 border border-blue-200 rounded-lg transition-colors">
                            <Plus class="w-3.5 h-3.5" /> Tambah Hari
                        </button>
                    </div>

                    <div v-if="form.itinerary.length === 0" class="py-12 border-2 border-dashed border-slate-200 rounded-xl text-center">
                        <Calendar class="w-12 h-12 text-slate-300 mx-auto mb-3" />
                        <p class="text-slate-600 font-medium">Belum ada Itinerary</p>
                        <p class="text-sm text-slate-500 mb-4">Silakan klik tombol tambah untuk memperbarui jadwal harian.</p>
                    </div>

                    <div v-else class="space-y-4">
                        <div v-for="(day, index) in form.itinerary" :key="index" class="relative pl-8 sm:pl-10">
                            <!-- Timeline line -->
                            <div v-if="index !== form.itinerary.length - 1" class="absolute left-[15px] sm:left-[19px] top-8 bottom-[-20px] w-0.5 bg-slate-200"></div>
                            
                            <!-- Day indicator -->
                            <div class="absolute left-0 top-0 w-8 h-8 sm:w-10 sm:h-10 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-sm sm:text-base shadow-md border-4 border-white z-10">
                                {{ day.hari }}
                            </div>

                            <div class="bg-white border border-slate-200 rounded-xl p-4 sm:p-5 shadow-sm hover:border-blue-300 transition-colors group">
                                <div class="flex justify-between items-start mb-3">
                                    <div class="w-full">
                                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1">Judul Aktivitas Hari Ke-{{ day.hari }}</label>
                                        <input v-model="day.judul" type="text" placeholder="e.g. Tiba di Bandara & Eksplorasi Pantai" class="w-full px-3 py-2 text-sm border-b border-dashed border-slate-300 focus:border-blue-500 focus:outline-none bg-transparent font-medium text-slate-900" />
                                    </div>
                                    <button type="button" @click="removeItineraryDay(index)" class="ml-4 p-1.5 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-md transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100" title="Hapus hari ini">
                                        <Trash2 class="w-4 h-4" />
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Deskripsi Rute / Aktivitas</label>
                                    <textarea v-model="day.deskripsi" rows="3" placeholder="- Penjemputan di bandara&#10;- Makan siang lokal&#10;- Check-in Hotel" class="w-full px-3 py-2.5 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-slate-50 text-slate-900"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: FASILITAS & CATATAN -->
                <div v-show="currentStep === 4" class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-300">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-900">Fasilitas & Catatan</h3>
                        <p class="text-sm text-slate-500">Edit apa saja yang termasuk dan tidak termasuk dalam layanan ini.</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-emerald-50/50 border border-emerald-100 rounded-xl p-5">
                            <label class="flex items-center gap-2 text-sm font-bold text-emerald-800 mb-3">
                                <Check class="w-4 h-4 bg-emerald-500 text-white rounded-full p-0.5" /> Include (Termasuk)
                            </label>
                            <textarea v-model="form.fasilitas_include" rows="5" placeholder="- Transportasi AC&#10;- Tiket Masuk Wisata&#10;- Penginapan Bintang 3" class="w-full px-4 py-3 text-sm border border-emerald-200/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-500/30 bg-white text-slate-900" />
                        </div>
                        <div class="bg-rose-50/50 border border-rose-100 rounded-xl p-5">
                            <label class="flex items-center gap-2 text-sm font-bold text-rose-800 mb-3">
                                <Trash2 class="w-4 h-4 text-rose-500" /> Exclude (Tidak Termasuk)
                            </label>
                            <textarea v-model="form.fasilitas_exclude" rows="5" placeholder="- Tiket pesawat menuju lokasi&#10;- Pengeluaran pribadi&#10;- Tipping guide" class="w-full px-4 py-3 text-sm border border-rose-200/50 rounded-lg focus:outline-none focus:ring-2 focus:ring-rose-500/30 bg-white text-slate-900" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Syarat & Ketentuan / Catatan Penting <span class="text-slate-400 font-normal">(Opsional)</span></label>
                        <textarea v-model="form.catatan_penting" rows="3" placeholder="Peserta wajib membawa perlengkapan pribadi. Pembatalan H-3 uang hangus..." class="w-full px-4 py-3 text-sm border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500/30 bg-white text-slate-900" />
                    </div>
                </div>

                <!-- STEP 5: MEDIA & GAMBAR -->
                <div v-show="currentStep === 5" class="space-y-6 animate-in fade-in slide-in-from-right-4 duration-300">
                    <div class="mb-4">
                        <h3 class="text-lg font-bold text-slate-900">Media & Galeri</h3>
                        <p class="text-sm text-slate-500">Unggah foto-foto menarik destinasi wisata untuk ditampilkan kepada pelanggan.</p>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-semibold text-slate-700 mb-1.5">Gambar Utama (Thumbnail) <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-6">
                            <div v-if="previewUtama" class="relative group w-32 h-32 rounded-xl overflow-hidden border border-slate-200 shadow-sm">
                                <img :src="previewUtama" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button" @click="previewUtama = null; form.gambar_utama = null" class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                        <Trash2 class="w-4 h-4" />
                                    </button>
                                </div>
                            </div>
                            
                            <label v-else class="w-32 h-32 flex flex-col items-center justify-center border-2 border-dashed border-slate-300 hover:border-blue-500 hover:bg-blue-50 rounded-xl cursor-pointer transition-colors bg-white">
                                <UploadCloud class="w-8 h-8 text-slate-400 mb-2" />
                                <span class="text-xs font-medium text-slate-500">Pilih Gambar</span>
                                <input type="file" @change="handleUtamaUpload" accept="image/*" class="hidden" />
                            </label>
                            
                            <div class="text-sm text-slate-500 max-w-sm">
                                <p class="font-medium text-slate-700 mb-1">Upload foto utama</p>
                                Gambar ini akan menjadi "cover" utama layanan Anda. Rekomendasi rasio 16:9 agar tampil sempurna. Upload maksimal 5MB.
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-slate-200">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Galeri Destinasi</label>
                                <p class="text-sm text-slate-500">Pilih beberapa foto tambahan untuk galeri destinasi (bisa upload banyak sekaligus).</p>
                            </div>
                            <label class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 hover:bg-blue-100 rounded-lg cursor-pointer transition-colors">
                                <Plus class="w-4 h-4" /> Tambah Foto
                                <input type="file" multiple @change="handleDestinasiUpload" accept="image/*" class="hidden" />
                            </label>
                        </div>
                        
                        <div v-if="previewDestinasi.length > 0" class="flex gap-4 overflow-x-auto pb-4">
                            <div v-for="(preview, index) in previewDestinasi" :key="index" class="relative group w-24 h-24 sm:w-32 sm:h-32 rounded-xl overflow-hidden border border-slate-200 shadow-sm shrink-0">
                                <img :src="preview.url" class="w-full h-full object-cover" />
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button" @click="removeDestinasi(index)" class="p-2 bg-red-500 hover:bg-red-600 text-white rounded-lg transition-colors">
                                        <Trash2 class="w-4 h-4" />
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-else class="w-full py-10 border-2 border-dashed border-slate-200 bg-slate-50 rounded-xl flex items-center justify-center">
                            <p class="text-sm text-slate-400">Belum ada foto galeri terpilih.</p>
                        </div>
                    </div>
                </div>

                <!-- Navigation Controls -->
                <div class="mt-8 pt-6 border-t border-border flex justify-between items-center">
                    <Button
                        type="button"
                        variant="outline"
                        @click="prevStep"
                        :disabled="currentStep === 1"
                        class="gap-2"
                    >
                        <ChevronLeft class="w-4 h-4" /> Sebelumnya
                    </Button>

                    <Button
                        v-if="currentStep < steps.length"
                        type="button"
                        @click="nextStep"
                        class="gap-2"
                    >
                        Selanjutnya <ChevronRight class="w-4 h-4" />
                    </Button>

                    <Button
                        v-else
                        type="submit"
                        :disabled="form.processing"
                        class="gap-2 bg-emerald-600 hover:bg-emerald-700"
                    >
                        <Check v-if="!form.processing" class="w-4 h-4" />
                        {{ form.processing ? 'Menyimpan...' : 'Simpan Perubahan' }}
                    </Button>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
