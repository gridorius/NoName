<?php
use Routes\Routes;
include_once 'helpers.php';
include_once __DIR__.'/Bootstrap/build.php';


$requestMethod = Request::method;
$route = Routes::find(preg_replace('/^\//', '',Request::uri));
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
