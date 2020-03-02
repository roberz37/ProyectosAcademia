<?php

require_once("./vendor/autoload.php");
require_once("lib/Ahorcado.php");

use PHPUnit\Framework\TestCase;

final class AhorcadoTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testPuedoConstruirUnAhorcado(){
        $ahorcado= new \ALibrary\Ahorcado("carro", 10);
        $this->assertTrue(!empty($ahorcado));
    }
    function testVidasRestantes(){
        $ahorcado=new \ALibrary\Ahorcado("carro", 10);
        $vidas= $ahorcado->IntentosRestantes();
        $this->assertEquals(10, $vidas);
    }
    function testMostrarPalabraOculta(){
        $ahorcado= new \ALibrary\Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $this->assertEquals(" _  _  _  _  _ ", $palabra);
    }  
    function testMostrarDistintaPalabraOculta(){
        $ahorcado= new \ALibrary\Ahorcado("rostro", 10);
        $palabra= $ahorcado->mostrar();
        $this->assertEquals(" _  _  _  _  _  _ ", $palabra);
    }
    function testJugar(){
        $ahorcado= new \ALibrary\Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $this->assertTrue($palabra= $ahorcado->jugar("r"));
    }
    function testGane(){
        $ahorcado= new \ALibrary\Ahorcado("carro", 10);
        $palabra= $ahorcado->mostrar();
        $palabra= $ahorcado->jugar("c");
        $palabra= $ahorcado->jugar("a");
        $palabra= $ahorcado->jugar("r");
        $palabra= $ahorcado->jugar("o");
        $this->assertTrue($palabra= $ahorcado->gano());
    }


    function testTerminoPerdio(){
        $ahorcado= new \ALibrary\Ahorcado("carro", 4);
        $palabra= $ahorcado->mostrar();
        $palabra= $ahorcado->jugar("w");
        $palabra= $ahorcado->jugar("e");
        $palabra= $ahorcado->jugar("t");
        $palabra= $ahorcado->jugar("o");
        $palabra= $ahorcado->jugar("d");
        $this->assertTrue($ahorcado->termino());
        $resultado= $ahorcado->perdio();
        $this->assertTrue($resultado);
    }
}