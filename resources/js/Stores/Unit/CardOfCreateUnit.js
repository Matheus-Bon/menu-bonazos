import { ref } from "vue";

export const card = ref({

    isOpened: false,

    setIsOpenend(value) {
        this.isOpened = value
    }
})