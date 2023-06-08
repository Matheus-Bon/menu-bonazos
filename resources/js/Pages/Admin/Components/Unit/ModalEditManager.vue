<script setup>
import { ref, computed, watch } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import { router, useForm, Link } from "@inertiajs/vue3";
import PopUpModal from "@/Components/PopUpModal.vue";
import toast from "@/Stores/toast";

const props = defineProps({ manager: Object });
const isOpen = computed(() => !!props.manager);
function closeModal() {
    router.visit(route("unit.dashboard.unit.index"), {
        preserveState: false,
    });
}

const admin = props.manager?.roles.some((el) => {
    return el.name === "admin";
});

const form = useForm({
    name: props.manager?.name,
    email: props.manager?.email,
    admin_password: ''
});

const deleteManager = () => {
    form.delete(route("unit.dashboard.unit.manager.destroy", props.manager), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            toast.add({
                message: "Gerente excluído com sucesso.",
            });
        },
    });
};

const updateManager = () => {
    form.put(route("unit.dashboard.unit.manager.update", props.manager), {
        preserveScroll: true,
        onSuccess: () => {
            closeModal();
            toast.add({
                message: "Gerente editado com sucesso.",
            });
        },
    });
};

const formPassword = useForm({
    admin_password: "",
    new_password: "",
    new_password_confirmation: "",
});

const updatePassword = () => {
    formPassword.put(
        route("unit.dashboard.unit.update.manager-password", props.manager),
        {
            preserveScroll: true,
            onSuccess: () => {
                formPassword.reset(),
                    toast.add({
                        message: "Senha do gerente modificada com sucesso.",
                    });
            },
        }
    );
};

watch(
    () => props.manager,
    (manager) => {
        if (manager) {
            form.name = manager?.name;
            form.email = manager?.email;
        }
    }
);

const messagePopUp = "Você deseja excluir esse gerente?";
const modalPopUp = ref(null);

const openPopUp = () => {
    modalPopUp.value.openModal();
};
</script>
<template>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-2xl transform overflow-hidden rounded-2xl bg-white dark:bg-admin-card p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="flex flex-row justify-between text-lg font-medium leading-6 text-gray-900 dark:text-gray-200"
                            >
                                Editando Gerente

                                <button
                                    class="text-gray-500 hover:text-gray-300"
                                    title="Fechar"
                                    @click="closeModal"
                                >
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </DialogTitle>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Nessa caixa você edita as informações do
                                    gerente.
                                </p>
                            </div>
                            <div class="mt-5">
                                <form @submit.prevent="updateManager">
                                    <div
                                        v-if="admin"
                                        class="flex p-4 my-5 text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600"
                                        role="alert"
                                    >
                                        <svg
                                            aria-hidden="true"
                                            class="flex-shrink-0 inline w-5 h-5 mr-3"
                                            fill="currentColor"
                                            viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            Aqui você consegue modificar somente o nome e email do administrador. Caso queria mais informações entre na <Link class="font-medium" href="#">área de perfil</Link>.
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-7">
                                        <div class="flex flex-col">
                                            <label
                                                for="name"
                                                class="label-default"
                                            >
                                                Nome
                                            </label>
                                            <input
                                                v-model="form.name"
                                                id="name"
                                                type="text"
                                                class="input-default"
                                            />
                                            <span
                                                v-if="form.errors.name"
                                                class="label-error"
                                            >
                                                {{ form.errors.name }}
                                            </span>
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                for="email"
                                                class="label-default"
                                            >
                                                Email
                                            </label>
                                            <input
                                                v-model="form.email"
                                                id="email"
                                                type="email"
                                                class="input-default"
                                            />
                                            <span
                                                v-if="form.errors.email"
                                                class="label-error"
                                            >
                                                {{ form.errors.email }}
                                            </span>
                                        </div>
                                        <div v-if="admin" class="flex flex-col">
                                            <label
                                                for="adminPassword"
                                                class="label-default"
                                            >
                                                Senha do Administrador
                                            </label>
                                            <input
                                                v-model="
                                                    form.admin_password
                                                "
                                                id="adminPassword"
                                                type="text"
                                                class="input-default"
                                            />
                                            <span
                                                v-if="
                                                    form.errors
                                                        .admin_password
                                                "
                                                class="label-error"
                                            >
                                                {{
                                                    form.errors
                                                        .admin_password
                                                }}
                                            </span>
                                        </div>

                                        <div
                                            class="mt-1 flex flex-row justify-start gap-2"
                                        >
                                            <form
                                                hidden
                                                @submit.prevent="deleteManager"
                                            ></form>

                                            <button
                                                v-if="!admin"
                                                type="button"
                                                class="btn-delete-style-1"
                                                @click="openPopUp"
                                            >
                                                Excluir
                                            </button>
                                            <button
                                                type="submit"
                                                class="btn-primary-style-1"
                                                :disabled="form.processing"
                                            >
                                                Editar
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!-- Form reset password -->
                                <form
                                    v-if="!admin"
                                    @submit.prevent="updatePassword"
                                    class="mt-10"
                                >
                                    <div class="flex flex-col gap-7">
                                        <div
                                            class="flex p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                                            role="alert"
                                        >
                                            <svg
                                                aria-hidden="true"
                                                class="flex-shrink-0 inline w-5 h-5 mr-3"
                                                fill="currentColor"
                                                viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                Área de edição da senha do
                                                gerente. Para fazer a
                                                modificação dela, você precisa
                                                da
                                                <span class="font-medium"
                                                    >senha do
                                                    administrador</span
                                                >. Assim que você atualizar a
                                                senha a sessão do gerente irá
                                                reiniciar para colocar a nova.
                                            </div>
                                        </div>

                                        <div class="flex flex-col">
                                            <label
                                                for="Password"
                                                class="label-default"
                                            >
                                                Nova Senha
                                            </label>
                                            <input
                                                v-model="
                                                    formPassword.new_password
                                                "
                                                name="Senha"
                                                id="Password"
                                                type="text"
                                                class="input-default"
                                            />
                                            <span
                                                v-if="
                                                    formPassword.errors
                                                        .new_password
                                                "
                                                class="label-error"
                                            >
                                                {{
                                                    formPassword.errors
                                                        .new_password
                                                }}
                                            </span>
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                for="newPasswordConfirmation"
                                                class="label-default"
                                            >
                                                Confirme a Senha
                                            </label>
                                            <input
                                                v-model="
                                                    formPassword.new_password_confirmation
                                                "
                                                id="newPasswordConfirmation"
                                                type="text"
                                                class="input-default"
                                            />
                                        </div>
                                        <div class="flex flex-col">
                                            <label
                                                for="adminPassword"
                                                class="label-default"
                                            >
                                                Senha do Administrador
                                            </label>
                                            <input
                                                v-model="
                                                    formPassword.admin_password
                                                "
                                                id="adminPassword"
                                                type="text"
                                                class="input-default"
                                            />
                                            <span
                                                v-if="
                                                    formPassword.errors
                                                        .admin_password
                                                "
                                                class="label-error"
                                            >
                                                {{
                                                    formPassword.errors
                                                        .admin_password
                                                }}
                                            </span>
                                        </div>
                                        <div
                                            class="flex flex-row justify-start"
                                        >
                                            <button
                                                type="submit"
                                                class="btn-primary-style-1"
                                                :disabled="
                                                    formPassword.processing
                                                "
                                            >
                                                Editar senha
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <PopUpModal
                                ref="modalPopUp"
                                :message="messagePopUp"
                                @delete="deleteManager"
                            />
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>
