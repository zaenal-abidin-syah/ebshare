<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/ebook', 'Ebook::index');
$routes->get('/ebook/add', 'Ebook::add');
$routes->post('/ebook', 'Ebook::addEbook');
$routes->get('/login', 'Auth::login');
$routes->post('/verify', 'Auth::verify');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerUser');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/dashboard/table', 'Dashboard::table');
$routes->get('/dashboard/ebook', 'Dashboard::ebook');
$routes->get('/report', 'Report::index');
