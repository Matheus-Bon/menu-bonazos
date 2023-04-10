<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head, Link } from "@inertiajs/vue3";
import { computed, ref } from "vue";
import CreateAddressInformationForm from "./Partials/Address/CreateAddressInformationForm.vue";
import IndexAddressInformationForm from "@/Pages/Profile/Partials/Address/IndexAddressInformationForm.vue";

const props = defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    user: Object,
});

const addresses = props.user.addresses;

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
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
                class="max-w-xl"
            />
        </div>

        <div
            class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800"
        >
            <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div
            class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800"
        >
            <div v-if="addresses.length === 0">
                <CreateAddressInformationForm />
            </div>

            <div v-else class="flex flex-col">
                <IndexAddressInformationForm
                    class="max-w-xl"
                    :addresses="addresses"
                />

                <Link
                    :href="route('address.create')"
                    class="text-gray-200 text-sm bg-green-600 rounded-md p-1 mt-6 w-80 text-center"
                >
                    Adicionar Novo Endereço
                </Link>

            </div>
        </div>

        <div
            class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800"
        >
            <DeleteUserForm class="max-w-xl" />
        </div>
    </AuthenticatedLayout>
</template>
