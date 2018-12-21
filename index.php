<?php
include_once 'Builder.php';

$builder = new Builder();
$builder->build(__DIR__.'/Controllers');
$builder->build(__DIR__.'/Routes');
$builder->build(__DIR__);
define('PUBLIC_PATH', __DIR__);
define('VIEWS', PUBLIC_PATH.'/Views');

$requestMethod = strtolower($_SERVER["REQUEST_METHOD"]);
$route = Routes::find(preg_replace('/^\//', '', $_SERVER['REQUEST_URI']));
$classReflection = new ReflectionClass($route->controller);
$classMethods = new Collection($classReflection->getMethods());
$action = $requestMethod.$route->action;
$found = $classMethods->Any(function($val) use ($action){return $val->name == $action;});
$controller = new $route->controller();

if($found)
  $method = $classReflection->getMethod($action);
else
  $method = $classReflection->getMethod($route->action);

echo $method->invokeArgs($controller, $route->getParams());

// echo "<pre>";
// echo var_dump($route);
// echo "</pre>";
