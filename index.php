<?php
include_once 'Builder.php';

$builder = new Builder();
$builder->build(__DIR__.'/Controllers');
$builder->build(__DIR__.'/Routes');
$builder->build(__DIR__);
define('PUBLIC_PATH', __DIR__);
define('VIEWS', PUBLIC_PATH.'/Views');


$route = Routes::find(preg_replace('/^\//', '', $_SERVER['REQUEST_URI']));
$reflection = new ReflectionMethod($route->controller, $route ->action);
echo $reflection->invokeArgs(new $route->controller, $route->getParams());

// echo "<pre>";
// echo var_dump($route);
// echo "</pre>";

// $controller = new $params['controller'];
// echo $controller->{$params['action']}();


//$dictionary = Route::find();
//$controller = new $dictionary['controller'];
//echo $controller->{$dictionary['action']}();
