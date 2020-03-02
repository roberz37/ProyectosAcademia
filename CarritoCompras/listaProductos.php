<?php
session_start();

if (!$_SESSION['logueado']){
    header("Location: ./error.php");
}

$listaProductos=array(  "1"=>array("nombre"=>"Medias Altas", "precio"=>"100"),
                        "2"=>array("nombre"=>"Medias Bajas", "precio"=>"50"),
                        "3"=>array("nombre"=>"Medias Cancan", "precio"=>"125"),
                        "4"=>array("nombre"=>"Medias Soquetes", "precio"=>"50"),
                        "5"=>array("nombre"=>"Medias Medias", "precio"=>"75"),
                        "6"=>array("nombre"=>"Medias Bucaneras", "precio"=>"50"),
                        "7"=>array("nombre"=>"Medias pelotudas", "precio"=>"50"),
                        "8"=>array("nombre"=>"Medias Queseyo", "precio"=>"50"),
                        "9"=>array("nombre"=>"Medias Cansadas", "precio"=>"50"),
                        "10"=>array("nombre"=>"Medias NoTerminoMas", "precio"=>"50"),
                        "11"=>array("nombre"=>"Medias Arrugadas", "precio"=>"50"),
                        "12"=>array("nombre"=>"Medias Torcidas", "precio"=>"50"),
                        "13"=>array("nombre"=>"Medias Chotas", "precio"=>"50"),
                        "14"=>array("nombre"=>"Medias Casi", "precio"=>"50"),
                        "15"=>array("nombre"=>"Medias AlFin", "precio"=>"50"));


?>
<head><title>Nuestros Productos</title></head>
<body><h1>Medias Para Todos</h1></body>
<a href='./verCarrito.php'>Ir al carrito</a><br><br>

<?php
foreach($listaProductos as $id=> $producto){
    echo $producto["nombre"]; echo '.  Precio: '.$producto["precio"];
    echo "<a href=' ./agregarCarrito.php?id=$id'> Agregar al Carrito</a><br>";
}




?>


<br><br><a href='./logout.php'>Cerrar Cesion</a>






