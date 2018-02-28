// localStorage.clear();
var projectModel = (function () {

    var _data = [];

    function _addItem(value){
        _data.push({
            id: getCurrentId(),
            name: value
        });
    }

    function _removeItem(id) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data.splice(index, 1);
            }
        })
    }

    function _updateItem(id, value) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data[index].name = value;
            }
        })
    }

    function _save() {
        // второй параметр - функция, которая удаляет специальное свойство добавляемое angularJS для отслеживания дубликатов
        // http://mutablethought.com/2013/04/25/angular-js-ng-repeat-no-longer-allowing-duplicates/
        window.localStorage["projects"] = JSON.stringify(_data, function (key, val) {
            if (key == '$$hashKey') {
                return undefined;
            }
            return val
        });
    }

    function _read() {
        var temp = window.localStorage["projects"];

        if (!temp) _data = [];
        else _data = JSON.parse(temp);

        return _data;
    }

    function getCurrentId() {
        if (!_data || _data.length == 0) return 0;
        else return _data[_data.length - 1].id++;
    }

    return {
        data: _data,
        addItem: _addItem,
        updateItem: _updateItem,
        removeItem: _removeItem,
        save: _save,
        read: _read
    };
})();

var todoModel = (function () {

    var _data = [];

    function _addItem(name, project_id) {
        _data.push({
            id: getCurrentId(),
            priority: getCurrentId(),
            name: name,
            project_id: project_id,
            completed: 0
        });
    }

    function _removeItem(id) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data.splice(index, 1);
            }
        })
    }

    function _updateItem(id, value) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data[index].name = value;
            }
        })
    }

    function _priorityItem(id) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data[index].priority = _data[index].priority-1;
            }
        })
    }

    function _completedItem(id) {
        _data.forEach(function (e, index) {
            if (e.id == id) {
                _data[index].completed = 1;
            }
        })
    }

    function _save() {
        // второй параметр - функция, которая удаляет специальное свойство добавляемое angularJS для отслеживания дубликатов 
        // http://mutablethought.com/2013/04/25/angular-js-ng-repeat-no-longer-allowing-duplicates/
        window.localStorage["tasks"] = JSON.stringify(_data, function (key, val) {
            if (key == '$$hashKey') {
                return undefined;
            }
            return val
        });
    }

    function _read() {
        var temp = window.localStorage["tasks"];

        if (!temp) _data = [];
        else _data = JSON.parse(temp);

        return _data;
    }

    function getCurrentId() {
        if (!_data || _data.length == 0) return 0;
        else return _data[_data.length - 1].id++;
    }

    return {
        data: _data,
        addItem: _addItem,
        updateItem: _updateItem,
        priorityItem: _priorityItem,
        removeItem: _removeItem,
        completedItem: _completedItem,
        save: _save,
        read: _read
    };

})();