<script setup>
import ModalBase from "@/Pages/Admin/Components/ModalBase.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { vOnClickOutside } from "@vueuse/components";
import { onClickOutside } from "@vueuse/core";

/* Lógica Create para Categoria */
// Início
const form = useForm({
    name: null,
    active: false,
});

const create = () =>
    form.post(route("dashboard.menu.store"), {
        preserveState: (page) => Object.keys(page.props.errors).length,
    });
//Fim

const open = ref(false);
const modal = ref(null);

const toggleModalAfter = () => {
    modal.value.toggleModalAfter()
};

const toggleModal = () => {
    modal.value.toggleModal()
    open.value = modal.value.isOpen()
}

defineExpose({ toggleModal, toggleModalAfter });


onClickOutside(modal, (event) => {console.log(event);toggleModalAfter()})

</script>

<template>
    <ModalBase :modal-active="open" >
        <template #modal-title>
            <section class="pl-6 pt-10">
                <div>
                    <i
                        class="bx bx-category pr-1 text-4xl text-secondary-color-light dark:text-secondary-color-dark"
                    ></i>
                    Nova Categoria
                </div>
                <div>
                    <p class="text-sm font-light text-gray-500">
                        Crie sua nova categoria
                    </p>
                </div>
            </section>
        </template>

        <template #modal-body ref="modal">
            <section>
                <form id="category-form" @submit.prevent="create">
                    <div class="flex flex-col">
                        <label for="category" class="label-default">
                            Nome Categoria
                        </label>
                        <input
                            v-model="form.name"
                            id="category"
                            type="text"
                            class="input-default"
                        />
                        <div v-if="form.errors.name">
                            {{ form.errors.name }}
                        </div>
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
                    class="inline-flex w-full justify-center rounded-md bg-secondary-color-dark px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-opacity-90 sm:ml-3 sm:w-auto"
                    @click="create"
                >
                    Criar Categoria
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
