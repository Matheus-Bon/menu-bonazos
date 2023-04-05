import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import Vue from "vue";
import ArgonDashboard from "@/plugins/argon-dashboard";
Vue.use(ArgonDashboard);

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();


createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .mount(el);
    },
});
