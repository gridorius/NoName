<?php
define('PUBLIC_PATH', __DIR__);
define('VIEWS', PUBLIC_PATH.'/Views');

function view($path){
  return new View($path);
}

function path($dir){
  return $dir.'/';
}

function public_path($path = ''){
  return path(PUBLIC_PATH).$path;
}

function views_path($path = ''){
  return path(VIEWS).$path;
}
