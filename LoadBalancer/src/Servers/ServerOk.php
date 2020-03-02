<?php

namespace LB\Servers;

use LB\Interfaces\Server;

class ServerOk implements \LB\interfaces\Server {

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function call(){
        return 200;
    }

    public function getName(){
        return $this->name;
    }
}