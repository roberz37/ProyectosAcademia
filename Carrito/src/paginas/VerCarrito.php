<?php


namespace Carrito\paginas;

class VerCarrito {
    public function mostrar(){
    
        $listaProductos=array(  "1"=>array("nombre"=>"Medias Altas", "precio"=>"100"),
                            "2"=>array("nombre"=>"Medias Bajas", "precio"=>"50"),
                            "3"=>array("nombre"=>"Medias Cancan", "precio"=>"125"),
                            "4"=>array("nombre"=>"Medias Soquetes", "precio"=>"50"),
                            "5"=>array("nombre"=>"Medias Medias", "precio"=>"75"),
                            "6"=>array("nombre"=>"Medias Bucaneras", "precio"=>"50"),
                            "7"=>array("nombre"=>"Medias AlFin", "precio"=>"50"));
        $total=0;
        $teProductos= new \Library\TemplateEngine("../templates/detalleProductoEnCarro.template");
        $te=new \Library\TemplateEngine("../templates/verCarrito.template");
        $str="";
        foreach ($_SESSION['carrito'] as $id) {
            foreach ($listaProductos as $key=>$producto) {
                if ($id==$key){
                    $teProductos->addVariable("nombre", $producto["nombre"]);
                    $teProductos->addVariable("precio", $producto["precio"]);
                    $teProductos->addVariable("id", $id);
                    $str.=$teProductos->render();
                    $total+=$producto['precio'];
                }
            }
        }
        
        $te->addVariable("head", "Carro");
        $te->addVariable("titulo", "En tu Carro");
        $te->addVariable("productos", $str);
        $te->addVariable("total", $total);
        return $te->render();

    }

}