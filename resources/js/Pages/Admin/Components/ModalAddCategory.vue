<script setup>
import ModalBase from "@/Pages/Admin/Components/ModalBase.vue";
import { useForm, router } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    active: false,
});

const create = () =>
    form.post(route("dashboard.category.store"), {
        preserveState: false,
    });
</script>

<template>
    <ModalBase>
        <div
            class="bg-white dark:bg-admin-body h-[80vh] w-[100vh] px-4 pb-4 pt-5 sm:p-6 sm:pb-4"
        >
            <section class="pb-20">
                <DialogTitle
                    as="h2"
                    class="pb-2 text-3xl font-semibold dark:text-gray-300 text-gray-700"
                >
                    <i
                        class="bx bx-category pr-1 text-secondary-color-light dark:text-secondary-color-dark"
                    ></i>
                    Nova Categoria
                </DialogTitle>
                <p class="text-sm font-light text-gray-500">
                    Crie sua nova categoria
                </p>
            </section>

            <section>
                <form @submit.prevent="create">
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
        </div>
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
                type="button"
                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                @click="close"
                ref="cancelButtonRef"
            >
                Sair
            </button>
        </div>
    </ModalBase>
</template>
