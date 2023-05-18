<script setup>
import BoxBorderSecond from "../../Components/UI/BoxBorderSecond.vue";
import { ref } from "vue";
import { formatTime } from "@/Pages/Functions/functionsOfDate";
import { Link } from "@inertiajs/vue3";

const props = defineProps({ month: Object });

const expandCard = ref(false);

const toggleExpand = () => {
    expandCard.value = !expandCard.value;
};

console.log(props.month)
</script>

<template>
    <BoxBorderSecond
        :class="[expandCard ? 'col-span-3' : null]"
    >
        <template #card-header>
            <div class="flex flex-row justify-between">
                <h2 class="text-gray-500 text-2xl font-medium capitalize">
                    {{ month.monthName }}
                </h2>
                <button @click="toggleExpand" title="Ver os feriados">
                    <i
                        class="bi bi-arrows-angle-expand text-secondary-color-400 dark:text-secondary-color-100"
                    ></i>
                </button>
            </div>
        </template>
        <div
            v-if="expandCard"
            class="p-6 pt-0 transition-all ease-in-out duration-700 delay-75"
        >
            <div
                v-for="holiday in month.holidays"
                :key="holiday"
                class="pb-5 flex flex-row justify-between"
            >
                <div class="flex flex-col justify-between">
                    <span class="text-lg text-gray-700 dark:text-gray-300">
                        {{ holiday.holiday }}
                    </span>
                    <span class="text-sm text-gray-500 dark:tex-gray-700">
                        {{ formatTime(holiday.date, 'DD/MM/YYYY') }} &nbsp;|&nbsp;
                        <span class="capitalize">{{ formatTime(holiday.date, 'dddd') }}</span>
                    </span>
                </div>
                <Link
                    as="button"
                    :href="
                        route('dashboard.holiday.show', { holiday: holiday.id })
                    "
                    :title="'Editar feriado ' + holiday.holiday"
                    preserve-state preserve-scroll
                >
                    <i class="bi bi-pencil text-indigo-500"></i>
                </Link>
            </div>
        </div>
    </BoxBorderSecond>
</template>
