<!-- Página referente a 'Horários' -->

<script setup>
import { Head } from "@inertiajs/vue3";
import LayoutAdmin from "@/Pages/Admin/Layouts/LayoutAdmin.vue";
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import HeaderStats from "@/Pages/Admin/Layouts/HeaderStats.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import CardTimetable from "./Partials/Timetable/CardTimetable.vue";
</script>

<template>
    <Head title="Horários" />

    <Sidebar />
    <div class="relative md:ml-64 bg-admin-body">
        <AdminNavbar />
        <div class="pt-9 dark:bg-admin-body">
            <div class="flex flex-row pt-20 mx-14 gap-5">

                <div class="basis-1/2">
                    <CardTimetable />
                </div>
                
                
            </div>
        </div>
    </div>
    <FooterAdmin />
</template>
