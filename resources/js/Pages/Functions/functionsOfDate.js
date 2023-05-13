export function getNameDay(date) {
    const options = { weekday: "long" };
    const lang = document.documentElement.lang;
    const event = new Date(date)

    const dayWeek = new Intl.DateTimeFormat(lang, options).format(event)

    return dayWeek;
}

export function getNameMonth(date) {
    const parts = date.split("-");
    const y = parseInt(parts[0]);
    const m = parseInt(parts[1]);
    const d = parseInt(parts[2]);
    const lang = document.documentElement.lang;

    const dateObj = new Date(y, m - 1, d);
    const nameMonth = new Intl.DateTimeFormat(lang, {
        month: "long",
    }).format(dateObj);

    return nameMonth;
}

export function formatDate(date) {
    const parts = date.split("-");
    const y = parseInt(parts[0]);
    const m = parseInt(parts[1]);
    const d = parseInt(parts[2]);
    const dateObj = new Date(y, m - 1, d);

    const lang = document.documentElement.lang;

    const formatDate = new Intl.DateTimeFormat(lang).format(dateObj);

    return formatDate;
}
