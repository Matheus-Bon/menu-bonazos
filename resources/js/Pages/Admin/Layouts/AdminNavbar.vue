<script setup>
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link, usePage } from "@inertiajs/vue3";
import { computed, reactive, ref, onMounted } from "vue";

const user = usePage().props.auth.user;

/* 
Lógica para mudar o nome da página quando acessá-la. 
Assim que criar uma nova página é recomendado que adicione em routes a nova rota.
*/
const routes = [
    { path: "/dashboard", name: "Início" },
    { path: "/dashboard/orders", name: "Pedidos" },
    { path: "/dashboard/tables", name: "Tabelas" },
    { path: "/dashboard/menu", name: "Cardápio" },
    { path: "/dashboard/delivery-area", name: "Área de Entrega" },
    { path: "/dashboard/schedule", name: "Agendamento de Pedidos" },
    { path: "/dashboard/timetable", name: "Horário de Funcionamento" },
    { path: "/dashboard/evaluations", name: "Avaliações" },
];

/* 
Função com finalidade de buscar a url na matriz routes e comparar com a url que o user está no site
*/
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

/* Lógica para desaparecer o flash */
const showNotif = ref(false)

onMounted(() => {
    showNotif.value = true;
    setTimeout(() => {
        showNotif.value = false;
        usePage().props.flash.success = null;
    }, 6000);
    
});


console.log(usePage().props.flash.success);
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
                <p class="text-xl font-medium text-gray-700 dark:text-gray-300">
                    {{ hourDay }} {{ user.name }}!
                </p>
            </div>

            <Transition
                enter-active-class="animate__animated animate__slideInDown animate__slow"
                leave-active-class="animate__animated animate__slideOutUp animate__slow"
                
            >
                <div
                    v-if="$page.props.flash.success && showNotif"
                    class="fixed top-0 flex flex-row gap-2 p-2 text-lg font-medium text-gray-800 justify-center rounded-b-md bg-secondary-color-dark w-1/5"
                    style="left: calc(50% - 200px)"
                >
                    <div>
                        <i class="bi bi-check2-all text-2xl"></i>
                    </div>
                    <div>
                        {{ $page.props.flash.success }}
                    </div>
                </div>
            </Transition>
            <!-- User -->
            <UserDropdown />
        </div>
    </nav>
    <!-- End Navbar -->
</template>

<!--  -->
<!-- && isVisible -->
