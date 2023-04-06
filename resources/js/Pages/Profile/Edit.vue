<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";
import { computed } from "vue";
import UpdateAddressInformationForm from "./Partials/UpdateAddressInformationForm.vue";

defineProps({
    mustVerifyEmail: Boolean,
    status: String,
    user: Object,
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
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
                {{ hourDay }} {{ user.name }}!
            </h2>
        </template>

        <div class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <UpdateProfileInformationForm
                :must-verify-email="mustVerifyEmail"
                :status="status"
                class="max-w-xl"
            />
        </div>

        <div class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <UpdatePasswordForm class="max-w-xl" />
        </div>

        <div class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <UpdateAddressInformationForm class="max-w-xl" />
        </div>

        <div class="mx-3 p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <DeleteUserForm class="max-w-xl" />
        </div>
    </AuthenticatedLayout>
</template>
