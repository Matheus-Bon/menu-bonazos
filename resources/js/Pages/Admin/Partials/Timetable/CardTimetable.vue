<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import CardTimetableUpdate from "@/Pages/Admin/Partials/Timetable/CardTimetableUpdate.vue";
import { usePage } from "@inertiajs/vue3";

const user = usePage().props.auth.user;

</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Horário de Funcionamento
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>
                    Aqui você escolhe os dias e horários que sua loja funcionará
                </p>
            </span>
        </template>

        <section>
            <h3
                class="mb-5 text-lg font-medium text-gray-800 dark:text-gray-300"
            >
                Escolha o horário de funcionamento:
            </h3>
            <div
                class="flex flex-row gap-4 mb-5 items-center justify-start align-middle"
            >
                <div class="flex items-center mb-4 basis-2/6"></div>
                <div class="basis-2/3 flex flex-row gap-5">
                    <div class="w-1/2 text-center">
                        <span class="text-gray-400 uppercase font-semibold">
                            Abre às
                        </span>
                    </div>
                    <div class="w-1/2 text-center">
                        <span class="text-gray-400 uppercase font-semibold">
                            Fecha às
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-5">
                <CardTimetableUpdate
                    v-for="day in user.unit.timetables"
                    :key="day.id"
                    :day="day"
                />
            </div>
        </section>
    </BoxBorder>
</template>
