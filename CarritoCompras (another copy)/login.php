<?php

session_start();

$usuarios=array("fulano"=>"mengano", "weednewbie"=>"yo");

foreach ($usuarios as $usuario => $clave) {
    if ($_POST['usuario']===$usuario and $_POST['clave']===$clave){
        $_SESSION['logueado']=true;
    }
}
if ($_SESSION['logueado']){
    header("Location: ./listaProductos.php");
} else {
    header("Location: ./error.php");
}
