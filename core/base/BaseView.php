<?php

namespace core\base;

class BaseView
{
    public $basePath;

    public function __construct($path)
    {
        $this->basePath = $path;
    }

    public function render($path, $params = [])
    {
        extract($params);
        $str = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $path == 'site'.DIRECTORY_SEPARATOR.'index' ?
        require_once $this->basePath.'/views/index.php' :
        require_once $this->basePath.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$str.'.php';
    }    
}