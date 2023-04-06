<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
});

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
    phone: user.phone,
});
</script>

<template>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">
                Livro de endereços
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Aqui estarão todos os seus endereços cadastrados.
            </p>
        </header>

        <form
            @submit.prevent="form.patch(route('profile.update'))"
            class="mt-6 space-y-6"
        >
           <div>
                <InputLabel
                    for="local_name"
                    value="Apelido"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="local_name"
                    type="text"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.name"
                    re quired
                    autofocus
                    autocomplete="local_name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div>
                <InputLabel
                    for="zip_code"
                    value="CEP"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="zip_code"
                    type="email"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="zip_code"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel
                    for="street"
                    value="Logradouro"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="street"
                    type="text"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="street"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel
                    for="distric"
                    value="Bairro"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="distric"
                    type="text"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="distric"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel
                    for="state"
                    value="Estado"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="state"
                    type="text"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="state"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div>
                <InputLabel
                    for="complement"
                    value="Complemento"
                    class="dark:text-gray-200"
                />

                <TextInput
                    id="complement"
                    type="text"
                    class="mt-1 block w-full dark:text-gray-300"
                    v-model="form.email"
                    required
                    autocomplete="complement"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>


            <div class="flex items-center gap-4">
                <PrimaryButton :disabled="form.processing"
                    >Salvar</PrimaryButton
                >

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-green-600"
                    >
                        Salvo
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
