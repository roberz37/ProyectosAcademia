<?php

namespace Carrito\paginas;
session_start();

class ListaProductos{
    public function mostrar(){

    if (!$_SESSION['logueado']){
        header("Location: ./index.php?page=error");
    }
    $te=new \Library\TemplateEngine("../templates/listaProductos.template");

    $listaProductos=array(  "1"=>array("nombre"=>"Medias Altas", "precio"=>"100"),
                        "2"=>array("nombre"=>"Medias Bajas", "precio"=>"50"),
                        "3"=>array("nombre"=>"Medias Cancan", "precio"=>"125"),
                        "4"=>array("nombre"=>"Medias Soquetes", "precio"=>"50"),
                        "5"=>array("nombre"=>"Medias Medias", "precio"=>"75"),
                        "6"=>array("nombre"=>"Medias Bucaneras", "precio"=>"50"),
                        "7"=>array("nombre"=>"Medias AlFin", "precio"=>"50"));



    $teProductos= new \Library\TemplateEngine("../templates/detalleProducto.template");

    $str="";
    foreach($listaProductos as $id=> $producto){
        $teProductos->addVariable("nombre", $producto["nombre"]);
        $teProductos->addVariable("precio", $producto["precio"]);
        $teProductos->addVariable("id", $id);
        $str.=$teProductos->render();
    
    }

    $te->addVariable("head", "Medias Para Todos");
    $te->addVariable("titulo", "TusMedias.com");
    $te->addVariable("productos", $str);

    return $te->render();

    }
}
