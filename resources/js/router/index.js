import { createRouter, createWebHistory } from 'vue-router'

import HomePage from '@/components/home/Index.vue'
import Login from '@/components/auth/Login.vue'
import PostIndex from '@/components/posts/PostIndex.vue'
import PostCreate from '@/components/posts/PostCreate.vue'
import PostEdit from '@/components/posts/PostEdit.vue'

const routes = [
    {
        path: "/",
        name: "home",
        component: HomePage,
    },
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
    { 
        path: '/posts/:id/edit',
        name: 'posts.edit',
        component: PostEdit,
        props: true
    },
    {
        path: '/login',
        name: 'login.index',
        component: Login
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})