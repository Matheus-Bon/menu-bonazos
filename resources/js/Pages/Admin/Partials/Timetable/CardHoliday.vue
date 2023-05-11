<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import ModalAddHoliday from "../../Components/Timetable/ModalAddHoliday.vue";
 import { ref } from "vue";
import { getNameDay, getMonthFromDate, formatDate } from "@/Pages/Functions/functionsOfDate";

const modal = ref(null); // ref para usar a função do modal
const toggleModal = () => {
    modal.value.toggleModal();
}; // função para ativar modal


const props = defineProps({ holidays: Object });

const months = [
    { monthName: "Janeiro", monthNumber: 1 },
    { monthName: "Fevereiro", monthNumber: 2 },
    { monthName: "Março", monthNumber: 3 },
    { monthName: "Abril", monthNumber: 4 },
    { monthName: "Maio", monthNumber: 5 },
    { monthName: "Junho", monthNumber: 6 },
    { monthName: "Julho", monthNumber: 7 },
    { monthName: "Agosto", monthNumber: 8 },
    { monthName: "Setembro", monthNumber: 9 },
    { monthName: "Outubro", monthNumber: 10 },
    { monthName: "Novembro", monthNumber: 11 },
    { monthName: "Dezembro", monthNumber: 12 },
];

const holidays = Object.values(props.holidays);




console.log(formatDate('2023-12-25'));
</script>

<template>
    <ModalAddHoliday ref="modal" :months="months" />

    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Feriados
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Aqui você irá configurar sua loja nos feriados</p>
            </span>
        </template>

        <section>
            <div class="mb-5">
                <button
                    @click="toggleModal"
                    class="btn-primary bg-indigo-700 hover:bg-indigo-800"
                >
                    Adicionar Feriado
                </button>
            </div>
            <div v-for="month in months" class="mb-5">
                <div>
                    <h5 class="text-gray-500 font-medium text-xl">
                        {{ month.monthName }}
                    </h5>
                </div>
                <div v-for="holiday in holidays">
                    <div
                        v-if="
                            getMonthFromDate(holiday.date_of_holiday)  ==
                            month.monthNumber
                        "
                    >
                        <div class="flex flex-row justify-between">
                            <span class="text-gray-300">
                                {{ holiday.name_of_holiday }}
                            </span>
                            <span class="text-gray-400">
                                {{
                                    formatDate(holiday.date_of_holiday)
                                }}
                                {{
                                    getNameDay(holiday.date_of_holiday)
                                        
                                    
                                }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </BoxBorder>
</template>
