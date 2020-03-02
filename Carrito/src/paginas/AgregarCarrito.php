<?php

namespace Carrito\paginas;
session_start();

class AgregarCarrito{
    public function mostrar(){
    

    if (!$_SESSION['logueado']){
        header("Location: ./index.php?page=error");
    }
    if (empty($_SESSION['carrito'])){
        $_SESSION['carrito']=array();
    }
    
    $_SESSION['carrito'][]=$_GET['id'];

    header("Location: ./index.php?page=listaproductos");
    }
}