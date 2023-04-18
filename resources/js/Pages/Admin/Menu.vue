<!-- Página referente a 'Menu' -->
<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import CardCategories from "./Partials/CardCategories.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Cardápio" />
    <div>
        <Sidebar />
        <div class="relative md:ml-64 bg-gray-100">
            <AdminNavbar />
            <div class="dark:bg-admin-body">
                
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <CardCategories />



            </div>
            <FooterAdmin />
        </div>
    </div>
</template>
