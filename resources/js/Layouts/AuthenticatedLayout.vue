<script setup>
import { ref, onMounted } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

onMounted(() => {
    
})

const user = usePage().props.auth.user;
console.log(user)

const admin = user?.roles?.some(user => {return user.name === 'admin'})
const manager = user?.roles?.some(user => {return user.name === 'manager'})
</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="flex justify-between mx-2">
                <div class="flex flex-row gap-2">
                    <Link
                        :href="route('unit.home')"
                        class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
                    >
                        Início
                    </Link>
                    <Link
                        :href="route('profile.edit')"
                        v-if="user"
                        class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
                    >
                        Profile
                    </Link>
                    <Link
                        :href="route('unit.dashboard.')"
                        v-if="admin || manager"
                        class="dark:text-gray-200 text-xl hover:underline decoration-amber-600"
                    >
                        Dasboard
                    </Link>
                </div>
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
            <!-- Page Heading -->
            <header
                class="bg-white shadow dark:bg-gray-900"
                v-if="$slots.header"
            >
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="grid xl:grid-cols-2 gap-3 mt-7 md:grid-cols-1">
                <slot class="" />
            </main>
        </div>
    </div>
</template>
