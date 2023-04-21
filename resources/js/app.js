import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import VueSweetalert2 from 'vue-sweetalert2';
import axios from 'axios'
import VueAxios from 'vue-axios'
import CKEditor from '@ckeditor/ckeditor5-vue';

import Gleap from 'gleap';

import 'flowbite';
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .use(VueSweetalert2)
            .use(ZiggyVue, Ziggy)
            .use(VueAxios, axios)
            .use(CKEditor)
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
Gleap.initialize("YOYFH1FfAXV1aYaps0bDgGirCDC6ND29");
