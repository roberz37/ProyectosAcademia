<?php

namespace Library;

class Peon implements \Interfaces\Pieza{
    
    private $color;

    public function __construct($color){
        $this->color=$color;        
    }

    public function mover($x1, $y1, $x2, $y2, \Library\Tablero $tablero){
        $destino= $tablero->mostrar();
        $pieza= $destino->dame($x1, $y1);
        if ($pieza->esBlanco()){    
            if (($x1==$x2 and $y1==$y2) || ($x2<=0 and $x2 >8) || ($y2<=0 and $y2 >8)){ 
                return false;
            }
            else if (($x2==$x1+1 and $y2==$y1) || (!$destino[$x2][$y2] instanceof PiezaNull and ($x2-$x1=1 and $y2-$y1=1))){
                return true;
            }
            return false;
        } else {
            if (($x1==$x2 and $y1==$y2) || ($x2<=0 and $x2 >8) || ($y2<=0 and $y2 >8)){ 
                return false;
            }
            else if (($x2==$x1-1 and $y2==$y1) || (!$destino[$x2][$y2] instanceof PiezaNull and ($x2-$x1=1 and $y2-$y1=1))){
                return true;
            }
            return false;
        }

    }
    public function esBlanco(){
        if ($this->color=='blanco'){
            return True;
        }
        return false;
    }
    

}