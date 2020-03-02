<?php
/**
 * =====================================
 * 1 - Cuanto vale $a en los tres casos:
 * =====================================
 */
//a
$a = 10;
function ej1_a() {
  $a = 11;
}
ej1_a();
//cuanto vale a? 
//$a VALE 10;

//b
$b = 10;
function ej1_b() {
  global $b;
  $b = 11;
}
ej1_b();
//cuanto vale b?
//$b VALE 11;

//c
$c = 10;
function ej1_c() {
  $c = 11;
  global $c;
}
ej1_c();
//cuanto vale c?
//$c VALE 10;

//d
$d = 10;
function ej1_d() {
  global $d;
  $d = 11;
}
//cuanto vale d?
//$d VALE 10;

//e
$e = 11;
function ej1_e1() {
  ej1_e2();
  $e = 12;
}
function ej1_e2() {
  global $e;
}
ej1_e1();
//cuanto vale $e?
//$e VALE 11;

//f
for($i=0;$i<2;$i++) {
}
echo $i;
// cuanto vale i?
//$i VALE 1;

//g
// Si dentro de una función queremos acceder
// al valor de una variable que esta fuera, como
// debermos hacerlo? Que diferencia tiene con el
// uso de global?
// PARA PODER ACCEDER DESDE UNA FUNCION A UNA VARIABLE QUE SE ENCUENTRA FUERA DE ELLA DEBEMOS HACER UN PASO
// DE PARAMETROS POR REFERENCIA, ESO SE LOGRA AGREGANDO UN "&" DELANTE DEL PARAMETRO QUE REFERENCIA A LA VARIABLE
// A LA CUAL QUEREMOS ACCEDER.
// LA DIFERENCIA ENTRE ESTA FORMA Y EL USO DE GLOBAL ES QUE EL PASO POR REFERENCIA NOS PERMITE ACCEDER Y/O MODIFICAR 
// EL ESPACIO DE MEMORIA QUE LA VARIABLE ESTA OCUPANDO Y EL USO DE GLOBAL TRANFORMA (ABRE) EL SCOPE DE LA FUNCION RESPECTO 
// A LA VARIABLE EN CUESTION.
/**
 * =====================================
 * 2 - imprimir secuencias con bucles
 * =====================================
 */
//a - Escribir un bucle for y un while donde se
//    imprimen solo los valores impares desde 20 a 0
//    Es decir, 19, 17, 15, 13
// for ($i= 20; $i>=;$i--){
    //     if ($i%2==1){
    //         print($i);
    //     }
    // }
    // $i=19;
    // while($i>0){
    //     print($i);
    //     $i=$i-2;
    // }


//b - Igual al punto a pero en orden inverso salteando de a uno
//    (imprime la mitad de numeros)

// for($i=1;$i<20;$i=$i+2){
//     print($i);
// }
// $i=0;
// while($i<20){
//     if($i%2==1){
//         print($i);
//     }
//     $i=$i+1;
// }


//c - Crear un arreglo de 10 elementos y recorrerlo
//    con un foreach en ambos sentidos
//    (hint: puede usar funciones de array antes de entrar al foreach)

// $arreglo=array(1,2,3,4,5,6,7,8,9);
// foreach ($arreglo as $key => $value) {
//     print($value);
// }
// $arreglo= array_reverse($arreglo);
// foreach ($arreglo as $key => $value) {
//     print($value);
// }

//d - Crear un arreglo de 10 elementos y recorrerlo de ambos sentidos
//    con un for y un while

// $arreglo=array(1,2,3,4,5,6,7,8,9,10);
// for($i=0;$i<count($arreglo);$i++){
//     print($arreglo[$i]);
// }
// $i=0;
// while ($i<count($arreglo)){
//     print($arreglo[$i]);
//     $i=$i+1;

// }
// for($i=count($arreglo)-1;$i>=0;$i--){
//     print($arreglo[$i]);
// }

// $j=count($arreglo)-1;
// while($j>=0){
//     print($arreglo[$j]);
//     $j=$j-1;
// }


/**
 * =====================================
 * 3 - Arreglos
 * =====================================
 */
//a - Crear un arreglo de una dimensión de mil elementos
//    con claves consecutivas

// $arreglo=array();
// for ($i=0;$i<1000;$i++){
//     $arreglo[$i]=$i+1;
// }


//b - Crea un arreglo de 100elementos con claves numericas pero pares
//    Ej: $a[0], $a[2], $a[3] deben existir, $a[1], $a[3] no deben existir

