<?php

namespace LBTest\Servers;

use PHPUnit\Framework\TestCase;

final class ServerTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testServerOk(){
        $server= new \LB\Servers\ServerOk("SOK");
        $this->assertEquals(200, $server->call());
        $this->assertEquals("SOK", $server->getName());
    }

    function testDosServer(){
        $server= new \LB\Servers\ServerOk("SOK");
        $this->assertEquals(200, $server->call());
        $server= new \LB\Servers\ServerFail("SFail");
        $this->assertEquals(500, $server->call());
    }
    function testDosServersNames(){
        $serverOk= new \LB\Servers\ServerOk("SOK");
        $serverFail= new \LB\Servers\ServerFail("SFAIL");
        $this->assertEquals("SOK", $serverOk->getName());
        $this->assertEquals("SFAIL", $serverFail->getName());
    }
    function testServerNF(){
        $server= new \LB\Servers\ServerNotFound("SNF");
        $this->assertEquals(400, $server->call());
        $this->assertEquals("SNF", $server->getName());
    }
    function testServerRedirect(){
        $server= new \LB\Servers\ServerRedirect("SRD");
        $this->assertEquals(300, $server->call());
        $this->assertEquals("SRD", $server->getName());
    }



}
