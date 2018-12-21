<?php

define('REQUEST_METHOD', strtolower($_SERVER["REQUEST_METHOD"]));
define('REQUEST_URI', $_SERVER['REQUEST_URI']);

class Request{
  const method = REQUEST_METHOD;
  const uri = REQUEST_URI;
}
