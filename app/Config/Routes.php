<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/ebook', 'Ebook::index');
$routes->get('/dashboard', 'Ebook::test');
$routes->get('/report', 'Report::index');
