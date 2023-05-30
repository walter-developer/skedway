const URL = window.location.protocol + "//" + window.location.hostname;
const URI = window.location.pathname;
const SEARCH = window.location.search;
const DOMAIN = window.location.hostname;
const CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
const EVO_CALENDER = {
    calendarEvents: [],
    format: 'mm/dd/yyyy',
    titleFormat: 'MM yyyy',
    eventHeaderFormat: 'd MM, yyyy',
    sidebarToggler: true,
    sidebarDisplayDefault: true,
    eventListToggler: true,
    eventDisplayDefault: true,
    theme: 'Matte Dark',
    language: 'pt',
    dates: {
        en: {
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            daysShort: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            daysMin: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
            months: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            monthsShort: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            noEventForToday: "No event for today.. so take a rest! :)",
            noEventForThisDay: "No event for this day.. so take a rest! :)"
        },
        es: {
            days: ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"],
            daysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            noEventForToday: "No hay evento para hoy.. ¡así que descanse! :)",
            noEventForThisDay: "Ningún evento para este día.. ¡así que descanse! :)"
        },
        de: {
            days: ["Sonntag", "Montag", "Dienstag", "Mittwoch", "Donnerstag", "Freitag", "Samstag"],
            daysShort: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
            daysMin: ["So", "Mo", "Di", "Mi", "Do", "Fr", "Sa"],
            months: ["Januar", "Februar", "März", "April", "Mai", "Juni", "Juli", "August", "September", "Oktober", "November", "Dezember"],
            monthsShort: ["Jan", "Feb", "Mär", "Apr", "Mai", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dez"],
            noEventForToday: "Keine Veranstaltung für heute.. also ruhen Sie sich aus! :)",
            noEventForThisDay: "Keine Veranstaltung für diesen Tag.. also ruhen Sie sich aus! :)"
        },
        pt: {
            days: ["Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado"],
            daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb"],
            daysMin: ["Do", "2a", "3a", "4a", "5a", "6a", "Sa"],
            months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
            monthsShort: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            noEventForToday: "Nenhum evento para hoje.. então descanse! :)",
            noEventForThisDay: "Nenhum evento para este dia.. então descanse! :)"

        }
    }
};

export {
    URL,
    URI,
    SEARCH,
    DOMAIN,
    CSRF_TOKEN,
    EVO_CALENDER
};

export const CONSTANTS = {
    URL: URL,
    URI: URI,
    SEARCH: SEARCH,
    DOMAIN: DOMAIN,
    CSRF_TOKEN: CSRF_TOKEN,
    EVO_CALENDER: EVO_CALENDER
};
