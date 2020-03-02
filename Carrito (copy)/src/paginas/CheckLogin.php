<?php
namespace Carrito\paginas;
use Interfaces\Controller;

class CheckLogin implements \Interfaces\Controller {
    
    private $pagina;
    
    public function __construct(Controller $pagina){
        $this->pagina=$pagina;
    }
    
    public function get($get, $post, &$session){
        if ($session['logueado']==true){
            return $this->pagina->get($get, $post, $session);
        } else {
            return "Acceso denegado";
        }
    }
    public function post($get, $post, &$session){
        if ($session['logueado']==true){
            return $this->pagina->get($get, $post, $session);
        } else {
            return "Acceso denegadopor post";
        }

    }

}