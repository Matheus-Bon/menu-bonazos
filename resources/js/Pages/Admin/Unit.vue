<script>
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";
export default {
    layout: (h, page) => h(LayoutAdmin, [page]),
    components: { CardManager, CardListUnit },
};
</script>

<script setup>
import { Head, usePage } from "@inertiajs/vue3";
import CardManager from "@/Pages/Admin/Partials/Unit/CardManager.vue";
import CardListManager from "@/Pages/Admin/Partials/Unit/CardListManager.vue";
import CardUnit from "@/Pages/Admin/Partials/Unit/CardUnit.vue";
import CardListUnit from "@/Pages/Admin/Partials/Unit/CardListUnit.vue";
import { ref } from "vue";

const props = defineProps({ units: Object, managers: Object });
const user = usePage().props.auth.user
const cardUnit = ref(null)


const admin = user.roles.some(user => {return user.name === 'admin'})

</script>

<template>
    <Head title="Unidades" />

    <div v-if="admin" class="grid grid-cols-2 mx-14 gap-5">
        <div class="basis-1/2">
            <CardManager />
        </div>
        <div class="basis-1/2">
            <CardListManager :units="units" :managers="managers"/>
        </div>
        <div class="basis-1/2">
            <CardUnit ref="cardUnit" :managers="managers"/>
        </div>
        <div class="basis-1/2">
            <CardListUnit :info-sent-by-card-unit="cardUnit"  :units="units" :managers="managers"/>
        </div>
    </div>
    <div v-else class="grid grid-cols-2 mx-14 gap-5">
        <h1 class="text-gray-500 font-bold uppercase text-3xl">
            VOCÊ É BETA!
        </h1>
    </div>
</template>
