<?php
require_once 'Route.php';
require_once 'Vues/vue.php';

class Routeur{

    private $currentPageUrl;
    private $routes = [];

    public function __construct($currentPageUrl){
        $this->currentPageUrl = $currentPageUrl;
    }

    public function get($path, $callback){
        $route = new Route($path, $callback);
        $this->routes["GET"][] = $route;
    }

    public function post($path, $callback){
        $route = new Route($path, $callback);
        $this->routes["POST"][] = $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            throw new Exception('REQUEST_METHOD does not exist');
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            if($route->match($this->currentPageUrl)){
                return $route->call();
            }
        }
        $vue = new Vue("404");
        $vue->generer();
    }

}
