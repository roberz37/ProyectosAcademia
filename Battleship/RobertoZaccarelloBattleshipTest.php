<?php
require_once("./vendor/autoload.php");
require_once("Battleship.php");

use PHPUnit\Framework\TestCase;

final class BattleshipTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    function testExisteBattleship(){
        $this->assertTrue(class_exists("Battleship"));
    }

    function testMostrarJugador1(){
        $battleship= new Battleship(20,20,10);
        $tableroUno= $battleship->mostrarJugador1();
        $this->assertTrue(!empty($tableroUno));
    }
    function testMostrarJugador2(){
        $battleship= new Battleship(20,20,10);
        $tableroDos= $battleship->mostrarJugador2();
        $this->assertTrue(!empty($tableroDos));
    }
    function testColocarNaveJugador1(){
        $battleship= new Battleship(20,20,10);
        $tableroUno= $battleship->colocarNaveJugador1(1,1);
        $this->assertEquals(1, $tableroUno[1][1]);
    }
    function testColocarNaveJugador2(){
        $battleship= new Battleship(20,20,10);
        $tableroDos= $battleship->colocarNaveJugador2(10,10);
        $this->assertEquals(1, $tableroDos[10][10]);
    }
    function testDisparoTurnoJugador1(){
        $battleship= new Battleship(20,20,10);
        $tablero= $battleship->colocarNaveJugador2(5,5);
        $tablero= $battleship->disparoTurnoJugador1(5,5);
        $this->assertEquals(2, $tablero[5][5]);
    }
    function testDisparoTurnoJugador2(){
        $battleship= new Battleship(20,20,10);
        $tablero= $battleship->colocarNaveJugador1(15,15);
        $tablero2= $battleship->disparoTurnoJugador1(2,7);
        $tablero= $battleship->disparoTurnoJugador2(15,15);
        $this->assertEquals(2, $tablero[15][15]);
    }
    function testGanoJugador1(){
        $battleship= new Battleship(20,20,10);
        $tablero= $battleship->colocarNaveJugador2(2,2);
        $tablero= $battleship->colocarNaveJugador2(4,4);
        $tablero= $battleship->disparoTurnoJugador1(2,2);
        $resultado= $battleship->ganoJugador1();
        $this->assertFalse($resultado);
        $tablero2= $battleship->disparoTurnoJugador2(5,6);
        $tablero= $battleship->disparoTurnoJugador1(4,4);
        $resultado= $battleship->ganoJugador1();
        $this->assertTrue($resultado);
    }
    function testGanoJugador2(){
        $battleship= new Battleship(20,20,10);
        $tablero= $battleship->colocarNaveJugador1(10,5);
        $tablero= $battleship->colocarNaveJugador1(4,4);
        $tablero2= $battleship->disparoTurnoJugador1(5,5);
        $tablero= $battleship->disparoTurnoJugador2(10,5);
        $resultado= $battleship->ganoJugador2();
        $this->assertFalse($resultado);
        $tablero2= $battleship->disparoTurnoJugador1(4,5);
        $tablero= $battleship->disparoTurnoJugador2(4,4);
        $resultado= $battleship->ganoJugador2();
        $this->assertTrue($resultado);

    }
    function testTesminoElJuego(){
        $battleship= new Battleship(20,20,10);
        $tablero1= $battleship->colocarNaveJugador1(1,2);
        $tablero2= $battleship->colocarNaveJugador2(5,5);
        $resultado= $battleship->terminoElJuego();
        $this->assertFalse($resultado);
        $tablero2= $battleship->disparoTurnoJugador1(5,5);
        $tablero1=$battleship->disparoTurnoJugador2(1,2);
        $resultado= $battleship->terminoElJuego();
        $this->assertTrue($resultado);
    }
    function testCuantosTurnosPasaron(){
        $battleship= new Battleship(20,20,10);
        $turnos= $battleship->cuantosTurnosPasaron();
        $this->assertEquals(0, $turnos);
        $tablero= $battleship->disparoTurnoJugador1(7,7);
        $tablero= $battleship->disparoTurnoJugador2(2,3);
        $tablero= $battleship->disparoTurnoJugador1(3,7);
        $tablero= $battleship->disparoTurnoJugador2(1,10);
        $turnos= $battleship->cuantosTurnosPasaron();
        $this->assertEquals(2, $turnos);
        $tablero= $battleship->disparoTurnoJugador1(11,15);
        $tablero= $battleship->disparoTurnoJugador2(6,19);
        $turnos= $battleship->cuantosTurnosPasaron();
        $this->assertEquals(3, $turnos);
    }

}
