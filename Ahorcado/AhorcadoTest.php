<?php

require_once("./vendor/autoload.php");
require_once("Ahorcado.php");

use PHPUnit\Framework\TestCase;

final class AhorcadoTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testExisteAhorcado(){
        $this->assertTrue(class_exists("Ahorcado"));
    }
    function testPuedoConstruirUnAhorcado(){
        $ahorcado= new Ahorcado("carro", 10);
        $this->assertTrue(!empty($ahorcado));
    }
    
    function testVidasRestantes(){
        $ahorcado=new Ahorcado("carro", 10);
        $vidas= $ahorcado->vidasRestantes();
        $this->assertEquals(10, $vidas);
    }
    function testMostrarPalabraOculta(){
        $ahorcado= new Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $this->assertEquals("-----", $palabra);
    }

    function testMostrarDistintaPalabraOculta(){
        $ahorcado= new Ahorcado("rostro", 10);
        $palabra= $ahorcado->mostrar();
        $this->assertEquals("------", $palabra);
    }

    function testJugar(){
        $ahorcado= new Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $palabra= $ahorcado->jugar("r");
        $this->assertEquals("--rr-", $palabra);
    }
    function testGane(){
        $ahorcado= new Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $palabra= $ahorcado->jugar("c");
        $palabra= $ahorcado->jugar("a");
        $palabra= $ahorcado->jugar("r");
        $palabra= $ahorcado->jugar("o");
        $palabra= $ahorcado->gane();
        $this->assertEquals("carro",$palabra);
    }
    function testPerdi(){
        $ahorcado= new Ahorcado("carro", 4);
        $palabra= $ahorcado->mostrar();
        $palabra= $ahorcado->jugar("w");
        $palabra= $ahorcado->jugar("e");
        $palabra= $ahorcado->jugar("t");
        $palabra= $ahorcado->jugar("o");
        $resultado= $ahorcado->mostrar();
        $this->assertEquals("----o", $resultado);
        $palabra= $ahorcado->jugar("d");
        $resultado= $ahorcado->perdi();
        $this->assertTrue($resultado); 
    }
}