// Контроллер
todoApp.controller("MainCtrl", function ($scope, $http) {

    /*read date*/
    $scope.data_projects = projectModel.read($http);

    $scope.data_tasks = taskModel.read($http);

    /*project*/
    $scope.addProject = function () {
        projectModel.addItem($http);
    };

    $scope.removeProject = function (id) {
        projectModel.removeItem($http, id);
    };

    $scope.updateProject = function (id) {
        projectModel.updateItem($http, id);
    };

    $scope.openInputDate =  function (id) {
        if (document.getElementById(id).style.display == 'none')
            document.getElementById(id).style.display = 'block';
        else
            document.getElementById(id).style.display = 'none';
    };

    $scope.addDeadline = function (id) {
        var date = document.getElementById(id).getElementsByClassName('deadline')[0].value;
        if(date != undefined)
            projectModel.addDeadline($http, id, date);
        else
            alert('Enter date please');
    };

    /*task*/
    $scope.addTask = function (name, project_id) {
        taskModel.addItem($http, name, project_id);
    };

    $scope.removeTask = function (id) {
        taskModel.removeItem($http, id);
    };

    $scope.updateTask = function (id) {
        taskModel.updateItem($http, id);
    };

    $scope.changeStatus = function (id) {
        taskModel.completedItem($http, id);
    };

    $scope.priorityTaskPlus = function (id, project_id) {
        taskModel.priorityItem($http, id, 'plus');
    };

    $scope.priorityTaskMines = function (id) {
        taskModel.priorityItem($http, id, 'mines');
    };
});