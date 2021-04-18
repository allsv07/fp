<?php

use DI\Container;
use config\DB;

$container = new Container();

$container->set('DB', function () {
    return new DB();
});

$container->set('Users', function () {
    return new \app\Model\Users();
});

$container->set('getAllUsers', function () use ($container) {
    return $container->get('Users')->getAllUsers();
});

$container->set('getUserByBDate', function () use ($container) {
    return $container->get('Users')->getUserByBDate($data);
});




