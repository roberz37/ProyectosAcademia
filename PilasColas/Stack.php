<?php

class Stack{
    private $array = array();

    public function push($element){
        $this->array[]= $element;
        return true;
    }

    public function pop(){
        if (!empty($this->array)){
            return array_pop($this->array);
        }
        return false;
    }

    public function empty(){
        if (empty($this->array)){
            return true;
        }
        return false;
    }

}