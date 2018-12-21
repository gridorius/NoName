<?php
class Routes{
  private static $routes = [];
  public static function addRoute($route){
    static::$routes[] = $route;
  }

  public static function find($url){
    $params = preg_split('/\//', $url);
    $route = (new Route('{controller}/{action}'))->handleUrlParams(['ErrorController','notFound']);
    foreach(self::$routes as $r){
      if($r->checkValid($params)) $route = $r->handleUrlParams($params);
    }
    return $route;
  }
}
