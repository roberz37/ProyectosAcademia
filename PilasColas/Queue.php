<?php
require_once("Stack.php");

class Queue {
    // private $array=array();
    private $stack;
    private $aux;

    public function __construct(){
        $this->stack= new Stack;
        $this->aux= new Stack;
    }


    public function put($element){
        $this->stack->push($element);
        // $this->array[]=$element;
        return true;
    }

    public function get(){
        
        while(!$this->stack->empty()){
            $this->aux->push($this->stack->pop());     
        }

        $result=  $this->aux->pop();
        
        while(!$this->aux->empty()){
            $this->stack->push($this->aux->pop());     
        }
        return $result;

    }

    public function size(){
        $contador=0;
        while(!$this->stack->empty()){
            $this->aux->push($this->stack->pop()); 
            $contador++;   
        }
        
        while(!$this->aux->empty()){
            $this->stack->push($this->aux->pop());     
        }

        return $contador;
    }


}