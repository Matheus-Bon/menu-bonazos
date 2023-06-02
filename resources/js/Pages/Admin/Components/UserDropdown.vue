<script setup>
import { Menu, MenuButton, MenuItem, MenuItems } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";
import { Link } from "@inertiajs/vue3";
import { useDark, useToggle } from "@vueuse/core";

const isDark = useDark();
const toggleDark = useToggle(isDark);
</script>

<template>
    <Menu as="div" class="relative inline-block text-left">
        <div>
            <MenuButton
                class="text-2xl text-secondary-color-light dark:text-secondary-color-dark"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-gear-wide-connected"
                    viewBox="0 0 16 16"
                    id="gear-icon"
                >
                    <path
                        d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"
                    />
                </svg>
            </MenuButton>
        </div>

        <transition
            enter-active-class="transition ease-out duration-100"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >
            <MenuItems
                class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg shadow-white/20 ring-1 ring-black ring-opacity-5 focus:outline-none dark:bg-admin-card"
            >
                <div class="pt-1">
                    <MenuItem v-slot="{ active }">
                        <Link
                            href="#"
                            class="block px-4 py-2 text-base hover:rounded-t-md text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:bg-white dark:hover:text-gray-600"
                        >
                            <i class="bi bi-person pr-2"></i>
                            Perfil
                        </Link>
                    </MenuItem>
                    <MenuItem v-slot="{ active }">
                        <Link
                            :href="route('unit.home')"
                            class="block px-4 py-2 text-base text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:bg-white dark:hover:text-gray-600"
                        >
                            <i class="bi bi-shop-window pr-2"></i>
                            Seu Delivery
                        </Link>
                    </MenuItem>
                    <MenuItem>
                        <button
                            @click="toggleDark()"
                            class="w-full block px-4 py-2 text-base text-left text-gray-700 hover:text-gray-500 dark:text-gray-400 dark:hover:bg-white dark:hover:text-gray-600"
                        >
                            <span v-if="isDark">
                                <i class="bi bi-brightness-high pr-2"></i>
                                Modo Claro
                            </span>
                            <span v-else>
                                <i class="bi bi-moon pr-2"></i>
                                Modo Escuro
                            </span>
                        </button>
                    </MenuItem>

                    <MenuItem class="bg-secondary-color-dark rounded-b-md">
                        <Link
                            :href="route('logout')"
                            method="POST"
                            as="button"
                            class="uppercase text-center"
                            :class="[
                                active
                                    ? 'bg-gray-100 text-gray-900'
                                    : 'text-gray-700',
                                'block w-full px-4 py-2 text-left text-sm',
                            ]"
                        >
                            Sair
                        </Link>
                    </MenuItem>
                </div>
            </MenuItems>
        </transition>
    </Menu>
</template>
