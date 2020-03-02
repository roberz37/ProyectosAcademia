<?php

namespace LB\Servers;


use LB\Interfaces\Server;

class Decorator implements Server{
    private $retorno;
    private $contador=0;


    public function __construct(Server $servidor){
        $this->retorno = $servidor;     
    }
    public function getCount(){
        return $this->contador;
    }

    public function getName(){
        return $this->retorno->getName();
    }
    
    public function call(){
        $this->contador++;
        return $this->retorno->call();
    }
}