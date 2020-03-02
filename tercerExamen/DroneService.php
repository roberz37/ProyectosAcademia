<?php
/*
La segunda parte, es un catalogo de Drones (es una clase distinta y no tiene nada que ver con la anterior). 
Es para usar con mongodb, asique es un service igual que hicimos el otro día y recibe la collection donde va a 
guardar los drones.
Los drones son array con información que es la siguiente (no es necesario la clase Model como hicimos en Tuiter):

Drone:
- Nombre (este es el id)
- Precio
- color
- modelo (año de fabricación)

DroneService
- __construct(collection)
- register( $nombre, $precio, $color, $modelo); Bool
- delete($nombre); Bool (el nombre es único como hicimos con las cuentas de usuario en Tuiter)
- list(); array (devuelve un array con todos los drones, osea es un array de arrays)
*/

use MongoDB\Collection;

class DroneService {

    private $collection;

    public function __construct($collection){
        $this->collection= $collection;
    }

    public function register($nombre, $precio, $color, $modelo){
        
        $drone= $this->collection->findOne(array('nombre'=> $nombre));
        if ($drone['nombre']==$nombre){
            return false;
        }
        $drones= array();
        $drones['nombre']= $nombre;
        $drones['precio']= $precio;
        $drones['color']=$color;
        $drones['modelo']=$modelo;
        $this->collection->insertOne($drones);
        return true;
    }
    public function delete($nombre){
        $drone= $this->collection->findOne(array('nombre'=> $nombre));
        if (!empty($drone)){
            $this->collection->deleteOne(['nombre' => $nombre]);
            return true;
        }
        return false;

    }
    public function list(){
        $drone= $this->collection->find(array());
        $result = array();
        $aux= array();
        foreach ($drone as $value) {
            $aux['nombre']= $value['nombre'];
            $aux['precio']= $value['precio'];
            $aux['color']= $value['color'];
            $aux['modelo']= $value['modelo'];
                
            $result[]=$aux;
        }        
        return $result;

    }
}
