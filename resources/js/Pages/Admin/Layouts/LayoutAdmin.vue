<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import ToastList from "@/Components/Toasts/ToastList.vue";
</script>

<template>
    <Sidebar />

    <div class="relative md:ml-64 dark:bg-admin-body h-full min-h-screen">
        <div class="h-full" style="min-height: calc(100vh - 60px)">
            <ToastList />

            <AdminNavbar />

            <div class="mt-8 dark:bg-admin-body">
                <slot class="" />
            </div>
        </div>
        <FooterAdmin />
    </div>
</template>
