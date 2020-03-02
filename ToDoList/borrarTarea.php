<?php

session_start();

unset($_SESSION['tareas'][$_GET['titulo']]);

echo "Borraste Correctamente la tarea.<br/>";
echo '<a href="./index.php">Volver a la Lista</a>';