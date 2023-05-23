<script setup>
import { ref } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";

const props = defineProps({ holiday: Object });
const isOpen = ref(false);

function closeModal() {
    isOpen.value = false;
}
function openModal() {
    isOpen.value = true;
}

defineExpose({ openModal });

const form = useForm({
    name_of_holiday: null,
    date_of_holiday: null,
});

const create = () => {
    form.post(route("dashboard.holiday.store"), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => {
            toast.add({
                message: "Feriado criado com sucesso.",
            });
        },
    });
};


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
                                {{ $t('message.hello') }}

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
                                    Nessa caixa você pode adcionar feriados da
                                    sua região.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form @submit.prevent="create">
                                    <div class="flex flex-col gap-7">
                                        <div class="flex flex-col">
                                            <label
                                                for="category"
                                                class="label-default"
                                            >
                                                Nome Feriado
                                            </label>
                                            <input
                                                v-model="form.name_of_holiday"
                                                id="category"
                                                type="text"
                                                class="input-default"
                                            />
                                        </div>

                                        <div class="flex flex-col">
                                            <label
                                                for="category"
                                                class="label-default"
                                            >
                                                Data do feriado
                                            </label>
                                            <input
                                                v-model="form.date_of_holiday"
                                                id="category"
                                                type="date"
                                                class="input-default"
                                            />
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="mt-4 flex flex-row justify-end gap-2">
                                <button
                                    type="button"
                                    class="btn-normal-style-1"
                                    @click="create"
                                >
                                    Sair
                                </button>
                                <button
                                    type="button"
                                    class="btn-primary-style-1"
                                    @click="create"
                                >
                                    Adicionar
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
