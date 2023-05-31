//Constantes
import { CONSTANTS } from "/static/js/constants/Constants.js";
//Sessão
import SessionStorage from "/static/js/modules/SessionStorage.min.js";

export default class Alert {

    timeout = 7000;
    messages = {};
    sessionkey = 'popveiculos-alerts';
    //pega total de elementos no objeto
    getCountMessages() {
        let self = this;
        if (self.messages) {
            return Object.keys(self.messages).length;
        }
        return 0;
    }
    //deleta o elemento pela chave
    deleteMessage(key) {
        let self = this;
        if (typeof self.messages[key] !== 'undefined') {
            delete self.messages[key];
        }
        return self;
    }
    //pega o elemento pela chave
    getMessage(key) {
        let self = this;
        if (typeof self.messages[key] !== 'undefined') {
            return self.messages[key];
        }
        return null;
    }
    //pega o primeiro elemento do objeto
    getFirstMessage() {
        let self = this;
        if (self.messages && (Object.keys(self.messages).length > 0)) {
            let firstKey = Object.keys(self.messages)[0];
            return self.messages[firstKey];
        }
        return null;
    }
    //pega a chave do primeiro elemento do objeto
    getFirstKeyMessage() {
        let self = this;
        if (self.messages && (Object.keys(self.messages).length > 0)) {
            let firstKey = Object.keys(self.messages)[0];
            return firstKey;
        }
        return null;
    }
    //gera um id randominco
    generateNewId() {
        let self = this;
        let randon = Math.random();
        let timestamp = (new Date()).getTime();
        let listMsgLength = Object.keys(self.messages).length;
        let newId = (randon + '-' + timestamp + '-' + listMsgLength);
        return newId.replace(/[^0-9\-]/g, '');
    }

    //timeout alert hiden
    timeout(time) {
        let self = this;
        self.timeout = time;
        return self;
    }
    //mensagem de sucesso
    success(message) {
        let self = this;
        let id = this.generateNewId();
        self.messages[id] = {
            'id': id,
            'text': message,
            'type': 1,
            'class': 'alert-html-success'
        }
        return self;
    }
    //mensagem de aviso
    warning(message) {
        let self = this;
        let id = this.generateNewId();
        self.messages[id] = {
            'id': id,
            'text': message,
            'type': 2,
            'class': 'alert-html-warning'
        }
        return self;
    }
    //mensagem de erro
    error(message) {
        let self = this;
        let id = this.generateNewId();
        self.messages[id] = {
            'id': id,
            'text': message,
            'type': 3,
            'class': 'alert-html-danger'
        }
        return self;
    }
    //mensagem de confirmação
    confirm(message, caseyes = null, caseno = null) {
        let self = this;
        let id = this.generateNewId();
        self.messages[id] = {
            'id': id,
            'text': message,
            'type': 4,
            'caseyes': caseyes,
            'caseno': caseno,
            'class': 'alert-html-warning'
        }
        return self;
    }
    //mensagem de loading
    loading(message, timeout = 0) {
        let self = this;
        let id = this.generateNewId();
        self.messages[id] = {
            'id': id,
            'text': message,
            'type': 5,
            'class': 'alert-html-warning',
            'timeout': timeout
        }
        return self;
    }
    //redireciona e depois mostra mensagem
    redirect(url) {
        let self = this;
        let session = new SessionStorage();
        let datasession = btoa(JSON.stringify(self.messages, function (key, value) {
            if (typeof value === 'function') {
                return value.toString();
            }
            return value;
        }));
        session.set(self.sessionkey, { 'session': datasession });
        return window.location.href = url;
    }

    //exibe alertas da sessão
    showMessageSession() {
        try {
            let self = this;
            let session = new SessionStorage();
            let fila = session.get(self.sessionkey);
            session.delete(self.sessionkey);
            fila = fila && (typeof fila == 'object') && (Object.keys(fila).length > 0) && ((typeof fila.session != undefined))
                ? JSON.parse(atob(fila.session), function (key, value) {
                    if ((typeof value === 'string') && ((value.toString().indexOf('function')) === 0)) {
                        let functionTemplate = `(${value})`;
                        return eval(functionTemplate);
                    }
                    return value;
                }) : {};
            self.messages = fila;
            self.show();
        } catch (e) {
            console.log(e);
            alert('Um erro ocorreu (' + e + '), informe o setor de TI responsável!');
            return this;
        }
    }

