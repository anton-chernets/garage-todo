<?php

class MyTest extends PHPUnit_Framework_TestCase
{

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