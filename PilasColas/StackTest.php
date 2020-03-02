<?php
require_once("./vendor/autoload.php");
require_once("Stack.php");

use PHPUnit\Framework\TestCase;

final class StackTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    function testExisteBattleship(){
        $this->assertTrue(class_exists("Stack"));
    }

    function testGuardarAlgo(){
        $stack= new Stack;
        $this->assertTrue($guardado= $stack->push('estawea'));
    }
    function testGuardardosCosas(){
        $stack= new Stack;
        $this->assertTrue($guardado= $stack->push('estawea'));
        $this->assertTrue($guardado= $stack->push('otrawea'));
    }
    function testSacarAlgo(){
        $stack= new Stack;
        $guardado= $stack->push('estawea');
        $guardado= $stack->push('otrawea');
        $this->assertEquals('otrawea', $stack->pop());
        $guardado= $stack->push('estawea');
        $this->assertEquals('estawea', $stack->pop());


    }

    function testSacarVacio(){
        $stack= new Stack;
        $this->assertFalse($stack->pop());
    }
    function testEmpty(){
        $stack= new Stack;
        $this->assertTrue($stack->empty());
    }
    function testEmptyFalse(){
        $stack= new Stack;
        $guardado= $stack->push('estawea');
        $this->assertFalse($stack->empty());
    }
}
