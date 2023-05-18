<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { ref } from "vue";
import { formatTime } from "@/Pages/Functions/functionsOfDate";
</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Criação do Gerente
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você cria os gerentes para as unidades.</p>
            </span>
        </template>
        <div>
            <form>
                <div class="flex flex-wrap gap-7 items-center">
                    <div class="flex flex-col basis-4/12">
                        <label for="category" class="label-default">
                            Nome Gerente
                        </label>
                        <input
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col basis-7/12">
                        <label for="category" class="label-default">
                            Email
                        </label>
                        <input
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col basis-4/12">
                        <label for="category" class="label-default">
                            Senha
                        </label>
                        <input
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col basis-4/12">
                        <label for="category" class="label-default">
                            Confirme a senha
                        </label>
                        <input
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>

                    <button
                        type="button"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 self-end"
                    >
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </BoxBorder>
</template>
