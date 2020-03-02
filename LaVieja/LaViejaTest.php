<?php

require_once("./vendor/autoload.php");
require_once("LaVieja.php");

use PHPUnit\Framework\TestCase;

final class LaViejaTest extends TestCase {
    
    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testExisteLaVieja(){
        $this->assertTrue(class_exists("LaVieja"));
    }
    function testPuedoConstruirUnaVieja(){
        $vieja= new LaVieja();
        $this->assertTrue(!empty($vieja));
    }
    function mostrar(){
        $vieja= new LaVieja();
        $tablero= $vieja->mostrar();
        $this->assertTrue(!empty($tablero));
        $auxiliar=array(0=>array(0,0,0),1=>array(0,0,0), 2=>array(0,0,0));
        $this->assertEquals($auxiliar, $tablero);
    }
    function testTamanoTablero(){
        $vieja= new LaVieja();
        $tablero=$vieja->mostrar();
        $this->assertEquals(3, count($tablero[0]));
        $this->assertEquals(3, count($tablero[1]));
        $this->assertEquals(3, count($tablero[2]));

    }
    function testJugarO(){
        $vieja= new LaVieja();
        $tablero= $vieja->mostrar();
        $tablero= $vieja->jugarO(1,1);
        $this->assertEquals("O", $tablero[1][1]);

    }
    function testJugarX(){
         $vieja= new LaVieja();
         $tablero= $vieja->mostrar();
         $tablero= $vieja->jugarX(0,0);
         $this->assertEquals("X", $tablero[0][0]);
    }
    function testJugarOyX(){
        $vieja= new LaVieja();
        $tablero=$vieja->mostrar();
        $tablero= $vieja->jugarX(0,0);
        $tablero= $vieja->jugarO(2,2);
        $this->assertEquals("O", $tablero[2][2]);
        $this->assertEquals("X", $tablero[0][0]);
        $auxiliar=array(0=>array("X",0,0),1=>array(0,0,0), 2=>array(0,0,"O"));
        $this->assertEquals($auxiliar, $tablero);   
    }
    function testGanoO(){
        $vieja= new LaVieja();
        $tablero= $vieja->jugarO(0,2);
        $tablero= $vieja->jugarO(1,2);
        $tablero= $vieja->jugarO(2,2);
        $resultado= $vieja->quienGano();
        $this->assertEquals("Gano O", $resultado);
        

    }
    function testGanoX(){
        $vieja= new LaVieja();
        $tablero= $vieja->jugarX(1,0);
        $tablero= $vieja->jugarX(1,1);
        $tablero= $vieja->jugarX(1,2);
        $resultado= $vieja->quienGano();
        $this->assertEquals("Gano X", $resultado);
    }
}
