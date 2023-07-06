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

/* Lógica Create para Categoria */
// Início
const form = useForm({
    name: null,
    active: false,
});

const create = () =>
    form.post(route("unit.dashboard.menu.store", user.unit.slug), {
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
                            class="w-full max-w-2xl transform overflow-hidden rounded-2xl bg-white dark:bg-admin-card p-6 text-left align-middle shadow-xl transition-all"
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
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Nesse parte você adiciona produtos a sua categoria.
                                </p>
                            </div>
                            
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
