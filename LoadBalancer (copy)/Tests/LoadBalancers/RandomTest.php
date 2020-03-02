<?php

namespace LBTest\LoadBalancers;

use PHPUnit\Framework\TestCase;

final class RandomTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }

    function testServerOk(){
        $lb = new \LB\LoadBalancers\Random("LB1");
        $server = new \LB\Servers\ServerOk("SOK");
        $lb->addServer($server);
        $this->assertEquals(200, $lb->call());
    }

    function testServerFail(){
        $lb = new \LB\LoadBalancers\Random("LB1");
        $server = new \LB\Servers\ServerFail("SFail");
        $lb->addServer($server);
        $this->assertEquals(500, $lb->call());
    }
    function testDosServers(){
        $lb = new \LB\LoadBalancers\Random("LB1");
        $server = new \LB\Servers\ServerFail("SFail");
        $lb->addServer($server);
        $server = new \LB\Servers\ServerOK("SOK");
        $lb->addServer($server);
        $this->assertEquals(500, $lb->call());
        $this->assertEquals(200, $lb->call());
        $this->assertEquals(500, $lb->call());
        $this->assertEquals(200, $lb->call());
    }
    function testRemoveServer(){
        $lb = new \LB\LoadBalancers\Random("LB1");
        $server = new \LB\Servers\ServerNotFound("SNF");
        $lb->addServer($server);
        $server = new \LB\Servers\ServerOK("SOK");
        $lb->addServer($server);
        $lb->removeServer("SOK");
        $this->assertEquals(400, $lb->call());
        $this->assertEquals(400, $lb->call());
        $this->assertEquals(400, $lb->call());
        $this->assertEquals(400, $lb->call()); 
    }
}
