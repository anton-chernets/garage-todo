<?php
/**
 * @var $title string
 * @var $email string
 * @var $user_id string
 **/
?>
<!DOCTYPE>
<html ng-app="todoApp" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap-theme.css" rel="stylesheet" />
    <link href="/css/todo.css" rel="stylesheet" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
    <title><?= $title ?></title>
    <script src="/assets/js/angular.js"></script>
    <script src="/js/todo.js"></script>
    <script>
        // Модуль
        var todoApp = angular.module("todoApp", []);
        // Контроллер
        todoApp.controller("MainCtrl", function ($scope) {
            // Модели
            $scope.data_projects = projectModel.read();
            $scope.data_todo = todoModel.read();
            $scope.addProject = function () {
                var name = prompt('Project name', '');
                projectModel.addItem(name);
                projectModel.save();
                location.reload();
            };
            $scope.removeProject = function (id) {
                projectModel.removeItem(id);
                projectModel.save();
            };
            $scope.updateProject = function (id) {
                var name = prompt('new project name', '');
                projectModel.updateItem(id, name);
                projectModel.save();
            };
            $scope.addTodo = function (name, project_id) {
                console.log(project_id);
                todoModel.addItem(name, project_id);
                todoModel.save();
            };
            $scope.removeTodo = function (id) {
                todoModel.removeItem(id);
                todoModel.save();
            };
            $scope.completed = function (id) {
                todoModel.completedItem(id);
                todoModel.save();
            };
            $scope.priorityTodo = function (id) {
                todoModel.priorityItem(id);
                todoModel.save();
            };
            $scope.updateTodo = function (id) {
                var name = prompt('new task name', '');
                todoModel.updateItem(id, name);
                todoModel.save();
            }
        });
        todoApp.filter('filterByProjectId',function() {
            return function (items, criterion) {
                //аккумулятор
                var tmp = [];
                if (criterion == undefined || criterion == "") return items;

                if (items.length > 0) {
                    for (i=0;i<items.length;i++) {
                        var item = items[i];
                        //проверка критерия
                        if (item.name.indexOf(criterion) != -1) tmp.push(item);
                    }
                }
                //вернем новый список
                return tmp;
            }
        });
    </script>
</head>
<body ng-controller="MainCtrl">
<div class="wrapper">
    <a class="btn btn-primary btn-xs logout" href="/user/logout">Logout <?= $email; ?>
    </a>
    <header class="header">
        <h1>simple todo lists</h1>
        <h4>from ruby garage</h4>
    </header>

    <div class="content">
        <div ng-repeat="project in data_projects" class="container">
            <div class="row title">
                <h5><img src="/images/note.png" class="icon" alt="">{{project.name}}<!--Complete the test task for Ruby Garage--><span class="actions-icon-project"><img ng-click="updateProject(project.id)" src="/images/edit.png" class="icon" alt=""><span class="separate">|</span><img ng-click="removeProject(project.id)" src="/images/delete.png" class="icon" alt=""></span></h5>
            </div>

            <!-- Форма для добавления новых задач -->
            <div class="input-group row row-add-task">
                <label for="name-task" class=""><img src="/images/plus.png" alt=""></label>
                <input ng-model="name" type="text" class="input-add-task" id="name-task" placeholder="Start typing here to create a task...">
                <button ng-click="addTodo(name, project.id);" class="btn btn-success btn-sm btn-add-task">Add Task</button>
            </div>

            <div class="row">
                <table class="table">
                    <tr ng-repeat="todo in data_todo | orderBy:'priority'">
                        <td class="completed"><input ng-model="completed" id="checkbox1" type="checkbox"></td>
                        <td class="name-task">{{todo.name}}</td>
                        <td class="actions-icon"><img ng-click="priorityTodo(todo.id)" src="/images/move.png" class="icon" alt="">|<img ng-click="updateTodo(todo.id);" src="/images/edit-task.png" class="icon" alt="">|<img ng-click="removeTodo(todo.id);" src="/images/delete-task.png" class="icon" alt=""></td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row add-project-block">
            <button ng-click="addProject()" class="btn btn-primary btn-md btn-add-project"><img src="/images/icon-plus.png" alt="">Add TODO List</button>
        </div>
    </div>

    <footer class="footer">
        <h5>&copy; Ruby Garage</h5>
    </footer>
</div>
</body>
</html>
