<?php
namespace Carrito\paginas;

session_start();
class Home{
    public function mostrar(){
        $te=new \Library\TemplateEngine("../templates/toIndex.template");
        $te->addVariable("head", "Medias Para Todos");
        $te->addVariable("titulo", "TusMedias.com");
        $te->addVariable("subtitulo", "Ingresa para encontrar las mejores ofertas.");

        return $te->render();

    }
}

