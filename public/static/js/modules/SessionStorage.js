export default class SessionStorage {

    set(index, value = null) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let lastValue = self.get(first, {});
            let parse = value && (typeof value === 'string');
            parse = parse && (value.match(/\{/g) || []).length;
            parse = parse && (value.match(/\}/g) || []).length;
            value = parse ? JSON.parse(value) : value;
            if (keys.length > 0) {
                lastValue = ((typeof lastValue == 'object') ? lastValue : {});
                lastValue = self._set(lastValue, next, value);
                sessionStorage.setItem(first, JSON.stringify(lastValue));
                return true;
            }
            if (first) {
                let newValue = (typeof value == 'object') ? JSON.stringify(value) : value;
                sessionStorage.setItem(first, newValue);
                return true;
            }
            return false;
        } catch (e) {
            console.log(e);
            alert('Erro ao adicionar dados em session storage!');
            return null;
        }
    }
    get(index, value = null) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let search = null;
            if (sessionStorage.length > 0) {
                search = sessionStorage.getItem(first);
                let parse = search && (typeof search === 'string');
                parse = parse && (search.match(/\{/g) || []).length;
                parse = parse && (search.match(/\}/g) || []).length;
                search = parse ? JSON.parse(search) : search;
                if (first && search && (keys.length > 0) && (typeof search == 'object')) {
                    search = self._get(search, next);
                    return search == null ? value : search;
                }
                if (first && search && (keys.length <= 0)) {
                    return search == null ? value : search;
                }
                return value;
            }
            return value;
        } catch (e) {
            console.log(e);
            alert('Erro ao listar dados em session storage!');
            return null;
        }
    }
    all() {
        try {
            let self = this;
            let list = {};
            if (sessionStorage.length < 0) {
                return list;
            }
            for (let i = 0; i < sessionStorage.length; i++) {
                let key = sessionStorage.key(i);
                list[key] = self.get(key);
            }
            return list;
        } catch (e) {
            console.log(e);
            alert('Erro ao listar todos os dados em session storage!');
            return null;
        }
    }
    delete(index) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let objSearch = self.get(first);
            if (first && (keys.length > 0) && (typeof objSearch == 'object')) {
                let newValue = self._delete(objSearch, next);
                self.set(first, newValue);
                return true;
            }
            if (first && (keys.length <= 0)) {
                sessionStorage.removeItem(first);
                return true;
            }
            return false;
        } catch (e) {
            console.log(e);
            alert('Erro ao deletar dados em session storage!');
            return null;
        }
    }
    _set(obj = {}, index = null, value = null) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let newObj = ((obj && typeof obj == 'object') ? obj : {});
            if (keys.length > 0) {
                let last = (first in newObj) && (typeof newObj[first] === 'object');
                newObj[first] = self._set(last ? newObj[first] : {}, next, value);
                return newObj;
            }
            newObj[first] = value;
            return newObj;
        } catch (e) {
            console.log(e);
            alert('Erro ao adicionar dados recursivos em session storage!');
            return null;
        }
    }
    _get(obj = {}, index) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let newObj = ((obj && typeof obj == 'object') ? obj : {});
            let getItem = first && first.length;
            getItem = getItem && (keys.length <= 0);
            getItem = getItem && (first in newObj);
            let findItem = first && first.length;
            findItem = findItem && (keys.length > 0);
            findItem = findItem && (first in newObj);
            findItem = findItem && (typeof newObj[first] == 'object');
            if (getItem) {
                return newObj[first];
            }
            if (findItem) {
                let objSearch = newObj[first];
                return self._get(objSearch, next);
            }
            return null;
        } catch (e) {
            console.log(e);
            alert('Erro ao listar dados recursivos em session storage!');
            return null;
        }
    }
    _delete(obj = {}, index) {
        try {
            let self = this;
            let keys = index
                .split('.')
                .filter((v) => (v.length > 0));
            let first = keys
                .shift();
            let next = keys
                .join('.');
            let deleteItem = first && first.length;
            let newObj = ((obj && typeof obj == 'object') ? obj : {});
            deleteItem = deleteItem && (keys.length <= 0);
            deleteItem = deleteItem && (first in newObj);
            let findItem = first && first.length;
            findItem = findItem && (keys.length > 0);
            findItem = findItem && (first in newObj);
            if (deleteItem) {
                delete newObj[first];
                return newObj;
            }
            if (findItem) {
                let objSearch = newObj[first];
                newObj[first] = self._delete(objSearch, next);
                return newObj;
            }
            return obj;
        } catch (e) {
            console.log(e);
            alert('Erro ao listar dados recursivos em session storage!');
            return null;
        }
    }
}
