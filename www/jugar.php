<?php
include_once("Ahorcado.php");
session_start();

if (empty($_SESSION['letras'])){
    $_SESSION['letras']= array();
}

    $_SESSION['letras'][]= $_GET['letra'];

$ahorcado=new Ahorcado($_SESSION['palabra'], $_SESSION['vidas']+1);

if ($ahorcado->perdi()!= true){
foreach ($_SESSION['letras'] as $key => $letra) {
    $ahorcado->jugar($letra);
}

echo "<pre>";
echo $ahorcado->mostrar();

if ($ahorcado->gane()){
    echo "<br>";
    print("Ganaste. Termino el juego.");
}


echo "</pre>";
}
echo "Termino el juego. Perdiste"
?>
<a href="http://localhost:8080/jugar.php?letra=a">a</a>
<a href="http://localhost:8080/jugar.php?letra=b">b</a>
<a href="http://localhost:8080/jugar.php?letra=c">c</a>
<a href="http://localhost:8080/jugar.php?letra=d">d</a>
<a href="http://localhost:8080/jugar.php?letra=e">e</a>
<a href="http://localhost:8080/jugar.php?letra=f">f</a>
<a href="http://localhost:8080/jugar.php?letra=g">g</a>
<a href="http://localhost:8080/jugar.php?letra=h">h</a>
<a href="http://localhost:8080/jugar.php?letra=i">i</a>
<a href="http://localhost:8080/jugar.php?letra=j">j</a>
<a href="http://localhost:8080/jugar.php?letra=k">k</a>
<a href="http://localhost:8080/jugar.php?letra=l">l</a>
<a href="http://localhost:8080/jugar.php?letra=m">m</a>
<a href="http://localhost:8080/jugar.php?letra=n">n</a>
<a href="http://localhost:8080/jugar.php?letra=o">o</a>
<a href="http://localhost:8080/jugar.php?letra=p">p</a>
<a href="http://localhost:8080/jugar.php?letra=q">q</a>
<a href="http://localhost:8080/jugar.php?letra=r">r</a>
<a href="http://localhost:8080/jugar.php?letra=s">s</a>
<a href="http://localhost:8080/jugar.php?letra=t">t</a>
<a href="http://localhost:8080/jugar.php?letra=u">u</a>
<a href="http://localhost:8080/jugar.php?letra=v">v</a>
<a href="http://localhost:8080/jugar.php?letra=w">w</a>
<a href="http://localhost:8080/jugar.php?letra=x">x</a>
<a href="http://localhost:8080/jugar.php?letra=y">y</a>
<a href="http://localhost:8080/jugar.php?letra=z">z</a>
