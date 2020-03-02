<?php
function crear_mazo($n) {
  $mazo = array();
  $k = 0;
  while ($k<$n){
    $i = 1;
    while ($i<=13) {
      $j = 1;
      while ($j <= 4) {
        $mazo[] = $i;
        $j=$j+1;
      }
      $i=$i+1;
    }
    $k = $k+1;
  }
  shuffle($mazo);
  return $mazo;
}
function jugar(&$un_mazo){
    $resultado=0;
    while ($resultado < 21 and count($un_mazo) > 0){
        $auxiliar= array_pop($un_mazo);
        $resultado=$resultado+$auxiliar;
        if (count($un_mazo)-1==0){
            $resultado=0;
        }
    }
    return $resultado;
}
function jugar_varios(&$un_mazo, $cantidad_jugadores){
    $i=0;
    $resultados= array();
    while ($i < $cantidad_jugadores){
        $resultados[]= jugar($un_mazo);
        $i=$i+1;
    }
    return $resultados;
}
function quien_gano($una_lista){
    $i=0;
    $resultados=array();
    while ($i< count($una_lista)){    //replantear
        if ($una_lista[$i]==21){
            $resultados[]= 1;
        }else{
            $resultados[]=0;
        }
            $i=$i+1;
    }
    return $resultados;
}    
function experimentar($repeticiones, $cant_jugadores){
    $j=0;
    $i=0;
    $mazo=array();
    $cantidad_ganados=array();
    while ($j< $cant_jugadores){
        $cantidad_ganados[]=0;
        $j=$j+1;
    }        
    while ($i < $repeticiones){
        $mazo=crear_mazo(1);   
        $resultados_primarios=jugar_varios($mazo, $cant_jugadores);
        $resultados = quien_gano($resultados_primarios);    
        $k=0;
        while ($k < $cant_jugadores){
            if ($resultados[$k] == 1){
                $cantidad_ganados[$k]=$cantidad_ganados[$k]+1;
            }
            $k=$k+1;
        }
        $i=$i+1;
    }
    return $cantidad_ganados;
}

$mazos = crear_mazo(5);
//print_r($mazos);
$jugadas=array();
$jugadas=jugar_varios($mazos, 5);
print_r($jugadas);
