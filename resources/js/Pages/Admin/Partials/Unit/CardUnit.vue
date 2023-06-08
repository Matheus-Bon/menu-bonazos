<script setup>
import BoxBorder from "@/Pages/Admin/Components/UI/BoxBorder.vue";
import { useForm } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import toast from "@/Stores/toast";

const props = defineProps({managers: Object})
const showCard = ref(false);
const focus = ref(true)

const form = useForm({
    name: null,
    manager_id: null,
    street: null,
    district: null,
    city: null,
    state: null,
    zip_code: null,
    phone: null,
});

const openCardUnit = () => {
    showCard.value = true;
};

const closeCardUnit = () => {
    showCard.value = false;
};

watch(showCard, (newValue) => {

    if(newValue){
        setTimeout(() => {
            closeCardUnit()
        }, 60000);
    }

}, {immediate:true})

defineExpose({ form, showCard });

const fetchAddress = async () => {
    if (form.zip_code && form.zip_code.length === 8) {
        try {
            const response = await fetch(
                `https://viacep.com.br/ws/${form.zip_code}/json/`
            );
            const data = await response.json();
            if (!data.erro) {
                form.street = data.logradouro;
                form.district = data.bairro;
                form.city = data.localidade;
                form.state = data.uf;
            }
        } catch (error) {
            console.error("Erro ao buscar o endereço:", error);
        }
    }
};

const submit = () => {
    form.clearErrors();

    form.post(route("unit.dashboard.unit.store"), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: (page) => {
            form.reset();

            toast.add({
                message: "Unidade criada com sucesso.",
            });

            closeCardManager();
        },
    });
};

const filterManagers = computed(() => {

    return props.managers.filter(manager => manager.unit_id === null)
})
</script>

<template>
    <BoxBorder>
        <template #card-header>
            <h4 class="font-semibold text-lg text-gray-900 dark:text-white">
                Criação de Unidade
            </h4>
            <span class="text-sm font-light text-gray-500">
                <p>Nessa caixa você cria as unidades.</p>
            </span>
        </template>
        <div class="gap-6 content-center">
            <form @submit.prevent="submit" autocomplete="off">
                <div class="grid grid-cols-2 gap-7 items-center">
                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="unit" class="label-default">
                                    Unidade
                                </label>
                            </div>
                            <input
                                required
                                v-model="form.name"
                                id="unit"
                                type="text"
                                class="input-default"
                                @focusin="openCardUnit"
                                @focus="focus"
                            />
                            
                        </div>
                        <span v-if="form.errors.name" class="label-error">{{ form.errors.name }}</span>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="manager" class="label-default">
                                    Gerente
                                </label>
                                <span
                                    v-if="form.errors.manager"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <select
                                id="manager"
                                class="block w-full input-default"
                                v-model="form.manager_id"
                            >
                                <option disabled value>
                                    Escolha um gerente
                                </option>
                                <option
                                    v-for="manager in filterManagers"
                                    :value="manager.id"
                                >
                                    {{ manager.name }}
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="phone" class="label-default">
                                    Contato
                                </label>
                                <span
                                    v-if="form.errors.phone"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.phone"
                                id="phone"
                                type="text"
                                class="input-default"
                            />
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="zip" class="label-default">
                                    CEP
                                </label>
                                <span
                                    v-if="form.errors.zip_code"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.zip_code"
                                @blur="fetchAddress"
                                id="zip"
                                type="text"
                                class="input-default"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col gap-3">
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="street" class="label-default">
                                    Logradouro
                                </label>
                                <span
                                    v-if="form.errors.street"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.street"
                                id="street"
                                type="text"
                                class="input-default"
                            />
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="district" class="label-default">
                                    Bairro
                                </label>
                                <span
                                    v-if="form.errors.district"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.district"
                                id="district"
                                type="text"
                                class="input-default"
                            />
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="city" class="label-default">
                                    Cidade
                                </label>
                                <span
                                    v-if="form.errors.city"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.city"
                                id="city"
                                type="text"
                                class="input-default"
                            />
                        </div>
                        <div class="flex flex-col gap-2 w-full">
                            <div>
                                <label for="state" class="label-default">
                                    Estado
                                </label>
                                <span
                                    v-if="form.errors.state"
                                    class="text-red-500 dark:text-red-700 font-thin"
                                >
                                    *
                                </span>
                            </div>
                            <input
                                required
                                v-model="form.state"
                                id="state"
                                type="text"
                                class="input-default"
                            />
                        </div>
                    </div>
                </div>
            </form>

            <div class="mt-5">
                <button
                    type="submit"
                    class="btn-submit-admin"
                    @click="submit"
                    :disabled="form.processing"
                >
                    Criar Unidade
                </button>
            </div>
        </div>
    </BoxBorder>
</template>
