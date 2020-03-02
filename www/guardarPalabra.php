<?php

session_start();

$_SESSION['palabra'] = $_POST['palabra'];
$_SESSION['letras']= array();
$_SESSION['vidas']= $_POST['vidas'];
print_r($_SESSION);

echo "<pre>";
echo "<a href= http://localhost:8080/jugar.php>JUGAR</a>";
echo "</pre>";