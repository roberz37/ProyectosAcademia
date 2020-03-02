<?php
require_once("MiFramework.php");
session_start();


$te=new TemplateEngine("./templates/toIndex.template");
$te->addVariable("head", "Medias Para Todos");
$te->addVariable("titulo", "TusMedias.com");
$te->addVariable("subtitulo", "Ingresa para encontrar las mejores ofertas.");

echo $te->render();



