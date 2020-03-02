<?php

session_start();

$_SESSION['tareas'][$_POST['titulo']]= $_POST["mensaje"];

echo "Guardaste Correctamente la tarea.<br/>";

echo '<a href="./index.php">Volver a la Lista</a>';