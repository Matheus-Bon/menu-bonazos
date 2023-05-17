import dayjs from "dayjs";
import "dayjs/locale/pt-br";

export function formatTime(date, format) {
    const lang = document.documentElement.lang;

    const time = dayjs(date).locale(lang).format(format);

    return time;
}
