<?php

include_once("../vendor/autoload.php");
session_start();

// if($_GET['page']=="vercarrito"){
//     $pagina = new Carrito\paginas\VerCarrito();
//     echo $pagina->mostrar();
// }

// // if($_GET['page']=="home"){
// //     $pagina = new Carrito\paginas\Home();
// //     echo $pagina->mostrar();
// // }

// if($_GET['page']=="login"){
//     $pagina = new Carrito\paginas\Login();
//     echo $pagina->mostrar();
// }
// if($_GET['page']=="listaproductos"){
//     $pagina = new Carrito\paginas\ListaProductos();
//     echo $pagina->mostrar();
// }
// if($_GET['page']=="agregarcarrito"){
//     $pagina = new Carrito\paginas\AgregarCarrito();
//     echo $pagina->mostrar();
// }
// if($_GET['page']=="sacarcarro"){
//     $pagina = new Carrito\paginas\SacarCarro();
//     echo $pagina->mostrar();
// }
// if($_GET['page']=="logout"){
//     $pagina = new Carrito\paginas\Logout();
//     echo $pagina->mostrar();
// }
// if($_GET['page']=="error"){
//     $pagina = new Carrito\paginas\Error();
//     echo $pagina->mostrar();
// }



$router= new \Library\Router();

$route= $router->addRoute('home', new Carrito\paginas\Home());
$route= $router->addRoute('login', new Carrito\paginas\Login);
$route= $router->addRoute('listaproductos', new Carrito\paginas\ListaProductos);
$route= $router->addRoute('agregarcarrito', new Carrito\paginas\AgregarCarrito);
$route= $router->addRoute('vercarrito', new Carrito\paginas\VerCarrito);
$route= $router->addRoute('logout', new Carrito\paginas\Logout);
$route= $router->addRoute('error', new Carrito\paginas\Error);
$route= $router->addRoute('sacarcarro', new Carrito\paginas\SacarCarro);

if (!empty($router->match($_GET['page']))){
    $pagina=$router->match($_GET['page']);
    echo $pagina->mostrar();
}