<?php
class Calculadora {
  
  function sumar($a, $b) {
    return $a + $b;
  }
  
  function restar($a, $b) {
    return $this->sumar($a, (-1)*$b);
  }
  
  function dividir($a, $b) {
    $resultado = 0;
    $flag=1;
    if ($b==0){
        return 1;
    }
    if ($a<0 and $b<0){
        $a=$a*-1;
        $b=$b*-1;
        $flag=1;
    }else if ($a<0 or $b<0){
        if ($a<0){
            $a=$a*-1;
            $flag=-1;
        } else {
            $b=$b*-1;
            $flag=-1;
        }  
    }
    while(($a - $b) >= 0) {
      $a = $a - $b;
      $resultado = $resultado + 1;
    }
    if($flag==-1){
        return $resultado*-1;;
    }
    
    return $resultado;
  }
  
  function multiplicar($a, $b) {
    if ($a==0 or $b==0){
        return 0;
    }
    $resultado = 0;
    while ($b>0) {
      $resultado = $resultado+$a;
      $b = $b-1;
    }
    return $resultado;
  }
}