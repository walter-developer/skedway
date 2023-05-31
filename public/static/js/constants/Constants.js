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

const TABULATOR_CONFIGURATION = {
    data: [],
    minHeight: "100px",
    locale: "pt-BR",
    layout: "fitDataFill",
    responsiveLayout: "collapse",
    pagination: true,
    paginationMode: "remote",
    sortMode: "remote",
    filterMode: "remote",
    paginationSize: 10,
    paginationSizeSelector: [2, 3, 4, 5, 7, 10],
    ajaxURL: URL,
    dataLoaderLoading: "Caregando...",
    placeholder: "Nenhum registro encontrado!",
    ajaxRequestFunc: function (url, config, params) {
        let self = this;
        let table = self.table;
        return fetch(url, {
            headers: config.headers,
            method: config.method,
            body: JSON.stringify(params),
        }).then((http) => {
            let total = http.headers.get("App-Paginate-Total") ? http.headers.get("App-Paginate-Total") : 0;
            let limite = http.headers.get("App-Paginate-Limit") ? http.headers.get("App-Paginate-Limit") : table.getPageSize();
            if (http && (http.ok || (http.status >= 200 && http.status <= 299))) {
                table.setMaxPage(Math.ceil(total / limite));
                return http.json().catch(() => { return Promise.resolve([]); });
            }
            return Promise.reject(http);
        }).catch((http) => {
            let message = http.headers.get("App-Message") ? http.headers.get("App-Message") : http.statusText;
            setTimeout(function () {
                table.alertManager.alert(message);
                setTimeout(function () {
                    table.alertManager.clear();
                }, 3000);
            }, 100);
            return Promise.resolve([]);
        });
    },
    ajaxResponse: function (url, params, data) {
        let self = this;
        return {
            url: url,
            data: response,
            params: params,
            last_page: self.getPageMax(),
        };
    },
    ajaxParams: function () {
        let orders = {};
        this.getSorters().forEach(function (value) {
            if (typeof value == "object") {
                orders[value.field] = value.dir;
            }
        });
        return {
            pagina: this.getPage(),
            limite: this.getPageSize(),
            ordem: orders,
        };
    },
    ajaxConfig: {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json; charset=utf-8",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": CSRF_TOKEN,
            "Access-Control-Allow-Origin": URL,
            "App-Paginate-Page": 1,
            "App-Paginate-Limit": 20,
            "App-Paginate-Order": JSON.stringify([]),
            "App-Paginate-Search": "",
        },
    },
    ajaxContentType: {
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json; charset=utf-8",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-Token": CSRF_TOKEN,
            "Access-Control-Allow-Origin": URL,
            "App-Paginate-Page": 1,
            "App-Paginate-Limit": 20,
            "App-Paginate-Order": JSON.stringify([]),
            "App-Paginate-Search": "",
        },
        body: function (url, config, params) {
            return JSON.stringify(params);
        },
    },
    responsiveLayoutCollapseFormatter: function (data) {
        let title = null;
        let field = null;
        let value = null;
        let collapse = false;
        let ul = document.createElement("ul");
        let li = document.createElement("li");
        let div = document.createElement("div");
        for (let key in data) {
            collapse = true;
            value = data[key].value;
            field = data[key].field;
            title = data[key].title;
            li = document.createElement("li");
            div = document.createElement("div");
            div.insertAdjacentHTML(
                "beforeend",
                "<strong>" + title + ":</strong>"
            );
            div.insertAdjacentHTML("beforeend", " " + value);
            li.appendChild(div);
            ul.appendChild(li);
        }
        return collapse ? ul : null;
    },
    columns: [
        {
            title: "+",
            formatter: "responsiveCollapse",
            minWidth: 50,
            hozAlign: "left",
            resizable: false,
            headerSort: false,
        },
        {
            title: "Coluna ID",
            field: "id",
            sorter: "string"
        },
        {
            title: "Coluna HTML",
            field: "html",
            sorter: "string",
            formatter: "html",
        },
    ],
    langs: {
        "pt-BR": {
            columns: {
                name: "Nome",
            },
            ajax: {
                loading: "Carregando...",
                error: "Erro ao carregar",
            },
            groups: {
                item: "item",
                items: "itens",
            },
            pagination: {
                first: "Primeiro",
                first_title: "Primeiro Título",
                last: "Ultimo",
                last_title: "Ultimo Título",
                prev: "Anterior",
                prev_title: "Página Anterior",
                next: "Próximo",
                next_title: "Próxima Página",
                page_size: "Limite",
            },
            headerFilters: {
                default: "Filtre Colunas",
                columns: {
                    name: "Coluna ID",
                },
            },
        },
    }
};

export {
    URL,
    URI,
    SEARCH,
    DOMAIN,
    CSRF_TOKEN,
    EVO_CALENDER,
    TABULATOR_CONFIGURATION
};

export const CONSTANTS = {
    URL: URL,
    URI: URI,
    SEARCH: SEARCH,
    DOMAIN: DOMAIN,
    CSRF_TOKEN: CSRF_TOKEN,
    EVO_CALENDER: EVO_CALENDER,
    TABULATOR_CONFIGURATION: TABULATOR_CONFIGURATION
};
