<!-- Página referente a 'Menu' -->
<script setup>
import CardCategories from "@/Pages/Admin/Partials/Menu/CardCategories.vue";
import { Head } from "@inertiajs/vue3";
import CardViewDelivery from "./Partials/Menu/CardViewDelivery.vue";
import LayoutAdmin from "./Layouts/LayoutAdmin.vue";
import ModalUpdateCategory from "@/Pages/Admin/Components/Menu/ModalUpdateCategory.vue";

defineProps({
    categories: Object,
    categoryForEdit: Object
});
</script>

<template>
    <Head title="Cardápio" />
    <LayoutAdmin>

        <ModalUpdateCategory :category="categoryForEdit"/>

        <div class="flex flex-row mx-14 justify-center gap-5">
            <div class="basis-2/3">
                <CardCategories :categories="categories" />
            </div>
            <div class="basis-1/3">
                <CardViewDelivery />
            </div>
        </div>
    </LayoutAdmin>
</template>
