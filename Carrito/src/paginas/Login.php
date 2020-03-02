<?php
namespace Carrito\paginas;

session_start();
class Login {

    public function mostrar(){
        $usuarios=array("fulano"=>"mengano", "weednewbie"=>"yo");

        foreach ($usuarios as $usuario => $clave) {
            if ($_POST['usuario']===$usuario and $_POST['clave']===$clave){
                $_SESSION['logueado']=true;
            }
        }
        if ($_SESSION['logueado']){
            header("Location: ./index.php?page=listaproductos");
        } else {
            header("Location: ./index.php?page=error");
        }
    }
}