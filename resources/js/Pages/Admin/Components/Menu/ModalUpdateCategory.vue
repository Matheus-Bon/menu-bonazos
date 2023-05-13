<script setup>
import ModalBase from "@/Pages/Admin/Components/ModalBase.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { formatDate } from "@/Pages/Functions/functionsOfDate";

// Lógica para abrir o modal no componente pai

const modal = ref(null);

const props = defineProps({ category: Object });

const toggleModalAfter = () => {
    modal.value.toggleModalAfter();
};

const toggleModal = () => {
    modal.value.toggleModal();
};

const form = useForm({
    name: props.category.name,
});

const update = () =>
    form.put(route("dashboard.menu.update", { category: props.category.id }), {
        preserveState: (page) => Object.keys(page.props.errors).length,
        preserveScroll: true,
    });

defineExpose({ toggleModal, toggleModalAfter });
</script>

<template>
    <ModalBase ref="modal">
        <template #modal-title>
            <div class="pl-6 pt-7">
                <i
                    class="bx bx-category text-4xl text-secondary-color-100 pr-1"
                ></i>
                Detalhes da Categoria
                <span class="text-secondary-color-100">{{
                    category.name
                }}</span>
            </div>
            <div class="pl-6">
                <p class="text-sm font-light text-gray-500">
                    Categoria criada em: {{ formatDate(category.created_at) }}
                </p>
            </div>
        </template>

        <template #modal-body>
            <section>
                <form @submit.prevent="update">
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
                    </div>
                    <div v-if="form.errors.name">
                        {{ form.errors.name }}
                    </div>
                </form>
            </section>
        </template>

        <template #modal-buttons>
            <div
                class="flex flex-row-reverse gap-2 bg-gray-50 dark:bg-admin-body px-4 py-3"
            >
                <button
                    type="submit"
                    class="inline-flex w-full justify-center rounded-md bg-secondary-color-100 dark:bg-secondary-color-dark px-3 py-2 ml-2 text-sm font-medium text-gray-900 shadow-sm hover:bg-opacity-90 dark:hover:bg-secondary-color-300 sm:w-auto transition-all ease-in-out delay-75"
                    @click="update"
                >
                    Salvar Mudanças
                </button>
                <button
                    @click="toggleModalAfter"
                    type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto"
                    ref="cancelButtonRef"
                >
                    Sair
                </button>
                <Link
                    as="button"
                    type="submit"
                    :title="'Excluir ' + category.name"
                    class="btn-delete"
                    :href="
                        route('dashboard.menu.destroy', {
                            category: props.category.id,
                        })
                    "
                    method="DELETE"
                >
                    <i class="bi bi-trash text-lg text-gray-100"></i>
                </Link>
            </div>
        </template>
    </ModalBase>
</template>
