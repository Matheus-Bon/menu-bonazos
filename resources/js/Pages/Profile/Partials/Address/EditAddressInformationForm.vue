<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";
import { Link, useForm, usePage } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
    address: Object,
    errors: Object,
});

const hourDay = computed(() => {
    const hour = new Date().getHours();

    if (hour >= 5 && hour < 12) {
        return "Bom dia,";
    } else if (hour >= 12 && hour < 18) {
        return "Boa tarde,";
    } else {
        return "Boa noite,";
    }
});


const form = useForm({
    local_name: props.address.local_name,
    street: props.address.street,
    district: props.address.district,
    city: props.address.city,
    state: props.address.state,
    complement: props.address.complement,
    zip_code: props.address.zip_code,
});

const update = () =>
    form.put(route("address.update", { address: props.address.id }));
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200"
            >
                {{ hourDay }} {{ user.name }}!
            </h2>

            
        </template>

        <div
            class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800"
        >
            <section>
                <header>
                    <h2
                        class="text-lg font-medium text-gray-900 dark:text-gray-200"
                    >
                        Atualize as informações do endereço
                        {{ address.local_name }}
                        
                    </h2>
                </header>

                <form @submit.prevent="update" class="mt-6 space-y-6">
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
                            autocomplete="district"
                        />

                        <div v-if="errors.district" class="input-error">
                            {{ errors.district }}
                        </div>
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
                            autocomplete="city"
                        />

                        <div v-if="errors.city" class="input-error">
                            {{ errors.city }}
                        </div>
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
                                Endereço atualizado!
                            </p>
                        </Transition>
                    </div>
                </form>
            </section>
        </div>
    </AuthenticatedLayout>
</template>
