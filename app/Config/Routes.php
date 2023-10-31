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
$routes->get('/auth/logoutpetugas', 'AuthPetugas::logout');

$routes->get('/masyarakat', 'Masyarakat::index');
$routes->get('/masyarakat/tambah', 'Masyarakat::tambah');
$routes->get('/masyarakat/lihat', 'Masyarakat::lihat');
$routes->get('/masyarakat/setting', 'Masyarakat::setting');
$routes->post('/masyarakat/ganti_password/(:num)', 'Setting::ganti_password_masyarakat/$1');
$routes->post('/masyarakat/save', 'Pengaduan::save');
$routes->get('/download/(:num)', 'Pengaduan::download/$1');
$routes->get('/delete/(:num)', 'Pengaduan::delete/$1');
$routes->get('/pengaduan/edit/(:num)', 'Pengaduan::edit/$1');
$routes->post('/pengaduan/update/(:num)', 'Pengaduan::update/$1');
$routes->get('/pengaduan/lihattanggapan/(:num)', 'Pengaduan::lihattanggapan/$1');
$routes->get('/masyarakat/defaultchange', 'AuthMasyarakat::defaultchange');
$routes->post('/masyarakat/defaultchange/save', 'AuthMasyarakat::defaultchangesave');

//Petugas
$routes->get('/auth/loginpetugas', 'AuthPetugas::login');
$routes->post('/authpetugas/valid_login', 'AuthPetugas::valid_login');

$routes->get('/petugas', 'Petugas::index');
$routes->get('/petugas/validasi', 'Petugas::validasi');
$routes->get('/petugas/management', 'Petugas::management');
$routes->get('/petugas/setting', 'Petugas::setting');
$routes->get('/petugas/defaultpass/(:num)', 'Petugas::defaultpass/$1');

$routes->post('/petugas/ganti_password/(:num)', 'Setting::ganti_password_petugas/$1');
$routes->get('/petugas/masyarakat/edit/(:num)', 'Petugas::edit/$1');
$routes->post('/petugas/masyarakat/update/(:num)', 'Petugas::update/$1');

$routes->get('/pengaduanpetugas/validasi/(:num)', 'PengaduanPetugas::validasi/$1');
$routes->get('/pengaduanpetugas/tanggapan/(:num)', 'PengaduanPetugas::tanggapan/$1');
$routes->post('/pengaduanpetugas/updatetanggapan/(:num)', 'PengaduanPetugas::updatetanggapan/$1');

//Admin
$routes->post('/loginadmin', 'LoginPetugas::index');

$routes->get('/admin', 'Admin::index');
$routes->get('/admin/validasi', 'Admin::validasi');
$routes->get('/admin/management', 'Admin::management');
$routes->get('/admin/managementpetugas', 'Admin::managementpetugas');
$routes->get('/admin/petugas', 'Admin::petugas');
$routes->get('/admin/setting', 'Admin::setting');