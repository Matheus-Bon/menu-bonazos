<!-- Página referente a 'Menu' -->
<script setup>
import FooterAdmin from "@/Pages/Admin/Layouts/FooterAdmin.vue";
import Sidebar from "@/Pages/Admin/Layouts/Sidebar.vue";
import AdminNavbar from "@/Pages/Admin/Layouts/AdminNavbar.vue";
import CardCategories from "./Partials/CardCategories.vue";
import { Head } from "@inertiajs/vue3";
import CardViewDelivery from "./Partials/CardViewDelivery.vue";
</script>

<template>
    <Head title="Cardápio" />
    <div>
        <Sidebar />
        <div class="relative md:ml-64 bg-gray-100">
            <AdminNavbar />

            <div v-if="$page.props.flash.success" class="alert">
                {{ $page.props.flash.success }}
            </div>

            <div class="pt-9 dark:bg-admin-body h-screen">
                <div class="flex flex-row pt-20 mx-14 justify-center gap-5">
                    <div class="basis-2/3">
                        <CardCategories />
                    </div>
                    <div class="basis-1/3">
                        <CardViewDelivery />
                    </div>
                </div>
            </div>

            <FooterAdmin />
        </div>
    </div>
</template>
