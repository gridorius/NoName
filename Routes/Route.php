<?php
class Route{
  public $length;
  private $params;
  public $controller;
  public $action;
  
  public function __construct($mask){
    $params = preg_split('/\//', $mask);
    $this->length = count($params);
    if(!in_array('{controller}', $params) || !in_array('{action}', $params)) throw new Exception('no set controller or action');
    $this->params = $params;
  }

  public function checkValid($params){
    if(count($params) != $this->length)return false;
    for($i = 0; $i < $this->length; $i++){
      if(!preg_match('/\{(.+?)\}/', $this->params[$i]) && $this->params[$i] != $params[$i]) return false;
    }
    return true;
  }

  public function handleUrlParams($params){
    $dictionary = [];
    for($i = 0; $i < $this->length; $i++){
      if(preg_match('/\{(.+?)\}/', $this->params[$i])) $dictionary[preg_replace('/\{|\}/', '', $this->params[$i])] = $params[$i];
    }
    return $dictionary;
  }
}
