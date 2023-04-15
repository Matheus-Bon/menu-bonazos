<script setup>
import NotificationDropdown from "@/Pages/Admin/Components/NotificationDropdown.vue";
import UserDropdown from "@/Pages/Admin/Components/UserDropdown.vue";
import { Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";

</script>

<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6"
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
                :href="route('dashboard.')"
                class="md:block text-center md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-3xl uppercase font-semibold p-4 px-0"
            >
                Bonazos
            </Link>

            <span
                class="md:block text-center md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-base uppercase font-normal p-4 px-0"
            >
                Delivery
            </span>

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
                                class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                            >
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
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6
                    class="md:min-w-full text-blueGray-500 text-2xs uppercase font-bold block pt-1 pb-4 no-underline"
                >
                    Páginas Principais
                </h6>
                <!-- Navigation -->

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url === '/dashboard',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url != '/dashboard',
                            }"
                        >
                            <i class="bi bi-house-door"></i>
                            Início
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url === '/dashboard',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url != '/dashboard',
                            }"
                        >
                            <i class="bi bi-bookmark"></i>
                            Pedidos
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.table')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url === '/dashboard/tabela',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url != '/dashboard/tabela',
                            }"
                        >
                            <i class="bi bi-table"></i>
                            Tabelas
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.menu')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url === '/dashboard/cardapio',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url != '/dashboard/cardapio',
                            }"
                        >
                            <i class="bi bi-card-list"></i>
                            Cardápio
                        </Link>
                    </li>
                </ul>
                <hr class="my-4 md:min-w-full" />
                <!-- Heading -->
                <h6
                    class="md:min-w-full text-blueGray-500 text-2xs uppercase font-bold block pt-1 pb-4 no-underline"
                >
                    Páginas Secundárias
                </h6>
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url === '/dashboard/area-entrega',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url != '/dashboard/area-entrega',
                            }"
                        >
                            <i class="bi bi-truck"></i>
                            Área de entrega
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url ===
                                    '/dashboard/agendamento-pedido',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url !=
                                    '/dashboard/agendamento-pedido',
                            }"
                        >
                            <i class="bi bi-calendar"></i>
                            Agendar Pedido
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url ===
                                    '/dashboard/agendamento-pedido',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url !=
                                    '/dashboard/agendamento-pedido',
                            }"
                        >
                            <i class="bi bi-clock"></i>
                            Horários
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('dashboard.')"
                            class="text-sm uppercase py-3 font-bold block"
                            :class="{
                                'text-emerald-500 hover:text-emerald-600':
                                    $page.url ===
                                    '/dashboard/agendamento-pedido',
                                'text-blueGray-700 hover:text-blueGray-500':
                                    $page.url !=
                                    '/dashboard/agendamento-pedido',
                            }"
                        >
                            <i class="bi bi-star"></i>
                            Avaliações
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
