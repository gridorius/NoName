<?php
class Home{
  public function index($id = ''){
    return 'It is home and id = '.$id;
  }

  public function postindex(){
    echo 'post index';
  }

  public function pizdec(){
    return 'It is pizdec';
  }
}
