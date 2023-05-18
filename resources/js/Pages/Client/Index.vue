<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const props = defineProps({ user: Object });

</script>

<template>

    <AuthenticatedLayout>
        <header class="mt-3">
           <h1 class="text-4xl dark:text-gray-100"><i class="bi bi-house-door-fill"></i>HOME</h1>
        </header>

        
    </AuthenticatedLayout>

    
</template>