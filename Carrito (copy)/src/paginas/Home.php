<?php
namespace Carrito\paginas;


session_start();

class Home implements \Interfaces\Controller{
    
    public function get($get, $post, &$session){
        
        $te=new \Library\TemplateEngine("../templates/toIndex.template");
        $te->addVariable("head", "Medias Para Todos");
        $te->addVariable("titulo", "TusMedias.com");
        $te->addVariable("subtitulo", "Ingresa para encontrar las mejores ofertas.");

        return $te->render();
    }
    public function post($get, $post, &$session){
        $usuarios=array("fulano"=>"mengano", "weednewbie"=>"yo");

        foreach ($usuarios as $usuario => $clave) {
            if ($post['usuario']===$usuario and $post['clave']===$clave){
                $session['logueado']=true;
            }
        }
        if ($session['logueado']){
            header("Location: ./index.php?page=listaproductos");
        } else {
            header("Location: ./index.php?page=error");
        }
    }
    
}

