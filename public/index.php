<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/**
 *
 * Методы для подключения файлов
 * @read http://php.net/manual/ru/function.require.php
 */
require(__DIR__ . '/../config/_bootstrap.php');
$config = require(__DIR__ . '/../config/config.php');

//throw new Exception();

$result = 1;

try {
    $application = new \core\Application($config);
    $result = $application->run();
}catch (\core\exceptions\InvalidApplicationConfig $e){
    var_dump($e);
}catch (\Exception $e){
    var_dump($e->getMessage());
}
exit($result);