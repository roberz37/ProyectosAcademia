<?php

namespace LB\Servers;

use LB\Interfaces\Server;

class ServerNotFound implements Server {

    private $name;

    public function __construct($name){
        $this->name = $name;
    }

    public function call(){
        return 400;
    }

    public function getName(){
        return $this->name;
    }
}