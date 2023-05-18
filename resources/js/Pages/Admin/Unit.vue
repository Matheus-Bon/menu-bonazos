<script>
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";
export default {
    layout: (h, page) => h(LayoutAdmin, [page]),
    components: { CardManager },
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";
import CardManager from "@/Pages/Admin/Partials/Unit/CardManager.vue";
import CardListManager from "@/Pages/Admin/Partials/Unit/CardListManager.vue";
import CardUnit from "@/Pages/Admin/Partials/Unit/CardUnit.vue";

const props = defineProps({ managers: Object });
</script>

<template>
    <Head title="Unidades" />

    <div class="grid grid-cols-2 mx-14 gap-5">
        <div class="basis-1/2">
            <CardManager />
        </div>
        <div class="basis-1/2">
            <CardListManager :managers="managers"/>
        </div>
        <div class="basis-1/2">
            <CardUnit />
        </div>
    </div>
</template>
