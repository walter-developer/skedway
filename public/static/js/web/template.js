import Alert from "../modules/Alert.min.js";


export default new class Template {

    alert;

    constructor() {
        let self = this;
        self.alert = new Alert();
        self.sidebar();
        self.alerts();
    }

    sidebar() {
        window.addEventListener('DOMContentLoaded', event => {
            const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                });
            }
        });
    }

    alerts() {
        let self = this;
        try {
            /*Oculta alertas exibidos*/
            self.alert.hiddenBackend();
            /*Mosta alertas na fila*/
            self.alert.showMessageSession();
        } catch (e) {
            /*Alerta de erro geral para funções globais*/
            alert('Um erro ocorreu (' + e + '), informe o setor de TI responsável!');
            return self;
        }
        return self;
    }
}
