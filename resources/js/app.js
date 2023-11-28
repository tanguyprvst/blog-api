import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { createApp } from 'vue';
import router from './router/index.js'
import HomePage from './components/home/Index.vue';

createApp({
    components: {
        HomePage
    }
}).use(router).mount('#app')
