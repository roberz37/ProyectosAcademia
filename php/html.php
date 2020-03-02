<?php  

interface Dibujable {
    public function dibujate();
}
interface Categorizable{
    public function verCategoria();
}
class Header implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=3;
    
    public function guardar(Categorizable $contenido){
        if ($this->categoria>$contenido->verCategoria()){
            $this->contenido[]= $contenido;
        };
    }
    public function dibujate(){
        echo "<head>";
        foreach($this->contenido as $valor) {
            $valor->dibujate();
        }
        echo "</head>";
    }
    public function verCategoria(){
        return $this->categoria;
    }
      
}
class Body implements Dibujable, Categorizable{
    private $contenido=array();
    private $categoria=3;

    public function guardar(Categorizable $contenido){
        if ($this->categoria>$contenido->verCategoria()){
            $this->contenido[]= $contenido;
        };
    }
    public function dibujate(){
        echo "<body>\n";
        foreach($this->contenido as $valor) {;
            $valor->dibujate();
        }
        echo "</body>";
    }
    public function verCategoria(){
        return $this->categoria;
    }
        
}
class H1 implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=2;

    public function __construct($contenido){
        $this->contenido= $contenido;        
    }

    public function dibujate(){
        echo "<h1>".$this->contenido."</h1>";
    }
    public function verCategoria(){
        return $this->categoria;
    }

}
class Title implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=1;

    public function __construct($contenido){
        $this->contenido= $contenido;        
    }

    public function dibujate(){
        echo "<title>".$this->contenido."</title>";
    }
    public function verCategoria(){
        return $this->categoria;
    }

}
class P implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=1;

    public function __construct($contenido){
        $this->contenido= $contenido;        
    }

    public function dibujate(){
        echo "<p>".$this->contenido."</p>";
    }
    public function verCategoria(){
        return $this->categoria;
    }

}
class Html implements Dibujable, Categorizable{
    private $contenido=array();
    private $categoria=4;

    public function guardar(Categorizable $contenido){
        if ($this->categoria>$contenido->verCategoria()){
            $this->contenido[]= $contenido;
        }
    }
    public function dibujate(){
        echo "<html>";
        foreach($this->contenido as $valor) {
            $valor->dibujate();
        }
        echo "</html>";
    }
    public function verCategoria(){
        return $this->categoria;
    }
        
}
class Image implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=1;
    public function __construct($contenido){
        $this->contenido= $contenido;        
    }
    
    public function dibujate(){
        echo "<IMG SRC=".$this->contenido."><br /><br />";
    }
    public function verCategoria(){
        return $this->categoria;
    }
    

}
class Enlace implements Dibujable, Categorizable{
    private $contenido;
    private $categoria=1;
    public function __construct($contenido){
        $this->contenido= $contenido;        
    }
    
    public function dibujate(){
        echo "<a href= ".$this->contenido.">Pagina Oficial Casla</a>";
    }
    public function verCategoria(){
        return $this->categoria;
    }
    

}



$html= new Html;
$cabeza= new Header;
$body= new Body;
$h1= new H1("A levantar los escalones en Boedo");
$p= new P("Vamos ciclón<br />
De la cuna te llevo<br />
Dentro de mi corazón<br /><br />

Sos mi razón<br />
Nada tiene sentido<br />
Si un dia no estoy con vos<br /><br />

Por eso te sigo en las buenas y en las malas<br />
Ganes o pierdas a mi no me importa nada<br />
Porque a pesar de todo lo que hemos pasado<br />
Mi San Lorenzo querido, siempre estare a tu lado.<br /><br />

Hay una cosa que nunca van a enteder<br />
Que La Gloriosa va a copar donde jugues<br />
Esta tu gente la que se bancó el descenso<br />
La que impidió que se vendiera San Lorenzo<br /><br />

Pero hay un sueño que aun me queda por lograr<br />
Ya falta menos y nada me puede parar<br />
Yo te prometo que muy pronto volveremos<br />
A levantar los escalones en Boedo<br /><br />");
$title= new Title("CASLA");
$img= new Image("casla.jpg");
$link= new Enlace("https://sanlorenzo.com.ar/");
$body->guardar($h1);
$body->guardar($p);
$body->guardar($img);
$body->guardar($link);
$cabeza->guardar($title);
$html->guardar($cabeza);
$html->guardar($body);
$html->dibujate();



