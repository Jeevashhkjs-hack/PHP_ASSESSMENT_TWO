<?php

require 'core/router.php';
require 'controller/userController.php';

session_start();

$controllers = new userController();
$router = new router();

$router->get('/','home');

$router->routingFunc();