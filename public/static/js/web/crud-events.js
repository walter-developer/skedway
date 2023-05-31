
import Timezone from "./../modules/timezone.min.js";

export default new class CrudEvents {

    timezone;

    constructor() {
        let self = this;
        self.timezone = new Timezone();
        self.setLocale();
        self.setDatesUtc();
    }

    setDatesUtc() {
        let self = this;
        let elDateStart = document.getElementById('start');
        let elDateEnd = document.getElementById('end');
        if (elDateStart.value && elDateStart.getAttribute('cast-utc')) {
            elDateStart.value = self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(elDateStart.value)), 'Y-m-d h:i:s');
        }
        if (elDateEnd.value && elDateEnd.getAttribute('cast-utc')) {
            elDateEnd.value = self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(elDateEnd.value)), 'Y-m-d h:i:s');
        }
    }

    setLocale() {
        let self = this;
        let timezone = self.timezone.localeTimezoneName().toString().toUpperCase();
        let selected = document.querySelectorAll('[timezone="' + timezone + '"]');
        let selectTimezone = document.getElementById("timezone");
        let selectTimezoneOptions = selectTimezone.options;
        for (let i = 0; i < selectTimezoneOptions.length; i++) {
            selectTimezoneOptions[i].removeAttribute("selected");
        }
        if (selected.length > 0) {
            selected[0].setAttribute('selected', 'selected');
        }
        if (!timezone || (timezone == null) || (timezone.length == 0)) {
            selectTimezone.removeAttribute("readonly");
        }
    }
}
