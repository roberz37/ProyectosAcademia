<?php
require_once("./vendor/autoload.php");
require_once("Queue.php");
require_once("Stack.php");

use PHPUnit\Framework\TestCase;

final class QueueTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    function testExisteBattleship(){
        $this->assertTrue(class_exists("Queue"));
    }

    function testGuardarAlgo(){
        $queue= new Queue;
        $this->assertTrue($queue->put('estawea'));
    }
    function testGuardarDosCosas(){
        $queue= new Queue;
        $this->assertTrue($queue->put('estawea'));
        $this->assertTrue($queue->put('otrawea'));
    }
    function testSacar(){
        $queue= new Queue;
        $queue->put('estawea');
        $queue->put('otrawea');
        $this->assertEquals('estawea', $queue->get());
    }
    function testSacarVariasCosas(){
        $queue= new Queue;
        $queue->put('estawea');
        $queue->put('otrawea');
        $this->assertEquals('estawea', $queue->get());
        $queue->put('ultimawea');
        $this->assertEquals('otrawea', $queue->get());
        $this->assertEquals('ultimawea', $queue->get());
    }
    function testSize(){
        $queue= new Queue;
        $queue->put('estawea');
        $queue->put('otrawea');
        $this->assertEquals(2, $queue->size());
    }

}