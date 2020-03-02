<?php
session_start();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use RLibrary\FileStore;
use RLibrary\TemplateEngine;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) return false;
}


$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $te= new \RLibrary\TemplateEngine('../templates/toIndex.template');
    $te->addVariable("head", "ResizeImg");
    $te->addVariable("titulo", "Resize your IMG");
    $te->addVariable("subtitulo", "Ingresa una imagen para modificar su tamanio");
    
    $fs = new FileStore("imagenes");
    $teImagenes= new TemplateEngine('../templates/linkImagen.template');
    
    $imagenes= $fs->read();
    $str="";
    foreach ($imagenes as $key => $value) {
        $teImagenes->addVariable('id',$value);
        $str.=$teImagenes->render();
    }
    
    
    $te->addVariable("links", $str);

    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/resize', function (Request $request, Response $response, array $args){
    $filename= $_POST['url'];
    $percent = 0.5;

    // Content type
    header('Content-Type: image/jpeg');

    // Get new sizes
    list($width, $height) = getimagesize($filename);
    $newwidth = $width * $percent;
    $newheight = $height * $percent;

    // Load
    $thumb = imagecreatetruecolor($newwidth, $newheight);
    $source = imagecreatefromjpeg($filename);

    // Resize
    imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    // Output
    $name= time().".jpg";
    
    imagejpeg($thumb, $name);  

    $prueba= new RLibrary\FileStore("imagenes");
    $images = $prueba->read();
    $images[]=$name;
    $prueba->save($images);

    $response=$response->withStatus(302);
    $response=$response->withHeader("Location","/show/".$name);
    return $response;
});


$app->get('/show/{img}', function (Request $request, Response $response, array $args){
    $img = $args['img'];
    $te= new \RLibrary\TemplateEngine("../templates/toShow.template");
    $te->addVariable("head", "Resized");
    $te->addVariable("titulo", " Your IMG Resized");
    $te->addVariable("image", $img);


    $response->getBody()->write($te->render());
    return $response;
});

$app->run();