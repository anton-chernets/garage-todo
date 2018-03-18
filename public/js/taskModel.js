// Модель задач
var taskModel = (function () {

    var _data = [];

    /*создание задач*/
    function _addItem($http, name, project_id){

        if(typeof name != undefined) {
            if(!(name.length < 6)){
                $http.post('../task/add', { name: name, project_id: project_id }).success(function(response)
                {
                    // alert(response);
                    _read($http);
                });
            }else{
                alert('name more than 5 letters or numbers');
            }
        }else{
            alert('Enter the text');
        }
    }

    /*удаление задач*/
    function _removeItem($http, id) {

        var ask = confirm("Delete the task?!");

        if (ask){
            $http.post('../task/rem', { id: id }).success(function(response)
            {
                // alert(response);
                _read($http);
            });
        }
    }

    /*обновление задач*/
    function _updateItem($http, id) {

        var name = prompt('new task name', '');

        if(name){
            if(name != ''){
                $http.post('../task/update', { id: id, name: name }).success(function(response)
                {
                    // alert(response);
                    _read($http);
                });
            }else{
                alert('Enter the title');
            }

        }
    }

    /*выполнение задачи*/
    function _completedItem($http, id) {

        $http.post('../task/complete', { id: id }).success(function(response)
        {
            // alert(response);
        });
    }

    /*сортировка созданных задач*/
    function _priorityItem($http, id, criteria) {

        switch (criteria) {
            case 'plus':
                $http.post('../task/PriorityPlus', { id: id }).success(function(response) {
                    // alert(response);
                    _read($http);
                });
                break;
            case 'mines':
                $http.post('../task/PriorityMines', { id: id }).success(function(response) {
                    // alert(response);
                    _read($http);
                });
                break;
            default:
                break;
        }
    }

    /*чтение созданных задач*/
    function _read($http) {

        $http.get('../task/getall').success(function(response) {
            if (response){
                _data[0] = response;
            }
        });
        return _data;
    }

    /*что мы примем в контроллере*/
    return {
        data: _data,
        addItem: _addItem,
        removeItem: _removeItem,
        updateItem: _updateItem,
        completedItem: _completedItem,
        priorityItem: _priorityItem,
        read: _read
    };

})();