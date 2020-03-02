<?php

require_once("./vendor/autoload.php");
require_once("Calculadora.php");

use PHPUnit\Framework\TestCase;

final class CalculadoraTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testExisteCalculadora(){
        $this->assertTrue(class_exists("Calculadora"));
    }

    function testSumarDosPositivos(){
        $calculadora= new Calculadora();
        $suma= $calculadora->sumar(5,5);
        $this->assertEquals(10, $suma);
    }
    function testSumarNegativos(){
        $calculadora= new Calculadora();
        $sumaNeg= $calculadora->sumar(-3, -2);
        $this-> assertEquals(-5, $sumaNeg);
    }
    function testSumarNegyPos(){
        $calculadora= new Calculadora();
        $suma= $calculadora->sumar(2, -3);
        $this->assertEquals(-1, $suma);
        $suma= $calculadora->sumar(-2, 3);
        $this->assertEquals(1, $suma);
    }
    function testRestaPositivos(){
        $calculadora= new Calculadora();
        $resta= $calculadora->restar(4, 3);
        $this->assertEquals(1, $resta);
    }
    function testRestaNegativos(){
        $calculadora= new Calculadora();
        $resta=$calculadora->restar(-3, -3);
        $this->assertEquals(0, $resta);
    }
    function testRestaNegyPos(){
        $calculadora= new Calculadora();
        $resta= $calculadora->restar(-1, 4);
        $this-> assertEquals(-5, $resta);
        $resta= $calculadora->restar(1, -4);
        $this-> assertEquals(5, $resta);
    }
    function testDividirPositivos(){
        $calculadora= new Calculadora();
        $division= $calculadora->dividir(5,5);
        $this->assertEquals(1, $division);
    }
    function testDividirNegativos(){
        $calculadora= new Calculadora();
        $division= $calculadora->dividir(-5,-5);
        $this->assertEquals(1, $division);
    }
    function testDividirNegYPos(){
        $calculadora= new Calculadora();
        $division= $calculadora->dividir(5,-5);
        $this->assertEquals(-1, $division);
        $division= $calculadora->dividir(-5,5);
        $this->assertEquals(-1, $division);
    }
    
    function testDividir0(){
        $calculadora= new Calculadora();
        $division= $calculadora->dividir(5,0);
        $this->assertEquals(1, $division);
    }
    function testMultiplicar(){
        $calculadora= new Calculadora();
        $multiplicacion= $calculadora->multiplicar(2,2);
        $this->assertEquals(4, $multiplicacion);
    }
    function testMultiplicar0(){
        $calculadora= new Calculadora();
        $multiplicacion= $calculadora->multiplicar(2,0);
        $this->assertEquals(0, $multiplicacion);
        $multiplicacion= $calculadora->multiplicar(0,2);
        $this->assertEquals(0, $multiplicacion);
    }
//     function testMultiplicarNegativos(){
//         $calculadora= new Calculadora();
//         $multiplicacion= $calculadora->multiplicar(-2,-2);
//         $this->assertEquals(4, $multiplicacion);
//     }
//     function testMultiplicarNegYPos(){
//         $calculadora= new Calculadora();
//         $multiplicacion= $calculadora->multiplicar(-2,2);
//         $this->assertEquals(-4, $multiplicacion);
//     }
}