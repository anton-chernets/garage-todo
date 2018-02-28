<?php
/**
 * @var $title string
 **/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link href="/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="/assets/css/bootstrap-theme.css" rel="stylesheet" />
    <link href="/css/todo.css" rel="stylesheet" />
    <title><?= $title ?></title>
</head>
<body>
<div class="wrapper">

<div class="content">
        <h1>Login form</h1>

        <form action="/user/login" method="POST">
            <input class="form-control" type="email" name="email" placeholder="set you email" required>
            <br>
            <input class="form-control" type="password" name="password" placeholder="set you password" required minlength="6">
            <br>
            <button class="btn btn-primary btn-md" type="submit"> Login </button>
        </form>
    <br>
        <a href="/user/registration">Sign up</a>
</div>

<footer class="footer">
    <h5>&copy; Ruby Garage</h5>
</footer>
</div>

</body>
</html>