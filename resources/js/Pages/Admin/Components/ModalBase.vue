<script setup>
import { ref } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";

defineEmits(["close-modal"]);
const modal = ref(null);
const open = ref(false);

const toggleModal = () => {
    if (!open.value) {
        open.value = !open.value;
    }
};

const toggleModalAfter = () => {
    if (open.value) {
        open.value = !open.value;
    }
};

defineExpose({ toggleModal, toggleModalAfter });
</script>

<template>
    <TransitionRoot as="template" :show="open"  v-if="open" ref="modal" >
        <Dialog as="div" class="relative z-10" >
            <TransitionChild 
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div v-on:click="toggleModalAfter"
                    class="fixed inset-0 bg-gray-500 dark:bg-admin-body bg-opacity-75 dark:bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 overflow-y-auto max-w-min h-fit m-auto p-3">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild 
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="h-full relative transform overflow-hidden rounded-lg bg-white dark:bg-admin-body text-left shadow-lg shadow-white/5 transition-all"
                            
                        >
                            <DialogTitle
                                as="h2"
                                class="pb-2 text-3xl font-semibold dark:text-gray-300 text-gray-700"
                            >
                                <slot name="modal-title" />
                            </DialogTitle>

                            <main
                                class="bg-white dark:bg-admin-body w-[700px] px-4 pb-4 pt-5 sm:p-6 sm:pb-4"
                            >
                                <slot name="modal-body" />
                            </main>

                            <footer>
                                <slot name="modal-buttons" />
                            </footer>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
