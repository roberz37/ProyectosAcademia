<?php

function generarBosqueVacio($tamanoBosque){
    $i=0;
    $bosqueVacio=array();
    while ($i < $tamanoBosque){
        $bosqueVacio[]=0;
        $i=$i+1;
    }
    return $bosqueVacio;
}

function sucesoAleatorio($probabilidad){
    $resultado = random_int(0,10);
    if ($resultado < $probabilidad*10){
        return True;
    }
    return False;
}

function brotes($bosqueASembrar, $probabilidad){
    $i=0;
    while ($i < count($bosqueASembrar)){
        if (sucesoAleatorio($probabilidad)){
            $bosqueASembrar[$i]=1;
        }
        $i=$i+1;
    }
    return $bosqueASembrar;
}

function cuantos($bosque, $tipoCelda){
    $contador=0;
    foreach ($bosque as $k => $v){
        if ($bosque[$k]==$tipoCelda){
            $contador=$contador+1;
        }
    }
        return $contador;
}
function rayos($bosque, $probRayos){
    $i=0;
    while ($i < count($bosque)){
        $resultado = random_int(0,10);
        if ($resultado < ($probRayos*10) and $bosque[$i]==1){
            $bosque[$i]=-1;
        }
        $i=$i+1;
    }
    return $bosque;
}

function propagacion($bosque){
    $i=0;
    while ($i < count($bosque)-1){
        $j=$i;
        if ($bosque[$i]==-1 and $bosque[$i+1]==1){
            $bosque[$i+1]=-1;
        }
        while ($bosque[$j]==-1 and $bosque[$j-1]==1 and $j>0){
            $bosque[$j-1]=-1;
            $j=$j-1;        
        }
        $i=$i+1;
    }
    return $bosque;
}

function limpieza($bosque){
    $i=0;
    while ($i < count($bosque)){
        if ($bosque[$i]==-1){
            $bosque[$i]=0;
        }
        $i=$i+1;
    }
    return $bosque;
}

function animar_etapa($bosque){
    foreach ($bosque as $k => $v){
        if ($bosque[$k] == 1){
            $bosque[$k] = "\U0001F332";
        }else if($bosque[$k] == -1){
            $bosque[$k] = "\U0001F525";
        } else if ($bosque[$k] == 0){
            $bosque[$k] = " ";
        }
    }
    return $bosque;
  
}
function implementacionBosque($tamanoBosque, $probabilidadBrotes, $probabilidadRayos){
    $bosqueVacio= generarBosqueVacio($tamanoBosque);
    $bosque=brotes($bosqueVacio,0.6);    
    $bosque= rayos($bosque, $probabilidadRayos);
    $bosque= propagacion($bosque);
    $bosque= limpieza($bosque);
    return $bosque;
}



$bosqueVacio= implementacionBosque(5, 0., 0);
print_r($bosqueVacio);