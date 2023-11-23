import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import router from './router/index.js'

import PostIndex from './components/posts/PostIndex.vue';

createApp({
    components: {
        PostIndex
    }
}).use(router).mount('#app')
