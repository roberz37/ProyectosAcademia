<?php

namespace TestAjedrez;

use Library\Rey;
use Library\Tablero;

final class TableroTest extends \PHPUnit\Framework\TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists("Library\Tablero"));
    }

    public function testMostrar(){
        $tablero= new \Library\Tablero;
        $size= $tablero->mostrar();
        $this->assertEquals(8, count($size[1]));
    }
    public function testColocarPieza(){
        $tablero= new Tablero();
        $rey= new Rey('blanco');
        $rey2= new Rey('negro');
        $this->assertTrue($tablero->colocarPieza(1,1, $rey));
        $this->assertTrue($tablero->dame(1,1)->esBlanco());
        $this->assertTrue($tablero->colocarPieza(8,8, $rey2));
        $this->assertFalse($tablero->dame(8,8)->esBlanco());

    }
    public function testMoverPieza(){
        $tablero= new Tablero();
        $rey= new Rey('blanco');
        $rey2= new Rey('negro');
        $tablero->colocarPieza(1,1, $rey);
        $tablero->colocarPieza(4,7, $rey2);
        $this->assertTrue($tablero->dame(1,1)->esBlanco());
        $this->assertTrue($tablero->mover(1,1,2,1));
        $this->assertTrue($tablero->dame(2,1)->esBlanco());
        $this->assertTrue($tablero->mover(4,7,5,6));
        $this->assertFalse($tablero->dame(5,6)->esBlanco());

    }
}