    //exibe mesagem alert
    show() {
        let self = this;
        try {
            if (self.getCountMessages() <= 0) {
                return this;
            }
            let body = $('body');
            let newalert = self.html();
            let firstkey = self.getFirstKeyMessage();
            let firstmsg = self.getMessage(firstkey);
            self.deleteMessage(firstkey);
            let confirm = (firstmsg.type == 4);
            let loading = (firstmsg.type == 5);
            confirm = false;
            newalert = newalert.replaceAll('##alert-html-id##', firstmsg.id);
            newalert = newalert.replaceAll('##alert-type-class##', firstmsg.class);
            newalert = newalert.replaceAll('##alert-msg##', firstmsg.text);
            newalert = newalert.replaceAll('##hidden-close##', (confirm ? 'hidden' : ''));
            newalert = newalert.replaceAll('##hidden-yes##', (confirm ? '' : 'hidden'));
            newalert = newalert.replaceAll('##hidden-no##', (confirm ? '' : 'hidden'));
            newalert = newalert.replaceAll('##hidden-loading##', (loading ? '' : 'hidden'));

            if (body.find('alert-html').length <= 0) {
                body.append(' <alert-html class="col-12"></alert-html>');
            }
            body.find('alert-html').prepend(newalert);

            if ([1, 2, 3].indexOf(firstmsg.type) > -1) {
                self.hidden('#alert-html-' + firstmsg.id, self.timeout);
            }

            body.find('alert-html').find('#alert-html-close-' + firstkey).on('click', firstmsg, function (event) {
                self.hidden('#alert-html-' + event.data.id);
            });

            body.find('alert-html').find('#alert-html-confirm-yes-' + firstkey).on('click', firstmsg, function (event) {
                if (typeof event.data.caseyes === 'function') {
                    event.data.caseyes(self);
                }
                self.hidden('#alert-html-' + event.data.id);
            });

            body.find('alert-html').find('#alert-html-confirm-no-' + firstkey).on('click', firstmsg, function (event) {
                if (typeof event.data.caseno === 'function') {
                    event.data.caseno(self);
                }
                self.hidden('#alert-html-' + event.data.id);
            });

            if (self.getCountMessages() > 0) {
                return self.show();
            }
            return self;
        } catch (e) {
            alert('Um erro ocorreu (' + e + '), informe o setor de TI responsável!');
            return this;
        }
    }
    //oculta mensagem alert
    hidden(id, timeout = 0) {
        try {
            setTimeout(function () {
                let el = $(id).is('alert-html-item') ? $(id).off() : $(id).off().parents('alert-html-item');
                el.fadeOut("slow", function () {
                    let elAlert = $(this).parents('alert-html');
                    let elAlertLength = elAlert.find('alert-html-item').length;
                    let elAlertIten = $(this);
                    elAlertIten.remove();
                    if (elAlertLength <= 1) {
                        elAlert.remove();
                    }
                    return true;
                });
            }, timeout);
        } catch (e) {
            alert('Um erro ocorreu, informe o setor de TI responsável!');
        }
    }
    //oculta mensagens do backend
    hiddenBackend() {
        let self = this;
        let body = $('body');
        body.find('alert-html').find('alert-html-item[backend]').each(function () {
            let newid = self.generateNewId();
            $(this).attr('id', 'alert-html-' + newid);
            self.hidden('#alert-html-' + newid, self.timeout);
            $(this).find('alert-html-close').on('click', function () {
                $(this).attr('id', 'alert-html-close-' + newid);
                self.hidden('#alert-html-close-' + newid);
            });
        });
    }

    //html base do alert
    html() {

        let htmlAlert = '';
        htmlAlert += '<alert-html-item id="alert-html-##alert-html-id##" data-id="##alert-html-id##" class="##alert-type-class##">';
        htmlAlert += '<alert-html-load  id="alert-html-load-##alert-html-id##" ##hidden-loading##>';
        htmlAlert += '<img width="25" height="25" src="' + CONSTANTS.LOADING + '">';
        htmlAlert += '</alert-html-load>';
        htmlAlert += '<alert-html-message>';
        htmlAlert += '<span>##alert-msg##<br></span>';
        htmlAlert += '</alert-html-message>';
        htmlAlert += '<alert-html-confirm-yes  id="alert-html-confirm-yes-##alert-html-id##" tabindex="1" role="button" ##hidden-yes##>';
        htmlAlert += '<span>Confirmar</span>';
        htmlAlert += '</alert-html-confirm-yes>';
        htmlAlert += '<alert-html-confirm-no   id="alert-html-confirm-no-##alert-html-id##" tabindex="2" role="button" ##hidden-no##>';
        htmlAlert += '<span>Cancelar</span>';
        htmlAlert += '</alert-html-confirm-no>';
        htmlAlert += '<alert-html-close id="alert-html-close-##alert-html-id##" tabindex="0" role="button" ##hidden-close##>';
        htmlAlert += 'X';
        htmlAlert += '</alert-html-close>';
        htmlAlert += '</alert-html-item>';
        return htmlAlert;
    }
}


