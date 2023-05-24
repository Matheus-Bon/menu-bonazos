<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";
import CardItemListUnit from "@/Pages/Admin/Partials/Unit/CardItemListUnit.vue";

const props = defineProps({
    infoSentByCardUnit: Object,
    units: Object,
    managers: Object,
});

const managersName = props.managers.find(
    (manager) => manager.id == props.infoSentByCardUnit?.form.manager_id
);

console.log(managersName);
</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Lista de Unidade
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você edita as unidades.</p>
            </span>
        </template>

        <div class="flex flex-wrap gap-5">
            <!-- Card de criação da unidade -->

            <Transition
                name="fade"
                enter-active-class="animate__animated animate__fadeIn animate__slow"
                leave-active-class="animate__animated animate__fadeOut animate__slow"
            >
                <div
                    v-show="infoSentByCardUnit?.showCard"
                    class="grid grid-cols-2 gap-10 w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-gray-700 max-h-60 self-center"
                >
                    <div
                        class="border border-y-0 border-l-0 border-dashed text-left"
                    >
                        <i
                            class="bi bi-shop text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
                        ></i>
                        <div href="#">
                            <h5
                                v-if="infoSentByCardUnit?.form.name"
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                Unidade - {{ infoSentByCardUnit?.form.name }}
                            </h5>
                            <h5
                                v-else
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                Unidade
                            </h5>
                        </div>
                        <div
                            class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
                        >
                            <span>
                                {{ infoSentByCardUnit?.form.street }}
                            </span>
                            <span>
                                CEP {{ infoSentByCardUnit?.form.zip_code }} -
                                {{ infoSentByCardUnit?.form.district }},
                                {{ infoSentByCardUnit?.form.state }}
                            </span>
                            <span>
                                TEL {{ infoSentByCardUnit?.form.phone }}
                            </span>
                        </div>
                    </div>

                    <div class="justify-self-start text-left">
                        <i
                            class="bi bi-person text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
                        ></i>

                        <div href="#">
                            <h5
                                v-if="infoSentByCardUnit?.form.manager_id"
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                Gerente -
                                {{
                                    props.managers.find(
                                        (manager) =>
                                            manager.id ==
                                            props.infoSentByCardUnit?.form
                                                .manager_id
                                    ).name
                                }}
                            </h5>
                            <h5
                                v-else
                                class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                            >
                                Gerente
                            </h5>
                        </div>
                    </div>
                </div>
            </Transition>

            <Transition
                enter-active-class="animate__animated animate__fadeIn animate__slow"
                leave-active-class="animate__animated animate__fadeOut animate__slow"
            >
                <span
                    v-show="infoSentByCardUnit?.showCard"
                    class="h-[1px] w-11/12 m-auto bg-slate-700 mb-3 mt-3"
                ></span>
            </Transition>

            <!-- Lista dos Gerentes -->
            <CardItemListUnit
                v-for="unit in units"
                :key="unit.id"
                :unit="unit"
            />
        </div>
    </BoxBorder>
</template>
