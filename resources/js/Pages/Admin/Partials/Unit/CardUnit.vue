<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";
import intus from "intus";
import { isEmail, isRequired, isMin, isSame } from "intus/rules";

const props = defineProps({ manager: Object });

const form = useForm({
    name: null,
    manager_id: null,
    street: null,
    district: null,
    city: null,
    state: null,
    zip_code: null,
    phone: null,

});

const submit = () => {
    form.clearErrors();

    form.post(route("dashboard.unit.store"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: (page) => {
            form.reset();

            toast.add({
                message: "Gerente criado com sucesso.",
            });
        },
    });
};
</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Criação de Unidade
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você cria as unidades.</p>
            </span>
        </template>
        <div class="grid grid-cols-2 gap-6 content-center">
            
            <form @submit.prevent="submit" autocomplete="off">
                <div class="flex flex-wrap gap-7 items-center">
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Unidade
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            v-model="form.name"
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Gerente
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Telefone da Unidade (Whatsapp)
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                CEP
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Logradouro
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Bairro
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Cidade
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col w-full">
                        <div>
                            <label for="category" class="label-default">
                                Estado
                            </label>
                            <span
                                v-if="form.errors.name"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            
                            id="category"
                            type="text"
                            class="input-default"
                        />
                    </div>
                </div>
            </form>

            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 max-h-60 self-center"
            >
                <i class="bi bi-shop text-[40px] mb-2 text-gray-500 dark:text-secondary-color-300"></i>
                <a href="#">
                    <h5
                        class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white"
                    >
                        {{ form.name }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                    Go to this step by step guideline process on how to certify
                    for your weekly benefits:
                </p>
            </div>
        </div>
    </BoxBorder>
</template>
