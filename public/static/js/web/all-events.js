import Collection from "./../modules/Collection.js";
import Timezone from "./../modules/timezone.min.js";
import { URL, TABULATOR_CONFIGURATION } from "./../constants/Constants.min.js";


export default new class AllEvents {

    timezone;
    constructor() {
        let self = this;
        self.timezone = new Timezone();
        self.events();

    }

    events() {
        let self = this;
        let conf = { ...TABULATOR_CONFIGURATION };
        conf.data = null;
        conf.placeholder = 'Nenhum evento encontrado!';
        conf.ajaxURL = URL + '/listing/events/data';
        conf.columns = [
            {
                title: '+',
                formatter: 'responsiveCollapse',
                minWidth: 50,
                hozAlign: 'left',
                resizable: false,
                headerSort: false
            },
            {
                title: 'Evento',
                field: 'id',
                hozAlign: 'center',
                sorter: 'number',
            },
            {
                title: "Título",
                field: "title",
                sorter: "string",
                formatter: "string"
            },
            {
                title: "Início",
                field: "start",
                sorter: "string",
                formatter: "string"
            },
            {
                title: "Final",
                field: "end",
                sorter: "string",
                formatter: "string"
            },
            {
                title: "Data Cadastro",
                field: "created_at",
                sorter: "string",
                formatter: "string"
            },
            {
                title: "Data Edição",
                field: "updated_at",
                sorter: "string",
                formatter: "string"
            },
            {
                title: "Deletar",
                field: "link_delete",
                hozAlign: "center",
                sorter: "string",
                formatter: "html"
            },
            {
                title: "Editar",
                field: "link_update",
                hozAlign: "center",
                sorter: "string",
                formatter: "html"
            },

        ];
        conf.ajaxParams = function () {
            var values = {};
            this.getSorters().forEach(function (value) {
                if (typeof value == 'object') {
                    orders[value.field] = value.dir;
                }
            });
            values.page = this.getPage();
            values.limit = this.getPageSize();
            return values;
        };
        conf.ajaxResponse = function (url, params, data) {
            let selfTabulator = this;
            let collection = (new Collection(data)).toObject();

            collection.forEach(function (item) {
                let id = item.get('id', 0);
                let linkDelete = null;
                let linkUpdate = null;
                linkDelete = '<a href="' + URL + '/events/delete/' + id + '">Deletar #' + id + '</a>';
                linkUpdate = '<a href="' + URL + '/events/' + id + '">Editar #' + id + '</a>';
                item.set('start', self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(item.get('start'))), 'd/m/y h:i:s'));
                item.set('end', self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(item.get('end'))), 'd/m/y h:i:s'));
                item.set('created_at', item.get('created_at') ? self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(item.get('created_at'))), 'd/m/y h:i:s') : null);
                item.set('updated_at', item.get('updated_at') ? self.timezone.format(self.timezone.convertUTCDateToLocalDate(new Date(item.get('updated_at'))), 'd/m/y h:i:s') : null);
                item.set('link_delete', linkDelete);
                item.set('link_update', linkUpdate);
                return item;
            });

            return {
                url: url,
                data: Object.values(collection.all()),
                params: params,
                last_page: selfTabulator.getPageMax(),
            };
        };

        let tabulator = new Tabulator("#table-events", conf);
        tabulator.setData();
        return tabulator;
    }
}
