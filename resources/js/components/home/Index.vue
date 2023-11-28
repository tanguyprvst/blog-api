<template>
    <div class="grid grid-flow-row gap-8 text-neutral-600 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <div class="rounded overflow-hidden shadow-lg" v-for="post in posts" :key="post.id">
            <img class="w-full" :src="getImgUrl(post)" :alt="post.title">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2">{{ post.title }}</div>
                <p class="text-gray-700 text-base">
                    {{ post.content }}
                </p>
            </div>
            <div class="px-6 pt-4 pb-2">
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ post.category.name }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import usePosts from '@/composables/posts'
import { onMounted } from 'vue';

const { posts, getPosts } = usePosts()

const getImgUrl = (post) => {
    if (post.image.includes('/posts/')) {
        return '/uploads/' + post.image;
    }
    return '/uploads/posts/' +  post.id + '/' + post.image;
};

onMounted(getPosts)
</script>