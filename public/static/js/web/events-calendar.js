import Request from "./../modules/Request.min.js";
import Timezone from "./../modules/timezone.min.js";
import { URL, EVO_CALENDER } from "./../Constants/Constants.min.js";

export default new class EventsCalendar {

    request;
    timezone;

    constructor() {
        let self = this;
        self.request = new Request();
        self.timezone = new Timezone();
        self.eventsCalendar();
    }

    eventsCalendar() {
        let self = this;
        let events = [];
        let calender = { ...EVO_CALENDER }
        self.request.post('/calendar/data')
            .then((http) => {
                let data = http.collection();
                data.forEach((item) => {
                    let start = self.timezone.convertUTCDateToLocalDate(new Date(item.get('start')));
                    let end = self.timezone.convertUTCDateToLocalDate(new Date(item.get('end')));
                    let startCalendar = self.timezone.format(start, 'm/d/y');
                    let endCalendar = self.timezone.format(end, 'm/d/y');
                    let description = 'Evento&nbspdia&nbsp' + self.timezone.format(start, 'd/m H:i:s') + '&nbspaté&nbsp' + self.timezone.format(end, 'd/m H:i:s') + '<br>';
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
                $('#evoCalendar').evoCalendar(calender)
                    .on('selectEvent', function (event, activeEvent) {
                        return window.location.href = URL + '/events/' + activeEvent.id;
                    });
            });
    }
}
