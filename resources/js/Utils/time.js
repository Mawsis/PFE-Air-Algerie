function formatTime(time) {
    let formattedTime = {
        hours: time.hours,
        minutes: time.minutes,
        seconds: time.seconds,
    };
    if (parseInt(time.hours) < 10) {
        formattedTime.hours = `0${time.hours}`;
    }
    if (parseInt(time.minutes) < 10) {
        formattedTime.minutes = `0${time.minutes}`;
    }
    if (parseInt(time.seconds) < 10) {
        formattedTime.seconds = `0${time.seconds}`;
    }
    return `${formattedTime.hours}:${formattedTime.minutes}:${formattedTime.seconds}`;
}
function formatMonth(monthNumber) {
    const months = [
        "Janvier",
        "Fevrier",
        "Mars",
        "Avril",
        "Mai",
        "Juin",
        "Juillet",
        "Aout",
        "Septembre",
        "Octobre",
        "Novembre",
        "Decembre",
    ];
    return months[monthNumber - 1];
}
function getDayNumber(month, year) {
    return parseInt(new Date(year, parseInt(month) - 1).getDay()) + 1;
}
const daysInMonth = (year, month) => new Date(year, month, 0).getDate();
export { formatTime, formatMonth, getDayNumber, daysInMonth };
