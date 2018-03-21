<?php

class MyTest extends PHPUnit_Framework_TestCase
{
    /**
     *
     * SIMPLE TODO LISTS
     * Automatic tests or phpunit-4.8.9 vs PHP 5.5
     *
     * @version 2.0
     * @author Anton Chernets
     * @copyright 2018.02
     *
     * @property $storage \core\storage\FileConnector
     * @property $db \core\storage\DbConnector
     */
    protected function setUp()
    {
        print __METHOD__ . "\n";
    }

    public function testOne()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(TRUE);
    }

    public function testTwo()
    {
        print __METHOD__ . "\n";
        $this->assertTrue(TRUE);
    }

    protected function tearDown()
    {
        print __METHOD__ . "\n";
    }

}