<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import SelectMenu from "../Components/SelectMenu.vue";
</script>

<template>
    <BoxBorder>
        <div class="bg-white p-4 dark:bg-admin-body">
            <section>
                <div
                    class="p-2 border border-l-8 border-indigo-500 dark:border-indigo-700 rounded-md w-8/12"
                >
                    <h5
                        class="pl-1 font-thin text-base text-gray-700 dark:text-gray-400"
                    >
                        <i class="bi bi-info pr-2"></i>
                        Aqui é o cardápio. Aqui você define os produtos que
                        estarão no seu catálago.
                    </h5>
                </div>

                <div class="pt-10">
                    <div class="flex flex-row justify-between">
                        <div>
                            <button
                                class="btn-primary bg-indigo-500 hover:opacity-85 dark:bg-indigo-700"
                            >
                                <i class="fa-solid fa-plus pr-1"></i>
                                Adicionar Categoria
                            </button>
                        </div>

                        <div>
                            <button
                                class="bg-none text-secondary-color-dark hover:opacity-80"
                            >
                                <i class="bi bi-list"></i>
                                Reordenar
                            </button>
                        </div>
                    </div>

                    <div class="pt-4">
                        <section class="flex flex-row justify-start gap-7">
                            <div class="w-3/12">
                                <SelectMenu />
                            </div>

                            <div class="self-center pt-2 flex">
                                <button
                                    class="text-base h-9 rounded-md rounded-r-none border border-black dark:bg-admin-card dark:border-gray-800 text-indigo-500 hover:text-indigo-700 focus:ring-indigo-700 hover:mr-2"
                                >
                                    <i class="bi bi-search px-3"></i>
                                </button>

                                <input
                                    type="text"
                                    placeholder="Buscar Categorias"
                                    class="p-1.5 h-9 text-gray-200 rounded-md rounded-l-none border dark:bg-admin-card dark:border-gray-800 focus:ring-2 focus:ring-indigo-700"
                                />
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </BoxBorder>
</template>
