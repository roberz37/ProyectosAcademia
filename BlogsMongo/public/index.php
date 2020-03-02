<?php
session_start();

use BLibrary\BlogService;
use BLibrary\CheckLogin;
use BLibrary\TemplateEngine;
use \BLibrary\UserService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $te= new TemplateEngine('../templates/toIndex.template');
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "bloggero.com");
    $te->addVariable("subtitulo", "Ingresa para poder postear");
    
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/index.php', function (Request $request, Response $response, array $args) {
    $userService= new UserService;
    if ($userService->userExists($_POST['usuario'])){
        $_SESSION['logueado']=true;
        $_SESSION['userLogueado']=$_POST['usuario'];
    }
    
    if ($_SESSION['logueado']){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/user/me/");
        return $response;
    } else {
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/error");
        return $response;
        }
});


$app->get('/register', function (Request $request, Response $response, array $args) {
    $te= new \BLibrary\TemplateEngine('../templates/toRegister.template');
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "bloggero.com");
    $te->addVariable("subtitulo", "Ingresa el usuario deseado.");
    
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/registerOk', function (Request $request, Response $response, array $args){
    $userService= new UserService;
    $newUser= $userService->saveUser($_POST['registro']);
    if ($newUser){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/");
        return $response;
    }
    //error
});


$app->get('/agregarPost', function (Request $request, Response $response, array $args){
    $te= new TemplateEngine('../templates/toAgregarPost.template');
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "bloggero.com");
    $te->addVariable("subtitulo", "Ingresa para poder postear");
    
    $response->getBody()->write($te->render());
    return $response;
    

});
$app->post('/postAgregado', function (Request $request, Response $response, array $args){
    $blog= new BlogService();
    $newPost= $blog->savePost($_POST['newPost'], $_SESSION['userLogueado']);
    if ($newPost){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/user/me/");
        return $response; 
    }
    //error
    

});



$app->get('/user/{id}', function(Request $request, Response $response, array $args){
    $id= $args['id'];
    $blog= new BlogService();
    $te= new TemplateEngine("../templates/userPost.template");
    $tePost= new TemplateEngine("../templates/verPost.template");
    $posts= $blog->getAllPosts($id);
    $str="";
    foreach ($posts as $key => $value) {
        $tePost->addVariable("post", $value);
        $str.=$tePost->render();
    }
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "Blogggg");
    $te->addVariable("post", $str);

    $response->getBody()->write($te->render());
    return $response;
});

$app->get('/error', function(Request $request, Response $response, array $args){
    $te= new TemplateEngine("../templates/error.template");
    $response->getBody()->write($te->render());
    return $response;
});

$app->get('/user/me/', function(Request $request, Response $response, array $args){
    $blog= new BlogService();
    $te= new TemplateEngine("../templates/userPost.template");
    $tePost= new TemplateEngine("../templates/verPost.template");
    $posts= $blog->getAllPosts($_SESSION['userLogueado']);
    $str="";
    foreach ($posts as $key => $value) {
        $tePost->addVariable("post", $value);
        $str.=$tePost->render();
    }
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "Blogggg");
    $te->addVariable("post", $str);

    
    $response->getBody()->write($te->render());
    //$check= new CheckLogin($response);
    //$response= $check->get($_GET, $_POST, $_SESSION);
    return $response;
})->add(function($request, $handler){
    
    if(!$_SESSION['logueado']) {
        $response = $handler->handle($request);
        $response = $response->withStatus(401);
        $response = $response->withHeader("Location", "/");
        return $response;
    }
    $response = $handler->handle($request);
    return $response;
});

$app->get('/logout', function (Request $request, Response $response, array $args) {
    session_destroy();
    $response= $response->withStatus(302);
    $response= $response->withHeader("Location", "/");
    return $response;
});
$app->run();
