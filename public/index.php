<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Factory\AppFactory;
use DI\Container;
use Slim\Views\PhpRenderer;

require __DIR__ .'/../vendor/autoload.php';
require __DIR__ . '/../app/Model/Users.php';
require __DIR__ . '/../src/config/DB.php';
require __DIR__ . '/../src/function.php';


$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);



$app->get('/', function (Request $request, Response $response) {
    $userObj = new \app\Model\Users();
    $arrUser = $userObj->getAllUsers();
    $countUser = count($arrUser);

    $attr = ['title' => 'Title Users', 'users' => $arrUser ,'countUser' => $countUser];

    $render = new PhpRenderer('../app/views');
    $render->setAttributes($attr);
    $render->setLayout('layout.php');
    return $render->render($response, 'index.php');
});

$app->post('/sort-user', function (Request $request, Response $response, $args){
    //$data = json_decode(file_get_contents('php://input'));
    $data = $_POST['date_birth'];
    
//    $response->getBody()->write('12');
//    return $response;

});

$app->run();
