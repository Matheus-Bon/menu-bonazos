<script setup>
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const user = usePage().props.auth.user;

/* 
Lógica para mudar o nome da página quando acessá-la. 
Assim que criar uma nova página é recomendado que adicione em routes a nova rota.
*/
const routes = [
    { path: "/dashboard", name: "Início" },
    { path: "/dashboard/pedidos", name: "Pedidos" },
    { path: "/dashboard/tabelas", name: "Tabelas" },
    { path: "/dashboard/cardapio", name: "Cardápio" },
    { path: "/dashboard/area-entrega", name: "Área de Entrega" },
    { path: "/dashboard/agendamento-pedido", name: "Agendamento de Pedidos" },
    {
        path: "/dashboard/horario-funcionamento",
        name: "Horário de Funcionamento",
    },
    { path: "/dashboard/avaliacoes", name: "Avaliações" },
];

const nameRoute = computed(() => {
    const currentRoute = routes.find((route) => route.path === usePage().url);

    return currentRoute ? currentRoute.name : "";
});

/* Lógica para saudações */
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
</script>

<template>
    <!-- Navbar -->
    <nav
        class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
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
                <p class="text-xl font-medium">
                    {{ hourDay }} {{ user.name }}!
                </p>
                
            </div>

            <!-- User -->
            <UserDropdown />
        </div>
    </nav>
    <!-- End Navbar -->
</template>
