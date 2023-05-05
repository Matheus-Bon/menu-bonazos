<script setup></script>

<template>
    <div
        class="relative flex flex-col min-w-0 break-words bg-white rounded-xl mb-6 xl:mb-0 border border-gray-300 dark:border-gray-750 dark:border-dashed dark:bg-admin-card"
    >
        <header class="p-6 rounded-t-md">
            <slot name="card-header"/>
        </header>

        <main class="p-6">
            <slot />
        </main>
        
    </div>
</template>
