<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import { ref } from 'vue';

defineProps<{
    status?: string;
    canResetPassword?: boolean;
    canRegister?: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const formSubmit = () => {
    form.post('/login', {
        onFinish: () => form.reset('password'),
    });
};

const showPassword = ref(false);
</script>

<template>
    <Head title="Log In" />

    <div class="bg-[#f8f6f6] text-slate-900 min-h-screen flex items-center justify-center p-0 md:p-6 lg:p-12 font-display">
        <div class="flex w-full max-w-[1200px] h-full min-h-[700px] bg-white rounded-xl overflow-hidden shadow-2xl shadow-blue-900/10">
            <!-- Left Side: Login Form -->
            <div class="w-full lg:w-1/2 flex flex-col p-8 md:p-16 justify-center relative">
                <!-- Back Button -->
                <Link href="/" class="absolute top-6 left-6 md:top-8 md:left-8 text-slate-400 hover:text-blue-600 transition-colors flex items-center gap-2 text-sm font-medium">
                    <i class="fa-solid fa-arrow-left"></i> Beranda
                </Link>

                <!-- Logo & Header -->
                <div class="mb-10 flex flex-col gap-2 mt-6">
                    <div class="flex items-center gap-2 mb-4">
                        <Link href="/" class="flex items-center gap-3">
                            <img src="/image/logo6.png" alt="JustTrip Logo" class="w-10 h-10 object-contain" />
                            <div class="flex flex-col">
                                <h2 class="text-2xl font-bold tracking-tight text-transparent bg-clip-text bg-gradient-to-r from-blue-800 to-blue-600">Justtrip</h2>
                                <span class="text-[10px] text-gray-500 tracking-wider -mt-1 font-sans">#TripGagalMoveOn</span>
                            </div>
                        </Link>
                    </div>
                    <h1 class="text-4xl font-black tracking-tight text-slate-900">Selamat Datang</h1>
                    <p class="text-slate-500">Silakan masuk ke akun Anda untuk melanjutkan perjalanan.</p>
                </div>

                <div v-if="status" class="mb-4 text-center text-sm font-medium text-green-600">
                    {{ status }}
                </div>

                <!-- Form -->
                <form @submit.prevent="formSubmit" class="flex flex-col gap-6">
                    <!-- Email Field -->
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-semibold text-slate-700">Email</label>
                        <div class="relative">
                            <i class="fa-regular fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.email" type="email" class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="nama@email.com" required autofocus />
                        </div>
                        <InputError :message="form.errors.email" />
                    </div>

                    <!-- Password Field -->
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-center">
                            <label class="text-sm font-semibold text-slate-700">Password</label>
                            <Link v-if="canResetPassword" href="/forgot-password" class="text-xs font-medium text-blue-600 hover:text-blue-700 hover:underline">Lupa Password?</Link>
                        </div>
                        <div class="relative">
                            <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
                            <input v-model="form.password" :type="showPassword ? 'text' : 'password'" class="w-full pl-12 pr-12 py-3.5 rounded-xl border border-slate-200 bg-slate-50 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all outline-none" placeholder="Masukkan password Anda" required />
                            <button type="button" @click="showPassword = !showPassword" class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600">
                                <i :class="showPassword ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye'" class="text-lg"></i>
                            </button>
                        </div>
                        <InputError :message="form.errors.password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center gap-3">
                        <input type="checkbox" id="remember" v-model="form.remember" class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer" />
                        <label for="remember" class="text-sm font-medium text-slate-600 cursor-pointer">Ingat saya</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" :disabled="form.processing" class="w-full py-4 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold text-lg hover:opacity-90 transition-all shadow-lg shadow-blue-500/20 active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed">
                        <span v-if="form.processing">Memproses...</span>
                        <span v-else>Masuk</span>
                    </button>
                </form>

                <!-- Footer Link -->
                <p v-if="canRegister" class="mt-10 text-center text-slate-600">
                    Belum punya akun? 
                    <Link href="/register" class="text-blue-600 font-bold hover:text-blue-700 hover:underline">Daftar sekarang</Link>
                </p>
            </div>

            <!-- Right Side: Visual Content -->
            <div class="hidden lg:block w-1/2 relative bg-blue-50">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/image/1.jpg')"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                
                <!-- Floating Content on Image -->
                <div class="absolute bottom-16 left-16 right-16 text-white drop-shadow-md">
                    <div class="flex gap-2 mb-4">
                        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                        <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
                    </div>
                    <blockquote class="text-2xl font-medium leading-tight mb-4 italic">
                        "Justtrip membuat perencanaan liburan keluarga kami menjadi sangat mudah dan menyenangkan. Pilihan destinasi tropisnya luar biasa!"
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
