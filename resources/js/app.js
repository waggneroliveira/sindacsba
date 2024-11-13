import './bootstrap';
import App from './components/App.vue';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

if (typeof createInertiaApp !== 'undefined') {
  createInertiaApp({
    resolve: name => {
      const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
      return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
        .use(plugin)
        .mount(el)
    },
  })
}

const app = createApp();
app.component('app', App);
app.mount('#app');