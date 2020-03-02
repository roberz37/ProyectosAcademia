<?php

namespace Library;

class Tablero{
    private $tablero;
    public function __construct(){
        $this->tablero=array();
        for($i=1;$i<=8;$i++){
            for($j=1;$j<=8;$j++){
                $this->tablero[$i][$j]=new \Library\PiezaNull();
            }
        }    
    }
    
    public function mostrar(){
        return $this->tablero;

    }
    public function colocarPieza($x, $y, \Interfaces\Pieza $pieza){
        if(($x >0 and $x<=8) and ($y >0 and $y<=8) and ($this->tablero[$x][$y] instanceof PiezaNull)){
            $this->tablero[$x][$y]= $pieza;
            return true;
        }
        return false;
    }//boolean
    public function mover($x1, $y1, $x2, $y2){
        $coord= $this->dame($x1, $y1);
        $destino= $this->dame($x2, $y2);
        if ($coord instanceof PiezaNull){
            return false;
        }
        if ($coord->mover($x1, $y1, $x2, $y2, $this->tablero) and ($destino instanceof PiezaNull || $coord->esBlanco() != $destino->esBlanco()))
        {
            $this->tablero[$x2][$y2]= $this->tablero[$x1][$y1];
            $this->tablero[$x1][$y1] = new PiezaNull();
            return true;
        }
        
        return $coord->mover($x1, $y1, $x2, $y2, $this->tablero);
    
    }//boolean
    public function termino(){
        $cont=0;
        for($i=1;$i<=8;$i++){
            for($j=1;$j<=8;$j++){
                if ($this->tablero[$i][$j] instanceof Rey){
                    $cont++;
                }
            }
        }
        if ($cont < 2){
            die;
        }

    }
    public function dame($x, $y){
        return $this->tablero[$x][$y];

    }//pieza
}