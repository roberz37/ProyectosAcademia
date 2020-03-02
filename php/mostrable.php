<?php


interface Mostrable {
    public function mostrar();
}
class Caja implements Mostrable {
    private $contenido = array();
    public function guardar(Mostrable $obj) {
        $this->contenido[] = $obj;
    }
    public function mostrar() {
        echo "Soy el contenido de una caja:\n";
        foreach($this->contenido as $valor) {
            $valor->mostrar();
        }
    }
    public function cantidad() {
        return count($this->contenido);
    }
}
class Bici implements Mostrable{
    public $nombre = "soy una bici";
    public function mostrar() {
        echo $this->nombre."\n";
    }
}
class Auto implements Mostrable {
    public function mostrar() {
        echo "soy auto\n";
    }
}
class EnteroMostrable implements Mostrable {
    public $numero=0;
    public function mostrar() {
        echo $this->numero."\n";
    }
}
$micaja = new Caja();
$numerito = new EnteroMostrable();
$numerito->numero = 10;
$micaja->guardar($numerito);
$segundacaja = new Caja();
$micaja->guardar($segundacaja);
$bici = new Bici();
$auto = new Auto();
$segundacaja->guardar($bici);
$segundacaja->guardar($auto);
echo "La primera caja tiene: ".$micaja->cantidad()."\n";
echo "La segunda caja tiene: ".$segundacaja->cantidad()."\n";