<?php

require_once './routes/routes.php';
require_once './framework/Request.php';
require_once './framework/router/RouteDispatcher.php';

$request = (new Request())->capture();
$dispatcher = new RouteDispatcher($request);
$dispatcher->dispatch();
