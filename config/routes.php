<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add('lunch_api', new Route('/rest-api/lunch', [
    '_controller' => [\App\Controller\LunchController::class, 'index']
]));

return $routes;