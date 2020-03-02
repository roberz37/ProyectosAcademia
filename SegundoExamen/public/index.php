<?php
session_start();

use ALibrary\Ahorcado;
use ALibrary\TemplateEngine;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $te= new TemplateEngine('../templates/toIndex.template');
    $te->addVariable("head", "Ahorcado");
    $te->addVariable("titulo", "Ahorcado");
    $te->addVariable("subtitulo", "Ingrese la palabra deseada");
    
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/palabra', function (Request $request, Response $response, array $args){
    $_SESSION['palabra']=$_POST['palabra'];
    $_SESSION['letras']=array();
    
    if(!empty($_SESSION['palabra'])){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/jugar");
        return $response;
    }

    $response=$response->withStatus(302);
    $response=$response->withHeader("Location","/error");
    return $response;

});

$app->get('/jugar', function (Request $request, Response $response, array $args){
    $te= new TemplateEngine("../templates/jugar.template");
    $ahorcado= new Ahorcado($_SESSION['palabra'], 5);
    
    
    
    foreach ($_SESSION['letras'] as $key => $letra) {
        $ahorcado->jugar($letra);
    }
    
    if($ahorcado->termino()){
        if($ahorcado->perdio()){
            $response->getBody()->write("Perdiste!");
            return $response;
        }
        $response->getBody()->write("Ganaste. La palabra es: ".$_SESSION['palabra']);
        return $response;
    }

    $te->addVariable("head", "Ahorcado");
    $te->addVariable("palabra", $ahorcado->mostrar());
    $_SESSION['palabraOculta']= $ahorcado->mostrar();
    $response->getBody()->write($te->render());
    return $response;

    
});

$app->get('/jugar/{letra}', function (Request $request, Response $response, array $args){
    $letra= $args['letra'];
    
    if (empty($_SESSION['letras'])){
        $_SESSION['letras']= array();
    }
    
    $_SESSION['letras'][]= $letra;
    
    
    $response=$response->withStatus(302);
    $response=$response->withHeader("Location","/jugar");
    return $response;
});


$app->run();

