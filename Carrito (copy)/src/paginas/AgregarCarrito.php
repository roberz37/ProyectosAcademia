<?php

namespace Carrito\paginas;
session_start();

class AgregarCarrito implements \Interfaces\Controller{
    
    public function get($get, $post, &$session){
        if (!$session['logueado']){
            header("Location: ./index.php?page=error");
        }
        if (empty($session['carrito'])){
            $session['carrito']=array();
        }
        $session['carrito'][]=$get['id'];
        header("Location: ./index.php?page=listaproductos");
        }

    public function post($get, $post, &$session){}
}