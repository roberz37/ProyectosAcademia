<?php

use LB\Interfaces\Strategy;

class LBStrategy implements Strategy{
    private $servers;

    public function __construct($servers){
        $this->servers=$servers;        
    }
    
    public function pick($servidores){
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