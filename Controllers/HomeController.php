<?php
class Home{
  public function index($id = ''){
    return view('home.html');
  }

  public function postindex(){
    echo 'post index';
  }
}
