<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import SelectMenu from "@/Pages/Admin/Components/SelectMenu.vue";
import CardCategory from "@/Pages/Admin/Partials/Menu/CardCategory.vue";
import ModalAddCategory from "@/Pages/Admin/Components/Menu/ModalAddCategory.vue";
import ModalUpdateCategory from "@/Pages/Admin/Components/Menu/ModalUpdateCategory.vue";

import { ref } from "vue";

defineProps({ categories: Object });
const modal = ref(null);

const openModal = () => {
    modal.value.openModal()
}

const categoryInfo = ref(null)


</script>

<template>
    <ModalAddCategory ref="modal" />
    <ModalUpdateCategory ref="modalEdit" :category="categoryInfo" />

    <div class="flex flex-col gap-10">
        <BoxBorder>
            <template #card-header>
                <h4 class="font-semibold text-lg text-gray-800 dark:text-white">
                    Funções principais para criação do Cardápio
                </h4>
                <span class="text-sm font-light text-gray-500">
                    <p>
                        Aqui você cria os produtos que estarão no seu delivery
                    </p>
                </span>
            </template>
            <section>
                <div class="flex flex-row justify-between">
                    <div>
                        <button
                            @click="openModal"
                            class="btn-primary bg-indigo-500 hover:bg-indigo-700 hover:dark:bg-indigo-800 dark:bg-indigo-700"
                        >
                            <i class="fa-solid fa-plus pr-1"></i>
                            Adicionar Categoria
                        </button>
                        <button
                                data-modal-target="popup-modal"
                                data-modal-toggle="popup-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button"
                            >
                                Toggle modal
                            </button>

                            <div
                                id="popup-modal"
                                tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
                            >
                                <div
                                    class="relative w-full max-w-md max-h-full"
                                >
                                    <div
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700"
                                    >
                                        <button
                                            type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="popup-modal"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="w-5 h-5"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span class="sr-only"
                                                >Close modal</span
                                            >
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg
                                                aria-hidden="true"
                                                class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                                                ></path>
                                            </svg>
                                            <h3
                                                class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400"
                                            >
                                                Are you sure you want to delete
                                                this product?
                                            </h3>
                                            <button
                                                data-modal-hide="popup-modal"
                                                type="button"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"
                                            >
                                                Yes, I'm sure
                                            </button>
                                            <button
                                                data-modal-hide="popup-modal"
                                                type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                            >
                                                No, cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div>
                        <button
                            class="bg-none text-secondary-color-light dark:text-secondary-color-dark hover:opacity-80"
                        >
                            <i class="bi bi-list"></i>
                            Reordenar
                        </button>
                    </div>
                </div>

                <div class="pt-4 flex flex-col gap-20">
                    <section class="flex flex-row justify-start gap-7">
                        <div class="2xl:w-3/12 lg:w-5/12">
                            <SelectMenu />
                        </div>

                        <div class="self-center pt-2 flex">
                            <button
                                class="text-base h-9 rounded-md rounded-r-none border border-gray-300 dark:bg-admin-card dark:border-gray-800 text-indigo-500 hover:text-indigo-700 focus:ring-indigo-700 hover:mr-2 hover:transition-all hover:duration-300 hover:ease-in-out"
                            >
                                <i class="bi bi-search px-3"></i>
                            </button>

                            <input
                                type="text"
                                placeholder="Buscar Categorias"
                                class="p-1.5 h-9 text-gray-200 rounded-md rounded-l-none border border-gray-300 shadow-sm dark:bg-admin-card dark:border-gray-800 focus:ring-1 focus:ring-indigo-700 2xl:w-full lg:w-4/6 2xl:text-base lg:text-sm"
                            />
                        </div>
                    </section>
                </div>
            </section>
        </BoxBorder>

        <section>
            <div class="flex flex-col gap-6">
                <CardCategory
                    v-for="category in categories"
                    :key="category.id"
                    :category="category"
                    @open="toggleModalEdit"
                />
            </div>
        </section>
    </div>
</template>
