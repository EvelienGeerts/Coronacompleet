<?php

require_once ( 'Controllers/Controller.php' );
require_once ( 'DB.php' );

/*
// Include router class
include('Route.php');

define('BASEPATH','/oop');

// Add base route (startpage)
Route::add('/',function(){
    echo 'Welcome :-)';
});

// Post route example
Route::add('/contact-form',function(){
    echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
},'get');

Route::run(BASEPATH);
*/

$controller = "Home";
$action = "index";
$index = -1;

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