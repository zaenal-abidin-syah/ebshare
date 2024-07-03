<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/ebook', 'Ebook::index');
$routes->get('/ebook/detail/(:any)', 'Ebook::detailEbook/$1');
$routes->get('/ebook/download/(:any)', 'Ebook::download/$1');
$routes->post('/ebook/favorite', 'Ebook::favorite');
$routes->post('/ebook/rating', 'Ebook::rating');
$routes->post('/ebook/komentar', 'Ebook::komentar');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::verify');
$routes->get('/logout', 'Auth::logout');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::registerUser');
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

$routes->get('/dashboard/myebook', 'Dashboard::myEbook');
$routes->post('/dashboard/myebook/add', 'Dashboard::addMyEbook');
$routes->post('/dashboard/myebook/create', 'Dashboard::createMyEbook');
$routes->get('/dashboard/myebook/detail/(:any)', 'Dashboard::detailMyEbook/$1');
$routes->get('/dashboard/myebook/edit/(:any)', 'Dashboard::editMyEbook/$1');
$routes->post('/dashboard/myebook/update', 'Dashboard::updateMyEbook');
$routes->post('/dashboard/myebook/cleanup', 'Dashboard::cleanUp');
$routes->get('/dashboard/myebook/delete/(:any)', 'Dashboard::deleteMyEbook/$1');


$routes->get('/dashboard/ebook', 'Dashboard::ebook');
$routes->get('/dashboard/ebook/detail/(:any)', 'Dashboard::detailEbook/$1');
$routes->get('/dashboard/ebook/edit/(:any)', 'Dashboard::editEbook/$1');
$routes->post('/dashboard/ebook/update', 'Dashboard::updateEbook');
$routes->get('/dashboard/ebook/delete/(:any)', 'Dashboard::deleteEbook/$1');
