<script>
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";
export default {
    layout: (h, page) => h(LayoutAdmin, [page]),
    components: { CardManager, CardListUnit },
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";
import CardManager from "@/Pages/Admin/Partials/Unit/CardManager.vue";
import CardListManager from "@/Pages/Admin/Partials/Unit/CardListManager.vue";
import CardUnit from "@/Pages/Admin/Partials/Unit/CardUnit.vue";
import CardListUnit from "@/Pages/Admin/Partials/Unit/CardListUnit.vue";
import { provide, ref } from "vue";

const props = defineProps({ units: Object });

const cardUnit = ref(null)

</script>

<template>
    <Head title="Unidades" />

    <div class="grid grid-cols-2 mx-14 gap-5">
        <div class="basis-1/2">
            <CardManager />
        </div>
        <div class="basis-1/2">
            <CardListManager  :units="units"/>
        </div>
        <div class="basis-1/2">
            <CardUnit ref="cardUnit"/>
        </div>
        <div class="basis-1/2">
            <CardListUnit :info-sent-by-card-unit="cardUnit"  :units="units"/>
        </div>
    </div>
</template>
