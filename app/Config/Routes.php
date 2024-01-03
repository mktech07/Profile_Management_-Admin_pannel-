<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/user/regForm', 'Home::regForm');
$routes->post('/user/regForm', 'Home::regForm');

$routes->get('user/edit/(:num)', 'Home::edit/$1');
$routes->post('user/edit/(:num)', 'Home::edit/$1');
// deleting record 
$routes->post('user/delete', 'Home::delete');