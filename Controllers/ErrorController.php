<?php
class ErrorController{
  public function notFound(){
    return file_get_contents(views_path('/404page.html'));
  }
}
