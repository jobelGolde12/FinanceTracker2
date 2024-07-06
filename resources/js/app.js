
import './bootstrap';
import { createApp } from 'vue';
import router from './router/index.js'
import App from '../js/components/App.vue'


const app = createApp(App);


app.use(router);
app.mount('#app');
