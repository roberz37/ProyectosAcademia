<?php

session_start();

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, array $args) {
    $te= new \BLibrary\TemplateEngine("../templates/toIndex.template");
    $te->addVariable("title", "BLOGGG");
    $te->addVariable("titulo", "Blooogg");
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/login', function (Request $request, Response $response, array $args) {
    $userService= new \BLibrary\UserService;
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

$app->get('/registrar', function (Request $request, Response $response, array $args){
    $te= new \BLibrary\TemplateEngine("../templates/toRegister.template");
    $te->addVariable("title", "BLOGGG");
    $te->addVariable("titulo", "Ingrese el nombre deseado."); 
    $response->getBody()->write($te->render());
    return $response;
});

$app->post('/registro', function (Request $request, Response $response, array $args){
    $user= new \BLibrary\UserService;
    $NewUser= $user->saveUser($_POST['usuario']);
    if ($NewUser){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/user/me");
        return $response;
    } else {
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","./error");
        return $response;
    } 
});    
$app->get('/user/me/', function(Request $request, Response $response, array $args){
    $blog= new \BLibrary\BlogService();
    $te= new \BLibrary\TemplateEngine("../templates/toShow.template");
    $tePost= new \BLibrary\TemplateEngine("../templates/Post.template");
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
});

$app->get('/agregarPost', function (Request $request, Response $response, array $args){
    $te= new \BLibrary\TemplateEngine('../templates/toAgregarPost.template');
    $te->addVariable("head", "Blog");
    $te->addVariable("titulo", "bloggero.com");
    $te->addVariable("subtitulo", "Ingresa para poder postear");
    
    $response->getBody()->write($te->render());
    return $response;
    

});
$app->post('/postAgregado', function (Request $request, Response $response, array $args){
    $blog= new \BLibrary\BlogService();
    $newPost= $blog->savePost($_POST['newPost'], $_SESSION['userLogueado']);
    if ($newPost){
        $response=$response->withStatus(302);
        $response=$response->withHeader("Location","/user/me/");
        return $response; 
    }
    //error
    

});


$app->run();