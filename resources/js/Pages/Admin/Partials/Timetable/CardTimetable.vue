<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({timetable:Object})

const formHour = useForm({
    opens_at: props.timetable.opens_at,
    closes_at: props.timetable.closes_at,
})

/* const updateHour = formHour.patch(route('dashboard.timetable.update', {id: props.timetable.id}), {
    preserveState: (page) => Object.keys(page.props.errors).length,
    preserveScroll: true
}) */

console.log(props.timetable.closes_at)
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
        <div class="flex flex-col gap-10">
            <section>
                <h3
                    class="mb-5 text-lg font-medium text-gray-800 dark:text-gray-300"
                >
                    Escolha os dias da semana que sua loja abrirá:
                </h3>
                <ul class="grid grid-cols-3 w-9/12 gap-4">
                    <li>
                        <input
                            type="checkbox"
                            id="Segunda-feira"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Segunda-feira"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Segunda-feira
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Terça-feira"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Terça-feira"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Terça-feira
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Quarta-feira"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Quarta-feira"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Quarta-feira
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Quinta-feira"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Quinta-feira"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Quinta-feira
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Sexta-feira"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Sexta-feira"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Sexta-feira
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Sábado"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Sábado"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Sábado
                                </div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input
                            type="checkbox"
                            id="Domingo"
                            value=""
                            class="hidden peer"
                            required=""
                        />
                        <label
                            for="Domingo"
                            class="inline-flex items-center justify-center w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-blue-600 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                        >
                            <div class="block">
                                <div
                                    class="w-full text-end text-lg font-semibold md:text-base"
                                >
                                    Domingo
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </section>
            <section>
                <h3
                    class="mb-5 text-lg font-medium text-gray-800 dark:text-gray-300"
                >
                    Escolha o horários que sua irá funcionar:
                </h3>

                <div class="flex flex-row gap-5 items-center">
                        

    
                    <label id="opensAt" class="text-base font-medium text-secondary-color-300">
                        Loja abrirá às:
                    </label>
                    <div class="basis-3/12">
                        <select
                            id="opensAt"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        >
                            <option selected>Escolha um horário</option>
                            <option value="00:00">00:00</option>
                            <option value="00:15">00:15</option>
                            <option value="00:30">00:30</option>
                            <option value="00:45">00:45</option>
                            <option value="01:00">01:00</option>
                            <option value="01:15">01:15</option>
                            <option value="01:30">01:30</option>
                            <option value="01:45">01:45</option>
                            <option value="02:00">02:00</option>
                            <option value="02:15">02:15</option>
                            <option value="02:30">02:30</option>
                            <option value="02:45">02:45</option>
                        </select>
                    </div>

                    <div class="text-base font-medium text-red-400">
                        Loja fechará às:
                    </div>
                    <div class="basis-3/12">
                        <select
                            id="underline_select"
                            class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                        >
                            <option selected>Escolha um horário</option>
                            <option value="00:00">00:00</option>
                            <option value="00:15">00:15</option>
                            <option value="00:30">00:30</option>
                            <option value="00:45">00:45</option>
                            <option value="01:00">01:00</option>
                            <option value="01:15">01:15</option>
                            <option value="01:30">01:30</option>
                            <option value="01:45">01:45</option>
                            <option value="02:00">02:00</option>
                            <option value="02:15">02:15</option>
                            <option value="02:30">02:30</option>
                            <option value="02:45">02:45</option>
                        </select>
                    </div>
                </div>
            </section>
        </div>
    </BoxBorder>
</template>
