<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import SelectMenu from "@/Pages/Admin/Components/SelectMenu.vue";
import CardCategory from "@/Pages/Admin/Partials/Menu/CardCategory.vue";
import ModalAddCategory from "@/Pages/Admin/Components/Menu/ModalAddCategory.vue";
import ModalUpdateCategory from "@/Pages/Admin/Components/Menu/ModalUpdateCategory.vue";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({ categories: Object });

const user = usePage().props.auth.user
const modal = ref(null);

const openModal = () => {
    modal.value.openModal();
};

const categoryInfo = ref(null);
</script>

<template>
    <ModalAddCategory ref="modal" />
    <ModalUpdateCategory ref="modalEdit" :category="categoryInfo" />

    <div class="flex flex-col gap-10">
        <BoxBorder>
            <template #card-header>
                <h4 class="font-semibold text-lg text-gray-800 dark:text-white">
                    Funções principais para criação do Cardápio
                </h4>
                <span class="text-sm font-light text-gray-500">
                    <p>
                        Aqui você cria os produtos que estarão no seu delivery
                    </p>
                </span>
            </template>
            <section>
                <div class="flex flex-row justify-between">
                    <div>
                        <button
                            @click="openModal"
                            class="btn-submit-admin"
                        >
                            <i class="fa-solid fa-plus pr-1"></i>
                            Adicionar Categoria
                        </button>
                        
                    </div>
                </div>

            </section>
        </BoxBorder>

        <section>
            <div class="flex flex-col gap-6">
                <CardCategory
                    v-for="category in user.unit.categories"
                    :key="category.id"
                    :category="category"
                    @open="toggleModalEdit"
                />
            </div>
        </section>
    </div>
</template>
