<script setup>
import { ref, computed, watch,  onMounted, onBeforeUnmount } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { router, useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";
import PopUpModal from "@/Components/PopUpModal.vue";

const props = defineProps({ category: Object });

const isOpen = computed(() => !!props.category);

function closeModal() {
    router.visit(route("dashboard.menu.index"), {
        preserveState: true,
        preserveScroll: true,
    });
}

const form = useForm({
    name: props.category?.name,
});

watch(
    () => props.category,
    (category) => {
        if (category) {
            form.name = category.name;
        }
    }
);

const deleteCategory = () => {
    form.delete(route("dashboard.menu.destroy", props.category?.id), {
        preserveScroll:true,
        onSuccess: (page) => {
            closeModal();
            toast.add({
                message: "Categoria excluída com sucesso.",
            });
        },
    });
};

const popUp = ref(null);
function openPopUp() {
    popUp.value.openModal();
}

const messagePopUp = 'Você deseja excluir essa categoria?'

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
                                class="text-lg font-medium leading-6 text-gray-900 dark:text-gray-200"
                            >
                                Editando Categoria
                            </DialogTitle>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Nessa caixa você edita as categorias, bem
                                    como poderá ver algumas informações sobre
                                    ela.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form @submit.prevent="update">
                                    <div class="flex flex-col">
                                        <label
                                            for="category"
                                            class="label-default"
                                        >
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
                            </div>

                            <div class="mt-4 flex flex-row justify-end gap-2">
                                <form
                                    hidden
                                    @submit.prevent="deleteCategory"
                                ></form>

                                <button
                                    type="button"
                                    class="btn-delete-style-1"
                                    @click="openPopUp"
                                >
                                    Excluir
                                </button>
                                <button
                                    type="button"
                                    class="btn-primary-style-1"
                                    @click="closeModal"
                                >
                                    Editar
                                </button>
                            </div>

                            <PopUpModal ref="popUp" :message="messagePopUp" @delete="deleteCategory"/>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
