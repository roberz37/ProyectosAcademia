<?php

namespace LB\LoadBalancers\Strategies;
use LB\Interfaces\Strategy;

class Random implements Strategy {
    // private $name;

    // public function __construct($name){
    //     $this->name= $name;
    // }

    // public function addServer(Server $server){
    //     if (!empty($this->servers[$server->getName()])){
    //         return false;
    //     }
    //     $this->servidores[$server->getName()]=$server;
    //     return true;
    // }

    // public function removeServer(string $server){
    //     if (empty($this->serverList[$server])){
    //         return false;
    //     }
    //     unset($this->serverList[$server]);
    //     return true;
    // }

    // public function getName(){
    //      return $this->name;
    //}
    // public function getList(){
    //     return $this->serverList;
    // }

    public function pick(array $array){
        $key = array_rand($array);
        return $array[$key];
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