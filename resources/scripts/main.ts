import { createApp, h } from 'vue';
import { createInertiaApp, Head } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'vite-plugin-laravel/inertia';

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .mount(el);
    },
    title: (title) => 'Shyft' + ((title.trim()) ? ` | ${title}` : ''),
});

import '../sass/app.scss';
