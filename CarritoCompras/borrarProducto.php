<?php
session_start();

foreach ($_SESSION['carrito'] as $id=>$producto) {
    if($_SESSION['carrito'][$id]==$_GET['id']){
        unset($_SESSION['carrito'][$id]);break;
    }
}

header("Location: ./verCarrito.php");


