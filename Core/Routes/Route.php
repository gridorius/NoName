<?php
namespace Routes;

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
      if($this->params[$i] == '{controller}') $this->controller = $params[$i];
        else if($this->params[$i] == '{action}') $this->action = $params[$i];
          else if(preg_match('/\{(.+?)\}/', $this->params[$i]))
            $dictionary[preg_replace('/\{|\}/', '', $this->params[$i])] = $params[$i];
    }
    $this->params = $dictionary;
    return $this;
  }

  public function getParams(){
    return $this->params;
  }
}
