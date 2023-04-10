<script setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    addresses: Object,
});
</script>

<template>
    <div class="grid xl:grid-cols-2 xl:gap-3 md:grid-cols-1">
        <section v-for="address in addresses" :key="address.id">
            <div class="flex gap-2">
                <h2 class="text-2xl text-gray-200 text font-semibold">
                    {{ address.local_name }}
                </h2>
                <span
                    v-if="address.standard_address"
                    class="text-sm text-amber-600 p-1 border rounded-md border-dotted border-yellow-500"
                    >Endereço Padrão</span
                >
            </div>
            <div>
                <p class="text-gray-500">{{ address.street }}</p>
                <p class="text-gray-500">{{ address.state }}</p>
                <p class="text-gray-500">{{ address.district }}</p>
                <p class="text-gray-500">{{ address.city }}</p>
                <p class="text-gray-500">{{ address.complement }}</p>
                <p class="text-gray-500">{{ address.zip_code }}</p>
            </div>

            <div class="flex gap-2">
                <Link
                    :href="route('address.edit', { address: address.id })"
                    as="button"
                    class="text-gray-400 text-sm bg-gray-700 rounded-md p-1 mt-2"
                >
                
                    Editar
                </Link>
                <Link
                    :href="route('address.destroy', { address: address.id })"
                    method="delete"
                    as="button"
                    class="text-gray-400 text-sm bg-gray-700 rounded-md p-1 mt-2"
                >
                    Deletar
                </Link>
                <Link
                    :href="
                        route('addressStandard.change', { address: address.id })
                    "
                    method="put"
                    as="button"
                    class="text-gray-400 text-sm bg-gray-700 rounded-md p-1 mt-2"
                    v-if="!address.standard_address"
                >
                    Tornar Endereço Padrão
                </Link>
            </div>
        </section>
    </div>
</template>
