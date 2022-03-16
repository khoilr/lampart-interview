<?php
// Composer
require dirname(__DIR__) . '/vendor/autoload.php';


// Error and Exception handling
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


// Routing
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
// $router->add('/product/add');

// print_r($router->getRoutes());
// print_r($router->getParams());

// print_r($_SERVER['REQUEST_URI']);
$router->dispatch($_SERVER['REQUEST_URI']);
