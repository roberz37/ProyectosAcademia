<?php

namespace LBTest\LoadBalancers;

use PHPUnit\Framework\TestCase;

final class GenericLoadBalancerTest extends TestCase{

    function testAndaTodo(){
        $this->assertTrue(True);
    }
    
    function testServerOk(){
        $lb = new \LB\LoadBalancers\GenericLoadBalancer("LB1", new \LB\LoadBalancers\Strategies\Random());
        $server = new \LB\Servers\ServerOk("SOK");
        $this->assertTrue($lb->addServer($server));
        $this->assertEquals(200,$lb->call());    
    }

    function testServerFail(){
        $lb = new \LB\LoadBalancers\GenericLoadBalancer("LB1", new \LB\LoadBalancers\Strategies\Random());
        $server = new \LB\Servers\ServerFail("SFail");
        $lb->addServer($server);
        $this->assertEquals(500, $lb->call());
    }

    function testDosServers(){
        $lb = new \LB\LoadBalancers\GenericLoadBalancer("LB1", new \LB\LoadBalancers\Strategies\Random());
        $server = new \LB\Servers\ServerFail("SFail");
        $lb->addServer($server);
        $server = new \LB\Servers\ServerOK("SOK");
        $lb->addServer($server);
        $this->assertEquals(500 , $lb->call());
        $this->assertEquals(200, $lb->call());
        $this->assertEquals(500, $lb->call());
        $this->assertEquals(200, $lb->call());
    }
}