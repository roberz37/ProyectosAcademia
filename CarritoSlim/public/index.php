<?php
session_start();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/index.php', function (Request $request, Response $response, array $args) {
    $te= new \Library\TemplateEngine('../templates/toIndex.template');
    $te->addVariable("head", "Medias Para Todos");
    $te->addVariable("titulo", "TusMedias.com");
    $te->addVariable("subtitulo", "Ingresa para encontrar las mejores ofertas.");
    
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/index.php', function (Request $request, Response $response, array $args) {
    $usuarios=array("fulano"=>"mengano", "weednewbie"=>"yo");

        foreach ($usuarios as $usuario => $clave) {
            if ($_POST['usuario']===$usuario and $_POST['clave']===$clave){
                $_SESSION['logueado']=true;
            }
        }
        if ($_SESSION['logueado']){
            $response=$response->withStatus(302);
            $response=$response->withHeader("Location","/listaproductos");
            return $response;
        } else {
            $response=$response->withStatus(302);
            $response=$response->withHeader("Location","/error");
            return $response;
        }
});

$app->get('/listaproductos', function (Request $request, Response $response, array $args) {
    if (!$_SESSION['logueado']){
        $response= $response->withStatus(302);
        $response= $response->withHeader("Location","/error");
            return $response;
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
    $response->getBody()->write($te->render());
    return $response;
});
$app->get('/error', function (Request $request, Response $response, array $args) {
    $te= new \Library\TemplateEngine("../templates/error.template");
    $response->getBody()->write($te->render());
    return $response;
});

$app->get('/agregarcarrito/{id}/', function (Request $request, Response $response, array $args) {
    $id = $args['id'];
    if (!$_SESSION['logueado']){
        $response= $response->withStatus(302);
        $response= $response->withHeader ("Location", "/error");
        return $response;
    }
    if (empty($_SESSION['carrito'])){
        $_SESSION['carrito']=array();
    }
    $_SESSION['carrito'][]=$id;
    $response=$response->withStatus(302);
    $response=$response->withHeader("Location","/listaproductos");
    return $response;
});

$app->get('/vercarrito', function (Request $request, Response $response, array $args) {    
    if (!$_SESSION['logueado']){
        $response= $response->withStatus(302);
        $response= $response->withHeader("Location","/error");
        return $response;
    }
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
    if (empty($_SESSION['carrito'])){
        $_SESSION['carrito']=array();
    }
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
        
    $response->getBody()->write($te->render());
    return $response;
});

$app->get('/logout', function (Request $request, Response $response, array $args) {
    session_destroy();
    $response= $response->withStatus(302);
    $response= $response->withHeader("Location", "/index.php");
    return $response;
});
$app->get('/sacarcarrito/{id}/', function (Request $request, Response $response, array $args) {
    $idArgs = $args['id'];

    if (!$_SESSION['logueado']){
        $response=$response->withStatus(302);
        $response=$response->withoutHeader("Location", "/error");
        return $response;
        
    }
    foreach ($_SESSION['carrito'] as $id=>$producto){
        if($_SESSION['carrito'][$id]==$idArgs){
            unset($_SESSION['carrito'][$id]);break;
        }
    }
    $response=$response->withStatus(302);
    $response=$response->withHeader("Location","/vercarrito");
    return $response;
});

$app->run();