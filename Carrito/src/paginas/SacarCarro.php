<?php

namespace Carrito\paginas;
session_start();

class SacarCarro{    
    
    public function mostrar(){
        foreach ($_SESSION['carrito'] as $id=>$producto){
            if($_SESSION['carrito'][$id]==$_GET['id']){
                unset($_SESSION['carrito'][$id]);break;
            }
        }
    
        header("Location: ./index.php?page=vercarrito");
    }
}
