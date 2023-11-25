import { createRouter, createWebHistory } from 'vue-router'

import PostIndex from '@/components/posts/PostIndex.vue'
import PostCreate from '@/components/posts/PostCreate.vue' 

const routes = [
    {
        path: '/dashboard',
        name: 'posts.index',
        component: PostIndex
    },
    { 
        path: '/posts/create',
        name: 'posts.create',
        component: PostCreate
    }, 
];

export default createRouter({
    history: createWebHistory(),
    routes
})