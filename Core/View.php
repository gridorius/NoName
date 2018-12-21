<?php
class View{
  private $path;
  public function __construct($path){
    $this->path = $path;
  }

  public function __toString(){
    return file_get_contents(path(VIEWS).$this->path);
  }
}
