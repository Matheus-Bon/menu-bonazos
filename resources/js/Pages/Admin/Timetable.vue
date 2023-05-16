<script>
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";

export default {
    layout: (h, page) => h(LayoutAdmin, [page]),
};
</script>

<script setup>
import { Head } from "@inertiajs/vue3";

import CardTimetable from "./Partials/Timetable/CardTimetable.vue";
import CardHoliday from "./Partials/Timetable/CardHoliday.vue";
import ModalEditHoliday from "@/Pages/Admin/Components/Timetable/ModalEditHoliday.vue";


const props = defineProps({
    timetable: Object,
    holidays: Object,
    holidayEdit: Object,
});

</script>

<template>
    <Head title="Horários" />

    <div class="flex flex-row mx-14 gap-5">
        <div class="basis-1/2">
            <CardTimetable :timetable="timetable" />
        </div>
        <div class="basis-1/2">
            <CardHoliday :holidays="holidays" />
        </div>

        <ModalEditHoliday :holiday="holidayEdit" />
    </div>
</template>
