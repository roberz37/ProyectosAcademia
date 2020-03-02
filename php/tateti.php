<?php
function crearTablero($filas, $columnas){
    $tablero=array();
    for ($i=0; $i<$filas;$i++){
        $tablero[$i]=array();
        for ($j=0; $j<$columnas;$i++{
            $tablero[$i][$j]=0;
        }
    }
    return $tablero;
}