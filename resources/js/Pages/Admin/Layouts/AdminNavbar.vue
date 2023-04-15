<script setup>
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

/* 
Lógica para mudar o nome da página quando acessá-la. 
Assim que criar uma nova página é recomendado que adicione em routes a nova rota.
*/
const routes = [
    {path: '/dashboard', name: 'Início'},
    {path: '/dashboard/pedidos', name: 'Pedidos'},
    {path: '/dashboard/tabelas', name: 'Tabelas'},
    {path: '/dashboard/cardapio', name: 'Cardápio'},
    {path: '/dashboard/area-entrega', name: 'Área de Entrega'},
    {path: '/dashboard/agendamento-pedido', name: 'Agendamento de Pedidos'},
    {path: '/dashboard/horario-funcionamento', name: 'Horário de Funcionamento'},
    {path: '/dashboard/avaliacoes', name: 'Avaliações'},
]

const nameRoute = computed(() => {

    const currentRoute = routes.find(route => route.path === usePage().url)

    return currentRoute ? currentRoute.name : ''
})

</script>

<template>
    <!-- Navbar -->
    <nav
        class="absolute top-0 left-0 w-full z-10 bg-transparent md:flex-row md:flex-nowrap md:justify-start flex items-center p-4"
    >
        <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
        >
            <!-- Brand -->
            <Link
                class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                href="javascript:void(0)"
                
            >
                {{ nameRoute }}
            </Link>

            <!-- User -->
            <UserDropdown />
        </div>
    </nav>
    <!-- End Navbar -->
</template>
