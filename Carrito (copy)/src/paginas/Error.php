<?php

namespace Carrito\paginas;

class Error{
    public function get($get, $post, &$session){
        $te= new \Library\TemplateEngine("../templates/error.template");
        return $te->render();


    }

    public function post($get, $post, $session){}
}