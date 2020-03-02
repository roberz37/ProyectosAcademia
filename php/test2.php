<?php
function esta_en($array, $elemento){
    $i=0;
    while ($i < count($array)){
        if ($array[$i]==$elemento){
            return True;
        }
        $i=$i+1;
    }
    return False;
}

function comprar_figurita($cant_fig_album){
    $figurita= random_int(0, $cant_fig_album-1);
    return $figurita;
}

function cuantas_figus($figus_total){
    $i=0;
    $album=array();
    while ($i < $figus_total){
        $album[]= 0;
        $i=$i+1;
    }
    $contador=0;
    while (esta_en($album, 0)){
        $figu=comprar_figurita($figus_total);
        $album[$figu]=1;
        $contador=$contador+1;
    }
    return $contador;
}

function n_repeticiones($numero_repeticiones, $figus_totales){
    $i=0;
    $lista= array();
    while($i<$numero_repeticiones){
        $lista[]=cuantas_figus($figus_totales);
        $i=$i+1;
    }
    return array_sum($lista)/count($lista);
}

function generar_paquete ($figus_total,$figus_paquete){
    $i=0;
    $paquete=array();
    while ($i < $figus_paquete){
        $paquete[]= comprar_figurita($figus_total);
        $i=$i+1;
    }
    return $paquete;
}

function cuantos_paquetes($figus_total, $figus_paquete){
    $i=0;
    $Album=array();
    $contador=0;
    while ($i<$figus_total){
        $album[]= 0;
        $i=$i+1;
    }
    while (esta_en($album, 0)){
        $paquete=array();
        $paquete=generar_paquete($figus_total, $figus_paquete);
        $j=0;
        while ($j < $figus_paquete){
            $album[$paquete[$j]]=1;
            $j=$j+1;
        }
        $contador=$contador+1;
    }
    return $contador;
}

function n_repeticiones_paquetes($figus_total, $numero_repeticiones){
    $i=0;
    $paquetes=array();
    while ($i < $numero_repeticiones){
        $paquetes[]=cuantos_paquetes($figus_total, 5);;
        $i=$i+1;
    }
    return array_sum($paquetes)/count($paquetes);
}

n_repeticiones(6, 266);

print_r(n_repeticiones_paquetes(266,6));
