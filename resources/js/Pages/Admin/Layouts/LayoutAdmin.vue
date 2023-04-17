<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import HeaderStats from "@/Pages/Admin/Layouts/HeaderStats.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Administração" />
    <div>
        <Sidebar />
        <div class="relative md:ml-64 bg-blueGray-100">
            <AdminNavbar />
            <HeaderStats />

            <div class="dark:bg-admin-body">
                <slot class="" />
            </div>
            

            <FooterAdmin />
        </div>
    </div>
</template>
