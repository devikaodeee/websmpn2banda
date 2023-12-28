<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'authfilter']);
$routes->get('/formulir', 'Formulir::index', ['filter' => 'authfilter']);
$routes->get('/akun', 'Akun::index', ['filter' => 'authfilter']);

$routes->get('/admin', 'Admin\Dashboard::index', ['filter' => 'authadminfilter']);
$routes->get('/admin/formulir', 'Admin\Formulir::index', ['filter' => 'authadminfilter']);
$routes->get('/admin/formulir/(:num)', 'Admin\Formulir::detail/$1', ['filter' => 'authadminfilter']);
$routes->get('/admin/pengguna', 'Admin\Pengguna::index', ['filter' => 'authadminfilter']);
$routes->get('/admin/akun', 'Admin\Akun::index', ['filter' => 'authadminfilter']);

$routes->get('/auth/login', 'Auth::login');
$routes->get('/auth/registrasi', 'Auth::registrasi');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/admin/logout', 'Admin\Akun::logout');

$routes->get('/admin/login', 'Admin\Akun::login');
$routes->post('/api/admin/login', 'Admin\Akun::login_api');

/* API Routes */
$routes->post('/api/auth/login', 'Auth::login_api');
$routes->post('/api/auth/registrasi', 'Auth::registrasi_api');

$routes->post('/api/akun/save', 'Akun::save_api');
$routes->post('/api/admin/akun/save', 'Admin\Akun::save_api');

$routes->post('/api/formulir/add', 'Formulir::add_formulir_api');
$routes->post('/api/formulir/submit', 'Formulir::submit_formulir_api');