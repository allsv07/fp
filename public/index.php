<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Views\PhpRenderer;
use config\DB;

require __DIR__ .'/../vendor/autoload.php';
require __DIR__ . '/../app/Model/Users.php';
require __DIR__ . '/../src/config/DB.php';
require __DIR__ . '/../src/function.php';
require __DIR__ . '/../src/config/bootstrap.php';


AppFactory::setContainer($container);

$app = AppFactory::create();



$app->get("/", function (Request $request, Response $response) use ($container)  {
    $arrUsers = $container->get('getAllUsers');
    $countUser = count($arrUsers);
    $attr = ['title' => 'Title Users', 'users' => $arrUsers ,'countUser' => $countUser];

    $render = new PhpRenderer('../app/views');
    $render->setAttributes($attr);
    $render->setLayout('layout.php');
    return $render->render($response, 'index.php');
});

$app->post("/", function (Request $request, Response $response) use ($container)  {
    $data = file_get_contents('php://input');
    $arrUsers = $container->get('getUserByBDate', $data);

    $response->getBody()->write($arrUsers);
    return $response;
});

$app->run();
