<?php

require 'core/router.php';
require 'controller/userController.php';

session_start();

$controllers = new userController();
$router = new router();
session_start();
$router->get('/','home');
$router->get('/createDabase','createDabase');
$router->get('/createTable','createTable');
$router->get('/createColumn','createColumn');

if(isset($_POST['domEle'])){
    $controllers->getTablesFmDb($_POST['domEle']);
}
if(isset($_POST['table'])){
    $controllers->getcolumns($_POST);
}

$router->routingFunc();
