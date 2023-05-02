<script setup>
import { ref, computed } from "vue";
import { useForm, useRemember } from '@inertiajs/vue3'
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import ModalUpdateCategory from "../Components/ModalUpdateCategory.vue";

const modal = ref(null);

const props = defineProps({
    category: Object,
    product: Object,
});

const toggleModal = () => {
    modal.value.toggleModal();
};

const form = useForm({
    active: props.category.active
})

const activeCategory = () => form.put(route('dashboard.update.active.category', props.category.id))


</script>

<template>
    <ModalUpdateCategory :category="category" ref="modal" />

    <BoxBorder>
        <div class="p-4">
            <section>
                <div class="flex flex-row gap-2 justify-between">
                    <div class="flex flex-row gap-5 align-middle">
                        <div>
                            <h2
                                class="text-3xl text-gray-600 dark:text-gray-300 font-semibold pb-5"
                            >
                                {{ category.name }}
                            </h2>
                        </div>
                    </div>

                    <div class="flex flex-row gap-3">
                        <div class="flex items-center">
                            <form @submit.prevent="activeCategory">
                                <input
                                    @change="activeCategory"
                                    :checked="form.active"
                                    :id="'checkbox-' + category.id"
                                    type="checkbox"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded focus:ring-secondary-color-light dark:focus:ring-secondary-color-300 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 text-secondary-color-300"
                                />
                                <label
                                    :for="'checkbox-' + category.id"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Ativar
                                </label>

                            </form>
                        </div>

                        <button @click="toggleModal">
                            <i
                                class="bi bi-three-dots-vertical text-secondary-color-dark"
                            ></i>
                        </button>
                    </div>
                </div>
            </section>

            <section v-if="product">Aqui ficarão os produtos</section>

            <section>
                <button class="btn-outline">Adicionar Produto</button>
            </section>
        </div>
    </BoxBorder>
</template>
