<?php

 require_once "./framework/router/Router.php";

 $router =new Router;
 $router->add('/user','GET',array(
    'callback' => function($request){
        $id = $request['id'];
        return "These are users";

    }

));
$router =new Router;
$router->add('/user/profile','GET',array(
    'controller'=>'UserController@getUser'



));
return $router;
