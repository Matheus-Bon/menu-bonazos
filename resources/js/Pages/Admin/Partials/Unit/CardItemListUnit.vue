<script setup>
import { formatTime } from "@/Pages/Functions/functionsOfDate";
import { Link } from "@inertiajs/vue3";

const props = defineProps({ unit: Object });
</script>

<template>
    <div
        class="grid grid-cols-2 gap-10 w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-zinc-800 dark:border-gray-700 max-h-60 self-center"
    >
        <div class="border border-y-0 border-l-0 border-dashed text-left">
            <i
                class="bi bi-shop text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
            ></i>
            <div href="#">
                <h5
                    class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >
                    Unidade - {{ unit.name }}
                </h5>
            </div>
            <div
                class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
            >
                <span> {{ unit.street }} </span>
                <span>
                    CEP {{ unit.zip_code }} - {{ unit.city }}, {{ unit.state }}
                </span>
                <span> TEL {{ unit.phone }} </span>
            </div>
            <div>
                <Link
                    :href="`/${unit.slug}`"
                    :preserve-state="false"
                > 
                    Ir para unidade 
                </Link>
            </div>
        </div>

        <div class="justify-self-start text-left">
            <i
                class="bi bi-person text-[40px] mb-2 text-secondary-color-100 dark:text-secondary-color-300"
            ></i>

            <div href="#">
                <h5
                    class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                >
                    Gerente - {{ unit.manager?.name }}
                </h5>
            </div>
            <div
                class="flex flex-col mb-3 font-normal text-gray-500 dark:text-gray-400"
            >
                <span>
                    Gerente desde
                    {{ formatTime(unit.created_at, "DD/MM/YYYY") }}
                </span>
            </div>
        </div>
    </div>
</template>
