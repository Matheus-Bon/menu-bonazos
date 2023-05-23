import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import "animate.css";
import "../css/app.css";
import { createI18n } from "vue-i18n";
import { enMessages } from "@/constants/en";
import { ptMessages } from "@/constants/pt";

const messages = {
    pt: ptMessages,
    en: enMessages,
};

const i18n = createI18n({
    legacy: false,
    locale: document.documentElement.lang,
    fallbackLocale: "en",
    messages,
});

const appName =
    window.document.getElementsByTagName("title")[0]?.innerText || "Laravel";

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .use(i18n)
            .mount(el);
    },
    progress: {
        progress: false,
    },
});
