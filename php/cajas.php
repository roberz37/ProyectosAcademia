<?php  

interface Guardable {
    public function mostrarDimension();
}
interface Mostrable {
    public function mostrar();
}

class Caja implements Guardable, Mostrable {
    private $contenido=array();
    private $capacidad;
    private $tamano;
    public function __construct($tamano){
        $this->capacidad=$tamano-2;
        $this->tamano=$tamano;
    }
    
    
    public function guardar(Guardable $obj) {
        if ($obj->mostrarDimension()<= $this->capacidad){
            $this->contenido[] = $obj;
            $this->capacidad=$this->capacidad-$obj->mostrarDimension();
        }
        
    }
    public function mostrar() {
        echo "Estoy en una caja:\n";
        foreach($this->contenido as $valor) {
            $valor->mostrar();
        }
    }
    public function mostrarDimension(){
        return $this->tamano;
    }

    public function mostrarCapacidad(){
        echo $this->capacidad."\n";
    }

    

}
class Bici implements Guardable, Mostrable{
    private $tamano=5;
    public $nombre = "Bici";
    public function mostrar() {
        echo $this->nombre."\n";
    }
    public function mostrarDimension(){
        return $this->tamano;
    }
}
class Auto implements Guardable, Mostrable {
    private $tamano=10;
    public function mostrar() {
        echo "Auto\n";
    }
    public function mostrarDimension(){
        return $this->tamano;
    }
}


$miCaja= new Caja(50);
$bici= new Bici;
$auto= new Auto;
$nuevaCaja= new Caja(12);
$miCaja->guardar($bici);
$miCaja->guardar($bici);
$miCaja->guardar($auto);
$nuevaCaja->guardar($auto);
$miCaja->guardar($nuevaCaja);
$nuevaCaja->guardar($bici);
$miCaja->mostrar();
$miCaja->mostrarCapacidad();
$nuevaCaja->mostrarCapacidad();




