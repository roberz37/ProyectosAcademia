<?php

namespace LB\LoadBalancers\Strategies;

use LB\interfaces\Server;
use LB\interfaces\LoadBalancer;

class RoundRobin implements Server, LoadBalancer {
    private $name;
    private $serverList=array();
    private $serverKeys= array();
    private $numberOfCalls=0;

    public function __construct($name){
        $this->nameServidor= $name;
    }

    public function addServer(Server $server){        
        if (!empty($this->servers[$server->getName()])){
            return false;
         }
        $this->serverKeys[]= $server->getName();
        $this->serverList[$server->getName()]= $server;
        return true;
    }

    public function removeServer(string $serverName){
        if (empty($this->serverList[$serverName])){
            return false;
        }
        unset($this->serverList[$serverName]);
        
        foreach ($this->serverList as $server){
            $this->serverKeys[]=$server->getName();
        }
        
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
        $key= $this->serverKeys[$this->numberOfCalls];
        $server = $this->serverList[$key]->call();

        $this->numberOfCalls+=1;
        if ($this->numberOfCalls>=count($this->serverList)){
            $this->numberOfCalls=0;
        }
        return $server;
    }
    
}
