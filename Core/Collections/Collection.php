<?php
class Collection{
  private $context;
  public function __construct($array){
    $this->context = $array;
  }

  public function Any($callback){
    foreach ($this->context as $val)
      if($callback($val)) return true;
      return false;
  }

  public function All($callback){
    foreach ($this->context as $val)
      if(!$callback($val)) return false;
    return true;
  }

  public function ForEach($callback){
    foreach($this->context as $val)
      $callback($val);
  }
}
