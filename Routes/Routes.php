<?php
class Routes{
  private static $routes = [];
  public static function addRoute($route){
    static::$routes[] = $route;
  }

  public static function find($url){
    $params = preg_split('/\//', $url);
    foreach(self::$routes as $route){
      if($route->checkValid($params)) return $route->handleUrlParams($params);
    }
    return file_get_contents(VIEWS.'/404page.html');
  }
}
