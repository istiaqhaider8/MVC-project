<?php

class RouteDispatcher{

    private $request;
    private $router;

    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
    }

    public function dispatch()
    {
        $url = $this->request->getpath();
        $method =$this->request->getMethod();
        $data = $this->request->getData();
        $callable = $this->router->match($method, $url);

       if (isset($callable['callback'])){
          $callback = $callable['callback'];
          return$callback($data);

       }

        if (isset($callable['controller'])){
            $controllerDefinition = $callable['controller'];
            list($controller,$method) = explode('@',$controllerDefinition);
            require_once __DIR__.'/../../controllers/$controller.php';
            $controllerInstance = new $controller;
            return $controllerInstance->method($data);
        }

        throw new Exception('either callback or controller is rerquired');

    }

}