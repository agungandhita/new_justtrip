<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { ref } from 'vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const formSubmit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const showPassword = ref(false);
const showPasswordConfirm = ref(false);
</script>

<template>
    <Head title="Register" />

    <div class="bg-[#f8f6f6] text-slate-900 min-h-screen flex items-center justify-center p-0 md:p-6 lg:p-12 font-display">
        <div class="flex w-full max-w-[1200px] h-full min-h-[700px] bg-white rounded-xl overflow-hidden shadow-2xl shadow-blue-900/10">
            <!-- Left Side: Register Form -->
            <div class="w-full lg:w-1/2 flex flex-col p-8 md:p-12 lg:p-16 justify-center overflow-y-auto relative">
                <!-- Back Button -->
                <Link href="/" class="absolute top-6 left-6 md:top-8 md:left-8 text-slate-400 hover:text-blue-600 transition-colors flex items-center gap-2 text-sm font-medium z-10">
                    <i class="fa-solid fa-arrow-left"></i> Beranda
                </Link>

                <!-- Logo & Header -->
                <div class="mb-8 flex flex-col gap-2 pt-8 md:pt-4">
                    <div class="flex items-center gap-2 mb-2">
                        <Link href="/" class="flex items-center gap-3 group">
                            <img src="/image/logo6.png" alt="JustTrip Logo" class="w-10 h-10 object-contain group-hover:scale-105 transition-transform" />
                            <div class="flex flex-col">
                                <h2 class="text-2xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-600">Justtrip</h2>
                                <span class="text-[10px] text-gray-500 tracking-wider -mt-1 font-sans">#TripGagalMoveOn</span>
                            </div>
                        </Link>
                    </div>
                    <h1 class="text-3xl lg:text-4xl font-black tracking-tight text-slate-900">Mari Bergabung</h1>
                    <p class="text-slate-500">Buat akun Anda sekarang dan mulai petualangan tak terlupakan bersama kami.</p>
                </div>

                <!-- Form -->
                <form @submit.prevent="formSubmit" class="flex flex-col gap-5">
                    
                    <!-- Name Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-slate-700">Nama Lengkap</label>
                        <div class="relative">
                            <i class="fa-regular fa-user absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.name" type="text" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="Masukkan nama Anda" required autofocus autocomplete="name" />
                        </div>
                        <InputError :message="form.errors.name" />
                    </div>

                    <!-- Email Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-slate-700">Email</label>
                        <div class="relative">
                            <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.email" type="email" class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="nama@email.com" required autocomplete="email" />
                        </div>
                        <InputError :message="form.errors.email" />
                    </div>

                    <!-- Password Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-slate-700">Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.password" :type="showPassword ? 'text' : 'password'" class="w-full pl-12 pr-12 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="Minimal 8 karakter" required autocomplete="new-password" />
                            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 border-0 bg-transparent">
                                <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" class="text-lg"></i>
                            </button>
                        </div>
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.password_confirmation" :type="showPasswordConfirm ? 'text' : 'password'" class="w-full pl-12 pr-12 py-3 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="Ketik ulang password" required autocomplete="new-password" />
                            <button type="button" @click="showPasswordConfirm = !showPasswordConfirm" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 border-0 bg-transparent">
                                <i :class="showPasswordConfirm ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" class="text-lg"></i>
                            </button>
                        </div>
                        <InputError :message="form.errors.password_confirmation" />
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="form.processing" class="mt-4 w-full py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold text-lg hover:opacity-90 transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed">
                        <span v-if="form.processing">Mendaftar...</span>
                        <span v-else>Daftar Sekarang</span>
                    </button>
                    
                </form>

                <!-- Footer Link -->
                <p class="mt-8 text-center text-slate-600 pb-8 md:pb-0">
                    Sudah punya akun? 
                    <Link href="/login" class="text-blue-600 font-bold hover:text-blue-700 hover:underline">Masuk di sini</Link>
                </p>
            </div>

            <!-- Right Side: Visual Content -->
            <div class="hidden lg:block w-1/2 relative bg-blue-50">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/image/2.jpg')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                
                <!-- Floating Content on Image -->
                <div class="absolute bottom-16 left-16 right-16 text-white drop-shadow-md">
                    <blockquote class="text-2xl font-medium leading-tight mb-4 italic">
                        "Bersama Justtrip, pengalaman wisata keluarga kami bebas stres. Timnya sangat responsif mendengarkan setiap kemauan kami."
                    </blockquote>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full border-2 border-white/50 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Anisa+Rahmawati&background=0284c7&color=fff" alt="User Avatar"/>
                        </div>
                        <div>
                            <p class="font-bold">Anisa Rahmawati</p>
                            <p class="text-sm text-white/90">Solo Traveler, Jakarta</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;800;900&display=swap');

.font-display {
    font-family: 'Public Sans', sans-serif;
}
</style>
