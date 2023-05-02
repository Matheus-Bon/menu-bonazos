<!-- Página referente a 'Menu' -->
<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import CardCategories from "./Partials/CardCategories.vue";
import { Head } from "@inertiajs/vue3";
import CardViewDelivery from "./Partials/CardViewDelivery.vue";

defineProps({ categories: Object });

</script>

<template>
    <Head title="Cardápio" />

    <Sidebar />
    <div class="relative md:ml-64 bg-admin-body">
        <AdminNavbar />
        <div class="pt-9 dark:bg-admin-body">
            <div class="flex flex-row pt-20 mx-14 justify-center gap-5">
                <div class="basis-2/3">
                    <CardCategories :categories="categories" />
                </div>
                <div class="basis-1/3">
                    <CardViewDelivery />
                </div>
            </div>
        </div>
    </div>
    <FooterAdmin />
</template>
