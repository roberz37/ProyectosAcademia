<?php

namespace Library;

class TemplateEngine {
    private $str;
    private $variable=array();

    public function __construct($str){
        $this->str= file_get_contents($str);
    }

    public function addVariable($variable, $texto){
        $this->variable[$variable]=$texto;
        if (!empty($this->variable[$variable])){
            return true;
        }
        return false;
    }
    public function palabrasEntreLlaves(){
        $flag=true;
        $auxiliar=$this->str;
        $nueva="";
        $listaDePalabras=array();
        for ($i=0;$i<strlen($auxiliar);$i++){
            
            if ($auxiliar[$i]=="{"){
                $flag=false;
            }
            if ($auxiliar[$i-2]=="}"){
                $flag=true;
                if (!empty($nueva) && !in_array($nueva, $listaDePalabras)) {
                    $listaDePalabras[]=$nueva;
                }
            }  
            if ($flag){
                $nueva.=$auxiliar[$i];
            }
        }
        return count($listaDePalabras);
    }
    public function render(){
        $flag=true;
        $auxiliar=$this->str;
        $nueva="";
        foreach ($this->variable as $key => $value) {
            $auxiliar= str_replace("{{".$key."}}", $value, $auxiliar);
        }
        for ($i=0;$i<strlen($auxiliar);$i++){
            if ($auxiliar[$i]=="{"){
                $flag=false;
                }
            if ($auxiliar[$i-2]=="}"){
                $flag=true;
            }    
            if ($flag){
                $nueva.=$auxiliar[$i];    
            }
        }
        return $nueva;
    }


}