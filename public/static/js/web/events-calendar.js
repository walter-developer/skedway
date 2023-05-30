import Request from "./../modules/Request.min.js";
import { EVO_CALENDER } from "./../Constants/Constants.min.js";

export default new class EventsCalendar {

    request;

    constructor() {
        let self = this;
        self.request = new Request();
        self.eventsCalendar();
    }

    convertUTCDateToLocalDate(date) {
        let newDate = new Date(date.getTime() + date.getTimezoneOffset() * 60 * 1000);
        let offset = date.getTimezoneOffset() / 60;
        let hours = date.getHours();
        newDate.setHours(hours - offset);
        return newDate;
    }

    eventsCalendar() {
        let self = this;
        let events = [];
        let calender = { ...EVO_CALENDER }
        self.request.post('/events/data')
            .then((http) => {
                let data = http.collection();
                data.forEach((item) => {
                    let start = self.convertUTCDateToLocalDate(new Date(item.get('start')));
                    let end = self.convertUTCDateToLocalDate(new Date(item.get('end')));
                    let startCalendar = self.format(start, 'm/d/y');
                    let endCalendar = self.format(end, 'm/d/y');
                    let description = 'Evento&nbspdia&nbsp' + self.format(start, 'd/m H:i:s') + '&nbspaté&nbsp' + self.format(end, 'd/m H:i:s') + '<br>';
                    description += item.get('description');
                    events.push({
                        id: item.get('id'),
                        name: item.get('title'),
                        date: [startCalendar, endCalendar],
                        description: description,
                        type: "holiday",
                        everyYear: true,
                        color: "red"
                    });
                });
                calender.calendarEvents = events;
                $('#evoCalendar').evoCalendar(calender);
            });
    }

    format(date, format = 'dd/mm/yy') {
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
}
