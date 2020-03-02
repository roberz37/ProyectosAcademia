<?php

class Battleship{
    private $tableroJugadorUno=array();
    private $tableroJugadorDos=array();
    private $cantidadNaves1;
    private $cantidadNaves2;
    private $contador=0;
    public function __construct($fila, $column, $naves){
        $this->cantidadNaves1=$naves;
        $this->cantidadNaves2=$naves;
        for ($i=0; $i<$fila;$i++){
            $this->tableroJugadorUno[$i]=array();
            $this->tableroJugadorDos[$i]=array();
            for($j=0; $j<$column; $j++){
                $this->tableroJugadorUno[$i][$j]=0;
                $this->tableroJugadorDos[$i][$j]=0;
            }
        }
    }

    function mostrarJugador1(){
        return $this->tableroJugadorUno;
    }
    function mostrarJugador2(){
        return $this->tableroJugadorDos;
    }
    function colocarNaveJugador1($fila, $column){
        if($this->cantidadNaves1>0){ #and $this->tableroJugadorUno[$fila][$column]==0){ En caso de que no se pueda poner 2 barcos en el mismo casillero.
            $this->tableroJugadorUno[$fila][$column]=1;
            $this->cantidadNaves1= $this->cantidadNaves1-1;
        }
            return $this->tableroJugadorUno;
    }
    function colocarNaveJugador2($fila, $column){
        if($this->cantidadNaves2>0){ #and $this->tableroJugadorDos[$fila][$column]==0){  En caso de que no se pueda poner 2 barcos en el mismo casillero.
            $this->tableroJugadorDos[$fila][$column]=1;
            $this->cantidadNaves2= $this->cantidadNaves1-1;
        }   
        return $this->tableroJugadorDos;
    }
    function disparoTurnoJugador1($fila, $column){
        $this->contador=$this->contador+1; 
        if($this->tableroJugadorDos[$fila][$column]==1 and $this->contador%2==1){
            $this->tableroJugadorDos[$fila][$column]=2;
            return $this->tableroJugadorDos;
        }
    }
    function disparoTurnoJugador2($fila, $column){
        $this->contador=$this->contador+1;  
        if($this->tableroJugadorUno[$fila][$column]==1 and $this->contador%2==0){
            $this->tableroJugadorUno[$fila][$column]=2;
            return $this->tableroJugadorUno;
        }
    }
    function ganoJugador1(){
        for($i=0;$i<count($this->tableroJugadorDos);$i++){
            for($j=0;$j<count($this->tableroJugadorDos[$i]);$j++){
                if ($this->tableroJugadorDos[$i][$j]==1){
                    return false;
                }
            }
        }
        return true;
    }
    function ganoJugador2(){
        for($i=0;$i<count($this->tableroJugadorUno);$i++){
            for($j=0;$j<count($this->tableroJugadorUno[$i]);$j++){
                if ($this->tableroJugadorUno[$i][$j]==1){
                    return false;
                }
            }
        }
        return true;
    }
    function terminoElJuego(){
        if ($this->ganoJugador1() or $this->ganoJugador2()){
            return true;
        }
        return false;
    }
    function cuantosTurnosPasaron(){
        if ($this->contador%2==1){
            return $this->contador/2+1;
        }
        return $this->contador/2;
    }
}