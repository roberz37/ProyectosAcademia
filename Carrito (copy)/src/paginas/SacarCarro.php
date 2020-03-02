<?php

namespace Carrito\paginas;
session_start();

class SacarCarro{    
    
    public function get($get, $post, &$session){
        if (!$session['logueado']){
            header("Location: ./index.php?page=error");
        }
        foreach ($session['carrito'] as $id=>$producto){
            if($session['carrito'][$id]==$get['id']){
                unset($session['carrito'][$id]);break;
            }
        }
    
        header("Location: ./index.php?page=vercarrito");
    }
    public function post($get, $post, &$session){}
}
