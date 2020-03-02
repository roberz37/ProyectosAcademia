<?php

namespace TestAjedrez;

use Library\Rey;
use Library\Tablero;

final class ReyTest extends \PHPUnit\Framework\TestCase {

    public function testClassExists() {
        $this->assertTrue(class_exists("Library\Rey"));
    }
    public function testEsBlanco(){
        $pieza= new Rey('blanco');
        $this->assertTrue($pieza->esBlanco());
    }
    public function testNoEsBlanco(){
        $pieza= new Rey('negro');
        $this->assertFalse($pieza->esBlanco());
    }
    public function testMoverRey(){
        $tablero= new Tablero();
        $pieza= new Rey('negro');
        $this->assertFalse($pieza->mover(1,1,1,1, $tablero));
        $this->assertFalse($pieza->mover(2,1,5,8,$tablero));
        $this->assertTrue($pieza->mover(4,6,3,6,$tablero));
    }

}