export function getNameDay(date) {
    const day = new Date(date).getDay() + 1;

    const daysOfWeek = [
        "Domingo",
        "Segunda-Feira",
        "Terça-Feira",
        "Quarta-Feira",
        "Quinta-Feira",
        "Sexta-Feira",
        "Sábado",
    ];

    return daysOfWeek[day];
}

export function getMonthFromDate(date) {
    return new Date(date).getMonth() + 1;
}

export function getDayFromDate(date) {
    return new Date(date).getDay() + 1;
}

export function formatDate(date) {

    const d = new Date(date).getDate() + 1
    const m = new Date(date).getMonth() + 1
    const y = new Date(date).getFullYear()

    const formatDay = (d < 10) ? `0${d}` : `${d}`
    const formatMonth = (m < 10) ? `0${m}` : `${m}`

    return `${formatDay}/${formatMonth}/${y}`
}
