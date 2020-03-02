<?php

require_once("./vendor/autoload.php");
require_once("DroneService.php");

use PHPUnit\Framework\TestCase;

final class DroneTest extends TestCase{

    private $collection;

    function testEverythingOk(){
        $this->assertTrue(True);
    }
    function testExistDrone(){
        $this->assertTrue(class_exists("DroneService"));
    }
    protected function setUp(): void{
        $conn = new \MongoDB\Client("mongodb://localhost");
        $this->collection = $conn->Catalogo->drones;
        $this->collection->drop();  
    }
    public function testRegisterOk(){
        $ds = new DroneService($this->collection);
        $this->assertTrue($ds->register("mati23", "1234", "rojo", "2037"));
        

    }
    public function testRegisterDrones(){
        $ds = new DroneService($this->collection);
        $this->assertTrue($ds->register("mati23", "1234", "rojo", "1037"));
        $this->assertTrue($ds->register("Alejito", "1312", "rojo", "2037"));
        
    }
    public function testDroneExistent(){
        $ds = new DroneService($this->collection);
        $this->assertTrue($ds->register("Alejito", "1234", "rojo", "1037"));
        $this->assertFalse($ds->register("Alejito", "1234", "rojo", "1037"));

    }
    public function testDelete(){
        $ds = new DroneService($this->collection);
        $ds->register("mati23", "1234", "rojo", "1037");
        $ds->register("Alejito", "1312", "rojo", "2037");
        $this->assertTrue($ds->delete("mati23"));   
    }
    public function testList(){
        $ds = new DroneService($this->collection);
        $ds->register("mati23", "1234", "rojo", "1037");
        $ds->register("Alejito", "1312", "rojo", "2037");
        $result= $ds->list();
        $this->assertEquals(array(0 =>array('nombre'=>'mati23', 'precio'=>'1234', 'color'=>'rojo', 'modelo'=>'1037'),1=>array('nombre'=>'Alejito', 'precio'=>'1312', 'color'=>'rojo', 'modelo'=>'2037')), $result);   
    }
    public function testListVacio(){
        $ds = new DroneService($this->collection);
        $result= $ds->list();
        $this->assertEquals(array(), $result);
    }
    public function testDeleteAndList(){
        $ds = new DroneService($this->collection);
        $ds->register("mati23", "1234", "rojo", "1037");
        $ds->register("Alejito", "1312", "rojo", "2037");
        $ds->register("borrable", "1312", "rojo", "2037");
        $this->assertTrue($ds->delete("borrable"));
        $result= $ds->list();
        $this->assertEquals(array(0 =>array('nombre'=>'mati23', 'precio'=>'1234', 'color'=>'rojo', 'modelo'=>'1037'),1=>array('nombre'=>'Alejito', 'precio'=>'1312', 'color'=>'rojo', 'modelo'=>'2037')), $result);
    }

}