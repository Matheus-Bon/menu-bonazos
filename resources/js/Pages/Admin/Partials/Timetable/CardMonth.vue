<script setup>
import BoxBorder from '../../Components/UI/BoxBorder.vue';


const props = defineProps({month: Object })


console.log(props.month)
</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h2 class="text-gray-400 text-xl capitalize">{{ month.monthName }}</h2>
        </template>
        <div v-for="holiday in month.holidays">
            <span>{{ holiday.holiday }}</span>
            
        </div>

    </BoxBorder>
    
</template>