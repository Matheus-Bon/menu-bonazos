import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import { createI18n } from "vue-i18n";
import { enMessages } from "@/constants/en";
import { ptMessages } from "@/constants/pt";
import "animate.css";
import "../css/app.css";

/* 
    Define a variável 'messages' como um objeto com duas propriedades:
    'pt' e 'en', que contêm as mensagens em português e inglês, respectivamente.
*/
const messages = {
    pt: ptMessages,
    en: enMessages,
};


/* 
    legacy: Define a opção 'legacy' como false, indicando que não será utilizado o modo de compatibilidade com versões anteriores.
    locale: Define a opção 'locale' como o valor da propriedade 'lang' do elemento raiz do documento HTML, que especifica o idioma da página.
    fallbackLocale: Define o idioma padrão (fallback) como "en" (inglês), que será usado caso a tradução para o idioma atual não esteja disponível.
    messages: Define as mensagens disponíveis para a internacionalização usando o objeto 'messages' definido acima.
*/
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
