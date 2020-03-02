<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get('/index.php', function (Request $request, Response $response, array $args){
    $lb = new \LB\LoadBalancers\RoundRobin("LB1");
    $server = new \LB\Servers\Decorator(new \LB\Servers\ServerOk("SOK"));
    $lb->addServer($server);
    $lb->call();
    $lb->call();
    $lb->call();
    $lb->call();
    $lb->call();
    $lb->call();
    $response->getBody()->write((string) $server->getCount());
    return $response;
});

$app->run();