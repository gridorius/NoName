<?php
class Column{
  public $type;
  public $value;

  public function __construct($type){
    $this->type = $type;
  }

  public function setValue($value){
    if(gettype($value) != $this->type){
       throw new Exception('type mismatch');
       return;
     }
    $this->value = $value;
  }
}

class Model{
  private $props = [];

  public function __construct(){
    $props['number'] = new Column('integer');
    $props['name'] = new Column('string');
  }
}
