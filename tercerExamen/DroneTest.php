<?php

require_once("./vendor/autoload.php");
require_once("Drone.php");

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase{


    function testEverythingOk(){
        $this->assertTrue(True);
    }
    function testExistDrone(){
        $this->assertTrue(class_exists("Drone"));
    }

    function testPrimerPositionOk(){
        $drone= new Drone();
        $this->assertEquals(array(0=>0, 1=>0), $drone->position());
    }
    function testMoveDrone(){
        $drone= new Drone();
        $this->assertTrue($drone->move(1,0));
    }
    function testMoveDroneFalse(){
        $drone= new Drone();
        $this->assertFalse($drone->move(1,1));
    }

    function testFullBatery(){
        $drone= new Drone();
        $this->assertEquals(100, $drone->batery());
    }
    function testMoveAndReFuel(){
        $drone= new Drone();
        $this->assertEquals(array(0=>0, 1=>0), $drone->position());
        $this->assertTrue($drone->move(-1,0));
        $this->assertEquals(array(0=>-1, 1=>0), $drone->position());
        $this->assertEquals(99, $drone->batery());
        $this->assertTrue($drone->move(0,0));
        $this->assertEquals(100, $drone->batery());
        
    }

    function testMoves(){
        $drone= new Drone();
        $this->assertTrue($drone->move(1,0));
        $this->assertTrue($drone->move(2,0));
        $this->assertTrue($drone->move(2,1));
        $this->assertEquals(array(0=>2, 1=>1), $drone->position());
        $this->assertEquals(97, $drone->batery());
    }
}