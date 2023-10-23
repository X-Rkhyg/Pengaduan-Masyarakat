<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


 $routes->get('/', 'Home::index');

 //Masyarakat
$routes->get('/auth/login', 'AuthMasyarakat::login');
$routes->get('/auth/daftar', 'AuthMasyarakat::daftar');
$routes->post('/auth/valid_login', 'AuthMasyarakat::valid_login');
$routes->post('/authmasyarakat/valid_register', 'AuthMasyarakat::valid_register');
$routes->get('/auth/logout', 'AuthMasyarakat::logout');
$routes->get('/masyarakat', 'Masyarakat::index');
$routes->get('/masyarakat/tambah', 'Masyarakat::tambah');
$routes->get('/masyarakat/lihat', 'Masyarakat::lihat');
$routes->post('/masyarakat/save', 'Pengaduan::save');
$routes->get('/download/(:num)', 'Pengaduan::download/$1');
$routes->get('/delete/(:num)', 'Pengaduan::delete/$1');
$routes->get('/pengaduan/edit/(:num)', 'Pengaduan::edit/$1');
$routes->post('/pengaduan/update/(:num)', 'Pengaduan::update/$1');

//Petugas
$routes->get('/auth/loginpetugas', 'AuthPetugas::login');
$routes->post('/authpetugas/valid_login', 'AuthPetugas::valid_login');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/validasi', 'Petugas::validasi');
$routes->get('/petugas/management', 'Petugas::management');

//Admin
$routes->post('/loginadmin', 'LoginPetugas::index');
$routes->get('/admin', 'Admin::index');
