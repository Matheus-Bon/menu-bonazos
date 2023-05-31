<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link, usePage } from "@inertiajs/vue3";

const props = defineProps({ units: Object });
const user = usePage().props.auth.user
</script>

<template>
    <header class="mt-3">
        <h1 class="text-4xl dark:text-gray-100">
            Página de seleção de Unidades
        </h1>
    </header>

    <nav class="flex justify-start gap-5 mx-2 my-10">
        <div class="flex flex-row gap-2">
            <Link
                :href="route('login')"
                v-if="!user"
                class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
            >
                Login
            </Link>
            <Link
                :href="route('register')"
                v-if="!user"
                class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
            >
                Register
            </Link>
            <Link
                :href="route('logout')"
                v-if="user"
                method="post"
                as="button"
                class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
            >
                Logout
            </Link>
        </div>
    </nav>
    <nav class="flex justify-start gap-5 mx-2 my-10">
        <div v-for="unit in units" :key="unit.id" class="flex flex-row gap-2">
            <Link
                :href="route('unit.home', unit.slug)"
                class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
            >
                {{ unit.name }}
            </Link>
        </div>
    </nav>
</template>
