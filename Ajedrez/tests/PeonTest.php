<?php

namespace TestAjedrez;

use Library\Peon;
use Library\Rey;
use Library\Tablero;

final class PeonTest extends \PHPUnit\Framework\TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists("Library\Peon"));
    }
    public function testEsBlanco(){
        $pieza= new Peon('blanco');
        $this->assertTrue($pieza->esBlanco());
    }
    public function testNoEsBlanco(){
        $pieza= new Peon('negro');
        $this->assertFalse($pieza->esBlanco());
    }
    public function testMoverRey(){
        $tablero= new Tablero();
        $pieza= new Peon('negro');
        $comida= new Rey('blanco');
        $tablero->colocarPieza(3,6, $comida);
        $this->assertFalse($pieza->mover(1,1,1,1, $tablero));
        $this->assertTrue($pieza->mover(1,1,2,1,$tablero));
        $this->assertTrue($pieza->mover(4,6,3,6,$tablero));

    }
}