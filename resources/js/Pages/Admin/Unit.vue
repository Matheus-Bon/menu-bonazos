<script>
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";
export default {
    layout: (h, page) => h(LayoutAdmin, [page]),
    components: { CardManager },
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";
import CardManager from "./Partials/Unit/CardManager.vue";
import CardListManager from "@/Pages/Admin/Partials/Unit/CardListManager.vue"


</script>

<template>
    <Head title="Unidades" />

    <div class="flex flex-row mx-14 gap-5">
        <div class="basis-1/2">
            <CardManager />
        </div>
        <div class="basis-1/2">
            <CardListManager />
        </div>
    </div>
</template>
