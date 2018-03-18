// Модель проектов
var projectModel = (function () {

    var _data = [];

    /*создание проектов*/
    function _addItem($http){

        var name = prompt('Project name', '');

        if(name != ''){
            $http.post('../project/add', { name: name }).success(function(response)
            {
                // alert(response);
                _read($http);
            });
        }else{
            alert('Enter the title');
        }
    }

    /*удаление созданных проектов*/
    function _removeItem($http, id) {

        var ask = confirm("Delete the project?!");

        if (ask){
            $http.post('../project/rem', { id: id }).success(function(response)
            {
                // alert(response);
                _read($http);
            });
        }
    }

    /*обновление созданных проектов*/
    function _updateItem($http, id) {

        var name = prompt('new project name', '');

        if(name){
            if(name != ''){
                $http.post('../project/update', { id: id, name: name }).success(function(response)
                {
                    // alert(response);
                    _read($http);
                });
            }else{
                alert('Enter the title');
            }
        }
    }

    /*дедлайн созданных проектов*/
    function _addDeadline($http, id, date) {

        if(date != ''){
            $http.post('../project/adddeadline', { id: id, date: date }).success(function(response)
            {
                // alert(response);
                _read($http);
            });
        }else{
            alert('Enter the correct date');
        }
    }

    /*чтение созданных проектов*/
    function _read($http) {

        $http.get('../project/getallbyuser').success(function(response) {
            if (response){
                _data[0] = response;
            }
        });
        return _data;
    }

    /*что мы примем в контроллере*/
    return {
        addItem: _addItem,
        updateItem: _updateItem,
        removeItem: _removeItem,
        addDeadline: _addDeadline,
        read: _read,
        data: _data
    };

})();