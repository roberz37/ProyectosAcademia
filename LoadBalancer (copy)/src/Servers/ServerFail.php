<?php

namespace LB\Servers;

use LB\Interfaces\Server;

class ServerFail implements Server {

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function call(){
        return 500;
    }

    public function getName(){
        return $this->name;
    }
}