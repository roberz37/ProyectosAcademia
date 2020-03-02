<?php
require_once("MiFramework.php");

$te= new TemplateEngine("./templates/error.template");

echo $te->render();