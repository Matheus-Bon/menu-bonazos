<script setup>
import { ref, computed, watch } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { router, useForm, usePage } from "@inertiajs/vue3";
import PopUpModal from "@/Components/PopUpModal.vue";
import toast from "@/Stores/toast";
import { formatTime } from "@/Pages/Functions/functionsOfDate";

const props = defineProps({ manager: Object });
const user = usePage().props.auth.user;
const isOpen = computed(() => !!props.manager);

function closeModal() {
    router.visit(route("unit.dashboard.unit.index"), {
        preserveState: true,
    });
    form.clearErrors();
}

const form = useForm({
    name: props.manager?.name,
    email: props.manager?.email,
    password: props.manager?.password,
    unit: props.manager?.unit
});

watch(
    () => props.manager,
    (manager) => {
        if (manager) {
            form.name = manager?.name;
            form.email = manager?.email;
            form.password = manager?.password;
            form.unit = manager?.unit;
        }
    }
);

const deleteManager = () => {
    form.delete(
        route("unit.dashboard.timetable.holiday.destroy", {
            holiday: props.holiday?.id,
            unit: user.unit.slug,
        }),
        {
            preserveState: false,
            preserveScroll: true,
            onSuccess: (page) => {
                toast.add({
                    message: "Feriado excluído com sucesso.",
                });
            },
        }
    );
};

const updateManager = () => {
    form.put(
        route("unit.dashboard.timetable.holiday.update", {
            holiday: props.holiday?.id,
            unit: user.unit.slug,
        }),
        {
            preserveState: (page) => Object.keys(page.props.errors).length,
            preserveScroll: true,
            onSuccess: (page) => {
                toast.add({
                    message: "Feriado editado com sucesso.",
                });
            },
        }
    );
};

const messagePopUp = "Você deseja excluir esse gerente?";
const modalPopUp = ref(null);

const openPopUp = () => {
    modalPopUp.value.openModal();
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
                                Editando Gerente

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
                                    Nessa caixa você edita as informações do gerente.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form>
                                    
                                </form>
                            </div>

                            <div class="mt-4 flex flex-row justify-end gap-2">
                                <form
                                    hidden
                                    @submit.prevent="deleteHoliday"
                                ></form>

                                <button
                                    v-if="!props.holiday?.fixed"
                                    type="button"
                                    class="btn-delete-style-1"
                                    @click="openPopUp"
                                >
                                    Excluir
                                </button>
                                <button
                                    type="button"
                                    class="btn-primary-style-1"
                                    @click="updateHoliday"
                                >
                                    Editar
                                </button>
                            </div>

                            <PopUpModal
                                ref="modalPopUp"
                                :message="messagePopUp"
                                @delete="deleteHoliday"
                            />
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
