<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";

const props = defineProps({ formSentByCardUnit: Object });


</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Lista de Unidade
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você edita as unidades.</p>
            </span>
        </template>

        <div class="flex flex-wrap gap-5">
            <div
                class="grid grid-cols-2 gap-10 w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-gray-700 max-h-60 self-center"
            >

                <div class="border border-y-0 border-l-0 border-dashed text-left">
                    <i
                        class="bi bi-shop text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
                    ></i>
                    <div href="#">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                        >
                            Unidade - {{ formSentByCardUnit?.form.name }}
                        </h5>
                    </div>
                    <div
                        class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
                    >
                        <span>
                            {{ formSentByCardUnit?.form.street }}
                        </span>
                        <span>
                            CEP {{ formSentByCardUnit?.form.zip_code }} - {{ formSentByCardUnit?.form.district }}, {{ formSentByCardUnit?.form.state }}
                        </span>
                        <span>
                            TEL {{ formSentByCardUnit?.form.phone }}
                        </span>
                        
                    </div>
                </div>

                <div class="justify-self-start text-left">
                    <i
                        class="bi bi-person text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
                    ></i>
                    
                    <div href="#">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                        >
                            Gerente - Matheus
                        </h5>
                    </div>
                    <div
                        class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
                    >
                        <span>
                            Gerente desde 20/10/2020
                        </span>
                    
                    </div>
                </div>
                
            </div>

            <div
                class="grid grid-cols-2 gap-10 w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-gray-700 max-h-60 self-center"
            >

                <div class="border border-y-0 border-l-0 border-dashed text-left">
                    <i
                        class="bi bi-shop text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
                    ></i>
                    <div href="#">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                        >
                            Unidade - Unamar
                        </h5>
                    </div>
                    <div
                        class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
                    >
                        <span>
                            Rua Coelho Pardo
                        </span>
                        <span>
                            CEP 28925698 - Unamar, RJ
                        </span>
                        <span>
                            TEL 21967444770
                        </span>
                        
                    </div>
                </div>

                <div class="justify-self-start text-left">
                    <i
                        class="bi bi-person text-[40px] mb-2  text-secondary-color-100 dark:text-secondary-color-300"
                    ></i>
                    
                    <div href="#">
                        <h5
                            class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                        >
                            Gerente - Carlos
                        </h5>
                    </div>
                    <div
                        class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
                    >
                        <span>
                            Gerente desde 23/05/2021
                        </span>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </BoxBorder>
</template>
