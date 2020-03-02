<?php

namespace BLibrary;

class CheckLogin{
    
    private $pagina;
    
    public function __construct($pagina){
        $this->pagina=$pagina;
    }
    
    public function get($get, $post, &$session){
        if ($session['logueado']==true){
            return $this->pagina;
        } else {
            return "Acceso denegado";
        }
    }
    public function post($get, $post, &$session){
        if ($session['logueado']==true){
            return $this->pagina;
        } else {
            return "Acceso denegadopor post";
        }
    }
}