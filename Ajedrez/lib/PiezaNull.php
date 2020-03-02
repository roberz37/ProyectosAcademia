<?php

namespace Library;

class PiezaNull implements \Interfaces\Pieza{

    public function mover($x1, $y1, $x2, $y2, $tablero){

    }
    public function esBlanco(){
        return false;
    }
}