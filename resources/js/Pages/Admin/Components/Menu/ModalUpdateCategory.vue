<script setup>
import ModalBase from "@/Pages/Admin/Components/ModalBase.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { onClickOutside } from "@vueuse/core";
import { vOnClickOutside } from '@vueuse/components'
// Lógica para abrir o modal no componente pai

const modal = ref(null);

const props = defineProps({ category: Object });

const toggleModalAfter = () => {
    modal.value.toggleModalAfter()
};

const toggleModal = () => {
    modal.value.toggleModal()
}

const form = useForm({
    name: props.category.name,
});

const update = () =>
    form.put(
        route("dashboard.menu.update", { category: props.category.id }),
        {
            preserveState: (page) => Object.keys(page.props.errors).length,
            preserveScroll: true,
        }
    );

defineExpose({ toggleModal, toggleModalAfter });

</script>

<template>
    <ModalBase ref="modal">
        <template #modal-title>
            <div class="pl-6">
                <i
                    class="bx bx-category text-4xl text-secondary-color-100 pr-1"
                ></i>
                Detalhes da Categoria
                <span class="text-secondary-color-100">{{
                    category.name
                }}</span>
            </div>
            <div class="pt-10 pl-6">
                <p class="text-sm font-light text-gray-500">
                    Categoria criada em: 
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
            <section class="pt-20">
                <div>
                    <h2 class="text-2xl font-semibold dark:text-gray-200">
                        <i class="bi bi-trash text-2xl pr-1 text-red-400"></i>
                        Excluir Categoria
                    </h2>
                </div>
                <div>
                    <p class="text-sm font-light text-gray-500">
                        Quando a categoria é deletada, todos os produtos dentro
                        dela serão excluídos juntos.
                    </p>
                </div>

                <div class="pt-4">
                    <Link
                        as="button"
                        type="submit"
                        class="btn-delete"
                        :href="
                            route('dashboard.menu.destroy', {
                                category: props.category.id,
                            })
                        "
                        method="DELETE"
                    >
                        Excluir {{ category.name }}
                    </Link>
                </div>
            </section>
        </template>

        <template #modal-buttons>
            <div
                class="bg-gray-50 dark:bg-admin-body px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6"
            >
                <button
                    type="submit"
                    class="inline-flex w-full justify-center rounded-md bg-secondary-color-dark px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-opacity-90 sm:ml-3 sm:w-auto"
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
            </div>
        </template>
    </ModalBase>
</template>
