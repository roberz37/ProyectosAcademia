<?php

namespace Carrito\paginas;

class Error{
    public function mostrar(){
        $te= new \Library\TemplateEngine("../templates/error.template");
        return $te->render();


    }
}