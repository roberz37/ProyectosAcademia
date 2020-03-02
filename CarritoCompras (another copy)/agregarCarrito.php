<?php
session_start();
if (!$_SESSION['logueado']){
    header("Location: ./error.php");
}
if (empty($_SESSION['carrito'])){
    $_SESSION['carrito']=array();
}
    
$_SESSION['carrito'][]=$_GET['id'];

header("Location: ./listaProductos.php");