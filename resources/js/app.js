// import './bootstrap';

// import {createApp} from 'vue';
// import App from './components/App.vue';

// const app = createApp();

// app.component('app', App);

// app.mount('#app');

import './bootstrap';

import { createApp, h } from 'vue';
import { InertiaApp } from '@inertiajs/vue3';

// Crie o app Vue
const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(document.getElementById('app').dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default, // Resolvendo componentes das páginas
        }),
});

// Montando o app Vue
app.mount('#app');