// $a=array();
// for($i=0;$i<100;$i++){
//     if ($i%2==0){
//         $a[$i]=0;
//     }
// }


//c - Si nos pasan un arreglo y no sabemos el contenido, cual suele ser la mejor
//    forma de recorrerlo? Se puede de más formas?

// LA MEJOR FORMA DE RECORRER UN ARRAY DEL CUAL NO SABEMOS EL CONTENIDO ES UTILIZAR EL FOREACH.


//d - Crear una matriz de 10x10

// $arreglo=array();
// for($i=0;$i<10;$i++){
//     $arreglo[$i]=array();
//     for($j=0;$j<10;$j++){
//         $arreglo[$i][$j]=0;
//     }
// }


//e - Podemos crear un "cubo" de 10x10x10 en lugar de una matriz? Crearlo con for o while

// $arreglo=array();
// for($i=0;$i<10;$i++){
//     $arreglo[$i]=array();
//     for($j=0;$j<10;$j++){
//         $arreglo[$i][$j]=array();
//         for($k=0;$k<10;$k++){
//             $arreglo[$i][$j][$k]=0;
//         }
//     }
// }

 
/**
 * =====================================
 * 4 - funciones
 * =====================================
 */
//a - Crear una funcion que dado un arreglo/array duplica todos los valores
$ar = array(1, 2, 3);
ej4_a($ar); // tiene que modificar todos los valores y duplicarlos

// function ej4_a(&$array){
//     for($i=0;$i<count($array);$i++){
//         $array[$i]=$array[$i]*2;
//     }
// }



//b - Crea una funcion que dado un arreglo/array te devuelve un nuevo arreglo
//    con los valores duplicados pero no modifica el original (debe crear un
//    nuevo arreglo)
$ar = array(1, 2, 3);
$newArray = array();
createNewArray($ar, $newArray);

// function createNewArray($array, &$newArray){
//     for($i=0;$i<count($array);$i++){
//         $newArray[$i]=$array[$i]*2;
//     }
// }



//c - De un ejemplo de función recursiva

// function factorialRecursivo ($num){
//     if ($num<=1){
//         return 1;
//     } else {
//         return $num * factorialRecursivo($num-1);
//     }
// }



//d - En este psuedo codigo, puede decirme si anda si lo programaramos en PHP?
//    Que devuelve? Que estamos calculando?
/**
f1( $var1 ) {
  if $var1 > 1{
    return $var1 * f2($var1 - 1)
  }
  return $var1
}
f2( $var2 ) {
  if $var2 > 1{
    return $var2 * f1($var2 - 1)
  }
  return $var2
}
f1(5) // cuanto devuelve?  DEVUELVE 120
      // que esta calculando? ESTA CALCULANDO EL FACTORIAL.



*/
/**
 * =====================================
 * 5 - A desarrollar
 * =====================================
 */
//a - Arregle el siguiente codigo
$a = array(1,2,3);
$b = array(4,5,6);
echo "Las keys del arreglo a son: \n";
foreach ($a as $k=>$v) {
  echo $k . "\n";
}
echo "\n\n";
// duplico todos los elementos sin agregar nuevos
foreach ($b as $k=> $v) {
  $b[$k] = $v*2;
}
/**
 *
 * Teorico - Explicar TDD, dar un ejemplo de porque es util
 *           y nombrar todas las ventajas que le vean
 * 
 * EL TDD TIENE VARIAS UTILIDADES, EN PRIMER LUGAR, NOS PERMITE DESARROLLAR UN CODIGO CON MENOS ERRORES DESDE UN PRINCIPIO.
 * TAMBIEN NOS ENFOCA EN EL COMPORTAMIENTO QUE DEBE REALIZAR LA FUNCION A DESARROLLAR, YA QUE PREVIAMENTE DEBEMOS
 * VISUALIZAR QUE ES LO QUE DEBE DEVOLVERNOS Y QUE PARAMETROS SON NECESARIOS PARA QUE REALICE SU TAREA. EN MI EXPERIENCIA
 * PERSONAL TAMBIEN FUE UTIL AL MOMENTO DE ORGANIZAR MI TRABAJO Y PODER MODULARIZARLO, ADEMAS ME ORGANIZO EN EL SENTIDO
 * DE QUE PERMITIO NO PENSAR EN PASOS POSTERIORES ANTES DE TENER QUE DESARROLLARLOS Y PONER EL 100% DE ATENCION
 * EN LOS PASOS "ACTUALES".  
 * 
 *
 */