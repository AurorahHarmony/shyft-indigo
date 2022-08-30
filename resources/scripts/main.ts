import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'vite-plugin-laravel/inertia';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .mount(el);
    },
    title: (title) => 'Shyft' + (title.trim() ? ` | ${title}` : ''),
});

import '../sass/app.scss';
import 'bootstrap';
