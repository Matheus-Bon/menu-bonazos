<script setup>
import NotificationDropdown from "@/Pages/Admin/Components/NotificationDropdown.vue";
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link, usePage } from "@inertiajs/vue3";

const user = usePage().props.auth.user

</script>

<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6 bg-admin-body-light dark:bg-admin-card"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <!-- Toggler -->
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <Link
                :href="route('unit.dashboard.')"
                class="md:block text-center md:pb-2 text-gray-800 mr-0 inline-block whitespace-nowrap text-3xl uppercase font-semibold p-4 px-0 dark:text-gray-200"
            >
                Delivery
            </Link>

            <div class="flex flex-col gap-1 mt-3">
                <span class="text-gray-500 text-sm font-thin">
                    Sua loja está: 
                    <span v-if="user.unit?.isOpen" class="text-secondary-color-100 font-medium">
                        Aberta
                    </span>
                    <span v-else class="text-red-500 font-medium">
                        Fechada
                    </span>
                </span>
                <span class="text-gray-500 text-sm font-thin">
                    Unidade: {{ user.unit?.name }}
                </span>
            </div>

            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <NotificationDropdown />
                </li>
                <li class="inline-block relative">
                    <UserDropdown />
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <Link
                                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-semibold p-4 px-0"
                            >
                                <i class="bi bi-database"></i>
                                Bonazos
                            </Link>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Divider -->
                <hr
                    class="my-4 md:min-w-full dark:border-secondary-color border-dashed"
                />
                <!-- Heading -->
                <h6
                    class="md:min-w-full text-gray-600 text-2xs uppercase font-bold block pt-1 pb-4 no-underline dark:text-gray-300"
                >
                    Páginas Principais
                </h6>
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard',
                            }"
                        >
                            <i class="bi bi-house-door pr-1"></i>
                            Início
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.orders')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard/orders',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard/orders',
                            }"
                        >
                            <i class="bi bi-bookmark pr-1"></i>
                            Pedidos
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.tables')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard/tables',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard/tables',
                            }"
                        >
                            <i class="bi bi-table pr-1"></i>
                            Tabelas
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.menu.index')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard/menu',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard/menu',
                            }"
                        >
                            <i class="bi bi-card-list pr-1"></i>
                            Cardápio
                        </Link>
                    </li>
                </ul>
                <hr
                    class="my-4 md:min-w-full dark:border-secondary-color border-dashed"
                />
                <!-- Heading -->
                <h6
                    class="md:min-w-full text-gray-600 text-2xs uppercase font-bold block pt-1 pb-4 no-underline dark:text-gray-300"
                >
                    Páginas Secundárias
                </h6>
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.delivery')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard/delivery-area',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard/delivery-area',
                            }"
                        >
                            <i class="fa-solid fa-location-dot pr-1"></i>
                            Área de entrega
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.schedule')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90 hover:text-secondary-color':
                                    $page.url ===
                                    '/dashboard/schedule',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url !=
                                    '/dashboard/schedule',
                            }"
                        >
                            <i class="bi bi-calendar pr-1"></i>
                            Agendar Pedido
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.timetable.index')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url ===
                                    '/dashboard/timetable',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url !=
                                    '/dashboard/timetable',
                            }"
                        >
                            <i class="bi bi-clock pr-1"></i>
                            Horários
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.evaluations')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':
                                    $page.url === '/dashboard/evaluations',

                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark':
                                    $page.url != '/dashboard/evaluations',
                            }"
                        >
                            <i class="bi bi-star pr-1"></i>
                            Avaliações
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('unit.dashboard.unit.index')"
                            class="text-base py-3 font-normal block"
                            :class="{
                                'text-secondary-color-light dark:text-secondary-color-dark hover:opacity-90':$page.url.startsWith('/\/unit$/') ,
                                'text-gray-800 hover:text-secondary-color-light dark:text-gray-200 dark:hover:text-secondary-color-dark': !$page.url.startsWith('/\/unit$/')
                            }"
                        >
                            <i class="bi bi-shop"></i>
                            Unidades
                        </Link>
                    </li>
                </ul>
            </div>
            <span class="text-center text-xs font-thin text-gray-400 dark:text-gray-700">
                Desenvolvido por
                
                <span class="font-bold text-gray-500">
                    Bonazos <i class="bi bi-database"></i>
                </span>
                
            </span>
        </div>
    </nav>
</template>
