<?php

class LaVieja{
    private $tablero=array(0=>array(0,0,0),1=>array(0,0,0), 2=>array(0,0,0));


    function mostrar(){
        return $this->tablero;
    }

    function jugarO($filas, $columnas){
        $this->tablero[$filas][$columnas]="O";
        return $this->tablero;
    }
    function jugarX($filas, $columnas){
        $this->tablero[$filas][$columnas]="X";
        return $this->tablero;
    }

    function quienGano(){
        for ($i=0;$i<3;$i++){
            $j=1;
            if ($this->tablero[$i][$j]==="O" && $this->tablero[$i][$j]===$this->tablero[$i][$j-1] && $this->tablero[$i][$j]===$this->tablero[$i][$j+1]){
                return "Gano O";
            }
            if ($this->tablero[$j][$i]==="O" && $this->tablero[$j][$i]===$this->tablero[$j][$i-1] && $this->tablero[$j][$i]===$this->tablero[$j][$i+1]){
                return "Gano O";
            }
            if ($this->tablero[$i][$j]==="X" && $this->tablero[$i][$j]===$this->tablero[$i][$j-1] && $this->tablero[$i][$j]===$this->tablero[$i][$j+1]){
                return "Gano X";
            }
            if ($this->tablero[$j][$i]==="X" && $this->tablero[$j][$i]===$this->tablero[$j][$i-1] && $this->tablero[$j][$i]===$this->tablero[$j][$i+1]){
                return "Gano X";
            }
        }
    }

}