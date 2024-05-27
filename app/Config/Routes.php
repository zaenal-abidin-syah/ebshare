<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/pass', 'Home::pass');
$routes->get('/ebook', 'Ebook::index');
$routes->get('/ebook/add', 'Ebook::add');
$routes->post('/ebook', 'Ebook::addEbook');
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::verify');
$routes->get('/logout', 'Logout::index');
// $routes->post('/verify', 'Auth::verify');
// $routes->get('/register', 'Auth::register');
// $routes->post('/register', 'Auth::registerUser');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/dashboard/profile/edit/(:any)', 'Dashboard::editProfile/$1');
$routes->post('/dashboard/profile/update', 'Dashboard::updateProfile');
$routes->get('/dashboard/table', 'Dashboard::table');
$routes->get('/dashboard/user', 'Dashboard::user');
$routes->get('/dashboard/user/detail/(:any)', 'Dashboard::detailUser/$1');
$routes->get('/dashboard/user/edit/(:any)', 'Dashboard::editUser/$1');
$routes->post('/dashboard/user/update', 'Dashboard::updateUser');
$routes->get('/dashboard/user/delete/(:any)', 'Dashboard::deleteUser/$1');
$routes->get('/dashboard/ebook', 'Dashboard::ebook');
$routes->get('/dashboard/ebook/add', 'Dashboard::addEbook');
$routes->post('/dashboard/ebook/add', 'Dashboard::createEbook');
$routes->get('/dashboard/ebook/detail/(:any)', 'Dashboard::detailEbook/$1');
$routes->get('/dashboard/ebook/edit/(:any)', 'Dashboard::editEbook/$1');
$routes->post('/dashboard/ebook/update', 'Dashboard::updateEbook');
$routes->get('/dashboard/ebook/delete/(:any)', 'Dashboard::deleteEbook/$1');
$routes->get('/report', 'Report::index');
