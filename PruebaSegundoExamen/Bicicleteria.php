<?php


/**
 * Cantidad de bicicletas te dice cuantas bicicletas podes armar.
 * Para armar una bicicleta necesitas 2 ruedas, 1 cuadro y 1 volante.
 */
class Bicicleteria {
    private $ruedas=0;
    private $cuadros=0;
    private $volantes=0;


  public function __construct() {
  }

  public function agregarRuedas($cantidad) {

    $this->ruedas=$this->ruedas+$cantidad;
  }

  public function sacarRuedas($cantidad) {
    if ($this->ruedas<$cantidad){
      return false;
    }
    $this->ruedas=$this->ruedas-$cantidad;
  }

  public function agregarCuadro($cantidad) {
    $this->cuadros=$this->cuadros+$cantidad;
  }

  public function sacarCuadro($cantidad) {
    if ($this->ruedas<$cantidad){
      return false;
    }
    $this->cuadros=$this->cuadros-$cantidad;
  }

  public function agregarVolante($cantidad) {
    $this->volantes=$this->volantes+$cantidad;
  }

  public function sacarVolante($cantidad) {
    if ($this->ruedas<$cantidad){
      return false;
    }
    $this->volantes=$this->volantes-$cantidad;
  }

  public function cantidadBicicletas() {
    $bicicletas=0;
    $ruedas= $this->ruedas;
    $cuadros= $this->cuadros;
    $volantes= $this->volantes;
    while ($ruedas>1 && $cuadros>0 && $volantes>0){
      $ruedas=$ruedas-2;
      $cuadros--;
      $volantes--;
      $bicicletas++;
    }
    return $bicicletas;
  }
}