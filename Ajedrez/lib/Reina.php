<?php

namespace Library;

class Reina implements \Interfaces\Pieza{
    
    private $color;

    public function __construct($color){
        $this->color=$color;        
    }

    public function mover($x1, $y1, $x2, $y2, $tablero){

    }
    public function esBlanco(){
        if ($this->color=='blanco'){
            return True;
        }
        return false;
    }
    

}