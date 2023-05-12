export function getNameDay(date) {
    const day = new Date(date).getDay();

    const daysOfWeek = [
        "Segunda-Feira",
        "Terça-Feira",
        "Quarta-Feira",
        "Quinta-Feira",
        "Sexta-Feira",
        "Sábado",
        "Domingo",
    ];

    return daysOfWeek[day];
}

export function getNameMonth(date) {
    const parts = date.split("-");
    const y = parseInt(parts[0]);
    const m = parseInt(parts[1]);
    const d = parseInt(parts[2]);

    const dateObj = new Date(y, m - 1, d);
    const nameMonth = new Intl.DateTimeFormat("pt-BR", {
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

    const lang = document.documentElement.lang

    const formatDate = new Intl.DateTimeFormat(lang).format(dateObj)

    return formatDate
}
