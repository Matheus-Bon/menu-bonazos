<script setup>
import { ref } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { useForm, usePage } from "@inertiajs/vue3";
import toast from "@/Stores/toast";

const user = usePage().props.auth.user;

const props = defineProps({category: Number})

/* Lógica Create para Categoria */
// Início
const form = useForm({
    name: null,
    price: null,
    description: null,
    server_people: null,
    category: props.category

});

const create = () =>
    form.post(route("unit.dashboard.menu.product.store"), {
        preserveState: false,
        preserveScroll: true,
        onSuccess: (page) => {
            toast.add({
                message: "Categoria criada com sucesso.",
            });
            form.reset();
            closeModal();
        },
    });
//Fim

const isOpen = ref(false);

function closeModal() {
    isOpen.value = false;
}
function openModal() {
    isOpen.value = true;
}

defineExpose({ openModal });
</script>

<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-6xl transform overflow-hidden rounded-2xl bg-white dark:bg-admin-card p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="flex flex-row justify-between text-lg font-medium leading-6 text-gray-900 dark:text-gray-200"
                            >
                                Adicionando Produto

                                <button
                                    class="text-gray-500 hover:text-gray-300"
                                    title="Fechar"
                                    @click="closeModal"
                                >
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </DialogTitle>
                            <div class="mt-1">
                                <p class="text-sm text-gray-500">
                                    Nesse parte você adiciona produtos a sua
                                    categoria.
                                </p>
                            </div>

                            <div class="mt-5">
                                <form @submit.prevent="create" class="flex flex-col gap-2">

                                    <input type="hidden" v-model="form.category">

                                    <div class="flex flex-col">
                                        <label for="name" class="label-default">
                                            Nome
                                        </label>
                                        <input
                                        id="name"
                                        v-model="form.name"
                                            type="text"
                                            class="input-default"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="price" class="label-default">
                                            Preço
                                        </label>
                                        <input
                                        id="price"
                                        v-model="form.price"
                                            type="number"
                                            class="input-default"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label for="description" class="label-default">
                                            Descrição
                                        </label>
                                        <input
                                        id="description"
                                        v-model="form.description"
                                            type="text"
                                            class="input-default"
                                        />
                                    </div>
                                    <div class="flex flex-col">
                                        <label class="label-default">
                                            Serve para quantas pessoas?
                                        </label>

                                        <div class="flex">
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="notApplicable"
                                                    type="radio"
                                                    value="0"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="notApplicable"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >Não se aplica</label
                                                >
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="onePerson"
                                                    type="radio"
                                                    value="1"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="onePerson"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >1 pessoa</label
                                                >
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="twoPeople"
                                                    type="radio"
                                                    value="2"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="twoPeople"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >2 pessoas</label
                                                >
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="threePeople"
                                                    type="radio"
                                                    value="3"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="threePeople"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >3 pessoas</label
                                                >
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="fourPeople"
                                                    type="radio"
                                                    value="4"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="fourPeople"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >4 pessoas</label
                                                >
                                            </div>
                                            <div class="flex items-center mr-4">
                                                <input
                                                    v-model="form.server_people"
                                                    id="lotPeople"
                                                    type="radio"
                                                    value="+4"
                                                    name="inline-radio-group"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                />
                                                <label
                                                    for="lotPeople"
                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                                    >+ 4 pessoas</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="mt-4 flex flex-row justify-end gap-2">
                                <button
                                    type="button"
                                    class="btn-normal-style-1"
                                    @click="closeModal"
                                >
                                    Sair
                                </button>
                                <button
                                    type="button"
                                    class="btn-primary-style-1"
                                    @click="create"
                                    :disabled="form.processing"
                                >
                                    Criar produto
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
