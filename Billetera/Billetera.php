<?php

Class Billetera{
    
    private $billetes = array();
    
    function agregar($billete, $cantidad){
        if (!isset($this->billetes[$billete])){
            $this->billetes[$billete]=0;
        }
        
        $this->billetes[$billete]=$this->billetes[$billete]+ $cantidad;

    }
    function total(){
        $total = 0;
        foreach ($this->billetes as $billete => $cantidad){
            $total = $total+$billete*$cantidad;
        }
        
        return $total;
    }

    function sacar($billete, $cantidad){
        if (isset($this->billetes[$billete]) && $this->billetes[$billete]>= $cantidad){
            $this->billetes[$billete]= $this->billetes[$billete]- $cantidad;
        }
    }

}