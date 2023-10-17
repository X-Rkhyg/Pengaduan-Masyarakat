<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'AuthMasyarakat::login');
$routes->get('/auth/loginpetugas', 'AuthPetugas::login');
$routes->get('/auth/daftar', 'AuthMasyarakat::daftar');
$routes->post('/auth/valid_login', 'AuthMasyarakat::valid_login');
$routes->post('/authpetugas/valid_login', 'AuthPetugas::valid_login');
$routes->post('/loginpetugas', 'LoginPetugas::index');
$routes->post('/authmasyarakat/valid_register', 'AuthMasyarakat::valid_register');
$routes->get('/auth/logout', 'AuthMasyarakat::logout');

$routes->get('/masyarakat', 'Masyarakat::index');
$routes->get('/masyarakat/tambah', 'Masyarakat::tambah');
$routes->get('/masyarakat/lihat', 'Masyarakat::lihat');

$routes->get('/petugas', 'Petugas::index');

$routes->get('/admin', 'Admin::index');

$routes->get('/wibu', 'Wibu::index');