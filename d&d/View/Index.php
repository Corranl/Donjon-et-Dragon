<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

session_start();

/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();


//Ajout de route
$router->add('', ['controller' => 'Home', 'action' => 'index']);

$router->add('product/contact', ['controller' => 'Product', 'action' => 'contact']);
$router->add('product/contact', ['controller' => 'Product', 'action' => 'contact']);


/*
* Gestion des erreurs dans le routing
*/
try {
   $router->dispatch($_SERVER['QUERY_STRING']);
} catch(Exception $e){
   switch($e->getMessage()){
       case 'You must be logged in':
           header('Location: /login');
           break;
   }
}