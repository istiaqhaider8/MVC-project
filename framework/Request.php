<?php
class Request {
    private $path;
    private $data;
    private $method;


    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    function getRequestData(){
        $input = file_get_contents("php://input");

      return [
            HttpMethod::GET =>$_GET,
            HttpMethod::POST =>$_POST,
            HttpMethod::PUT => $input,
            HttpMethod::DELETE=>$input,

        ];
    }

    public function capture(){
        $url = $_SERVER['REQUEST_URI'];
        list() = explode("?",$url);
        $this->path = rtrim('$path',"/");
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->data = $this->getRequestData()[$this->method];
        return $this;



    }

}