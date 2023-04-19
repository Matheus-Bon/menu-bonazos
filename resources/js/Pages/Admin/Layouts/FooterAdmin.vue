<template>
    <footer class="block py-1 dark:bg-admin-body">
        <div class="flex px-4">
            <hr class="mb-4 border- border-gray-200 dark:border-gray-200" />
            <div
                class="flex items-center basis-full justify-end"
            >
                <div class="w-full md:w-4/12 px-4">
                    <div
                        class="text-sm text-gray-500 font-semibold py-1 text-right"
                    >
                        Copyright © {{ date }}
                        <a
                            href="#"
                            class="text-blueGray-500 hover:text-gray-700 text-sm font-semibold py-1"
                        >
                            Bonazos
                            <i class="bi bi-database"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            date: new Date().getFullYear(),
        };
    },
};
</script>
