<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rotas do Painel da Cozinha
$routes->get('/cozinha/feito/(:num)', 'Home::marcarComoFeito/$1');
