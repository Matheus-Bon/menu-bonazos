<!-- Página referente a 'Menu' -->
<script setup>
import CardCategories from "./Partials/Menu/CardCategories.vue";
import { Head } from "@inertiajs/vue3";
import CardViewDelivery from "./Partials/Menu/CardViewDelivery.vue";
import LayoutAdmin from "./Layouts/LayoutAdmin.vue";

defineProps({
    categories: Object,
});
</script>

<template>
    <Head title="Cardápio" />
    <LayoutAdmin>
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
