<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';


const props = defineProps({ user: Object });

</script>

<template>

    <AuthenticatedLayout>
        <header class="mt-3">
           <h1 class="text-4xl text-gray-100">HOME</h1>
        </header>

        
    </AuthenticatedLayout>

    
</template>