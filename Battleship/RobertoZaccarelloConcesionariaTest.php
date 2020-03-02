<?php

require_once("./vendor/autoload.php");
require_once("Concesionaria.php");

use PHPUnit\Framework\TestCase;

final class ConcesionariaTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    function testExisteConcesionaria(){
        $this->assertTrue(class_exists("Concesionaria"));
    }

    function testAgregarAutos(){
        $concesionaria= new Concesionaria();
        $auto= $concesionaria->agregarAutos(1, "fiat", 600, 1970, 300000);
        $auto2= $concesionaria->agregarAutos(1, "dodge", "RAM", 2015, 130000);
        $this->assertTrue($auto);
        $this->assertFalse($auto2);
        $auto3=$concesionaria->agregarAutos(4, "renault", "12", 1980, 200000);
        $this->assertTrue($auto3);
    }
    function testMostrarAutosDeMarca(){
        $concesionaria= new Concesionaria();
        $auto= $concesionaria->agregarAutos(1, "fiat", 600, 1970, 15000);
        $auto2= $concesionaria->agregarAutos(2, "dodge", "RAM", 2015, 1300000);
        $auto3=$concesionaria->agregarAutos(3, "renault", "12", 1980, 20000);
        $auto4= $concesionaria-> agregarAutos(4,"fiat", "Uno", 1995, 50000);
        $autosMarca= $concesionaria->mostrarAutosDeMarca("renault");
        $this->assertTrue(!empty($autosMarca));
        $autosMarca1= $concesionaria->mostrarAutosDeMarca("fiat");
        $this->assertEquals(2, count($autosMarca1));
        $autosMarca2= $concesionaria->mostrarAutosDeMarca("renault");
        $this->assertEquals($autosMarca2, $autosMarca);
        $autosMarca3= $concesionaria->mostrarAutosDeMarca("chevrolet");
        $this->assertFalse(!empty($autosMarca3));
        
    }
    function testVenderAutoMarca(){
        $concesionaria= new Concesionaria();
        $auto= $concesionaria->agregarAutos(1, "fiat", 600, 1970, 300000);
        $auto2= $concesionaria->agregarAutos(2, "dodge", "RAM", 2015, 130000);
        $auto3=$concesionaria->agregarAutos(3, "renault", "12", 1980, 200000);
        $auto4= $concesionaria-> agregarAutos(4,"fiat", "Uno", 1995, 130000);
        $mostrarCantAutos= $concesionaria->mostrarAutosDeMarca("fiat");
        $this->assertEquals(2, count($mostrarCantAutos));
        $venta= $concesionaria-> venderAutoMarca("fiat");
        $this->assertTrue($venta);
        $mostrarCantAutos= $concesionaria->mostrarAutosDeMarca("fiat");
        $this->assertEquals(1, count($mostrarCantAutos));
        $venta= $concesionaria->venderAutoMarca("chevrolet");
        $this->assertFalse($venta);

    }

    function testTotalGanado(){
        $concesionaria= new Concesionaria();
        $auto= $concesionaria->agregarAutos(1, "fiat", 600, 1970, 30000);
        $auto2= $concesionaria->agregarAutos(2, "dodge", "RAM", 2015, 1300000);
        $auto3=$concesionaria->agregarAutos(3, "renault", "12", 1980, 40000);
        $auto4= $concesionaria-> agregarAutos(4,"fiat", "Uno", 1995, 60000);
        $venta= $concesionaria->venderAutoMarca("fiat");
        $gananciaTotal= $concesionaria->totalGanado();
        $this->assertEquals(60000, $gananciaTotal);
        $venta= $concesionaria->venderAutoMarca("renault");
        $gananciaTotal=$concesionaria->totalGanado();
        $this->assertEquals(100000, $gananciaTotal);
    }

}