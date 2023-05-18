<script setup>
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast"

const props = defineProps({
    day: Object,
});

// Constante que armazena em um array as horas de 15 em 15 minutos
const hours = [
    "00:00",
    "00:15",
    "00:30",
    "00:45",
    "01:00",

    "01:15",
    "01:30",
    "01:45",

    "02:00",

    "02:15",
    "02:30",
    "02:45",

    "03:00",

    "03:15",
    "03:30",
    "03:45",

    "04:00",

    "04:15",
    "04:30",
    "04:45",

    "05:00",

    "05:15",
    "05:30",
    "05:45",

    "06:00",

    "06:15",
    "06:30",
    "06:45",

    "07:00",

    "07:15",
    "07:30",
    "07:45",

    "08:00",

    "08:15",
    "08:30",
    "08:45",

    "09:00",

    "09:15",
    "09:30",
    "09:45",

    "10:00",

    "10:15",
    "10:30",
    "10:45",

    "11:00",

    "11:15",
    "11:30",
    "11:45",

    "12:00",

    "12:15",
    "12:30",
    "12:45",

    "13:00",

    "13:15",
    "13:30",
    "13:45",

    "14:00",

    "14:15",
    "14:30",
    "14:45",

    "15:00",

    "15:15",
    "15:30",
    "15:45",

    "16:00",

    "16:15",
    "16:30",
    "16:45",

    "17:00",

    "17:15",
    "17:30",
    "17:45",

    "18:00",

    "18:15",
    "18:30",
    "18:45",

    "19:00",

    "19:15",
    "19:30",
    "19:45",

    "20:00",

    "20:15",
    "20:30",
    "20:45",

    "21:00",

    "21:15",
    "21:30",
    "21:45",

    "22:00",

    "22:15",
    "22:30",
    "22:45",

    "23:00",

    "23:15",
    "23:30",
    "23:45",
];

/* 
Função de resgate das informações do BD timetables (opens_at, closes_at)
Final: Atualizar os campos opens_at e closes_at
*/ 
const form = useForm({
    opens_at: props.day.opens_at,
    closes_at: props.day.closes_at,
});

/* 
Função de resgate das informações do BD timetables (active)
Final: Atualizar o campo active
*/ 
const formActiveDay = useForm({
    active: props.day.active,
});

// Função para atualizar o horário de funcionamento
const update = () =>
    form.put(route("dashboard.timetable.update", { timetable: props.day.id }), {
        preserveState: (page) => Object.keys(page.props.errors).length,
        preserveScroll: true,

        onSuccess: (page) => {
            toast.add({
                message: "Horário atualizado com sucesso.",
            });
        },
    });

// Função para atualizar o dia de funcionamento
const updateActiveDay = () =>
    formActiveDay.patch(route("dashboard.update.active.day", props.day.id), {
        preserveState: (page) => Object.keys(page.props.errors).length,
        preserveScroll: true,
    });


</script>

<template>
    <div class="flex flex-row gap-4 items-center justify-start align-middle">
        <form
            @submit.prevent="updateActiveDay"
            class="flex items-center mb-4 basis-2/6"
        >
            <input
                @change="updateActiveDay"
                :id="'checkbox-' + day.id"
                type="checkbox"
                :value="formActiveDay.active"
                :checked="formActiveDay.active"
                class="w-4 h-4 bg-gray-100 border-gray-300 rounded focus:ring-secondary-color-light dark:focus:ring-secondary-color-300 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 text-secondary-color-300"
            />
            <label
                :for="'checkbox-' + day.id"
                class="ml-2 text-lg font-medium"
                :class="[
                    formActiveDay.active
                        ? 'text-secondary-color-300'
                        : 'text-red-600 dark:text-red-600',
                ]"
            >
                {{ day.day_of_week }}
            </label>
        </form>

        <form @submit.prevent="update" class="basis-2/3 flex flex-row gap-5">
            <div
                v-if="
                    day.active ||
                    (!(day.opens_at == null) && !(day.closes_at == null))
                "
                class="w-1/2"
            >
                <select
                    v-model="form.opens_at"
                    id="opensAt"
                    class="block py-2.5 pt-0 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer text-center"
                    @change="update"
                >
                    <option v-for="hour in hours" :value="hour">
                        {{ hour }}
                    </option>
                </select>
            </div>
            <div
                v-if="
                    day.active ||
                    (!(day.opens_at == null) && !(day.closes_at == null))
                "
                class="w-1/2"
            >
                <select
                    v-model="form.closes_at"
                    id="underline_select"
                    class="block py-2.5 pt-0 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer text-center"
                    @change="update"
                >
                    <option v-for="hour in hours" :value="hour">
                        {{ hour }}
                    </option>
                </select>
            </div>
        </form>
    </div>
</template>
