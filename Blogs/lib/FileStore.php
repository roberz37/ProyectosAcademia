<?php

namespace BLibrary;

class FileStore{
    
    private $archivo;

    public function __construct(string $name){
        $this->archivo= $name;      
    }

    public function save(array $array){
        $auxiliar= implode("\n",$array);
        file_put_contents($this->archivo, $auxiliar);
        if (!empty($this->archivo)){
            return true;
        }
        return false;
    }

    public function read(){
        if (!file_exists($this->archivo)){
            touch($this->archivo);
        }
        $array= array();    
        $auxiliar= file_get_contents($this->archivo);
        if (!empty($auxiliar)){
            $retorno= explode("\n",$auxiliar);
            return $retorno;
        }
        return $array;
    }
    
}

// public function __construct(string $name){
//     $this->archivos[$name]= file_put_contents($name,"");       
// }

// public function save(string $name, array $array){
//     if (key_exists($name, $this->archivos)){
//         $auxiliar= file_get_contents($this->archivos[$name]);
//         $auxiliar.=" ";
//         $auxiliar.=implode(" ",$array);
//         file_put_contents($this->archivos[$name], $auxiliar);
//         return true;
//     }
//     return false;
    
// }

// public function read(string $name){
//     if (key_exists($name, $this->archivos)){
//         $auxiliar= file_get_contents($this->archivos[$name]);
//         $retorno= explode(" ",$auxiliar);
//         return $retorno;
//     }
// }
