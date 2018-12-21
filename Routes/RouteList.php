<?php
use Routes\Routes;
use Routes\Route;

Routes::addRoute(new Route('{controller}/{action}'));
Routes::addRoute(new Route('{controller}/{action}/{id}'));
