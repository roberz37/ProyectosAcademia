<?php

namespace Carrito\paginas;
session_start();
class Logout{
    public function get($get,$post,&$session){
        
        session_destroy();

        header("Location: ./index.php?page=home");
    }
    public function post($get, $post, &$session){}
}