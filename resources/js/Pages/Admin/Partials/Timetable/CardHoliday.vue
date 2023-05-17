<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import ModalAddHoliday from "../../Components/Timetable/ModalAddHoliday.vue";
import { ref } from "vue";
import CardMonth from "./CardMonth.vue";
import { formatTime } from "@/Pages/Functions/functionsOfDate";


const props = defineProps({ holidays: Object });
const modal = ref(null)

console.log(formatTime('2023-05-17', 'dddd'))

const openModal = () => {
    modal.value.openModal()
}

/* 
    Função para arrumar os dados de holidays(Array que armazena um objeto de cada feriado). 
    Retorno: Ela retorna um array de objetos de cada mês e seus respectivos feriados dentro de outro array 

        Ex:. 
            Array(9) [ {…}, {…}, {…}, {…}, {…}, {…}, {…}, {…}, {…} ]
            0: Object { month: "janeiro", holidays: (1) […] } 
            (···)
    
*/
const holidays = props.holidays.reduce((acc, holiday) => {
    const { id, name_of_holiday, date_of_holiday, fixed} = holiday; // Extrai as propriedades 'date_of_holiday' e 'name_of_holiday' do objeto 'holiday'

    const month = formatTime(date_of_holiday, 'MMMM'); // Obtém o nome do mês correspondente à 'date_of_holiday'

    const existingMonth = acc.find((item) => item.month === month); // Verifica se já existe um objeto no array 'acc' com o mesmo valor de mês

    if (existingMonth) {
        // Se existe um objeto para o mês, adiciona o novo feriado ao array 'holidays' desse objeto
        existingMonth.holidays.push({
            id,
            holiday: name_of_holiday,
            date: date_of_holiday,
            fixed,
        });
    } else {
        // Se não existe um objeto para o mês, cria um novo objeto com o mês e o primeiro feriado no array 'holidays' e adiciona ao array 'acc'
        acc.push({
            month,
            holidays: [
                { id ,holiday: name_of_holiday, date: date_of_holiday, fixed },
            ],
        });
    }

    return acc;
}, []);

// Array que armazena os meses e seus feriados
const months = [
    { monthName: "janeiro", monthNumber: 1, holidays: [] },
    { monthName: "fevereiro", monthNumber: 2, holidays: [] },
    { monthName: "março", monthNumber: 3, holidays: [] },
    { monthName: "abril", monthNumber: 4, holidays: [] },
    { monthName: "maio", monthNumber: 5, holidays: [] },
    { monthName: "junho", monthNumber: 6, holidays: [] },
    { monthName: "julho", monthNumber: 7, holidays: [] },
    { monthName: "agosto", monthNumber: 8, holidays: [] },
    { monthName: "setembro", monthNumber: 9, holidays: [] },
    { monthName: "outubro", monthNumber: 10, holidays: [] },
    { monthName: "novembro", monthNumber: 11, holidays: [] },
    { monthName: "dezembro", monthNumber: 12, holidays: [] },
];

holidays.forEach((holiday) => {
    const { month, holidays: holidayList } = holiday; // Extrai as propriedades 'month' e 'holidays' do objeto 'holiday'
    const matchingMonth = months.find((m) => m.monthName === month); // Busca o objeto de mês correspondente ao 'month' no array 'months'

    if (matchingMonth) {
        // Se encontrou um objeto de mês correspondente, adiciona os feriados do objeto 'holidayList' ao array de feriados desse mês
        matchingMonth.holidays.push(...holidayList);
    }
});


</script>

<template>
    <ModalAddHoliday ref="modal" />
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Feriados
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Aqui você irá configurar sua loja nos feriados</p>
            </span>
        </template>
        <div>
            <button
                @click="openModal"
                class="btn-primary bg-indigo-700 hover:bg-indigo-800"
            >
                Adicionar Feriado
            </button>
        </div>
    </BoxBorder>

    <div class="grid grid-cols-3 gap-3 mt-5">
        <CardMonth
            v-for="month in months"
            :key="month.monthNumber"
            :month="month"
            
        />
    </div>
</template>
