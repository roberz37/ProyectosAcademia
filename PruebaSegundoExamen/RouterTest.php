<?php

include './vendor/autoload.php';
include 'Router.php';

use PHPUnit\Framework\TestCase;

final class RouterTest extends TestCase{
    public function testExist(){
        $route = new Router();
        $this->assertTrue(class_exists("Router"));
    }
    
    public function testAgregaControllerOk() {
        $route = new Router();
        $this->assertTrue($route->agregarController("prueba.txt", 1));
    }
    public function testAgregarControllerExistente(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $this->assertFalse($route->agregarController("prueba.txt", 2));
        
    }
    public function testDeleteController(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->agregarController("prueba1.txt", 2);
        $this->assertTrue($route->deleteController("prueba.txt"));
    }
    public function testDeleteControllerVacio(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->agregarController("prueba1.txt", 2);
        $this->assertFalse($route->deleteController("prueba2.txt"));
    }
    public function testDispatcherVacio(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->agregarController("prueba1.txt", 2);
        $this->assertFalse($route->deleteController("prueba3.txt"));
    }   
    public function testDispatcher(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->agregarController("prueba1.txt", 2);
        $this->assertEquals(1,$route->dispatch("prueba.txt"));
        $route->agregarController("prueba2.txt", 3);
        $this->assertEquals(3,$route->dispatch("prueba2.txt"));
    }   
    public function testDispatcherVacio2(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->agregarController("prueba1.txt", 2);
        $this->assertEquals(1,$route->dispatch("prueba.txt"));
        $route->agregarController("prueba2.txt", 3);
        $this->assertFalse($route->dispatch("prueba100.txt"));
    }
    public function testMixed(){
        $route = new Router();
        $route->agregarController("prueba.txt", 1);
        $route->deleteController("prueba.txt");
        $route->agregarController("prueba.txt", 1);
        $this->assertEquals(1, $route->dispatch("prueba.txt"));
        $route->deleteController("prueba.txt");        
        $this->assertFalse($route->dispatch("prueba.txt"));

    }
}