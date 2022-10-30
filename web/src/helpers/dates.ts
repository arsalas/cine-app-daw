
/**
 * Descompone un timepo en segundos, minutos, horas y dias
 * @param {number} time 
 * @returns {{seconds:number, minutes:number, hours:number,days:number}}
 */
const getTimesFormat = (time: number) => {
    const seconds = Math.floor(time / 1000); // -1937124.765
    const minutes = Math.floor(seconds / 60); // -5158.739066666666
    const hours = Math.floor(minutes / 60); // -85.97898444444444
    const days = Math.floor(hours / 24)
    return {
        seconds,
        minutes,
        hours,
        days
    }
}

/**
 * Convierte una fecha a formato relativo
 * @param {string} date 
 * @returns {string}
 */
export const formatRelativeTime = (date: string) => {
    const time: any = new Date(date);
    const now: any = new Date();
    let diff = Math.floor(time - now);
    if (diff > 0) diff = 0
    const { seconds, minutes, hours, days } = getTimesFormat(diff);
    const formatter = new Intl.RelativeTimeFormat('es-ES', {
        numeric: 'auto',
    })
    if (seconds > -60) return formatter.format(seconds, 'seconds')
    if (minutes > -60) return formatter.format(minutes, 'minutes')
    if (hours > -24) return formatter.format(hours, 'hours')
    return formatter.format(days, 'days')
}