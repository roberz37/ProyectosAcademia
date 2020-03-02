<?php

namespace LB\LoadBalancers;

use LB\Interfaces\Server;
use LB\Interfaces\LoadBalancer;

class Random implements Server, LoadBalancer {
    private $name;
    private $serverList=array();

    public function __construct($name){
        $this->nameServidor= $name;
    }

    public function addServer(Server $server){
        if (!empty($this->servers[$server->getName()])){
            return false;
        }
        $this->servidores[$server->getName()]=$server;
        return true;
    }

    public function removeServer(string $server){
        if (empty($this->serverList[$server])){
            return false;
        }
        unset($this->serverList[$server]);
        return true;
    }

    public function getName(){
        return $this->name;
    }
    public function getList(){
        return $this->serverList;
    }

    public function call(){
        $key = array_rand($this->serverList);
        return ($this->serverList[$key]);
    }
    
}

// round robin
// random
// priority

// addserver: Bolean
// removeServer(string servername): bolean
// getname: string
// call: int
// contrs(string $name)

// Server
// functioncall: int
// functiongetname: strin

// codigos:
// 200 ok
// 300 redirect
// 400 not found
// 500 error