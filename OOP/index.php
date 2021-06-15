<?php

require_once ( 'Controllers/Controller.php' );
require_once ( 'DB.php' );

$controller = "Home";
$action = "index";
$index = -1;
//    0             1           2     3       4 5
//localhost/git-coronacompleet/oop/product/view/1
$routing = explode('/', $_SERVER['REQUEST_URI']);

if ( isset( $routing[3] ) && $routing[3] != "" )
    $controller = $routing[3];

if ( isset( $routing[4]) && $routing[4] != "" )
    $action = $routing[4];

if ( isset( $routing[5]) && $routing[5] != "" )
    $index = $routing[5];

//$controller = new Controller('Task', 'index');
$controller = new Controller($controller, $action, $index);

$controller->run();