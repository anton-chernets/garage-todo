<?php

require_once __DIR__ .DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."User.php";

use models\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    private $user;

    protected function setUp()
    {
        $this->user = new User();
        echo "\n My name " , get_class($this->user) , "\n";
    }

    public function testInsetSQL()
    {
        echo __METHOD__ . " returned query string : " . User::insetSQL('some-email@gmail.com', 'passw0rd', date('Y-m-d H:m:s'));
    }

    public function testFindByEmail()
    {
        echo __METHOD__ . " returned string : " . User::findByEmail('some-email@gmail.com');
    }

    protected function tearDown()
    {
        unset($user);
    }

}