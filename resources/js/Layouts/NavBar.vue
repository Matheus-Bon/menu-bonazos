<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const user = computed(() => page.props.user);
</script>

<template>
    <nav class="bg-gray-800 px-4 py-2 grid grid-cols-2 items-center ">
        <div>
            <a href="#" class="text-white font-bold text-lg">Bonazos</a>
        </div>

        <div class="flex items-center justify-end" v-if="!user">
            <Link :href="route('login')" class="text-white mr-4" as="button"
                >Login</Link
            >
            <Link
                :href="route('register')"
                class="bg-blue-500 text-white px-4 py-2 rounded"
            >
                Sign In
            </Link>
        </div>

        <div v-else class="flex justify-between">
            <div>
                <span class="text-zinc-50 text-3xl">Olá, {{ user.name }}!</span>
            </div>

            <Link :href="route('profile.edit')" class="text-white mr-4" as="button">Perfil</Link>
        </div>
    </nav>
</template>
