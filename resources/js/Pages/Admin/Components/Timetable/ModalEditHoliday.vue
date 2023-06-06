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

const props = defineProps({ holiday: Object });
const user = usePage().props.auth.user
const isOpen = computed(() => !!props.holiday);

function closeModal() {
    router.visit(route("unit.dashboard.timetable.index", user.unit.slug), {
        preserveState: true,
    });
    form.clearErrors();
}

const form = useForm({
    name: props.holiday?.name_of_holiday,
    date: props.holiday?.date_of_holiday,
});

watch(
    () => props.holiday,
    (holiday) => {
        if (holiday) {
            form.name = holiday?.name_of_holiday;
            form.date = holiday?.date_of_holiday;
        }
    }
);

const deleteHoliday = () => {
    form.delete(
        route("unit.dashboard.timetable.holiday.destroy", {holiday:props.holiday?.id, unit:user.unit.slug}),
        {   
            preserveState:false,
            preserveScroll:true,
            onSuccess: (page) => {
                toast.add({
                    message: "Feriado excluído com sucesso.",
                });
            },
        }
    );
};

const updateHoliday = () => {
    form.put(route("unit.dashboard.timetable.holiday.update", {holiday:props.holiday?.id, unit:user.unit.slug}), {
        preserveState: (page) => Object.keys(page.props.errors).length,
        preserveScroll:true,
        onSuccess: (page) => {
            toast.add({
                message: "Feriado editado com sucesso.",
            });
        },
    });
};

const messagePopUp = "Você deseja excluir esse feriado?";
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
                                Editando Feriado

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
                                    Nessa caixa você pode definir o
                                    comportamento da sua loja nesse feriado.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form>
                                    <div class="flex flex-col gap-7">
                                        <div class="flex flex-col">
                                            <label
                                                for="category"
                                                class="label-default"
                                            >
                                                Nome Feriado
                                            </label>
                                            <input
                                                v-model="form.name"
                                                id="category"
                                                type="text"
                                                class="input-default"
                                            />
                                            <span v-if="form.errors.name">
                                                {{ form.errors.name }}
                                            </span>
                                        </div>

                                        <div class="flex flex-col">
                                            <label
                                                for="category"
                                                class="label-default"
                                            >
                                                Dia da semana
                                            </label>
                                            <input
                                                id="category"
                                                type="text"
                                                class="input-default capitalize"
                                                :value="
                                                    formatTime(
                                                        form.date,
                                                        'dddd'
                                                    )
                                                "
                                                disabled
                                            />
                                        </div>

                                        <div class="flex flex-col">
                                            <label
                                                for="category"
                                                class="label-default"
                                            >
                                                Data
                                            </label>
                                            <input
                                                id="category"
                                                type="date"
                                                class="input-default"
                                                v-model="form.date"
                                                :disabled="props.holiday?.fixed"
                                            />
                                        </div>

                                        <label
                                            class="relative inline-flex items-center cursor-pointer w-2/12"
                                        >
                                            <input
                                                type="checkbox"
                                                value=""
                                                class="sr-only peer"
                                                checked
                                            />
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"
                                            ></div>
                                            <span
                                                class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"
                                            >
                                                Abrir
                                            </span>
                                        </label>
                                    </div>
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
                                    :disabled="form.processing"
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
