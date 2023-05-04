<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import SelectMenu from "@/Pages/Admin/Components/SelectMenu.vue";
import CardCategory from "@/Pages/Admin/Partials/Menu/CardCategory.vue";
import ModalAddCategory from "@/Pages/Admin/Components/Menu/ModalAddCategory.vue";

import { ref } from "vue";

defineProps({ categories: Object });
const modal = ref(null);

const toggleModal = () => {
    modal.value.toggleModal();
};
</script>

<template>
    <ModalAddCategory ref="modal" />
    
    <div class="flex flex-col gap-10">
        <BoxBorder>

            <template #card-header>
                <div
                        class="p-2 border border-l-8 border-indigo-500 dark:border-indigo-700 rounded-md xl:w-full 2xl:w-9/12"
                    >
                        <h5
                            class="pl-1 font-thin 2xl:text-base xl:text-sm text-gray-700 dark:text-gray-400"
                        >
                            <i class="bi bi-info pr-2"></i>
                            Aqui é o cardápio. Aqui você define os produtos que
                            estarão no seu catálago.
                        </h5>
                    </div>
            </template>
                <section>
                    <div class="">
                        <div class="flex flex-row justify-between">
                            <div>
                                <button
                                    @click="toggleModal"
                                    class="btn-primary bg-indigo-500 hover:opacity-90 dark:bg-indigo-700"
                                >
                                    <i class="fa-solid fa-plus pr-1"></i>
                                    Adicionar Categoria
                                </button>
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
                    </div>
                </section>
        </BoxBorder>

        <section>
            <div class="flex flex-col gap-6">
                <CardCategory
                    v-for="category in categories"
                    :key="category.id"
                    :category="category"
                />
            </div>
        </section>
    </div>
</template>
