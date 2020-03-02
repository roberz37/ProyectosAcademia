<?php

class Ahorcado{
    private $palabra;
    private $vidas;
    private $palabraOculta;
    public function __construct($palabra, $vidas){
        $this->palabra=$palabra;
        $this->vidas=$vidas;
        $palabraOculta=array();
        for ($i=0; $i< strlen($this->palabra); $i++){
            $palabraOculta[$i]="-";
        }
        $this->palabraOculta=implode ($palabraOculta);
    }

    function vidasRestantes(){
        return $this->vidas;
    }

    function mostrar(){
        return $this->palabraOculta;
    }
    
    
    function jugar($letra){
        $palabraOculta=str_split($this->palabraOculta);
        $palabra=str_split($this->palabra);
        foreach ($palabra as $key => $value){
            if ($palabra[$key]==$letra){
                $palabraOculta[$key]=$value;
            }
        } 
        $this->vidas=$this->vidas-1;
        $this->palabraOculta= implode($palabraOculta);
        return $this->palabraOculta;
    }
    function gane(){
        if ($this->palabraOculta==$this->palabra && $this->vidas>0){
            return $this->palabraOculta;
        }
    }
    function perdi(){
        if ($this->vidas<1){
            return true;
        }
    }

}