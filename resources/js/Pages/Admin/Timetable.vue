<!-- Página referente a 'Horários' -->

<script setup>
import { Head } from "@inertiajs/vue3";
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import CardTimetable from "./Partials/Timetable/CardTimetable.vue";
import CardHoliday from "./Partials/Timetable/CardHoliday.vue";

const props = defineProps({timetable: Object})

console.log(props.timetable)
</script>

<template>
    <Head title="Horários" />

    <Sidebar />
    <div class="relative md:ml-64">
        <AdminNavbar />
        <div class="pt-9 dark:bg-admin-body">
            <div class="flex flex-row pt-20 mx-14 gap-5">

                <div class="basis-1/2">
                    <CardTimetable :timetable="timetable"/>
                </div>
                <div class="basis-1/2">
                    <CardHoliday />
                </div>
                
                
            </div>
        </div>
    </div>
    <FooterAdmin />
</template>
