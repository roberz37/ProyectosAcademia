<?php

include_once("../vendor/autoload.php");
session_start();

$router= new \Library\Router();

$route= $router->addRoute('home', new Carrito\paginas\Home());


$route= $router->addRoute('listaproductos', new Carrito\paginas\CheckLogin(new \Carrito\paginas\ListaProductos));


$route= $router->addRoute('agregarcarrito', new Carrito\paginas\AgregarCarrito);
$route= $router->addRoute('vercarrito', new Carrito\paginas\CheckLogin(new Carrito\paginas\VerCarrito));
$route= $router->addRoute('logout', new Carrito\paginas\Logout);
$route= $router->addRoute('error', new Carrito\paginas\Error);
$route= $router->addRoute('sacarcarro', new Carrito\paginas\SacarCarro);


$pagina=$router->match($_GET['page']);
if($_SERVER['REQUEST_METHOD']=="POST"){
    echo $pagina->post($_GET, $_POST, $_SESSION);
} else {
    echo $pagina->get($_GET, $_POST, $_SESSION);
}