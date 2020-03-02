<?php
session_start();

echo $_SESSION['tareas'][$_GET['titulo']];

echo '<br/><br/><a href="./index.php">Volver a la Lista</a>';

