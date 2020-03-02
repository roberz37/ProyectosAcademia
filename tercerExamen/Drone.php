<?php
/*Hay que simular el movimiento de un drone. El drone solo se puede mover en linea recta y por cada 
casillero que se mueve gasta 1 de bateria (la bateria empieza es 100). No puede moverse en diagonal, 
si estas en el (0,0) y te mueves al (1,1) devuelve false la funcion. Cuando el drone pasa por la posición 
(0,0) la bateria se le recarga.
El drone arranca en la posición (0,0)

Drone:
- __contruct(); (puede no estar)
- mover(x, y); Bool (a donde se mueve, devuelve true o false)
- batery(); int (me dice la bateria restante)
- position(); array (te devuelve un array con x e y en la primera y segunda posicion)

Esto hay que programarlo y hacer los tests.*/
class Drone {
    private $batery;
    private $positionX;
    private $positionY;


    public function __construct(){
        $this->batery=100;
        $this->positionX=0;
        $this->positionY=0;
    }
    public function position(){
        $result= array(0=>$this->positionX, 1=>$this->positionY);
        return $result;
    }
    public function move($x, $y){
        if (($x+1==$this->positionX || $x-1==$this->positionX) and $y==$this->positionY){
            $this->positionX= $x;
            $this->batery--;
            if ($this->positionX==0 and $this->positionY==0){
                $this->batery=100;
            }
            return true;
        }
        if (($y+1==$this->positionY || $y-1==$this->positionY) and $x==$this->positionX){
            $this->positionY= $y;
            $this->batery--;
            if ($this->positionX==0 and $this->positionY==0){
                $this->batery=100;
            }
            return true;
        }
        return false;

    }

    public function batery(){
        return $this->batery;
    }



}