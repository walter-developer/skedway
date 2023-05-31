export default class Timezone {

    convertUTCDateToLocalDate(date) {
        let newDate = new Date(date.getTime() + date.getTimezoneOffset() * 60 * 1000);
        let offset = date.getTimezoneOffset() / 60;
        let hours = date.getHours();
        newDate.setHours(hours - offset);
        return newDate;
    }

    format(date, format = 'd/m/y') {
        let day = (date.getDate()).toString().padStart(2, '0');
        let month = (date.getMonth() + 1).toString().padStart(2, '0');
        let year = date.getFullYear().toString().padStart(2, '0');
        let hours = date.getHours().toString().padStart(2, '0');
        let minutes = date.getMinutes().toString().padStart(2, '0');
        let seconds = date.getSeconds().toString().padStart(2, '0');
        let miliSeconds = date.getMilliseconds().toString().padStart(2, '0');
        format = format.toString().toUpperCase().trim();
        format = format.replace('Y', year);
        format = format.replace('M', month);
        format = format.replace('D', day);
        format = format.replace('H', hours);
        format = format.replace('I', minutes);
        format = format.replace('S', seconds);
        format = format.replace('U', miliSeconds);
        return format;
    }

    localeTimezoneName() {
        try {
            return Intl.DateTimeFormat().resolvedOptions().timeZone;
        } catch (e) {
            return 'UTC'
        }
    }


}
