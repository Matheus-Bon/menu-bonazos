<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";
import toast from "@/Stores/toast";

const props = defineProps({ manager: Object });

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

const submit = () => {
    form.clearErrors();

    form.post(route("unit.dashboard.unit.manager.store"), {
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
    <BoxBorder class="h-[322px]">
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Criação do Gerente
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você cria os gerentes para as unidades.</p>
            </span>
        </template>
        <div>
            <form @submit.prevent="submit" autocomplete="off">
                <div class="flex flex-wrap gap-7 items-center">
                    <div class="flex flex-col gap-2 basis-4/12">
                        <div>
                            <label for="category" class="label-default">
                                Nome Gerente
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
                        <span
                            v-if="form.errors.name"
                            class="text-red-500 dark:text-red-700 font-thin"
                        >
                            {{ form.errors.name }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-2 basis-7/12">
                        <div>
                            <label for="category" class="label-default">
                                Email
                            </label>
                            <span
                                v-if="form.errors.email"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>
                        <input
                            required
                            v-model="form.email"
                            id="category"
                            type="text"
                            class="input-default"
                        />
                        <span
                            v-if="form.errors.email"
                            class="text-red-500 dark:text-red-700 font-thin"
                        >
                            {{ form.errors.email }}
                        </span>
                    </div>
                    <div class="flex flex-col gap-2 basis-4/12">
                        <div>
                            <label for="category" class="label-default">
                                Senha
                            </label>
                            <span
                                v-if="form.errors.password"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>

                        <input
                            v-model="form.password"
                            id="category"
                            type="password"
                            class="input-default"
                        />
                    </div>
                    <div class="flex flex-col gap-2 basis-4/12">
                        <div>
                            <label for="category" class="label-default">
                                Confirme a senha
                            </label>
                            <span
                                v-if="form.errors.password_confirmation"
                                class="text-red-500 dark:text-red-700 font-thin"
                            >
                                *
                            </span>
                        </div>

                        <input
                            required
                            v-model="form.password_confirmation"
                            id="category"
                            type="password"
                            class="input-default"
                        />
                    </div>
                        <button
                            type="submit"
                            class="btn-submit-admin relative top-[1rem]"
                            :disabled="form.processing"
                        >
                            Enviar
                        </button>
                </div>
            </form>
        </div>
    </BoxBorder>
</template>
