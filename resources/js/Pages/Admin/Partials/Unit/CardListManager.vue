<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";

const props = defineProps({ units: Object });
</script>

<template>
    <BoxBorder class="h-[322px]">
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
                        class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-zinc-700 dark:text-gray-400 sticky top-0"
                    >
                        <tr>
                            <th scope="col" class="px-6 py-3">Unidade</th>
                            <th scope="col" class="px-6 py-3">Gerente</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>

                    <tbody class="max-h-100 overflow-y-auto">
                        <tr
                            class="bg-white border-b dark:bg-neutral-800 dark:border-admin-card hover:bg-gray-50 dark:hover:bg-zinc-600"
                            v-for="unit in units"
                            :key="unit.id"
                        >
                            <th
                                scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                            >
                                {{ unit?.name }}
                            </th>
                            <td class="px-6 py-4">{{ unit.manager?.name }}</td>
                            <td class="px-6 py-4">{{ unit.manager?.email }}</td>
                            <td class="px-6 py-4 text-right">
                                <a
                                    href="#"
                                    class="font-medium text-indigo-600 dark:text-indigo-500 hover:underline"
                                >
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </BoxBorder>
</template>
