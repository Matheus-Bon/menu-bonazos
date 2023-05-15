<script setup>
import ModalBase from "@/Pages/Admin/Components/ModalBase.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, onMounted } from "vue";

/* 
Parte de funcionamento do Modal 
*/

const modal = ref(null); // referência do modal para utilizar as funções do modal base
const toggleModalAfter = () => {
    modal.value.toggleModalAfter();
}; // função para inverter o toggle
const toggleModal = () => {
    modal.value.toggleModal();
}; // função para ativar o toggle
defineExpose({ toggleModal }); // função para emitir a função de ativação do modal

/* 
Fim Parte de funcionamento do Modal 
*/

const props = defineProps({ holiday: Object });


</script>

<template>
    <ModalBase ref="modal">
        <template #modal-title>
            <section class="pl-6 pt-7">
                <div>Programe o feriado {{ holiday.holiday }}</div>
                <div>
                    <p class="text-sm font-light text-gray-500">
                        Por padrão em feriados a loja fica fechada. Aqui você
                        poderá modificar isso.
                    </p>
                </div>
            </section>
        </template>

        <template #modal-body>
            <section>
                <form>
                    <div class="flex flex-col">
                        <label for="category" class="label-default">
                            Nome Feriado
                        </label>
                        <input
                            id="category"
                            type="text"
                            class="input-default"
                            disabled
                        />
                    </div>
                </form>
            </section>
        </template>

        <template #modal-buttons>
            <div
                class="bg-gray-50 dark:bg-admin-body px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
            >
                <button
                    type="submit"
                    class="inline-flex w-full justify-center rounded-md bg-secondary-color-100 dark:bg-secondary-color-dark px-3 py-2 ml-2 text-sm font-medium text-gray-900 shadow-sm hover:bg-opacity-90 dark:hover:bg-secondary-color-300 sm:w-auto transition-all ease-in-out delay-75"
                    @click="create"
                >
                    Editar Feriado
                </button>
                <button
                    @click="toggleModalAfter"
                    type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                    ref="cancelButtonRef"
                >
                    Sair
                </button>
            </div>
        </template>
    </ModalBase>
</template>
