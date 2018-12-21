<?php
include_once 'Builder.php';

$builder = new Builder();
$builder->build(__DIR__.'/Controllers');
$builder->build(__DIR__.'/Routes');
$builder->build(__DIR__);
define('PUBLIC_PATH', __DIR__);
define('VIEWS', PUBLIC_PATH.'/Views');

// echo "<pre>";
// echo var_dump($_SERVER);
// echo "</pre>";

$params = Routes::find(preg_replace('/^\//', '', $_SERVER['REQUEST_URI']));
$reflection = new ReflectionMethod($params['controller'], $params['action']);

// $controller = new $params['controller'];
// echo $controller->{$params['action']}();


//$dictionary = Route::find();
//$controller = new $dictionary['controller'];
//echo $controller->{$dictionary['action']}();
