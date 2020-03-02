<?php

namespace LB\LoadBalancers;

use \LB\Interfaces\Strategy;
use \LB\Interfaces\Server;
use \LB\Interfaces\LoadBalancer;

class GenericLoadBalancer implements Server, LoadBalancer{
    private $strategy;
    private $name;
    private $serverList=array();
    
    public function __construct(string $name, Strategy $strategy){
        $this->strategy=$strategy;
        $this->name=$name;    
    }
    
    public function addServer(Server $server){
        if (!empty($this->serverList[$server->getName()])){
            return false;
        }
        $this->serverList[$server->getName()]=$server;
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
        if(empty($this->serverList)){
             throw new \Exception();
        }        
        $retorno= $this->strategy->pick($this->serverList);
        return $retorno->call(); 
    }
}