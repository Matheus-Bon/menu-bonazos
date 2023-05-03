<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import HeaderStats from "@/Pages/Admin/Layouts/HeaderStats.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
</script>

<template>
    <Sidebar />
    <div class="relative md:ml-64 dark:bg-admin-body">
        <AdminNavbar />
        <HeaderStats />

        <div class="dark:bg-admin-body">
            <slot class="" />
        </div>
    </div>
    <FooterAdmin />
</template>
