<?php
/**
 * Created by PhpStorm.
 * User: I347416
 * Date: 01/12/2017
 * Time: 16:10
 */

class Route
{

    private $path;
    private $callback;
    private $urlParams = [];

    public function __construct($path, $callback){
        $this->path = trim($path, '/');  // On retire les / inutils
        $this->callback = $callback;
    }

    public function match($url){
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if(!preg_match($regex, $url, $urlParams)){
            return false;
        }
        array_shift($urlParams);
        $this->urlParams = $urlParams;  // On sauvegarde les paramètre dans l'instance pour plus tard
        return true;
    }

    public function call(){
        return call_user_func_array($this->callback, $this->urlParams);
    }

}