<script setup>
import { ref } from "vue";
import { useForm, Link, usePage } from "@inertiajs/vue3";
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import ModalAddProduct from "../../Components/Menu/ModalAddProduct.vue";

/* Configuração do ModalAddProduct*/
const modalAddProduct = ref(null); // Referência do ModalAddProduct
const openModalAddProduct = () => {
    modalAddProduct.value.openModal()
} 



const user = usePage().props.auth.user

/* Constante que pega as informações do BD para usar no front  */
const props = defineProps({
    category: Object,
    product: Object,
});

/* Lógica Update para ativar/desativar Categoria */
// Início
const form = useForm({
    active: props.category.active,
});

const activeCategory = () =>
    form.put(route("unit.dashboard.menu.update.active.category", {category: props.category.id, unit: user.unit.slug}), {
        preserveScroll: true,
    });

// Fim
</script>

<template>
    <!-- <ModalUpdateCategory :category="category" ref="modal" /> -->

    <Teleport to="body">
        <ModalAddProduct ref="modalAddProduct"/>
    </Teleport>

    <BoxBorder>
        <template #card-header>
            <div class="flex flex-row gap-2 justify-between items-center">
                <div class="flex flex-row gap-5 align-middle">
                    <div>
                        <h2
                            class="xl:text-2xl 2xl:text-3xl text-gray-600 dark:text-gray-300 font-semibold"
                        >
                            {{ props.category.name }}
                        </h2>
                    </div>
                </div>

                <div class="flex flex-row gap-4">
                    <form @submit.prevent="activeCategory">
                        <input
                            @change="activeCategory"
                            :checked="form.active"
                            :id="'checkbox-' + props.category.id"
                            type="checkbox"
                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded focus:ring-secondary-color-light dark:focus:ring-secondary-color-300 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 text-secondary-color-300"
                        />
                        <label
                            :for="'checkbox-' + props.category.id"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >
                            Ativar
                        </label>
                    </form>

                    <button @click="openModalAddProduct" title="Adicionar produto">
                        <i
                            class="bi bi-plus-circle-dotted text-xl text-secondary-color-300"
                        ></i>
                    </button>

                    <Link
                        as="button"
                        :href="
                            route('unit.dashboard.menu.show', {
                                category: category.id,
                                unit: user.unit.slug
                            })
                        "
                        :title="'Editar categoria ' + category.name"
                        preserve-state
                        preserve-scroll
                    >
                        <i
                            class="bi bi-three-dots-vertical text-xl text-secondary-color-300"
                        ></i>
                    </Link>
                </div>
            </div>
        </template>

        <section v-if="product">Aqui ficarão os produtos</section>
    </BoxBorder>
</template>
