<?php
class Builder{
  public function build($path){
    $files = glob($path.'/*');
    foreach($files as $file)
      if(!is_dir($file))include_once($file);
  }

  public function immersionBuild($path){
    $files = glob($path.'/*');
    foreach($files as $file)
      if(!is_dir($file))include_once($file);
      else $this->immersionBuild($file);
  }
}
