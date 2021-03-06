<?php
/**
 * PHP variable
 *
 * @var $title string
 * @var $email string
 * @var $user_id string
 **/
?>

<!DOCTYPE>
<html ng-app="todoApp" xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8" />
<head>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap-theme.css" rel="stylesheet" />
    <link href="/css/todo.css" rel="stylesheet" />
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
    <title><?= $title ?></title>
    <script src="/assets/js/angular.js"></script>
    <script src="/js/todoApp.js"></script>
    <script src="/js/mainCtrl.js"></script>
    <script src="/js/projectModel.js"></script>
    <script src="/js/taskModel.js"></script>
    <script>

    </script>
</head>
<body ng-controller="MainCtrl">

<div class="wrapper">

    <a class="btn btn-primary btn-xs logout" href="/user/logout">Logout <?= $email; ?></a>
    <header class="header">
        <h1>simple todo lists</h1>
        <h4>from ruby garage</h4>
    </header>

    <div class="content">
        <div ng-repeat="project in data_projects[0] | orderBy: 'deadline_date'" class="container">

            <!-- Проект - напр.: Complete the test task for Ruby Garage-->
            <div class="row title">
                <h5>
                    <img ng-click="openInputDate(project.id)" src="/images/note.png" class="icon" alt="">{{project.name}}
                    <span class="actions-icon-project">
                        <img ng-click="updateProject(project.id)" src="/images/edit.png" class="icon" alt="">
                        <span class="separate">|</span>
                        <img ng-click="removeProject(project.id)" src="/images/delete.png" class="icon" alt="">
                    </span>
                </h5>
            </div>

            <!-- добавление даты сдачи проекта -->
            <div id="{{project.id}}" class="deadline-wrapper">
                <input type="date" name="input" ng-model="example.value" class="deadline" />
                <button ng-click="addDeadline(project.id)" class="btn btn-success btn-xs deadline-btn">Add deadline</button>
                <span class="deadline-display">selected date: {{example.value | date: "yyyy-MM-dd"}}</span>
            </div>

            <!-- Форма для добавления новых задач -->
            <div class="input-group row row-add-task">
                <label for="name-task" class=""><img src="/images/plus.png" alt=""></label>
                <input ng-model="name" type="text" class="input-add-task" id="name-task" placeholder="Start typing here to create a task...">
                <button ng-click="addTask(name, project.id);" class="btn btn-success btn-sm btn-add-task">Add Task</button>
            </div>

            <!-- задачи -->
            <div class="row">
                <table class="table">
                    <tr ng-repeat="todo in data_tasks[0] | filter: { project_id: project.id } | orderBy: 'priority'">
                        <td class="completed"><input type="checkbox" ng-click="changeStatus(todo.id)" ng-checked="{{todo.status}}"></td>
                        <td class="name-task">{{todo.name}}</td>
                        <td>
                            <div class="wrapper-button-move">
                                <div ng-click="priorityTaskPlus(todo.id)" class="button-move-top">
                                </div>
                            </div>
                            <div class="wrapper-button-move">
                                <div ng-click="priorityTaskMines(todo.id)" class="button-move-bottom">
                                </div>
                            </div>
                        </td>
                        <td class="actions-icon">
                            |<img ng-click="updateTask(todo.id);" src="/images/edit-task.png" class="icon" alt="">
                            |<img ng-click="removeTask(todo.id);" src="/images/delete-task.png" class="icon" alt="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Форма для добавления новых проектов -->
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
