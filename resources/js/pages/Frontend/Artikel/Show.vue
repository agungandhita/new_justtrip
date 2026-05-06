<script setup lang="ts">
import FrontendLayout from '@/layouts/FrontendLayout.vue'
import { Link } from '@inertiajs/vue3'

const props = defineProps<{
    article: any
    related?: any[]
}>()
</script>

<template>
    <FrontendLayout :title="article.title">
        <div class="max-w-4xl mx-auto px-4 md:px-10 py-8">
            <!-- Back -->
            <Link href="/artikel" class="flex items-center gap-2 text-blue-700 text-sm font-medium hover:underline mb-6">
                <i class="fas fa-arrow-left text-xs"></i> Kembali ke Artikel
            </Link>

            <!-- Article Header -->
            <header class="mb-8">
                <span v-if="article.kategori" class="px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wider mb-3 inline-block">
                    {{ article.kategori }}
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 leading-tight mb-4">{{ article.title }}</h1>
                <div class="flex items-center gap-4 text-sm text-slate-500">
                    <span v-if="article.published_at"><i class="fas fa-calendar mr-1"></i>{{ article.published_at }}</span>
                    <span v-if="article.author"><i class="fas fa-user mr-1"></i>{{ article.author }}</span>
                </div>
            </header>

            <!-- Featured Image -->
            <div v-if="article.featured_image" class="aspect-[16/9] rounded-2xl overflow-hidden shadow-xl mb-10">
                <img
                    :src="`/storage/${article.featured_image}`"
                    :alt="article.title"
                    class="w-full h-full object-cover"
                >
            </div>

            <!-- Content -->
            <div class="prose prose-lg max-w-none text-slate-700 leading-relaxed mb-12"
                 v-html="article.konten ?? article.content ?? article.excerpt">
            </div>

            <!-- Related Articles -->
            <div v-if="related && related.length > 0" class="border-t border-slate-200 pt-10">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <Link
                        v-for="rel in related"
                        :key="rel.id"
                        :href="`/artikel/${rel.slug}`"
                        class="group bg-white rounded-xl overflow-hidden border border-slate-200 shadow hover:shadow-md transition-all"
                    >
                        <div class="aspect-[16/9] overflow-hidden">
                            <img
                                :src="rel.featured_image ? `/storage/${rel.featured_image}` : '/image/1-SLIDE.png'"
                                :alt="rel.title"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                loading="lazy"
                            >
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-sm text-gray-800 line-clamp-2 group-hover:text-blue-700 transition-colors">{{ rel.title }}</h3>
                            <p class="text-xs text-slate-400 mt-1">{{ rel.published_at }}</p>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </FrontendLayout>
</template>
