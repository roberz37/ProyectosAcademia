<?php
session_start();
foreach($_SESSION['tareas'] as $titulo => $mensaje){
    echo "<a href='./verTareas.php?titulo=$titulo'>$titulo</a> ";
    echo "<a href='./borrarTarea.php?titulo=$titulo'>Borrar Tarea</a><br/><br/>";
}

echo '<a href="./crear.html">Agregar Tarea</a>';