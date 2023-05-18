<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { ref } from "vue";
import { formatTime } from "@/Pages/Functions/functionsOfDate";
</script>

<template>
    <BoxBorder class="max-h-[322px]">
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Tabela dos Gerente
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>
                    Nessa caixa você pode ver todos os gerentes cadastrados, bem
                    como fazer mudanças nos dados dele.
                </p>
            </span>
        </template>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="max-h-[180px]">
                <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-collapse"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-zinc-700 dark:text-gray-400 sticky top-0"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3">Product name</th>
                            <th scope="col" class="px-6 py-3">Color</th>
                            <th scope="col" class="px-6 py-3">Category</th>
                            <th scope="col" class="px-6 py-3">Price</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="max-h-100 overflow-y-auto">
                        <tr
                            class="bg-white border-b dark:bg-neutral-800 dark:border-admin-card hover:bg-gray-50 dark:hover:bg-zinc-600"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                Apple MacBook Pro 17"
                            </th>
                            <td class="px-6 py-4">Silver</td>
                            <td class="px-6 py-4">Laptop</td>
                            <td class="px-6 py-4">$2999</td>
                            <td class="px-6 py-4 text-right">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    >Edit</a
                                >
                            </td>
                        </tr>
                        <tr
                            class="bg-white border-b dark:bg-neutral-800 dark:border-admin-card hover:bg-gray-50 dark:hover:bg-zinc-600"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                Microsoft Surface Pro
                            </th>
                            <td class="px-6 py-4">White</td>
                            <td class="px-6 py-4">Laptop PC</td>
                            <td class="px-6 py-4">$1999</td>
                            <td class="px-6 py-4 text-right">
                                <a
                                    href="#"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                    >Edit</a
                                >
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </BoxBorder>
</template>
