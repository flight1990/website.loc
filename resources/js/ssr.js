import {createInertiaApp, Link, Head} from '@inertiajs/vue3';
import createServer from '@inertiajs/vue3/server';
import {renderToString} from '@vue/server-renderer';
import {createSSRApp, h} from 'vue';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createServer(page =>
    createInertiaApp({
        page,
        render: renderToString,
        resolve: (name) => {
            let parts = name.split('::');

            if (parts.length > 1) {
                return resolvePageComponent(`../../Modules/${parts[0]}/Resources/js/Pages/${parts[1]}.vue`, import.meta.glob(`../../Modules/**/*.vue`));
            } else {
                return resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'));
            }
        },
        setup({App, props, plugin}) {
            return createSSRApp({render: () => h(App, props)})
                .use(plugin)
                .component('inertia-link', Link)
                .component('inertia-head', Head)
        },
    }),
);
