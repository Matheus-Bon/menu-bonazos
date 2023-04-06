<script setup>
import BoxProduct from '@/Components/UI/BoxProduct.vue';
import NavBar from '@/Layouts/NavBar.vue';

const props = defineProps({ user: Object });

</script>

<template>

    <NavBar/>

    <BoxProduct class="mt-5">
        <div>
            <h1 class="text-lg">Pizza</h1>
        </div>
    </BoxProduct>

    
</template>