<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";
import IndexAddressInformationForm from "./IndexAddressInformationForm.vue";

const user = usePage().props.auth.user;

const form = useForm({
    local_name: null,
    street: null,
    district: null,
    city: null,
    state: null,
    complement: null,
    zip_code: null,
});

const create = () =>
    form.post(route("address.store"), {
        preserveScroll: true,
        preserveState: true,
    });
</script>

<template>
    
            <section>
                <header>
                    <h2
                        class="text-lg font-medium text-gray-900 dark:text-gray-200"
                    >
                        Cadastre seu endereço de entrega
                    </h2>
                </header>

                <form @submit.prevent="create" class="mt-6 space-y-6">
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
                            v-model="form.local_name"
                            required
                            autofocus
                            autocomplete="local_name"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.local_name"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="zip_code"
                            value="CEP"
                            class="dark:text-gray-200"
                        />

                        <TextInput
                            id="zip_code"
                            type="text"
                            class="mt-1 block w-full dark:text-gray-300"
                            v-model="form.zip_code"
                            required
                            autocomplete="zip_code"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.zip_code"
                        />
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
                            v-model="form.street"
                            required
                            autocomplete="street"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.street"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="district"
                            value="Bairro"
                            class="dark:text-gray-200"
                        />

                        <TextInput
                            id="district"
                            type="text"
                            class="mt-1 block w-full dark:text-gray-300"
                            v-model="form.district"
                            required
                            autocomplete="district"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.distric"
                        />
                    </div>

                    <div>
                        <InputLabel
                            for="city"
                            value="Cidade"
                            class="dark:text-gray-200"
                        />

                        <TextInput
                            id="city"
                            type="text"
                            class="mt-1 block w-full dark:text-gray-300"
                            v-model="form.city"
                            required
                            autocomplete="city"
                        />

                        <InputError class="mt-2" :message="form.errors.city" />
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
                            v-model="form.state"
                            required
                            autocomplete="state"
                        />

                        <InputError class="mt-2" :message="form.errors.state" />
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
                            v-model="form.complement"
                            required
                            autocomplete="complement"
                        />

                        <InputError
                            class="mt-2"
                            :message="form.errors.complement"
                        />
                    </div>

                    <div class="flex items-center gap-4">
                        <PrimaryButton :disabled="form.processing">
                            Salvar
                        </PrimaryButton>

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
