import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/inertia-vue3';
import { resolvePageComponent } from 'vite-plugin-laravel/inertia';

// Import icons.
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faHouse, faQrcode } from '@fortawesome/free-solid-svg-icons';

library.add(faHouse, faQrcode);

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(name, import.meta.glob('../views/pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        createApp({ render: () => h(app, props) })
            .use(plugin)
            .component('Head', Head)
            .component('Link', Link)
            .component('font-awesome-icon', FontAwesomeIcon)
            .mount(el);
    },
    title: (title) => 'Shyft' + (title.trim() ? ` | ${title}` : ''),
});

import '../sass/app.scss';
import 'bootstrap';
