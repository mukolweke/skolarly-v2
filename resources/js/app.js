import './bootstrap';

import { createApp } from 'vue'
import App from './App.vue'
import store from './lib/store.js'
import router from './pages/routes.js'
// import './css/index.css'

import.meta.glob([
    '../**/assets/**',
    '../**/fonts/**',
]);

const app = createApp(App)
app.use(router).use(store).mount('#app')


