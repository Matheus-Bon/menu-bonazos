<script setup>
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed, ref, watch, onMounted } from "vue";

import toast from "@/Stores/toast";

const user = usePage().props.auth.user;

/* 
Lógica para mudar o nome da página quando acessá-la. 
Assim que criar uma nova página é recomendado que adicione em routes a nova rota.
*/
const routes = [
    { path: "", name: "Início" },
    { path: "orders", name: "Pedidos" },
    { path: "tables", name: "Tabelas" },
    { path: "menu", name: "Cardápio" },
    { path: "delivery-area", name: "Área de Entrega" },
    { path: "schedule", name: "Agendamento de Pedidos" },
    { path: "timetable", name: "Horários" },
    { path: "evaluations", name: "Avaliações" },
    { path: "unit", name: "Unidades" },
];

/* 
Função com finalidade de buscar a url na matriz routes e comparar com a url que o user está no site
*/
const nameRoute = computed(() => {
    // Encontra a rota atual dentro de um array de rotas
    const currentRoute = routes.find((route) => {
        const regularExp = new RegExp(route.path, 'g'); // Cria uma expressão regular com base na URL da página atual
        const nameRoute = usePage().url; // Armazena o caminho da rota atual em uma variável
        const match = regularExp.test(nameRoute) // Verifica se o caminho da rota atual corresponde à expressão regular

        if(match){
            
            return route
        }
    });

    return currentRoute.name;
});

console.log(new RegExp(usePage().url))
/* Lógica para saudações */
const salutation = ref("");

const hourDay = computed(() => {
    const hour = new Date().getHours();

    if (hour >= 5 && hour < 12) {
        return "Bom dia,";
    } else if (hour >= 12 && hour < 18) {
        return "Boa tarde,";
    } else {
        return "Boa noite,";
    }
});

watch(hourDay, (newValue) => {
    console.log(newValue);
    salutation.value = newValue;
});

onMounted(() => {
    salutation.value = hourDay.value;
});
/* Fim Lógica para Saudações */
</script>

<template>
    <nav
        class="relative top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
        <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
        >
            <div class="text-gray-200">
                <p
                    class="mb-3 text-base text-secondary-color-light dark:text-secondary-color-dark"
                >
                    {{ nameRoute }}
                </p>
                <p class="text-xl font-medium text-gray-700 dark:text-gray-300">
                    {{ salutation }} {{ user.name }}!
                </p>
            </div>

            <UserDropdown />
        </div>
    </nav>
</template>
