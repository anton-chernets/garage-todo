<?php

namespace core\base;

use core\base\BaseView;

class WebController
{
    public $id;

    public $defaultAction = 'index';

    protected $view;

    public function __construct($id, $baseDir)
    {
        $this->id = $id;
        $this->view = new BaseView($baseDir);
    }

    public function runAction($name)
    {
        if(empty($name)){
            $this->{'action'.ucfirst($this->defaultAction)}();
        }else{
            $this->{'action'.ucfirst($name)}();
        }
    }

    public function render($path, $params = [])
    {
        $this->view->render($this->id . DIRECTORY_SEPARATOR . $path, $params);
    }
}