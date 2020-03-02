<?php

class Billetera {
    private $plata=0;
    private $billetes=array(2=>0, 5=>0, 10=>0, 20=>0, 50=>0, 100=>0, 200=>0, 500=>0, 1000=>0);
    
    
    function agregaPlata($billete, $cantidad){
            $this->billetes[$billete]+=$cantidad;
    }

    function sacarPlata($billete, $cantidad){
        if ($this->billetes[$billete] > $cantidad){
            $this->billetes[$billete]=$this->billetes[$billete]-$cantidad;
        } else {
            print("Error, no dispone de esa cantidad de billetes de: ".$billete."\n");
        }
    }

    function mostrarPlata(){
        foreach ($this->billetes as $k => $v){
            if (!empty($this->billetes[$k])){
                print("Billete de ".$k.": ".$v."\n");           
            }
        }
    }

    function total(){
        $plata=0;
        foreach($this->billetes as $k =>$v){
            $plata=$plata+($k*$v);
        }
        return $plata;
    }
}

$billetera = new Billetera();
$billetera->agregaPlata(20, 1);
$billetera->agregaPlata(10, 10);

$billetera->sacarPlata(20, 2);
$billetera->mostrarPlata();
print("El total de plata es: ".$billetera->total()."\n");
