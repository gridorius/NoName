<?php
class ErrorController{
  public function notFound(){
    return file_get_contents(VIEWS.'/404page.html');
  }
}
