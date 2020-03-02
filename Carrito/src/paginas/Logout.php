<?php

namespace Carrito\paginas;

class Logout{
    public function mostrar(){
        session_start();
        session_destroy();

        header("Location: ./index.php?page=home");


    }
}