<?php

require_once __DIR__.'/HttpMethod.php';

class Router{

    private $routes = [];

    public function validate($url,$method,$callable){

        if (empty($url)){

            throw new \Exception("A path/url is required to add a router");

        }

        if(empty($method) || !in_array($method,[
                HttpMethod::POST,HttpMethod::DELETE,HttpMethod::GET,HttpMethod::PUT
            ])){
            throw new \Exception("Invalid request method");
        }


        if(!isset($callable['callback']) && !isset($callable['controller'])){
            throw new \Exception("Either a callback or a controller is required");
        }
    }


    public function add($url,$method, $callable = array()){

      $this->validate($url,$method,$callable);


        if (!isset($this->routes[$method])){
            $this->routes[$method]=array();
        }

        list($path,$parameter) = explode("?",$url);
        $this->routes[$method][$path] = $callable;

        //$this->routes[$method][$url]=$callable;






    }

}